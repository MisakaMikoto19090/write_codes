#我靠,果然,必须使用链表
# 我理解错了,我以为是l1的2,4,3是一次输入作为一个list
# 这道题的真正意思是.2-->4-->3-->None None结束,类似于PHP中的Iterator对象

class Solution:

    def addTwoNumbers(self, l1, l2):
        """
        :type l1: ListNode
        :type l2: ListNode
        :rtype: ListNode
        """
        res = None
        div = 0
        while l1 or l2 or div:
            if l1 == None:
                l1_num = 0
            else:
                l1_num=l1.val
                l1=l1.next
            if l2 == None:
                l2_num = 0
            else:
                l2_num=l2.val
                l2=l2.next
            temp_sum = l1_num + l2_num + div
            div = temp_sum // 10
            mod = temp_sum % 10
            if res == None:
                res = ListNode(mod)
                start=res
            else:
                res.next = ListNode(mod)
                res=res.next
        return start

# final=res->res.next=新的res->新的res.next