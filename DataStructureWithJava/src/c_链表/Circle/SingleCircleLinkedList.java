package c_链表.Circle;

import c_链表.AbstractList;

/**
 * 单向循环链表
 * @param <E>
 */
public class SingleCircleLinkedList<E> extends AbstractList<E> {
    private Node<E> first;  //first指向第一个node元素节点===>first就是第一个节点,想着指向容易搞混.

    /**
     * 静态内部类,只在LinkedList中使用,所以可以用private  节点类
     */ //内部类可以省略修饰符
    private static class Node<E> {   //<E>是泛型
        E element;
        Node<E> next;//指向下一个节点

        /**
         * 同名就是构造函数
         * @param element
         * @param next
         */
        public Node(E element, Node<E> next) {
            this.element = element;
            this.next = next;
        }

        /**
         * println(node)时自动调用.
         * @return
         */
        @Override
        public String toString() {
            StringBuilder sb = new StringBuilder();
            //单向循环没有null
            sb.append(element).append("_").append(next.element);
            return sb.toString();
        }
    }

    /**
     * 清空链表
     */
    @Override
    public void clear() {
        size = 0;
        first = null;
        //删除first后,链表中各个元素依次删除
    }

    /**
     * 获取某个索引的值
     * @param index
     * @return
     */
    @Override
    public E get(int index) {
        return node(index).element;
    }

    /**
     * 设置某个索引的值
     * @param index
     * @param element
     * @return
     */
    @Override
    public E set(int index, E element) {
        Node<E> node = node(index);
        E old = node.element;
        node.element = element;
        return old;
    }

    /**
     * 指定位置添加
     *
     * @param index
     * @param element
     */
    @Override
    public void add(int index, E element) {
        rangeCheckForAdd(index);
        if (index == 0) {
            Node<E> newFirst = new Node<>(element, first);
            Node<E> last = (size == 0) ? newFirst : node(size - 1);
            last.next = newFirst;
            first = newFirst;
        } else {
            Node<E> prev = node(index - 1);
            prev.next = new Node<>(element, prev.next);
        }
        size++;
    }

    /**
     * 删除某index节点
     * @param index
     * @return
     */
    @Override
    public E remove(int index) {
        rangeCheck(index);//创建链表后直接remove
        Node<E> node = first;//构造一个指向第一个元素的node
        if (index == 0) {
            if (size == 1) {
                first = null;
            } else {
                Node<E> last = node(size - 1);//node需要用到first,必须在更改first之前.
                first = first.next;
                last.next = first;
            }
        } else {
            Node<E> prev = node(index - 1);
            node = prev.next;
            prev.next = node.next;
        }
        size--;
        return node.element;
    }

    /**
     * 查找某元素的索引位置
     * @param element
     * @return
     */
    @Override
    public int indexOf(E element) {
        Node<E> node = first;
        if (element == null) {
            for (int i = 0; i < size; i++) {
                if (node.element == null) {
                    return i;
                }
                node = node.next;
            }
        } else {
            for (int i = 0; i < size; i++) {
                if (element.equals(node.element)) {
                    return i;
                }
                node = node.next;
            }
        }
        return ELEMENT_NOT_FOUND;
    }

    /**
     * 返回某index位置的节点
     * @param index
     * @return
     */
    private Node<E> node(int index) {
        rangeCheck(index);
        Node<E> node = first;//上面定义中,first指向第一个节点
        for (int i = 0; i < index; i++) {
            node = node.next;
        }
        return node;
    }

    /**
     * 打印数据
     * @return
     */
    public String toString() {
        StringBuilder string = new StringBuilder();
        string.append("size:" + size);
        string.append(", [");
        Node<E> node = first;
        for (int i = 0; i < size; i++) {
            if (i != 0) {
                string.append(',');
            }
            string.append(node);
            node = node.next;
        }
//        while (node != null) {
//            string.append(node.element);
//            node = node.next;
//            string.append(",");
//        }
//        string.deleteCharAt(string.length() - 1);//删除最后一个,
        string.append("]");
        return string.toString();
    }
}
