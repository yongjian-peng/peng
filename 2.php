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
