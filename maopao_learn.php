<?php
$arr = [1,9,8,6,5,3,2,4,7,14,12,11];

function quickSort($arr) {
    //少量替换 換
    /*$len = count($arr);

    for($i = 0; $i<$len-1; $i++)
    {
        $m = $i;
        for($j = $i+1; $j < $len; $j++)
        {
            if($arr[$m] > $arr[$j])
            {
                $m = $j;
            }
        }
        if($m != $i)
        {
            $tmp = $arr[$m];
            $arr[$m] = $arr[$i];
            $arr[$i] = $tmp;
        }
    }
    return $arr;*/

    //递归替换
    $len = count($arr);

    if($len <= 1){
        return $arr;
    }

    $max = $base = $min = [];
    $one = $arr[0];
    for($i=0; $i<$len; $i++)
    {
        if($one > $arr[$i])
        {
            array_push($min, $arr[$i]);
        }elseif($one < $arr[$i]){
            array_push($max, $arr[$i]);
        }else{
            array_push($base, $arr[$i]);
        }
    }

    $min = quickSort($min);
    $max = quickSort($max);

    $res = array_merge($min, $base, $max);
    return $res;
}

$kuai = quickSort($arr);
var_dump($kuai);


$data[5] = array('volume' => 67, 'edition' => 2);
$data[4] = array('volume' => 86, 'edition' => 1);
$data[2] = array('volume' => 85, 'edition' => 6);
$data[3] = array('volume' => 98, 'edition' => 2);
$data[1] = array('volume' => 86, 'edition' => 6);
$data[6] = array('volume' => 67, 'edition' => 7);
// 准备要排序的数组
/*foreach ($data as $k => $v) {
    $edition[] = $v['edition'];
}
echo '<br/>';
var_dump($edition);
echo '<br/>';
array_multisort($edition, SORT_ASC, $data);
var_dump($data);*/

foreach ($data as $key => $row) {
    $volume[$key]  = $row['volume'];
    $edition[$key] = $row['edition'];
}

echo '<pre>';
var_dump($volume);
echo '</pre>';

echo '<pre>';
var_dump($edition);
echo '</pre>';

echo '<br/>';
array_multisort($volume, SORT_DESC, $edition, SORT_ASC, $data);
echo '<pre>';
var_dump($data);
echo '</pre>';