# -*- coding: utf-8 -*-
# 请使用迭代查找一个list中最小和最大值，并返回一个tuple：
def findMinAndMax(L):
    max_num = None
    min_num = None
    if len(L) > 0:
        for i in L:
            if max_num == None:
                max_num = i
            elif i > max_num:
                max_num = i
            if min_num == None:
                min_num = i
            elif i < min_num:
                min_num = i
    return (min_num, max_num)


# 测试
if findMinAndMax([]) != (None, None):
    print('测试失败!')
elif findMinAndMax([7]) != (7, 7):
    print('测试失败!')
elif findMinAndMax([7, 1]) != (1, 7):
    print('测试失败!')
elif findMinAndMax([7, 1, 3, 9, 5]) != (1, 9):
    print('测试失败!')
else:
    print('测试成功!')
