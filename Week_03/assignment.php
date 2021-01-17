<?php
class Solution {

	/**
	 * 二叉树的最大深度
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

    /**
     * 二叉树的最小深度
     * 后序遍历（递归实现
     * 时间复杂度O(n)，n为节点数目
     * @param  [type] $root [description]
     * @return [type]       [description]
     */
    function minDepth($root) {
    	// 遇到空节点（越过了叶子节点），返回深度0；
    	if (null === $root) return 0;

    	if ($root->left === null && $root->right === null) {
    		return 1;
    	}
    	$min = PHP_INT_MAX;
    	// 若其左子节点为空，则该节点的最小深度由其右子树决定（无论其右子节点是否为空）
    	if ($root->left !== null) {
    		$min = min($min, $this->minDepth($root->left));
    	}
    	// 若其右子节点为空，则该节点的最小深度由其左子树决定（无论其左子节点是否为空）
    	if ($root->right !== null) {
    		$min = min($min, $this->minDepth($root->right));
    	}
    	// 若其左，右子节点都不为空，说明此节点不是叶子节点，其深度取决于左右子树的深度中较小的的那个
    	return $min + 1;
    }

    /**
     * 爬楼梯
     * 假设你正在爬楼梯。需要 n 阶你才能到达楼顶。
	   每次你可以爬 1 或 2 个台阶。你有多少种不同的方法可以爬到楼顶呢
		注意：给定 n 是一个正整数。

		动态规划解法：
		爬第n阶楼梯的方法数量，等于 2 部分之和
		1. 爬上 n-1n−1 阶楼梯的方法数量。因为再爬1阶就能到第n阶
		2. 爬上 n-2n−2 阶楼梯的方法数量，因为再爬2阶就能到第n阶
		所以我们得到公式 dp[n] = dp[n-1] + dp[n-2]
		同时需要初始化 dp[0]=1 和 dp[1]=1
		时间复杂度：O(n)
     * @param Integer $n
     * @return Integer
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
     * 二叉树的最近公共祖先
     * 时间复杂度O(n)
     * @param TreeNode $root
     * @param TreeNode $p
     * @param TreeNode $q
     * @return TreeNode
     */
    function lowestCommonAncestor($root, $p, $q) {
        if (!isset($root, $p, $q)) return null;
        //如果自身为p或q则直接返回
        if ($root == $p || $root == $q) return $root;
        // 递归
        $left = $this->lowestCommonAncestor($root->left, $p, $q);
        $right = $this->lowestCommonAncestor($root->right, $p, $q);
		//如果左子树没有p和q,只需要看右子树
        if (!$left) return $right;
        if (!$right) return $left;
        //如果左子树和右子树都含有p和q，那自身就是最近公共祖先
        if ($left && $right) return $root;
    }
}

/**
 * 括号生成
 */
class Solution {
	// 定义结果
    private $result = [];

    /**
     * @param Integer $n
     * @return String[]
     */
    function generateParenthesis($n) {
        if ($n <= 0 || !isset($n)) return null;
        $this->_generate(0, 0, $n, '');
        return $this->result;
    }

    function _generate($left, $right, $n, $s) {
        if ($left == $n && $right == $n) {
            array_push($this->result, $s);
            return;
        }

        if ($left < $n) {
            $this->_generate($left + 1, $right, $n, $s . '(');
        }

        if ($left > $right) {
            $this->_generate($left, $right + 1, $n, $s . ')');
        }
    }
}