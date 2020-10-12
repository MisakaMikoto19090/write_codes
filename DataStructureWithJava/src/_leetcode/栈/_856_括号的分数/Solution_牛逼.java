package _leetcode.栈._856_括号的分数;

import java.util.Stack;

//https://leetcode-cn.com/problems/score-of-parentheses/
class Solution_牛逼 {


    public int scoreOfParentheses(String S) {
        int ans = 0, bal = 0;
        for (int i = 0; i < S.length(); ++i) {
            if (S.charAt(i) == '(') {
                bal++;
            } else {
                bal--;
                if (S.charAt(i - 1) == '(')
                    ans += 1 << bal;
            }
        }

        return ans;
    }


    public static void main(String[] args) {
        System.out.println(new Solution_牛逼().scoreOfParentheses("(())"));
    }
}

