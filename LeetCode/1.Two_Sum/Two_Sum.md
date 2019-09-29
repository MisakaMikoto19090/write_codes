---
title: Two_Sum
---
<!-- TOC -->

- [1. 英文](#1-英文)
- [2. 中文](#2-中文)
  - [2.1. 自己翻译](#21-自己翻译)
- [3. 思路](#3-思路)

<!-- /TOC -->

# 1. 英文

Given an array of integers, return indices of the two numbers such that they add up to a specific target.

You may assume that each input would have exactly one solution, and you may not use the same element twice.

Example:

Given nums = [2, 7, 11, 15], target = 9,

Because nums[0] + nums[1] = 2 + 7 = 9,

return [0, 1].

# 2. 中文

给定一个整数数组 nums 和一个目标值 target,请你在该数组中找出和为目标值的那 两个 整数,并返回他们的数组下标.

你可以假设每种输入只会对应一个答案.但是,你不能重复利用这个数组中同样的元素.

示例:

给定 nums = [2, 7, 11, 15], target = 9

因为 nums[0] + nums[1] = 2 + 7 = 9

所以返回 [0, 1]

链接：<https://leetcode-cn.com/problems/add-two-numbers>
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。

## 2.1. 自己翻译

有一个整数的数组,给定一个值,返回数组中两个元素之和等于给定值的元素下标.
每个值有且只有一个解.不能使用同一个元素两次.

# 3. 思路

用target减去指定,获得另外一个.

个人感觉稍微麻烦一点的就是,有两个一样的不好处理
这个问题还可以再升级一下,比如,列出所有的可能的组合,

比如 6 ,[2,4]  输出的结果可以时[0,1]和,[1,0]
