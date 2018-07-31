class Solution:
    def twoSum(self, nums, target):
        """
        :type nums: List[int]
        :type target: int
        :rtype: List[int]
        """
        i=0
        while i<(len(nums)-1):
            a=nums[i]
            i=i+1
            if (target - a) == a :
                if nums.count(a) >= 2:
                    return [nums.index(a), nums.index(a, nums.index(a)+1, len(nums))]
                else:
                    continue
            elif (target - a) in nums:
                return [nums.index(a), nums.index(target - a)]
# 修复最后一次多余的循环,Python 没有 for(i=0;i++;i<5)这种,稍微有点麻烦

S=Solution()
print(S.twoSum([11,15,2,7],9))