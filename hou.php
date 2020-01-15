<?php
include './dump.php';
function monkeyKing($n, $m)
{
    $arr = range(1, $n);
    $i = 1;
    while(count($arr) > 1) {
        if($i % $m != 0 ) {
            $arr[] = $arr[$i -1];
        }
        unset($arr[$i -1]);
        $i++;
    }

    return $arr[$i -1];
}
 //1 2  4 5
//4 5  2
//2 4
// 2 4 2
// 4


print_r(monkeyKing(5, 12));         //第4只为大王

$hou = range(1, 10);
dump($hou);

for($i=1; $i<10; $i++)
{
    $h = array_shift($hou);
    array_push($hou, $h);

    $h = array_shift($hou);
    array_push($hou, $h);

    array_shift($hou);
}

echo '<pre>';
print_r($hou);