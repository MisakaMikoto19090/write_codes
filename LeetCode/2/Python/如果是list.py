class Solution:
    def addTwoNumbers(self, l1, l2):
        """
        :type l1: ListNode
        :type l2: ListNode
        :rtype: ListNode
        """
        return list(str(int(''.join(map(lambda x:str(x),l1.val)))+int(''.join(map(lambda x:str(x),l2.val))))[::-1])
# 不过无法通过测试,