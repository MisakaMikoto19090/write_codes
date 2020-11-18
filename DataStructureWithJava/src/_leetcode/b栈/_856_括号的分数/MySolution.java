package _leetcode.b栈._856_括号的分数;

import java.util.Stack;

//https://leetcode-cn.com/problems/score-of-parentheses/
class MySolution {
    public int scoreOfParentheses(String S) {
        Stack<Integer> s=new Stack<>();
        s.push(0);
        for (int i=0;i<S.length();i++){
            if (S.charAt(i)=='('){
                s.push(0);
            }else {
                int v = s.pop();//上一层
                int w = s.pop();//底层的那个
                s.push(w + Math.max(2 * v, 1));//怎么想到的.
            }
        }

        return s.pop();
    }

    public static void main(String[] args) {
        System.out.println(new MySolution().scoreOfParentheses("()()"));
    }
}

