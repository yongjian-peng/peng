<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/3
 * Time: 11:36
 */

//diff.php
/**
 * 0 diff false null
 */
echo '0 == false: ';
var_dump(0 == false);

echo '0 === false: ';
var_dump(0 === false);
echo "<br/>";
echo '0 == null: ';
var_dump(0 == null);
echo '0 === null: ';
var_dump(0 === null);

/**
 * false diff null
 */
echo "<br/>";
echo 'false == null: ';
var_dump(false == null);
echo 'false === null: ';
var_dump(false === null);

/**
 * "0" diff false null
 */
echo "<br/>";
echo '"0" == false: ';
var_dump("0" == false);
echo '"0" === false: ';
var_dump("0" === false);
echo "<br/>";
echo '"0" == null: ';
var_dump("0" == null);
echo '"0" === null: ';
var_dump("0" === null);

/**
 * "" diff false null
 */
echo "<br/>";
echo '"" == false: ';
var_dump("" == false);
echo '"" === false: ';
var_dump("" === false);
echo "<br/>";
echo '"" == null: ';
var_dump("" == null);
echo '"" == null: ';
var_dump("" === null);


/**
 * [] diff false null 0 "" "0"
 */
echo "<br/>";
echo '[] == false：';
var_dump([] == false);

echo '[] ===false：';
var_dump([] === false);

echo "<br/>";
echo '[] == null:';
var_dump([] == null);

echo "[] === null:";
var_dump([] === null);

echo '<br/>';
echo "[] == 0:";
var_dump([] == 0);

echo '[] === 0:';
var_dump([] === 0);

echo '<br/>';
echo '[] == "":';
var_dump([] == "");

echo '[] === "":';
var_dump([] === "");

echo '<br/>';
echo '[] == "0":';
var_dump([] == "0");

echo '[] === "0":';
var_dump([] === "0");

/**
 * 0 "" array() false true 验证 isset() 函数
 */
echo '<br/>';
echo '0 diff isset:';$a = 0;
var_dump(isset($a));

echo '<br/>';
$ids = [1,2,3,4,5];
var_dump(in_array(4,$ids));

