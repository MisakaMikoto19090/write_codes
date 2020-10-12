package d_栈;

import d_栈.List.List;
import d_栈.List.ArrayListAutoResize;
/**
 * 使用组合,ArrayList是
 *
 * @param <E>
 */
public class Stack使用组合来实现<E> {
    /**
     * 具体使用什么组合,可以在这里确定
     */
    private List<E> list = new ArrayListAutoResize<E>();

//    - int size(); // 元素的数量
//    - boolean isEmpty(); // 是否为空
//    - void push(E element); // 入栈
//    - E pop(); // 出栈
//    - E top(); // 获取栈顶元素
//    - void clear(); // 清空

    public void clear(){
        list.clear();
    }

    /**
     * size
     *
     * @return
     */
    public int size() {
        return list.size();
    }

    /**
     * 是否是空
     *
     * @return
     */
    public boolean isEmpty() {
        return list.isEmpty();
    }

    /**
     * 压入栈,相当于在数组的尾巴上添加
     *
     * @param element
     */
    public void push(E element) {
        list.add(element);
    }

    /**
     * 出栈,弹出尾元素
     *
     * @return
     */
    public E pop() {
        return list.remove(list.size() - 1);
    }

    /**
     * 获取尾元素
     *
     * @return
     */
    public E get() {
        return list.get(list.size() - 1);
    }
}
