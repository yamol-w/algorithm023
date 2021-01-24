<?php
class Solution {

    /**
     * 买卖股票的最佳时机
     * @param Integer[] $prices
     * @return Integer
     * 时间复杂度时间复杂度O(n)
     */
    function maxProfit($prices) {
        if (!isset($prices) || empty($prices)) return null;

        $count = count($prices);

        $profit = 0;
        for ($i = 1; $i < $count; $i++) {
            $tmp = $prices[$i] - $prices[$i - 1];
            
            if ($tmp > 0) {
                $profit += $tmp;
            }
        }
        return $profit;
    }

    /**
     * leetcode:860-柠檬水找零
     * @param Integer[] $bills
     * @return Boolean
     * 时间复杂度O(n)
     */
    function lemonadeChange($bills) {
        if (!isset($bills) || empty($bills)) return false;

        $count = sizeof($bills);

		// 只有一个元素时，且大于5直接返回false
        if ($count == 1 && $bills[0] > 5) {
            return false;
        }

        // 初始化变量
        $five = 0;
        $ten = 0;
        $twenty = 0;

        // 超过2个元素时处理
        for ($i = 0; $i < $count; $i++) {
        	// 元素为5时，直接+1
            if (5 == $bills[$i]) {
                $five++;
            }
            // 元素为10时，判断5的个数是否大于等于1，否直接返回false
            if (10 == $bills[$i]) {
                if ($five >= 1) {
                    $ten++;
                    $five--;
                } else {
                    return false;
                }  
            }
            // 元素为20时，判断是否可以找零，不能返回false
            if (20 == $bills[$i]) {
                if ($ten > 0 && $five > 0) {
                    $ten--;
                    $five--;
                } elseif ($five >= 3) {
                    $five -= 3;
                } else {
                    return false;
                }
            }
        }

        return true;
    }
}