<?php
//求两数之和
//echo phpinfo();
/**
 *
 *给定一个整数数组和一个目标值，找出数组中和为目标值的两个数。
 *你可以假设每个输入只对应一种答案，且同样的元素不能被重复利用。
 *case:
 *给定 nums = [2, 7, 11, 15], target = 9
 *因为 nums[0] + nums[1] = 2 + 7 = 9
 *所以返回 [0, 1]
 */

$nums = [2, 7, 11, 15];
$target = 18;

/*function sum_num($sums, $target){

    $len = count($sums);
    $m = $n = [];
    for($i = 0; $i < $len; $i++)
    {
        $m[$sums[$i]] = $i;
    }

    for($i = 0; $i < $len; $i++)
    {
        $base = $target - $sums[$i];
        if(isset($m[$base]))
        {
            if($m[$base] > 0 && $m[$base] != $i)
            {
                array_push($n, $i);
                array_push($n, $m[$base]);
                return $n;
            }
        }
    }

}*/

function sum_num($nums, $target)
{
    $len = count($nums);

    $m = $n = [];

    for($i=0; $i<$len; $i++)
    {
        $m[$nums[$i]] = $i;
    }

    for($i=0; $i<$len; $i++)
    {
        $base = $target - $nums[$i];

        if(isset($m[$base]))
        {
            if($m[$base] > 0 && $m[$base] != $i)
            {
                var_dump($base);
                array_push($n, $i);
                array_push($n, $m[$base]);
                return $n;
            }
        }
    }
}

$rs = sum_num($nums, $target);

var_dump($rs);

$string = 'abcdefabcdefabcdefaa';

function sum_string($string)
{
    if($string == '')
    {
        return $string;
    }

    $len = strlen($string);

    $t = $string[0];$r = 1;

    for($i = 0; $i < $len-1; $i++)
    {
        for($j = $i+1; $j < $len; $j++)
        {
            if($string[$i] == $string[$j] || strpos($t, $string[$j]) !== false)
            {
                break;
            }
            $t .= $string[$j];
            $r++;
        }
    }

    return $t;

}

$sum_string = sum_string($string);

echo '<pre>';
var_dump($sum_string);
echo '</pre>';