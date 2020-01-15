<?php

include './dump.php';
class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function canJump($nums) {
        if (count($nums) == 0) return false;
        if (count($nums) == 1) return true;

        $n = count($nums);
        $jump = 0;
        for ($i = 1; $i < $n; $i++) {
            $jump = max($nums[$i-1], $jump) - 1;
            if ($jump < 0) return false;
        }
        return true;
    }
}

$arr = [1,4,1,1,0,1];
//$arr = [2,1,3,0,4];

$solu = new Solution();

$res = $solu->canJump($arr);
dump(max(2, 3));
dump($res);