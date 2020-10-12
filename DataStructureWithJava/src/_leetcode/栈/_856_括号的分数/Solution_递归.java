package _leetcode.栈._856_括号的分数;

//https://leetcode-cn.com/problems/score-of-parentheses/
class Solution_递归 {

    public int scoreOfParentheses(String S) {
        return F(S, 0, S.length());
    }

    public int F(String S, int i, int j) {
        //Score of balanced string S[i:j]
        int ans = 0, bal = 0;

        // Split string into primitives
            //这里的i是某个(开始的)
        for (int k = i; k < j; ++k) {
            int calculate_bracket = S.charAt(k) == '(' ? 1 : -1;
            bal += calculate_bracket;
            if (bal == 0) {
                if (k - i == 1) {// ()  直接闭合的+1;
                    ans++;
                } else {
                    ans += 2 * F(S, i + 1, k);
                }
                i = k + 1;
            }
        }

        return ans;
    }

    public static void main(String[] args) {
        System.out.println(new Solution_递归().scoreOfParentheses("(())"));
    }
}

