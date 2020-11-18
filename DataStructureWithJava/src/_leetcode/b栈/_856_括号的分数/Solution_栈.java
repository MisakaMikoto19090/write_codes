package _leetcode.b栈._856_括号的分数;

import java.util.Stack;

//https://leetcode-cn.com/problems/score-of-parentheses/
class Solution_栈 {
    public int scoreOfParentheses(String S) {
        Stack<Integer> stack = new Stack();
        stack.push(0); // The score of the current frame

        //？
        for (char c : S.toCharArray()) {
            if (c == '(') {
                stack.push(0);//这个是初始化的0
            } else {
                int v = stack.pop();//上一层
                int w = stack.pop();//底层的那个
                stack.push(w + Math.max(2 * v, 1));
            }
        }

        return stack.pop();
    }

    public static void main(String[] args) {
        System.out.println(new Solution_栈().scoreOfParentheses("()"));
    }
}

