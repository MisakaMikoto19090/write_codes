package c_链表.Circle;

import c_链表.AbstractList;

/**
 * 双向循环链表
 *
 * @param <E>
 */
public class DoubleCircleLinkedList<E> extends AbstractList<E> {
    private Node<E> first;
    private Node<E> last;
    private Node<E> current;

    /**
     * 静态内部类,旨在LinkedList中使用  节点类
     */
    private static class Node<E> {   //泛型
        Node<E> prev;
        //内部类可以省略修饰符
        E element;
        Node<E> next;//指向下一个节点

        /**
         * 构造函数
         *
         * @param element
         * @param next
         */
        public Node(Node<E> prev, E element, Node<E> next) {
            this.prev = prev;
            this.element = element;
            this.next = next;
        }

        /**
         * 双向循环是没有null的
         *
         * @return
         */
        public String toString() {
            StringBuilder sb = new StringBuilder();
            //循环链表,所以是没有null一说的
//            sb.append(prev.element).append("_").append(element).append("_").append(next.element);
            sb.append(prev.element).append("_").append(element).append("_").append(next.element);
            return sb.toString();
        }
    }

    /**
     * 重置,指向头元素
     */
    public void reset() {
        current = first;
    }

    /**
     * current移动到下一个元素,有点像迭代器
     *
     * @return
     */
    public E next() {
        if (current == null) {
            return null;
        }
        current = current.next;
        return current.element;
    }

    /**
     * 删除
     *
     * @return
     */
    public E remove() {
        if (current == null) {
            return null;
        }
        Node<E> next = current.next;
        E element = remove(current);
        if (size == 0) {
            current = null;
        } else {
            current = next;
        }
        return element;
    }

    /**
     * 清空链表
     */
    @Override
    public void clear() {
        size = 0;
        first = null;
        last = null;
        //删除first后,链表中各个元素依次删除

        //注意,java不是对象有使用就不会死.===> 否则两个对象互相应用就永远不会删除了.

        //而是, 对象没有被gc root对象引用,则清空

        //什么是gc root对象        - 被栈指针指向的对象(局部变量,)
        //Integer a=new Integer(10); 后面的new对象在堆空间中,前面的局部变量指向它
    }

    /**
     * 获取index位置元素
     *
     * @param index
     * @return
     */
    @Override
    public E get(int index) {
        return node(index).element;
    }

    /**
     * 设置index位置元素
     *
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
     * 指定位置添加, 画图自己分析，首先分析中间的通用情况
     *
     * @param index
     * @param element
     */
    @Override
    public void add(int index, E element) {
        rangeCheckForAdd(index);
        if (index == size) {
            Node<E> oldLast = last;
            last = new Node<>(oldLast, element, first);
            if (oldLast == null) {
                //向空链表添加
                first = last;
                first.prev = first;
                first.next = first;
            } else {
//                last.prev.next=last;    //只要有. 就需要考虑有null的可能, 所以
                oldLast.next = last;  //两种都可以.
                first.prev = last;
            }
        } else {
            Node<E> next = node(index);
            Node<E> prev = next.prev;
            Node<E> node = new Node<>(prev, element, next);
            next.prev = node;
            prev.next = node;

            if (index == 0) { //next==first;
                //index==0;
                first = node;
            }
        }
        size++;
    }

    /**
     * 删除指定位置
     *
     * @param index
     * @return
     */
    @Override
    public E remove(int index) {
        rangeCheck(index);//创建链表后直接remove
        return remove(node(index));
    }

    /**
     * 新的删除方式,删除当前节点
     *
     * @param node
     * @return
     */
    private E remove(Node<E> node) {
        if (size == 1) {
            first = null;
            last = null;
        } else {
            Node<E> prev = node.prev;
            Node<E> next = node.next;
            prev.next = next;
            next.prev = prev;
            //好简介啊,先考虑中间,再考虑两边.
            if (node == first) { //node==first
                //index=0
                first = next;
            }
            if (node == last) {
                //index-1;
                last = prev;
            }
        }

        size--;
        return node.element;
    }

    /**
     * 某元素索引
     *
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
     * 返回某位置的节点
     *
     * @param index
     * @return
     */
    private Node<E> node(int index) {
        // 0 1 2 3 4
        //区 index=2 size=5
        rangeCheck(index);
        if (index < (size >> 1)) {
            Node<E> node = first;
            for (int i = 0; i < index; i++) {//不需要等于
                node = node.next;
            }
            return node;
        } else {
            Node<E> node = last;
            for (int i = size - 1; i > index; i--) {//不需要等于
                node = node.prev;
            }
            return node;
        }
    }

    /**
     * 打印数据
     *
     * @return
     */
    public String toString() {
        StringBuilder string = new StringBuilder();
        string.append("size:" + size);
        string.append(" [");
        Node<E> node = first;
        for (int i = 0; i < size; i++) {
            if (i != 0) {
                string.append(',');
            }
            string.append(node);
            node = node.next;
        }
//        while (node != null) {
//            string.append(node);//这里最好用node,调用node的tostring
//            node = node.next;
////            if (node==null){
////                break;
////            }
//            string.append(",");
//        }
//        string.deleteCharAt(string.length() - 1);//删除最后一个,
        string.append("]");
        return string.toString();
    }
}
