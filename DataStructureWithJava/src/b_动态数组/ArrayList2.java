package b_动态数组;

import java.util.Objects;

public class ArrayList2<wtf> {
    /**
     * 元素数量
     */
    private int size;

    /**
     * 存放元素的数组
     */
    private wtf[] elements;

    /**
     * 默认容量， final是常量（相当于const）
     * 私有 静态（保证在内存中只有一份） 常量 int
     */
    private static final int DEFAULT_CAPACITY = 10;

    /**
     * 未找到元素返回的值
     */
    private static final int ELEMENT_NOTFOUND = -1;

    /**
     * 有参数构造函数，和类名同名
     *
     * @param capacity 初始容量
     */
    public ArrayList2(int capacity) {
        capacity = (capacity < DEFAULT_CAPACITY) ? DEFAULT_CAPACITY : capacity;
        elements = (wtf[]) new Object[capacity];//首先是Object对象数组,然后强制转换为wtf类型
    }

    /**
     * 无参数构造函数，构造函数之间通过this互相调用，
     */
    public ArrayList2() {
        this(DEFAULT_CAPACITY);
    }

    /**
     * 返回当前元素个数
     *
     * @return size
     */
    public int size() {
        return size;
    }

    /**
     * 当前数组是否为空
     *
     * @return
     */
    public boolean isEmpty() {
        return size == 0;
    }

    /**
     * 是否包含某元素
     *
     * @param element
     * @return
     */
    public boolean contains(wtf element) {
        return indexOf(element) != ELEMENT_NOTFOUND;
    }

    /**
     * 返回某元素的索引
     *
     * @param element
     * @return
     */
    public int indexOf(wtf element) {
        if (element == null) {
            for (int i = 0; i < size; i++) {
                if (elements[i] == null) {
                    return i;
                }
            }
        } else {
            for (int i = 0; i < size; i++) {
                //int 类型可以直接比较,对象比较的== 是看内存地址
//            if (elements[i] == element) {
//                return i;
//            }
                //一般对象比较是看比较的内容,比如性别,年龄等.
                if (elements[i].equals(element)) {
                    return i;
                }
            }
        }

        return ELEMENT_NOTFOUND;
    }

    /**
     * 返回指定索引位置元素
     *
     * @param index
     * @return
     */
    public wtf get(int index) {
        rangeCheck(index);
        return elements[index];
    }

    /**
     * 设置某位置的元素，返回原来的值
     *
     * @param index
     * @param element
     * @return
     */
    public wtf set(int index, wtf element) {
        rangeCheck(index);
        wtf old = elements[index];
        elements[index] = element;
        return old;
    }

    /**
     * 清楚所有元素
     * 这个思路是确实牛逼，只需要考虑对外的表现：无法访问就行，
     * 空间暂时可以不释放，然后可以继续添加，不需要每个都清空，减少了操作。
     */
    public void clear() {
        //如果是int数组,就可以直接下面一行
//        size = 0;
        //比如，size很大，就可以这样，size很小，就可以elements=null；


        //如果使用泛型(对象数组),则需要释放里面每个对象, 否则,对象一直不会释放,除非倍新添加的元素覆盖,但是数组内存还在.
        for (int i = 0; i < size; ++i) {
            elements[i] = null;
        }
        size = 0;
        if (elements!=null&&elements.length>DEFAULT_CAPACITY){
            elements = (wtf[]) new Object[DEFAULT_CAPACITY];

        }
    }

    /**
     * 删除某索引位置的值
     *
     * @param index
     * @return
     */
    public wtf remove(int index) {
        rangeCheck(index);
        wtf old = elements[index];
        for (int i = index + 1; i < size; ++i) {
            elements[i - 1] = elements[i];
        }
//        size--;
        //如果是int数组,最后一个元素可以不管, 对象数组,还是得把最后一个=null
        elements[--size] = null;//

        trim();
        return old;
    }

    /**
     * 还有一半就缩容
     */
    private void trim() {
        int capacity = elements.length;
        int newCapacity = capacity >> 1;

        if (size >= (newCapacity) || capacity <= DEFAULT_CAPACITY) {
            //大于一半,且小于默认容量
            return;
        }
        wtf[] newElements = (wtf[]) new Object[newCapacity];
        for (int i = 0; i < size; i++) {
            newElements[i] = elements[i];
        }
        elements = newElements;
        System.out.println(capacity + "-to-" + newCapacity);

    }

    /**
     * 插入到某个位置
     *
     * @param index
     * @param element
     * @return
     */
    public void add(int index, wtf element) {
        rangeCheckForAdd(index);
        ensureCapacity(size + 1);
        for (int i = size; i > index; --i) {
            elements[i] = elements[i - 1];
        }
        elements[index] = element;
        size++;
//        return index; //可以考虑返回index
    }

    /**
     * 在最后面插入
     *
     * @param element
     * @return
     */
    public void add(wtf element) {
        ensureCapacity(size + 1);
        elements[size++] = element;
    }

    /**
     * toSting默认打印类型和地址
     */
    @Override
    public String toString() {
        StringBuilder string = new StringBuilder();
        string.append("size:" + size);
        string.append(" [");
        for (int i = 0; i < size; i++) {
            if (i != 0) {
                string.append(',');
            }
            string.append(elements[i]);
        }
        string.append("]");
        return string.toString();
    }

    /**
     * 越界抛出错误
     *
     * @param index
     */
    private void outOfBounds(int index) {
        throw new IndexOutOfBoundsException("Index:" + index + ",Size:" + size);
    }

    /**
     * 普通检查
     *
     * @param index
     */
    private void rangeCheck(int index) {
        if (index < 0 || index >= size) {
            outOfBounds(index);
        }

    }

    /**
     * add检查
     *
     * @param index
     */
    private void rangeCheckForAdd(int index) {
        if (index < 0 || index > size) {
            outOfBounds(index);
        }
    }

    /**
     * 保证空间足够
     *
     * @param newCapacity
     */
    private void ensureCapacity(int newCapacity) {
        int oldCapacity = elements.length;
        if (oldCapacity >= newCapacity) {
            return;
        }
        //一般是扩容到1.5到1.6倍,使用位运算  扩容1.5倍  位运算右移>>是除2,左移<<是乘2
        newCapacity = oldCapacity + (oldCapacity >> 1);
        wtf[] newElements = (wtf[]) new Object[newCapacity];
        for (int i = 0; i < size; ++i) {
            newElements[i] = elements[i];
        }
        this.elements = newElements;//this可以省略
        System.out.println(oldCapacity + "+to+" + newCapacity);
    }
}
