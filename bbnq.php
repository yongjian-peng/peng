<?php

/*
斐波那契数列
1 1 2 3 5 8 13 21 34 55 89 144
求第20位的值
*/

class bbnq {
    public function bb($n)
    {
        $a = 1; // 代表第1个加数
        $b = 1; // 代表第2个加数

        for ($i=3; $i <= $n; $i++) {
            $c = $a + $b;
            $a = $b;
            $b = $c;
        }
       return $c;
    }
}

$bb = new bbnq();

$num = $bb->bb(10);

echo '<pre>';
var_dump($num);
echo '</pre>';







?>