学习笔记

知识回顾
	树的解法一般都是递归

递归（Recursion）
	循环
	通过函数体来进行循环

	1. 向下进入到不同的递归层；向上又回到原来一层
	2. 用参数在函数中不同层传递
	3. 每一层的环境和事物都拷贝
		参数
		全局变量
		函数

	Python 代码模板：
		def recursion(level, param1, param2,……):
			# recursion termintor 递归终结条件
			if level > MAX_LEVEL:
				process_result
				return

			# process login in current level 处理当前层逻辑
			process(level,data...)

			# drill down 下探到下一层
			self.recursion(level + 1, p1, ...)

			# reverse the current level status if needed 清扫当前层状态


	思维要点：
		1. 不要人肉进行递归（最大误区）
		2. 找到最近最简的方法，将其拆解成可重复解决的问题
		3. 数学归纳法思维


分治和回溯本质上是递归，解题思路->最近重复性、最优重复性（动态规划）->组合每个子问题的结果

分治（Divide & Conquer）
	解释：将一个问题化解为多个子问题
	求法：
	代码模板：
	def divide_conquer(problem, param1, param2, ...):
		# recursion termintor
		if problem is NONE:
			print result
			return

		#prepare data
		data = prepare_data(problem)
		subproblems = split_problem(problem, data)

		# conquer subproblem
		subresult1 = self.divide_conquer(subproblems[0], p1, ...)
		subresult2 = self.divide_conquer(subproblems[1], p1, ...)
		subresult3 = self.divide_conquer(subproblems[2], p1, ...)
		...

		# proccess and generate the final result
		result = process_result(subresult1, subresult2, subresult3, ...)

		# revert the current level states

回溯（Backtracking)
	采用试错思想解决问题


学习总结：
	本周总体来说，学习的有点匆忙，学习方法还是五毒神掌，刷题刷题再刷题，概念性的东西，看题解的时候懵懂，自己照着敲一遍的时候，是懂非懂。
多次反复后，又有些的收获。	
