class Solution:
    def twoSum(self, nums, target):
        """
        :type nums: List[int]
        :type target: int
        :rtype: List[int]
        """
        for i in nums:
            if (target - i) == i :
                if nums.count(i) >= 2:
                    return [nums.index(i), nums.index(i, nums.index(i)+1, len(nums))]
                else:
                    continue
            elif (target - i) in nums:
                return [nums.index(i), nums.index(target - i)]
# 去掉最后一个的循环


