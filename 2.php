
第四题：
$date = '2020-04-01';

function diff_date($date) {
    $start = strtotime(date('Y',time()).'-01-01 00:00:00');
    
    $end = strtotime($date);
    
    if($start >= $end){
        return 0;
    }
    
    
    $res = ($end – $start) / 86400;
    
    return floor($res);
}


$r = diff_date($date);

var_dump($r);


第五题：
$a = "CodeReviewStackExchange";

function code_review($a) {
    // 按照
    $a = preg_replace('/(?<!^)([A-Z])/', '-\\1', $a);
    
    $a = explode('-', $a);
    
    $res = '';
    
    foreach($a as $k => $v) {
        $res .= (strtolower($v)) . '_';
    }
    
    
    return rtrim($res, "_");

}

$r = code_review($a);

var_dump($r);

第六题：

<?php

$arr1 = [
        ['fid' => 1, 'tid' => 1, 'name' => 'Name1'],
        ['fid' => 1, 'tid' => 2, 'name' => 'Name2'],
        ['fid' => 1, 'tid' => 5, 'name' => 'Name3'],
        ['fid' => 5, 'tid' => 7, 'name' => 'Name4'],
        ['fid' => 3, 'tid' => 1, 'name' => 'Name5'],
        ['fid' => 3, 'tid' => 1, 'name' => 'Name6'],
    ];


function array_ss($arr) {
    
    $res = [];
    
    foreach($arr as $k => $v) {
        $res[$v['fid']][] = ['tid' => $v['tid'], 'name' => $v['name']];
    }
    return $res;
}

$r = array_ss($arr1);

var_dump($r);

第七题：
 思路是：需要支持多级的话，是需要对传入参数使用.来切分字符串抓换成数组，计算数组的长度，判断是否存在值的几层。
    需要使用递归的方式来查询，根据几层的数量，来判断当前传入层数，对应数组下标的值，判断是否存在。如果没有的话，直接break 并求返回false;


第八题:

1. select c1.province_id,c1.city,p1.province form city c1 inner join province p1 on c1.province_id = p1.province;
2. select c1.provinceid,p1.province,count(1) pronums from city c1 inner join province p1 on c1.provinceid=p1.id
group by c1.provinceid,p1.province;
3.
