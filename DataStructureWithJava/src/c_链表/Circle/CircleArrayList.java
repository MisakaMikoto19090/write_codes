package c_链表.Circle;

import c_链表.AbstractList;

@SuppressWarnings("unchecked")

/**
 * 有动态缩容操作
 * @author MJ Lee
 *
 * @param <E>
 */
public class CircleArrayList<E> extends AbstractList<E> {
    /**
     * 所有的元素
     */
    private E[] elements;

    /**
     * 头索引位置
     */
    private int first;
    /**
     * 默认容量
     */
    private static final int DEFAULT_CAPACITY = 10;

    /**
     * 构造函数,重载
     *
     * @param capaticy
     */
    public CircleArrayList(int capaticy) {
        capaticy = (capaticy < DEFAULT_CAPACITY) ? DEFAULT_CAPACITY : capaticy;
        elements = (E[]) new Object[capaticy];
        first = 0;
    }

    /**
     * 构造函数
     */
    public CircleArrayList() {
        this(DEFAULT_CAPACITY);
    }

    /**
     * 清除所有元素
     */
    public void clear() {
        for (int i = 0; i < size; i++) {
            elements[i] = null;
        }
        size = 0;
        first = 0;

        // 仅供参考
        if (elements != null && elements.length > DEFAULT_CAPACITY) {
            elements = (E[]) new Object[DEFAULT_CAPACITY];
        }
    }

    /**
     * 获取真正的index
     *
     * @param index
     * @return
     */
    private int getRealIndex(int index) {
        int tempIndex = index + first;
        //这里可以直接减去就行, %跟复杂一点
        return (tempIndex >= elements.length) ? (tempIndex - elements.length) :
                (tempIndex < 0) ? (tempIndex + elements.length) : tempIndex;
    }

    /**
     * 获取index位置的元素
     *
     * @param index
     * @return
     */
    public E get(int index) { // O(1)
        rangeCheck(index);

        return elements[getRealIndex(index)];
    }

    /**
     * 设置index位置的元素
     *
     * @param index
     * @param element
     * @return 原来的元素ֵ
     */
    public E set(int index, E element) { // O(1)
        rangeCheck(index);

        E old = elements[getRealIndex(index)];
        elements[getRealIndex(index)] = element;
        return old;
    }

    /**
     * 在index位置插入一个元素
     *
     * @param index
     * @param element
     */
    public void add(int index, E element) {
        rangeCheckForAdd(index);

        ensureCapacity(size + 1);//

        if (index < size >> 1) {            //这里如果是==  则 插入第一元素时会进入这种情况. 0<=0
            //前半段插入
            for (int i = 0; i < index; i++) {
                elements[getRealIndex(i - 1)] = elements[getRealIndex(i)];
            }
            first = getRealIndex(-1);//first 前移一个位置，这样处理后的first就是0~elements-1
            //或者 fist=first-1;    first就有可能是负数.
        } else {
            //后半段插入
            for (int i = size - 1; i >= index; i--) {
                elements[getRealIndex(i + 1)] = elements[getRealIndex(i)];
            }
        }
        //直接插入 index=2
        // 0 1 2 3 4 5
        // A B C D E F
        //   f 1 2 3
        // f 1 x 3
        elements[getRealIndex(index)] = element;
        size++;
    } // size是数据规模

    /**
     * 删除index位置的元素
     *
     * @param index
     * @return
     */
    public E remove(int index) {
        rangeCheck(index);

        E old = elements[index];
        if (index < size >> 1) {
            for (int i = index; i > 0; i--) {
                elements[getRealIndex(i)] = elements[getRealIndex(i - 1)];
                //直接覆盖了
            }
            elements[getRealIndex(0)] = null;   //把原来的头删除
            first = getRealIndex(1);            //first==原来的1的位置.
        } else {
            for (int i = index; i < size - 1; i++) {
                elements[getRealIndex(i)] = elements[getRealIndex(i + i)];
            }
            elements[getRealIndex(size - 1)] = null;    //删除原来的尾巴。
        }
        size--;

        trim();

        return old;
    }

    /**
     * 查看元素的索引
     *
     * @param element
     * @return
     */
    public int indexOf(E element) {
        if (element == null) {
            for (int i = 0; i < size; i++) {
                if (elements[getRealIndex(i)] == null) return i;
            }
        } else {
            for (int i = 0; i < size; i++) {
                if (element.equals(elements[getRealIndex(i)])) return i;
            }
        }
        return ELEMENT_NOT_FOUND;
    }

    /**
     * 保证要有capacity的容量
     *
     * @param capacity
     */
    private void ensureCapacity(int capacity) {
        int oldCapacity = elements.length;
        if (oldCapacity >= capacity) return;

        // 新容量为旧容量的1.5倍
        int newCapacity = oldCapacity + (oldCapacity >> 1);

        // 新容量为旧容量的2倍
        // int newCapacity = oldCapacity << 1;
        E[] newElements = (E[]) new Object[newCapacity];
        for (int i = 0; i < size; i++) {
            newElements[i] = elements[getRealIndex(i)];
        }
        first = 0;
        elements = newElements;

        System.out.println(oldCapacity + "扩容为" + newCapacity);
    }

    /**
     * 缩容
     */
    private void trim() {

        int oldCapacity = elements.length;

        int newCapacity = oldCapacity >> 1;
        if (size > (newCapacity) || oldCapacity <= DEFAULT_CAPACITY) return;

        // 剩余空间还很多
        E[] newElements = (E[]) new Object[newCapacity];
        for (int i = 0; i < size; i++) {
            newElements[i] = elements[getRealIndex(i)];
        }
        first = 0;
        elements = newElements;

        System.out.println(oldCapacity + "缩容为" + newCapacity);
    }

    /**
     * 打印输出
     *
     * @return
     */
    @Override
    public String toString() {
        // size=3, [99, 88, 77]
        StringBuilder string = new StringBuilder();
        string.append("size=").append(size).append(", [");
        for (int i = 0; i < size; i++) {
            if (i != 0) {
                string.append(", ");
            }

            string.append(elements[i]);

//			if (i != size - 1) {
//				string.append(", ");
//			}
        }
        string.append("]");
        return string.toString();
    }
}
