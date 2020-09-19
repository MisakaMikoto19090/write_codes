package a_复杂度;

public class 均摊复杂度<Item> {
	private Item[] data;
	private int size;        //数组中元素个数
	private int capacity;    //数组中可以容纳的最大的元素个数

	public 均摊复杂度() {
		data = (Item[]) new Object[4];
		size = 0;
		capacity = 4;
	}

	//给数组添加元素
	public void push_back(Item e) {
		if (size == capacity) {    //元素个数==容量,即数组满了
			resize(2 * capacity);    //数组扩容
		}
		data[size++] = e;
		System.out.println("当前元素个数:" + size + "当前数组容量:" + capacity);
	}

	//从数组中取出元素
	public Item pop_back() {
		if (size <= 0) {
			throw new IllegalArgumentException("can not pop back for empty vector.");
		}
		Item ret = data[size - 1];
		size--;

		//不停的添加,删除,引发复杂度震荡
		if (size == capacity / 2) {
			resize(capacity / 2);
		}

		//在size达到静态数组最大容量的1 / 4 时才进行resize，原因请往下看
		// resize的容量是当前最大容量的1/2
		// 防止复杂度的震荡
//		if (size == capacity / 4) {
//			resize(capacity / 2);
//		}
		System.out.println("当前元素个数:" + size + "当前数组容量:" + capacity);

		return ret;
	}

	public void resize(int newCapacity) {
		if (newCapacity < size) {
			throw new IllegalArgumentException("newCapacity can note be less than size.");
		}
		Item[] newData = (Item[]) new Object[newCapacity];
		for (int i = 0; i < size; i++) {
			newData[i] = data[i];
		}
		data = newData;
		capacity = newCapacity;
	}
}
