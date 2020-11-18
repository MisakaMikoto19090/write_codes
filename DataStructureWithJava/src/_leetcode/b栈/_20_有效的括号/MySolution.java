package _leetcode.b栈._20_有效的括号;

import java.util.Stack;

//https://leetcode-cn.com/problems/valid-parentheses/

public class Solution {
    public static boolean isValid(String s) {
        //如果是{[( 加入左边的栈,)]}加入右边的,然后两个对比一下
        if (s.length() % 2 == 1) {
            return false;
        } else {
            //一个栈就行,左入栈,右边就弹出对比,
            int length = s.length();
            Stack<Character> stack = new Stack<>();
            for (int i = 0; i < length; i++) {
                char c = s.charAt(i);
                if (c == '{' || c == '[' || c == '(') {
                    stack.push(c);
                } else {
                    if (stack.isEmpty()) {// ))) 没有左支付
                        return false;
                    }
                    char left = stack.pop();
                    //不是等于
                    if (left == '(' && c != ')') {
                        return false;
                    }
                    if (left == '[' && c != ']') {
                        return false;
                    }
                    if (left == '{' && c != '}') {
                        return false;
                    }
                }
            }
            return stack.isEmpty();
        }
    }

    public static void main(String[] args) {
        String a = "()";
        if (isValid(a)) {
            System.out.println("yes");
        } else {
            System.out.println("no");

        }
    }
}
