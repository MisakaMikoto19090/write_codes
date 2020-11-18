package _leetcode.b栈._20_有效的括号;

//https://leetcode-cn.com/problems/valid-parentheses/


public class Solution2 {
    public boolean isValid(String s) {
        //效率太低,
        while (s.contains("{}") || s.contains("[]") || s.contains("()")) {
            s = s.replace("{}", "");
            s = s.replace("[]", "");
            s = s.replace("()", "");
        }
        return s.isEmpty();
    }
}
