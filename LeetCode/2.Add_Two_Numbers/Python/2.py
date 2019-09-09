# 我靠,果然,必须使用链表
# 我理解错了,我以为是l1的2,4,3是一次输入作为一个list
# 这道题的真正意思是.2-->4-->3-->None None结束,类似于PHP中的Iterator对象

class ListNode:
    def __init__(self, x):
        self.val = x
        self.next = None

class Solution:

    def addTwoNumbers(self, l1, l2):
        """
        :type l1: ListNode
        :type l2: ListNode
        :rtype: ListNode
        """
        res = None
        div = 0

        # 循环读取两个链表
        # 2->4->3
        # 5->6->4
        # 7->0->8->None
        while l1 or l2 or div:
            if l1 == None:
                l1_num = 0
            else:
                l1_num = l1.val
                l1 = l1.next
            if l2 == None:
                l2_num = 0
            else:
                l2_num = l2.val
                l2 = l2.next

            temp_sum = l1_num + l2_num + div

            # 查看是否超过时,需要进位
            div = temp_sum // 10
            # 进位后剩下的数
            mod = temp_sum % 10
            if res == None:
                res = ListNode(mod)
                # 给start 赋值
                start = res
            else:
                # 这里不好理解,res.next指向下一个ListNode
                res.next = ListNode(mod)
                # 赋值给res,把下一个对象赋值给res
                # final=res->res.next=新的res->新的res.next
                res = res.next
        #注意,返回的是start
        # 重在体会
        return start

