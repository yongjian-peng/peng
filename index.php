<?php
/**
 * Created by PhpStorm.
 * User: liwenle
 * Date: 14-5-12
 * Time: 下午1:36
 */
/**
 * ID 生成策略
 * 毫秒级时间41位+机器ID 10位+毫秒内序列12位。
 * 0           41     51     64
+-----------+------+------+
|time       |pc    |inc   |
+-----------+------+------+
 *  前41bits是以微秒为单位的timestamp。
 *  接着10bits是事先配置好的机器ID。
 *  最后12bits是累加计数器。
 *  macheine id(10bits)标明最多只能有1024台机器同时产生ID，sequence number(12bits)也标明1台机器1ms中最多产生4096个ID，
 *
 * auth: zhouyuan24@gmail.com
 */
class helper_idwork
{
    const debug = 1;
    static $workerId;
    static $twepoch = 1399943202863;
    static $sequence = 0;
    const workerIdBits = 4;
    static $maxWorkerId = 15;
    const sequenceBits = 10;
    static $workerIdShift = 10;
    static $timestampLeftShift = 14;
    static $sequenceMask = 1023;
    private  static $lastTimestamp = -1;
    /**
     * @var helper_idwork
     */
    private static $self = NULL;
    /**
     * @static
     * @return helper_idwork
     */
    public static function getInstance()
    {
        if (self::$self == NULL) {
            self::$self = new self();
        }
        return self::$self;
    }
    function __construct($workId=1){
        if($workId > self::$maxWorkerId || $workId< 0 )
        {
            throw new Exception("worker Id can't be greater than 15 or less than 0");
        }
        self::$workerId=$workId;
    }
    function timeGen(){
        //获得当前时间戳
        $time = explode(' ', microtime());
        $time2= substr($time[0], 2, 3);
        return  $time[1].$time2;
    }
    private  function  tilNextMillis($lastTimestamp) {
        $timestamp = $this->timeGen();
        while ($timestamp <= $lastTimestamp) {
            $timestamp = $this->timeGen();
        }
        return $timestamp;
    }
    function  nextId()
    {
        $timestamp=$this->timeGen();
        if(self::$lastTimestamp == $timestamp) {
            self::$sequence = (self::$sequence + 1) & self::$sequenceMask;
            if (self::$sequence == 0) {
                $timestamp = $this->tilNextMillis(self::$lastTimestamp);
            }
        } else {
            self::$sequence  = 0;
        }
        if ($timestamp < self::$lastTimestamp) {
            throw new Excwption("Clock moved backwards.  Refusing to generate id for ".(self::$lastTimestamp-$timestamp)." milliseconds");
        }
        self::$lastTimestamp  = $timestamp;
        $nextId = ((sprintf('%.0f', $timestamp) - sprintf('%.0f', self::$twepoch)  )<< self::$timestampLeftShift ) | ( self::$workerId << self::$workerIdShift ) | self::$sequence;
        return $nextId;
    }
}

$snowflake = new helper_idwork();

for($i=0; $i<10; $i++){
    $nextId = $snowflake->nextId();
    echo $nextId."<br/>";
}


echo '<br/>';

//exit;


class IdWork
{

    //开始时间,固定一个小于当前时间的毫秒数即可
    const twepoch =  1474992000000;//2016/9/28 0:0:0

    //机器标识占的位数
    const workerIdBits = 10;

    //毫秒内自增数点的位数
    const sequenceBits = 12;

    protected $workId = 0;

    //要用静态变量
    static $lastTimestamp = -1;
    static $sequence = 0;


    function __construct($workId){
        //机器ID范围判断
        $maxWorkerId = -1 ^ (-1 << self::workerIdBits);
        if($workId > $maxWorkerId || $workId< 0){
            throw new Exception("workerId can't be greater than ".$this->maxWorkerId." or less than 0");
        }
        //赋值
        $this->workId = $workId;
    }

    //生成一个ID
    public function nextId(){
        $timestamp = $this->timeGen();
        $lastTimestamp = self::$lastTimestamp;
        //判断时钟是否正常
        if ($timestamp < $lastTimestamp) {
            throw new Exception("Clock moved backwards.  Refusing to generate id for %d milliseconds", ($lastTimestamp - $timestamp));
        }
        //生成唯一序列
        if ($lastTimestamp == $timestamp) {
            $sequenceMask = -1 ^ (-1 << self::sequenceBits);
            self::$sequence = (self::$sequence + 1) & $sequenceMask;
            if (self::$sequence == 0) {
                $timestamp = $this->tilNextMillis($lastTimestamp);
            }
        } else {
            self::$sequence = 0;
        }
        self::$lastTimestamp = $timestamp;
        //
        //时间毫秒/数据中心ID/机器ID,要左移的位数
        $timestampLeftShift = self::sequenceBits + self::workerIdBits;
        $workerIdShift = self::sequenceBits;
        //组合3段数据返回: 时间戳.工作机器.序列
        $nextId = (($timestamp - self::twepoch) << $timestampLeftShift) | ($this->workId << $workerIdShift) | self::$sequence;
        return $nextId;
    }

    //取当前时间毫秒
    protected function timeGen(){
        $timestramp = (float)sprintf("%.0f", microtime(true) * 1000);
        return  $timestramp;
    }

    //取下一毫秒
    protected function tilNextMillis($lastTimestamp) {
        $timestamp = $this->timeGen();
        while ($timestamp <= $lastTimestamp) {
            $timestamp = $this->timeGen();
        }
        return $timestamp;
    }

}


//调用
header("Content-Type: text/html; charset=utf-8");
$work = new IdWork(1023);
for($i=0; $i<10;$i++) {
    $id = $work->nextId();
    echo $id . "<br>";
}

echo '<br/>';

/*$works = new IdWork(1024);
for($i=0; $i<10;$i++) {
    $id = $works->nextId();
    echo $id . "<br>";
}*/

