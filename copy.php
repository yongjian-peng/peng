<?php
//复制目录
//mkdir 创建文件
//copy() 复制文件
//mkdir('./xxoo', 0777, true);

//$dir = rtrim($dir,'/').'/';
//$bir = rtrim($bir,'/').'/';
//打开目录

/*$hd = opendir('./images');
//循环每个目录
//var_dump(dirname(__FILE__));
$path = dirname(__FILE__);
while($f = readdir($hd)){
    if($f =='.'||$f == '..'){continue;}
    //echo $f.'<br/>';
    //echo './abc'.$f,'<br>';
    var_dump('./'.$f);
    var_dump($path.'/xxoo/'.$f);
    //echo '<br/>';
    copy('./images/'.$f,'./xxoo/'.$f);

}
//关闭文件
closedir($hd);*/

$stu = [
    ['name'=>'张三','sex'=>'女', 'age'=>18],
    ['name'=>'李四','sex'=>'男', 'age'=>17],
    ['name'=>'王五','sex'=>'女', 'age'=>15],
    ['name'=>'赵六','sex'=>'男', 'age'=>19],
];
$arr = [
    'name'=>['张三','李四','王五','赵六'],
    'sex' =>['女','男','女','男'],
    'age' =>[18, 17, 15, 19],
];

/**
 * 输入 $stu  返回 $arr
 */
$new_arr = [];
foreach($stu as $key => $val){
    foreach($val as $i => $j){
        $new_arr[$i][] = $val[$i];
		}
}

$back_arr = [];
/**
 * 输入 $arr 返回 $stu
 */
foreach($arr as $key => $val){
    foreach($val as $i => $j){
        $back_arr[$i][$key] = $j;
    }
}



echo '<pre>';
var_dump($new_arr);
echo '</pre>';

echo '<pre>';
var_dump($back_arr);
echo '</pre>';