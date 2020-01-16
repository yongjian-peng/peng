<?php

function dump($arr) {
    $st = '<pre>';
    $str = '</pre>'. '<br/>';

    return $st . var_dump($arr) ;
}
