<?php
/**
 * Week_02 作业
 */
class Solution {

    /**
     * 求两数之和
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        if (!isset($nums, $target)) {
            return null;
        }

        // 统计数组长度
        $count = count($nums);
        // 存放已经分析过的数据
        $data = [];
        $key1 = '';
        $key2 = '';

        for ($i = 0; $i < $count; $i++) {
            // 求另一个数 = 目标数数 - 数组中的数
            $another = $target - $nums[$i];
            // 判断这个数是否已经被分析过
            if (!key_exists($another, $data)) {
                $data[$nums[$i]] = $i;
            } else {
                $key1 = $data[$another];
                $key2 = $i;
            }
        }

        $result = [$key1, $key2];
        return $result;
    }

    /**
     * 两个数组的交集 II：leetcode-350
		https://leetcode-cn.com/problems/intersection-of-two-arrays-ii/

     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[]
     */
    function intersect($nums1, $nums2) {
        if (!isset($nums1, $nums2)) {
            return null;
        }
        // 结果
        $result = [];
        // 初始化变量，用于存放统计数组元素及元素个数
        $newArray = [];
        // 统计第一个数组中每个元素的个数
        for ($i = 0; $i < count($nums1); $i++) {
        	if (!isset($newArray[$nums1[$i]])) {
        		$newArray[$nums1[$i]] = 1;
        	} else {
        		$newArray[$nums1[$i]] += 1;
        	}
        }

        // 分析第二个数组中的元素
        for ($j = 0; $j < count($nums2); $j++) {
            // 如果在第一个数组中存此元素，则第一个元素的个数减一
        	if (key_exists($nums2[$j], $newArray) && $newArray[$nums2[$j]] > 0) {
        		$result[] = $nums2[$j];
        		$newArray[$nums2[$j]] -= 1;
        	} else {
        		continue;
        	}
        }
        return $result;
    }

    /**
     * 各位相加： leetcode-258
                https://leetcode-cn.com/problems/add-digits/
     * 
     * @param Integer $num
     * @return Integer
     */
    function addDigits($num) {
        // 参数为空时
        if (!isset($num)) return null;
        // 非负数小于等于9时
        if ($num <= 9) {
            return $num;
        } else {
            // 将数字转为数组
            $toArr = str_split($num);
            // 数组值相加
            $sum = array_sum($toArr);
            // 当和大于9时，递归
            while ($sum > 9) {
                $sum = $this->addDigits($sum);
            }
            return $sum;
        }
    }

    /**
     * 各位相加： leetcode-258
                https://leetcode-cn.com/problems/add-digits/
     * 
     * @param Integer $num
     * @return Integer
     */
    function addDigits2($num) {
        // 参数为空时
        if (!isset($num)) return null;
        // 非负数小于等于9时
        if ($num <= 9) {
            return $num;
        } else {
            return ($num - 1) % 9 + 1;
        }
    }

    /**
     * 二叉树的最大深度
            https://leetcode-cn.com/problems/maximum-depth-of-binary-tree/

     * @param TreeNode $root
     * @return Integer
     */
    function maxDepth($root) {
        if (null == $root) {
            return 0;
        } else {
            // 左子树
            $left = $this->maxDepth($root->left);
            // 右子树
            $right = $this->maxDepth($root->right);
            // 返回最大值
            return max($left, $right) + 1;
        }
    }
}
?>