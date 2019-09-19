# 英文

Given a string s, find the longest palindromic substring in s. You may assume that the maximum length of s is 1000.

Example 1:

Input: "babad"
Output: "bab"
Note: "aba" is also a valid answer.

Example 2:

Input: "cbbd"
Output: "bb"

# 中文

给定一个字符串 s，找到 s 中最长的回文子串。你可以假设 s 的最大长度为 1000。

示例 1：

输入: "babad"
输出: "bab"
注意: "aba" 也是一个有效答案。

示例 2：

输入: "cbbd"
输出: "bb"

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/longest-palindromic-substring
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。

# 思路

只可能是abccba
或者
abcba
这两种,参考第三题的common_string,只能从倒数第一个或者倒数第二个字符开始回文

abcdefgfedcbazxzabcdefgfedcba
    这种也很特殊,相当于嵌套了一个

尝试一下:
首先找出 aba或者aa,这两种形式的模式,然后分别从这两种形式,向两边反推
