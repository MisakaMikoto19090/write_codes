package d_栈;

import d_栈.List.ArrayListAutoResize;

/**
 * 栈直接继承动态数组
 * 但是问题就是,比如indexOf,get(index) 就直接继承了
 * @param <E>
 */
public class StackExtendsArrayList<E> extends ArrayListAutoResize<E> {

    //size()继承了
    //isEmpty()继承了
    //clear()继承了

    /**
     * 压入栈,相当于在数组的尾巴上添加
     * @param element
     */
    public void push(E element) {
        add(element);
    }

    /**
     * 出栈,弹出尾元素
     * @return
     */
    public E pop() {
        return remove(size - 1);
    }

    /**
     * 获取尾元素
     * @return
     */
    public E get() {
        return get(size - 1);
    }
}
