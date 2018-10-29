class Solution:
    def longestPalindrome(self, s):
        """
        :type s: str
        :rtype: str
        """
        # 跟第三题差不多,这个条件稍微宽松一点
        total_len = len(s)
        i = 0
        longest_palindrome_length = 0
        longest_palindrome_str = ""
        while i <= total_len - 1:
            # bb或aba,才能作为回文字符串中间的位置
            # 按照题目的说法,还有一种 是 abc ,返回a
            # efggfexyz
            # 012345678
            # xaax

            if s[i:i + 1] == s[i + 1:i + 2]:
                # or s[i:i + 1] == s[i + 2:i + 3]:
                j = i - 1
                k = i + 2
                temp_palindrome_str_init = s[i:k]

                while j >= 0 and k <= total_len - 1:
                    if s[j:j + 1] == s[k:k + 1]:
                        temp_palindrome_str_init = s[j:j + 1] + temp_palindrome_str_init + s[k:k + 1]
                        j = j - 1
                        k = k + 1
                    else:
                        break
                if len(temp_palindrome_str_init) >= longest_palindrome_length:
                    longest_palindrome_length = len(temp_palindrome_str_init)
                    longest_palindrome_str = temp_palindrome_str_init
            # 把上下两个重复代码提取出来
            # xax
            if s[i:i + 1] == s[i + 2:i + 3]:
                # efgagfe
                # 012345678
                j = i - 1
                k = i + 3

                temp_palindrome_str_init = s[i:k]

                while j >= 0 and k <= total_len - 1:
                    if s[j:j + 1] == s[k:k + 1]:
                        temp_palindrome_str_init = s[j:j + 1] + temp_palindrome_str_init + s[k:k + 1]
                        j = j - 1
                        k = k + 1
                    else:
                        break
                if len(temp_palindrome_str_init) >= longest_palindrome_length:
                    longest_palindrome_length = len(temp_palindrome_str_init)
                    longest_palindrome_str = temp_palindrome_str_init
            i = i + 1
        if longest_palindrome_str == "":
            return s[:1]

        return longest_palindrome_str


S = Solution()
s = "babadada"
print(S.longestPalindrome(s))
