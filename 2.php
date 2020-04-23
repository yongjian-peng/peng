
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

