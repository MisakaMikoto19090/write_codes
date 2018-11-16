//电脑一般使用循环来判断给定x的平方根z
//z -= (z*z -x)/(2*z)

package main

import (
	"fmt"
)

//好厉害,精度很高啊
func Sqrt(x float64) float64 {
	z :=1.0
	for i=1;i<=10;i++{
		z -= (z*z-x)/(x*z)
	}
	return z
}

func main() {
	fmt.Println(Sqrt(2))
}