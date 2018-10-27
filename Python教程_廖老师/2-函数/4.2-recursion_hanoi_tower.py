# -*- coding: utf-8 -*-
# 请编写move(n, a, b, c)函数，它接收参数n，表示3个柱子A、B、C中第1个柱子A的盘子数量，然后打印出把所有盘子从A借助B移动到C的方法，例如：

# 如果增加一个规则,不能跨柱子移动的话如,a到c,只能a到b然后b到c
# 这个和上一个类似.,不过

def move(n, a, b, c=0):
    if n == 1:
        if c==0:
            print(a,'-->',b)
        else:
            print(a, '-->', b)
            print(b, '-->', c)
    else:
        move(n-1,a,b,c)

        move(1,a,b)
        move(n-1,c,b,a)
        move(1,b,c)

        move(n-1,a,b,c)

def move_detail(start,end):
    print(start,'-->',end)


# 期待输出:
# A --> C
# A --> B
# C --> B
# A --> C
# B --> A
# B --> C
# A --> C
move(3, 'A', 'B', 'C')


# 稍微多出了一步

# 总之注意一点,确定每一步的操作是对哪一层即可

# 1层
    # 1层到缓存     A->B
    # 1层缓存到终点   B->C
# 2层:这样就很明显了
    # 1层到缓存         A->B
    # 1层到目标         B->C

    # 2层到缓存         A->B
        # 1层到缓存         C->B
        # 1层到初始         B->A
    # 2层到目标         B->C

    # 1层到缓存         A->B
    # 1层到目标         B->C

