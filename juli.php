<?php

include './dump.php';

class Solution {

    /**
     * @param String $word1
     * @param String $word2
     * @return Integer
     */
    function minDistance($word1, $word2) {
        $edit = [];
        for ($i = 0; $i <= strlen($word1); ++$i) $edit[$i][0] = $i;
        echo '<pre>';
        print_r($edit);
        for ($j = 0; $j <= strlen($word2); ++$j) $edit[0][$j] = $j;
        echo '<pre>';
        print_r($edit);
        for ($i = 1; $i <= strlen($word1); ++$i) {
            for ($j = 1; $j <= strlen($word2); ++$j) {
                $flag = $word1[$i - 1] == $word2[$j - 1] ? 0 : 1;
                $edit[$i][$j] = min($edit[$i][$j - 1] + 1, $edit[$i - 1][$j] + 1, $edit[$i - 1][$j - 1] + $flag);
            }
        }
        return $edit[strlen($word1)][strlen($word2)];
    }
}

$juli = new Solution();

$word1 = "intention";
$word2 = "execution";
$stime=microtime(true); #获取程序开始执行的时间

#你写的php代码
$res = $juli->minDistance($word1, $word2);

print_r($res);

$etime=microtime(true); #获取程序执行结束的时间
$total=$etime-$stime;   #计算差值
echo "<br />{$total} times";
