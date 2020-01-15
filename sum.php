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
/*using namespace std;
class Solution {
public:
    // 两两对比的方式，时间复杂度为O(n2)
vector<int> twoSum(vector<int>& nums, int target) {
vector<int> ret;*/

    // 第一种
    /*for (int i = 0; i < nums.size(); i++) {
        for (int j = i + 1; j < nums.size(); j++) {
            if (nums[i] + nums[j] == target) {
                ret.push_back(i);
                ret.push_back(j);
                return ret;
            }
        }
    }*/

    // 第二种：数据插入到hashmap里，然后通过target - nums[i]来确定，时间复杂度为O(2n)
/*map<int, int> m;
for (int i = 0; i < nums.size(); i++) {
m[nums[i]]  = i;
}
for (int i = 0; i < nums.size(); i++) {
    if (m.count(target - nums[i]) > 0 && i != m[target - nums[i]]) {
        ret.push_back(i);
        ret.push_back(m[target - nums[i]]);
        return ret;
    }
}
        return ret;
    }
};*/

$nums = [2, 7, 11, 15];
$target = 17;

function sum_num($sums, $target){

    $cou = count($sums);
    /*$k = [];
    for( $i = 0; $i < $cou; $i++){
        for( $j = 0; $j < $cou; $j++){
            if($sums[$i] + $sums[$j] == $target){
                array_push($k,$i);
                array_push($k,$j);
                return $k;
            }
        }
    }*/
    $m = $n = [];
    for($i = 0; $i < $cou; $i++){
        $m[$sums[$i]] = $i;
    }

    for($i = 0; $i < $cou; $i++){
        $a = $target - $sums[$i];
        $b = $target - $sums[$i];
        if($m[$a] > 0 && $m[$b] != $i){
            array_push($n,$i);
            array_push($n,$m[$a]);
            return $n;
        }
    }

    /**
     * $m = [
     *     '2'  =>  0,
     *     '7'  =>  1,
     *     '11' =>  2,
     *     '15' =>  3,
     * ]
     * 推算 $i = 0,  $a = 17-2 = 15,  $m[15]  =  3  3>0  3!=1  OK
     *     $i = 1,  $a = 17- 7 = 10,  $m[10] 无
     *     $i = 2,  $a = 17-11 = 6,  $m[6]  无
     *     $i = 3,  $a = 17-15 = 2,  $m[2]   11>0 11!=3 OK
     */


}

$rs = sum_num($nums, $target);

var_dump($rs);