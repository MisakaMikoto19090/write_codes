class Solution:
    def twoSum(self, nums, target):
        """
        :type nums: List[int]
        :type target: int
        :rtype: List[int]
        """
        i = 0

        # 对每一个数循环,最后一个不要,所以小于就行
        while i < (len(nums) - 1):
            a = nums[i]
            i = i + 1

            # 6-3=3这种
            if (target - a) == a:
                # 如果包含两
                if nums.count(a) >= 2:
                    # 返回当前的位置,和当前数之后另外一个数的位置
                    return [nums.index(a), nums.index(a, nums.index(a) + 1, len(nums))]
                else:
                    continue
            # 6-4=2这种
            elif (target - a) in nums:
                return [nums.index(a), nums.index(target - a)]


# 修复最后一次多余的循环,Python 没有 for(i=0;i++;i<5)这种,稍微有点麻烦

S = Solution()
print(S.twoSum([11, 15, 2, 7], 9))
