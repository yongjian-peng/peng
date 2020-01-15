<?php
$arr = [1, 9, 8, 6, 5, 3, 2, 4, 7];
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


function selection_sort($array)
{
    $count = count($array);
    for ($i = 0; $i < $count - 1; $i++) {
        /*findtheminest*/
        $min = $i;
        //echo'$min-->'.$array[$min].'-->';
        for ($j = $i + 1; $j < $count; $j++) {
            //由小到大排列
            if ($array[$min] > $array[$j]) {
                //表明当前最小的还比当前的元素大
                $min = $j;
                //赋值新的最小的
            }
        }
        //echo$array[$min].'coco<br/>';
        /*swap$array[$i]and$array[$min]即将当前内循环的最小元素放在$i位置上*/
        if ($min != $i) {
            $temp = $array[$min];
            $array[$min] = $array[$i];
            $array[$i] = $temp;
        }
    }
    return $array;
}

//$res = selection_sort($arr);

//var_dump($res);

// 快速排序
function quickSort($arr)
{
    $len = count($arr);
    // 因为是递归，所以如果最后的数组可能是空的也可能是1个，那么就没有可比较的了，直接返回
    if ($len <= 1) {
        return $arr;
    }

    $base = $min = $max = [];

    $base_item = $arr[0];

    for ($i = 0; $i < $len; $i++) {
        if ($arr[$i] < $base_item) {
            $min[] = $arr[$i];
        } elseif ($arr[$i] > $base_item) {
            $max[] = $arr[$i];
        } else {
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
    return array_merge($min, $base, $max);
}

//$kuai = quickSort($arr);
//var_dump($kuai);

// 插入排序

function insert_sort($arr)
{
    $len = count($arr);
    for ($i = 1; $i < $len; $i++) {
        //获得当前需要比较的元素值。
        $tmp = $arr[$i];
        //内层循环控制 比较 并 插入
        for ($j = $i - 1; $j >= 0; $j--) {
            //$arr[$i];//需要插入的元素; $arr[$j];//需要比较的元素
            if ($tmp < $arr[$j]) {
                //发现插入的元素要小，交换位置
                //将后边的元素与前面的元素互换
                $arr[$j + 1] = $arr[$j];
                //将前面的数设置为 当前需要交换的数
                $arr[$j] = $tmp;
            } else {
                //如果碰到不需要移动的元素
                //由于是已经排序好是数组，则前面的就不需要再次比较了。
                break;
            }
        }
    }
    //将这个元素 插入到已经排序好的序列内。
    //返回
    return $arr;
}

$res = insert_sort($arr);
echo '<pre>';
var_dump($res);
echo '</pre>';