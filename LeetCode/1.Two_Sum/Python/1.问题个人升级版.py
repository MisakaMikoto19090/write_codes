class Solution2:
    answer = []

    def twoSum(self, nums, target):
        """
        :type nums: List[int]
        :type target: int
        :rtype: List[int]
        """
        for i in nums:
            # [3,3] 6 这样 [0,1] [1,0]
            # 思路,先找出一个,然后循环调转顺序
            if (target - i) == i:
                if nums.count(i) >= 2:
                    if [nums.index(i), nums.index(i, nums.index(i) + 1, len(nums))] not in self.answer:
                        self.answer.append([nums.index(i), nums.index(i, nums.index(i) + 1, len(nums))])
                else:
                    continue
            elif (target - i) in nums:
                self.answer.append([nums.index(i), nums.index(target - i)])

        new_answer = []
        for ans in self.answer:
            new_answer.append([ans[1], ans[0]])
        return self.answer+new_answer

# 会出现重复的数据,看看还能不能升级
