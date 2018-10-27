# -*- coding: utf-8 -*-
#请定义一个函数quadratic(a, b, c)，接收3个参数，返回一元二次方程：

import math

def quadratic(a, b, c):
    if (b * b - 4 * a * c) >= 0:
        return (-b + math.sqrt(b * b - 4 * a * c)) / (2 * a), (-b - math.sqrt(b * b - 4 * a * c)) / (2 * a)
    else:
        return print("该a,b,c参数的方程没有实数解,")

# 测试:
print('quadratic(2, 3, 1) =', quadratic(2, 3, 1))
print('quadratic(1, 3, -4) =', quadratic(1, 3, -4))

if quadratic(2, 3, 1) != (-0.5, -1.0):
    print('测试失败')
elif quadratic(1, 3, -4) != (1.0, -4.0):
    print('测试失败')
else:
    print('测试成功')