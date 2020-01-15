<?php
/**
 * 九九乘法表
 * 1*1=1
 * 2*1=1，2*2=4
 * 3*1=3，3*2=6，3*3=9......
 */

/*for($i = 1; $i <= 9; $i++){
    for($j = 1; $j <= $i; $j++){
            echo '<span style="display: inline-block;width: 85px;margin-bottom:5px;">'.$j.' * '.$i.' = '.$j * $i.'</span>';
    }
    echo "<br/>";
}*/

/**
 * 无重复字符串的最长子串
 */

$string = 'bbbcbbbbba';


/*echo $string[4];
echo '<br/>';*/

/*public class Solution {
public int lengthOfLongestSubstring(String s) {
int n = s.length();
int ans = 0;
for (int i = 0; i < n; i++)
for (int j = i + 1; j <= n; j++)
if (allUnique(s, i, j)) ans = Math.max(ans, j - i);
return ans;
}

public boolean allUnique(String s, int start, int end) {
    Set<Character> set = new HashSet<>();
        for (int i = start; i < end; i++) {
        Character ch = s.charAt(i);
            if (set.contains(ch)) return false;
            set.add(ch);
        }
        return true;
    }
}*/
/*$max='';
while($string!=''){
    $i=0;
    while($i<strlen($string) && $string[$i]==$string[0]) $i++;
    if ($i>strlen($max)){
        $max=substr($string,0,$i);
    }
    $string=substr($string,$i);
}
echo $max;*/

$string = 'cbbbcbbbbbae';

echo strlen($string);

function string_length($string){
    if ($string == ''){
        return 0;
    }
    $len = 1;$strs = $string[0];
    for($i = 0; $i < strlen($string); $i++){
        for($j = $i+1; $j < strlen($string); $j++){
            if($string[$i] == $string[$j] || strpos($strs, $string[$j]) !== false){
                break;
            }
            $strs .= $string[$j];

            $len++;

        }
    }
    return $len;

}
$res = string_length($string);
    echo '<pre>';
    var_dump($res);
    echo '</pre>';

