<?php


namespace App\Repositories\Base;


use App\Repositories\Users\UserAccountRepository;
use App\Repositories\Users\UserNumRepository;
use App\Repositories\Users\UserRepository;
use App\Services\Base\RedisService;
use Closure;
use Throwable;

abstract class BaseRepository extends RedisService
{
    public abstract function query();

    public abstract function getInfoKey($id);

    public abstract function find($id);

    public abstract function convertToJsonArray(array $modelArray): array;

    public abstract function convertToModel($property);

    //删除缓存信息
    public function delCacheInfo($key)
    {
        $this->getRedis()->del($key);
    }

    /**
     * 从获取缓存信息
     * @param string $key
     * @param Closure $DbFindCallback
     * @param int $expire
     * @return mixed
     */
    public function getCacheInfo(string $key, Closure $DbFindCallback, int $expire = self::RD_EXPIRE_ONE_HOUR)
    {
        $row = $this->getRedis()->hGetAll($key);
        if (empty($row)) {
            //从数据库获取数据
            $row = $DbFindCallback();
            $this->getRedis()->hmset($key, $this->convertToJsonArray($row->toArray()));
            if ($expire > 0) {
                $this->getRedis()->expire($key, $expire);//设置缓存时间6小时
            }
            return $row;
        }
        return $this->convertToModel($row);
    }

    //批量获取信息
    public function getCacheInfoList(array $keys, array $ids, Closure $getInfoCallback, $groupId = null, int $expire = self::RD_EXPIRE_ONE_HOUR)
    {
        $keyCount = count($keys);
        $luaScript = "local rst={}; for i,v in pairs(KEYS) do rst[i]=redis.call('hgetall', v) end; return rst";
        $rows = $this->getRedis()->eval($luaScript, $keyCount, ...$keys);
        foreach ($rows as $index => $row) {
            if (empty($row)) {
                //重新获取，如果数据库没有数据会抛出异常，进行捕获删除掉
                try {
                    $row = $getInfoCallback($ids[$index], $expire);
                    $rows[$index] = $row;
                } catch (Throwable $exception) {
                    unset($rows[$index]);
                }
            } else {
                $row = $this->getArrayByHash($row);
                $rows[$index] = $this->convertToModel($row);
            }
        }

        if (filled($groupId)) {
            //进行分组
            return collect($rows)->keyBy($groupId)->all();
        }

        //不分组
        return $rows;
    }

    /**
     * Hash数组转tableArr
     * @param array $HashArray
     * @return array $Arr
     */
    public function getArrayByHash(array $HashArray)
    {
        $tableArray = [];
        $count = count($HashArray);
        for ($i = 0; $i < $count; $i += 2) {
            $tableArray[$HashArray[$i]] = $HashArray[$i + 1];
        }
        return $tableArray;
    }


    /**
     * @param $id
     * @param int $expire
     * @return mixed
     */
    public function getInfo($id, int $expire = self::RD_EXPIRE_ONE_HOUR)
    {
        $key = $this->getInfoKey($id);
        return $this->getCacheInfo($key, function () use ($id) {
            return $this->find($id);
        }, $expire);
    }

    public function delInfoCache($id)
    {
        $this->delCacheInfo($this->getInfoKey($id));
    }

    public function getInfoList(array $ids, $groupId = null, int $expire = self::RD_EXPIRE_ONE_HOUR)
    {
        $keys = [];
        foreach ($ids as $id) {
            $keys[] = $this->getInfoKey($id);
        }
        return $this->getCacheInfoList($keys, $ids, function ($id, $expire) {
            return $this->getInfo($id, $expire);
        }, $groupId, $expire);
    }

    /**
     * @return UserNumRepository
     */
    public function getUserNumRepository()
    {
        return app(UserNumRepository::class);
    }

    /**
     * @return UserRepository
     */
    public function getUserRepository()
    {
        return app(UserRepository::class);
    }


    /**
     * @return UserAccountRepository
     */
    public function getUserAccountRepository()
    {
        return app(UserAccountRepository::class);
    }


    //上锁
    public function lock($key, $time)
    {
        return $this->getRedis()->set($key, "1", "EX", $time, "NX");
    }

    //解锁
    public function unLock($key)
    {
        $this->getRedis()->del($key);
    }

    //获取redis有序集合分页数据
    public function getRedisPageList($key, $min_id, $num)
    {
        $redis = $this->getRedis();

        if ($min_id == 0) {
            $lists = $redis->zRevRange($key, 0, $num, true);
        } else {
            $lists = $redis->zrevrangebyscore($key, "({$min_id}", "-inf", [
                'withscores' => true,
                'limit' => [0, $num + 1]
            ]);
        }

        if (blank($lists)) {
            return [];
        }

        return $lists;
    }
}
