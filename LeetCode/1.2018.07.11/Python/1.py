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
# 思路:
# 刚开始想的是每两个元素相加和目标对比.这样完全不科学.
# 直接和目标对比会科学一点.

# 不过这样最后一个元素就白白循环了一次.
