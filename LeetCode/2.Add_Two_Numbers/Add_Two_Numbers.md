---
title: Add_Two_Numbers
---
<!-- TOC -->

- [1. 英文](#1-英文)
- [2. 中文](#2-中文)
- [3. 思路](#3-思路)

<!-- /TOC -->

# 1. 英文

You are given two non-empty linked lists representing two non-negative integers. The digits are stored in reverse order and each of their nodes contain a single digit. Add the two numbers and return it as a linked list.

You may assume the two numbers do not contain any leading zero, except the number 0 itself.

Example:

Input: (2 -> 4 -> 3) + (5 -> 6 -> 4)

Output: 7 -> 0 -> 8

Explanation: 342 + 465 = 807.

# 2. 中文

给出两个 非空 的链表用来表示两个非负的整数。其中，它们各自的位数是按照 逆序 的方式存储的，并且它们的每个节点只能存储 一位 数字。

如果，我们将这两个数相加起来，则会返回一个新的链表来表示它们的和。

您可以假设除了数字 0 之外，这两个数都不会以 0 开头。

示例：

输入：(2 -> 4 -> 3) + (5 -> 6 -> 4)

输出：7 -> 0 -> 8

原因：342 + 465 = 807

来源：力扣（LeetCode）
链接：<https://leetcode-cn.com/problems/add-two-numbers>
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。

# 3. 思路

搞清楚链表的是怎么回事,一个节点存储值,并且指向下一个节点

题目特性:
>由于存储的逆序的,比如 123(3->2->1)+456(6->5->4),直接每个list提取一位,并计算进位即可.

```java
node1.val=2
node1.next->4
node2.val=4
node2.next->3
node3.val=3
node3.next=None
```
