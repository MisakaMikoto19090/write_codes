class Solution:
    def findMedianSortedArrays(self, nums1, nums2):
        """
        :type nums1: List[int]
        :type nums2: List[int]
        :rtype: float
        """
        temp_num = nums1 + nums2
        temp_num.sort()
        temp_len = len(temp_num)
        if temp_len % 2 == 1:
            res_list = temp_num[int((temp_len - 1) / 2)]
        else:
            res_list = (temp_num[int(temp_len / 2)] + temp_num[int(temp_len / 2) - 1]) / 2
        return res_list
