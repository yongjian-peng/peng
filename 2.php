<?php
//复制目录
//mkdir 创建文件
//copy() 复制文件
//mkdir('./xxoo', 0777, true);

//$dir = rtrim($dir,'/').'/';
//$bir = rtrim($bir,'/').'/';
//打开目录
$res = copy('./copy.php','2.php');
var_dump($res);
$hd = opendir('./images');
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
closedir($hd);