package main

import "golang.org/x/tour/pic"


func Pic(dx, dy int) [][]uint8 {
	//创建一个二维数组
	a := make([][]uint8, dy)
	for i := 0; i < dy; i++ {
		a[i] = make([]uint8, dx)
	}

	//画图
	for i := 0; i < dy; i++ {
		for j := 0; j < dx; j++ {
			if j%2 == 0 {
				a[i][j] = 0
			} else {
				a[i][j] = 255
			}
			if i%2 == 1 {
				if a[i][j] == 0 {
					a[i][j] = 255
				} else {
					a[i][j] = 0
				}
			}

		}
	}
	return a
}

func main() {
	pic.Show(Pic)
}
