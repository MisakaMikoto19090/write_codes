package a_FuZaDu;

public class Main {

	public static void main(String[] args){
		JunTanFuZaDu test=new JunTanFuZaDu();
		test.push_back(1);
		test.push_back(2);
		test.push_back(3);
		test.push_back(4);
		test.push_back(5);
		test.pop_back();
		//复杂度震荡
		test.push_back(5);
		test.pop_back();
		test.push_back(5);
		test.pop_back();
		test.push_back(5);

	}

	/*  fib
	public static void main(String[] args) {
		System.out.println(fib1(0));
		System.out.println(fib1(1));
		System.out.println(fib1(2));
		System.out.println(fib1(3));
		System.out.println(fib1(4));
		System.out.println(fib1(5));
		System.out.println(fib1(6));
		System.out.println(fib1(7));
		System.out.println(fib1(8));
		System.out.println(fib1(9));
		System.out.println(fib1(10));

		System.out.println(fib2(64));
//		System.out.println(fib1(64));

		a_FuZaDu.files.Times.test("fib1", new a_FuZaDu.files.Times.Task() {
			@Override
			public void execute() {
				System.out.println(fib1(45));//50需要35秒
			}
		});
		a_FuZaDu.files.Times.test("fib2", new a_FuZaDu.files.Times.Task() {
			@Override
			public void execute() {
				System.out.println(fib2(45));
			}
		});
	}
	/**/

	//递归
	public static int fib1(int n) {
		n = Math.abs(n);
		if (n <= 2) {
			return n;
		} else {
			return fib1(n - 1) + fib1(n - 2);
		}
	}

	//循环
	public static int fib2(int n) {
		n = Math.abs(n);
		if (n <= 1) {
			return n;
		}
		int start = 0;
		int next = 1;
		int tmp;
		while (n > 1) {//倒着好理解一点.O(n)
			tmp = next;
			next = start + next;
			start = tmp;
			n--;
		}
		//0 1 2 3 4 5 6  循环次数是n-1次
		//0 1 1 2 3 5 8
		return next;
	}

	//方程公式
	public static int fib3(int n) {

		return n;
	}

	//最好,最坏,平均复杂度例子
	public static void find(int target) {
		int[] int_arr = new int[]{1,2,3,4,5,6,7,8,9};
		for (int i=0;i<int_arr.length;i++){
			if (int_arr[i]==target){
				System.out.println("Find target");
			}
		}
	}

}
