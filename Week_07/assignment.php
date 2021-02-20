<?php
/*
 * @Author: Arron
 * @Date: 2021-02-20 09:10:33
 * @LastEditTime: 2021-02-20 09:18:48
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /algorithm023/Week_07/assignment.php
 */

class Solution {
    /**
     * @description: 爬楼梯
     * @param {*} $n
     * @return {*}
     */
    function climbStairs($n) {
        if (!isset($n)) return null;

        $dp = [];
        $dp[0] = 1;
        $dp[1] = 1;

        for ($i = 2; $i <= $n; $i++) {
            $dp[$i] = $dp[$i - 1] + $dp[$i - 2];
        }
        return $dp[$n];
    }

    /**
     * @description: 计算省份数量
     * @param array $isConnected
     * @return {*}
     */
    public function findCircleNum($isConnected) {
        if (!isset($isConnected) || empty($isConnected)) return null;
        
        $length = sizeof($isConnected);
        $isVisited = [];    // 存放数组标识点是否被访问，true 或false
        $cnt = 0;   // 存放累计遍历过的连通域的数量

        for ($i = 0; $i < $length; $i++) {
            // 若定点 i 未被访问，说明又是一个新的连通域，则遍历新的连通域且 cnt+=1
            if (!isset($isVisited[$i])) {
                $cnt++;
                $this->dfs($i, $isConnected, $isVisited);
            }
        }
        return $cnt;
    }

    /**
     * @description: 递归处理
     * @param {*} int
     * @param {*} array
     * @param {*} array
     * @return {*}
     */
    private function dfs(int $i, array $isConnected, array &$isVisited) {
        // 对顶点 i 进行访问标记
        $isVisited[$i] = true;
        // 继续遍历与顶点 i 相邻的顶点（使用 $isVisited 数组防止重复访问）
        for ($j = 0; $j < sizeof($isConnected); $j++) {
            if (1 == $isConnected[$i][$j] && !isset($isVisited[$j])) {
                $this->dfs($j, $isConnected, $isVisited);
            }
        }
    }
}

$isConnected = [[1,1,0],[1,1,0],[0,0,1]];
$test = new Solution();
$res = $test->findCircleNum($isConnected);
var_dump($res);die;
