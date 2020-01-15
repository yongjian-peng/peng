<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function climbStairs($n) {
        $n1=0;$n2=1;$count = 0;
        for($i=1; $i<=$n; $i++){ // 6
            $count = $n1+$n2;
            $n1 = $n2;
            $n2 = $count;
            echo '<pre>';
            var_dump($count);
            echo '</pre>';
        }
        return $count;
    }
}

$cli = new Solution();

$num = $cli->climbStairs(6);

echo '<pre>';
var_dump($num);
echo '</pre>';
