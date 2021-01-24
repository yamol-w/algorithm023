学习笔记

二分查找

	关键的三个前提条件：
	1，目标函数的单调性（单调递增或递减），在有序的条件下进行查找
	2，存在上下界（bounded）->夹逼
	3，能过通过下标（索引）进行访问，单链表即使有序也不容易进行二分查找，但是也不是那么绝对，可以使用跳表等方式解决

	python代码模板：

		left, right = 0, len(array) - 1
		while left <= right:
			mid = (left + right) / 2
			if array[mid] == target:
				# find the target!!
				break or return result
			elif array[mid] < target:
				left = mid + 1
			else:
				right = mid - 1


贪心算法





