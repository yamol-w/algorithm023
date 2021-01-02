<?php

/**
 * week_01 作业
 */
class Solution
{
    /**
     * Notes: 删除排序数组中的重复项
     * User: Arron
     * Date: 2021-01-02
     * Time: 12:27
     * @param array $nums 一维有序数组
     * @return int
     */
    public function removeDuplicates(&$nums) {
        if (empty($nums)) return 0;

        $i = 0;
        $j = 1;

        $count = count($nums);  // 统计数组长度

        while ($j < $count) {
            if ($nums[$i] != $nums[$j]) {
                $nums[$i + 1] = $nums[$j];
                $i++;
            }
            $j++;
        }
        return $i + 1;
    }

    /**
     * Notes: 零移动
     * User: Arron
     * Date: 2021-01-02
     * Time: 13:52
     * @param array $nums 一维数组
     * @return null
     */
    public function moveZeros(&$nums) {
        if (empty($nums)) return null;

        $i = 0;

        $count = count($nums);

        for ($j = 0; $j < $count; $j++) {
            if ($nums[$j] != 0) {
                $tmp = $nums[$j];
                $nums[$j] = $nums[$i];
                $nums[$i++] = $tmp;
            }
        }
    }
}