
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
