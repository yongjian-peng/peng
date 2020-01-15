<?php
$arr = [1,9,8,6,5,3,2,4,7];
/*
$cnt = count($arr);

for($i = 0; $i < $cnt; $i++){
    for( $j = 0; $j < $cnt -1; $j++){
        if($arr[$j] > $arr[$j+1]){
            $tmp = $arr[$j];
            $arr[$j] = $arr[$j+1];
            $arr[$j+1] = $tmp;
        }
    }
}


var_dump($arr);*/


function selection_sort($array){
    $count=count($array);
    for($i=0;$i<$count-1;$i++){
        /*findtheminest*/
        $min=$i;
        //echo'$min-->'.$array[$min].'-->';
        for($j=$i+1;$j<$count;$j++){
            //由小到大排列
            if($array[$min]>$array[$j]){
                //表明当前最小的还比当前的元素大
                $min=$j;
                //赋值新的最小的
            }
        }
        //echo$array[$min].'coco<br/>';
        /*swap$array[$i]and$array[$min]即将当前内循环的最小元素放在$i位置上*/
        if($min!=$i){
            $temp=$array[$min];
            $array[$min]=$array[$i];
            $array[$i]=$temp;
        }
    }
    //return$array;
}

/*$res = selection_sort($arr);

var_dump($res);*/

function quickSort($arr) {
    $len = count($arr);
    // 因为是递归，所以如果最后的数组可能是空的也可能是1个，那么就没有可比较的了，直接返回
    if($len <= 1) {
        return $arr;
    }

    $base = $min = $max = [];

    $base_item = $arr[0];

    for($i = 0; $i < $len ; $i++) {
        if($arr[$i] < $base_item) {
            $min[] = $arr[$i];
        }elseif($arr[$i] > $base_item) {
            $max[] = $arr[$i];
        }else {
            $base[] = $arr[$i];
        }
    }

    echo 111111;
    /*echo '<pre>';
    var_dump($min);
    echo '</pre>';


    echo '<br>';
    echo '<pre>';
    var_dump($max);
    echo '</pre>';

    echo '<br>';*/
    echo '<pre>';
    var_dump($base);
    echo '</pre>';
    echo 222222;
    echo '<br>';

    $min = quickSort($min);
    $max = quickSort($max);
    // 每次构造新的序列
    return array_merge($min,$base,$max);
}

$kuai = quickSort($arr);
var_dump($kuai);