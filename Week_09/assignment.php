<?php
/*
 * @Author: Arron
 * @Date: 2021-03-05 15:18:08
 * @LastEditTime: 2021-03-05 15:51:38
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /algorithm023/Week_09/assignment.php
 */

class Solution {

    /**
     * 转换成小写字母
     * @param String $str
     * @return String
     * 时间复杂度O(n)
     */
    function toLowerCase($str) {
        if ($str == '') return null;

        $length = strlen($str);
        // 单个字符处理
        if ($length == 1) {
            if (strtoupper($str) === $str) {
                return strtolower($str);
            } else {
                return $str;
            }
           
        } else {
            // 字符串长度超过1时，处理
            for ($i = 0; $i < $length; $i++) {
                // 用转换为大写的字符和原字符比较，相同则转成小写，不同则不动
                if (strtoupper($str[$i]) === $str[$i]) {
                    $str[$i] = strtolower($str[$i]);
                } else {
                    $str[$i] = $str[$i];
                }
            }
            return $str;
        } 
    }

    /**
     * 仅仅反转字母
     * @param String $S
     * @return String
     * 时间复杂度O(n)
     * 双指针解法
     * 1）左边的不是字母就++；
     * 2）右边的不是字母就--；
     * 3）都是字母就交换，左++，右--
     */
    function reverseOnlyLetters($S) {
        if (!isset($S) || empty($S)) {
            return $S;
        }

        $i = 0;
        $j = strlen($S) - 1;

        while ($i < $j) {
            if(ctype_alpha($S[$i]) && ctype_alpha($S[$j])){
                $tmp = $S[$i];
                $S[$i] = $S[$j];
                $S[$j] = $tmp;
                $i++;
                $j--;
            } elseif (!ctype_alpha($S[$i])) {
                $i++;
            } else {
                $j--;
            }
        }
        return $S;
    }
}