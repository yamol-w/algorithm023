<!--
 * @Author: your name
 * @Date: 2020-12-29 10:08:01
 * @LastEditTime: 2021-02-18 17:32:13
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: /algorithm023/Week_07/README.md
-->
学习笔记
# 树

## 二叉树

### 二叉树的遍历

- 前序（Pre-order）遍历

	- 根-左-右

	  代码模板
	  def preorder(self, root):
	         if root:
	              self.traverse_path.append(root.val)
	              self.preorder(root.left)
	              self.preorder(root.right)
	  

- 中序（In-order）遍历

	- 左-根-右

	  中序遍历代码模板
	  def inorder(self, root):
	         if root:
	              self.inorder(root.left)
	              self.traverse_path.append(root.val)
	              self.inorder(root.right)
	  

- 后序（Post-order）遍历

	- 左-右-根

	  后序遍历代码模板
	  def postorder(self, root):
	         if root:
	             self.postorder(root.left)
	             self.postorder(root.right)
	             self.traverse_path.append(root.val)
	  

### 二叉搜索树(binary search tree)

- 左子树上的所有节点的值均小于它的根节点的值
- 右子树上的所有节点的值均大于它的根节点的值
- 中序遍历：升序遍历
- 保证性能的关键

	- 保证二维维度 -> 左右子树结点平衡
	- 平衡二叉树（AVL Tree）

		- 四种旋转操作

			- 左旋

				- 右右子树

			- 右旋

				- 左左子树

			- 左右旋

				- 左右子树

			- 右左旋

				- 右左子树

		- 不足：结点需要存储额外信息，且调整次数频繁
		- 比红黑树查询更快，因为它是更严格的平衡

- 红黑树（Red-Black Tree）

	- 一种近似平衡的二叉搜索树，能够确保任何一结点的左右子树的高度差小于两倍
	- 特点

		- 每个结点要么红色，要么黑色
		- 根节点是黑色
		- 每个叶结点（NIL结点，空节点）是黑色的
		- 不能有相邻的两个红色结点
		- 从任一结点到其每个叶子的所有路径都包含相同数目的黑色结点

	- 时间复杂度 logn
	- 适用于插入、删除较多的情景

*XMind - Trial Version*