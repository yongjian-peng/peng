<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/10
 * Time: 14:45
 */

require_once './AipOcr/AipOcr.php';

// 你的 APPID AK SK
const APP_ID = '15112002';
const API_KEY = 'wgmkY58hbsCA6YGcnHpufGmc';
const SECRET_KEY = 'HjMMVNkfgRhCQuze3nh5PePd1jgK3bnp';

$client = new AipOcr(APP_ID, API_KEY, SECRET_KEY);

// 同步表格识别 返回识别结果
$res = $client->tableRecognition(
    file_get_contents('./images/hanshu_bianliang.png'),
    array(
        'result_type' => 'json',
    )
);

echo '<pre>';
var_dump($res);
echo '</pre>';

die;

//$image = file_get_contents('./images/demoaipocr.jpg');
$image = file_get_contents('./images/hanshu_bianliang.png');

// 调用通用文字识别, 图片参数为本地图片
//$res =  $client->basicGeneral($image);
$res =  $client->basicAccurate($image);//通用文字识别（高精度版）
echo '<pre>';
var_dump($res);
echo '</pre>';
