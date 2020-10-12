package d_栈.List;

/**
 * 双向链表
 * @param <E>
 */
public class DoubleLinkedList<E> extends AbstractList<E> {
    /**
     * 头节点
     */
    private Node<E> first;  //first指向第一个node元素节点
    /**
     * 尾节点
     */
    private Node<E> last;

    /**
     * 静态内部类,只在LinkedList中使用,所以可以用private  节点类
     */ //内部类可以省略修饰符
    private static class Node<E> {   //<E>泛型
        Node<E> prev;
        E element;
        Node<E> next;//指向下一个节点

        /**
         * 构造函数
         * @param prev
         * @param element
         * @param next
         */
        public Node(Node<E> prev, E element, Node<E> next) {
            this.prev = prev;
            this.element = element;
            this.next = next;
        }

        /**
         * println(node)自动调用
         * @return
         */
        @Override
        public String toString() {
            StringBuilder sb = new StringBuilder();
            if (prev != null) {
                sb.append(prev.element);
            } else {
                sb.append("null");
            }
            sb.append("_").append(element).append("_");
            if (next != null) {
                sb.append(next.element);
            } else {
                sb.append("null");
            }
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
        last = null;
        //删除first后,链表中各个元素依次删除

        //注意,java不是对象有使用就不会死.===> 否则两个对象互相应用就永远不会删除了.

        //而是, 对象没有被gc root对象引用,则清空

        //什么是gc root对象        - 被栈指针指向的对象(局部变量,)
        //Integer a=new Integer(10); 后面的new对象在堆空间中,前面的局部变量指向它
    }

    /**
     * 获取某个索引的值
     *
     * @param index
     * @return
     */
    @Override
    public E get(int index) {
        return node(index).element;
    }

    /**
     * 设置某个索引的值
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
            last = new Node<E>(oldLast, element, null);
            if (oldLast == null) {
                //向空链表添加
                first = last;
            } else {
//                last.prev.next=last;    //只要有. 就需要考虑有null的可能, 所以
                oldLast.next = last;  //两种都可以.
            }
        } else {
            Node<E> next = node(index);
            Node<E> prev = next.prev;
            Node<E> node = new Node<>(prev, element, next);
            next.prev = node;
            if (prev == null) {
                //index==0;
                first = node;
            } else {
                prev.next = node;
            }
        }
        size++;
    }

    /**
     * 删除
     *
     * @param index
     * @return
     */
    @Override
    public E remove(int index) {
        rangeCheck(index);//创建链表后直接remove
        Node<E> node = node(index);
        Node<E> prev = node.prev;
        Node<E> next = node.next;

        //好简介啊,先考虑中间,再考虑两边.
        if (prev == null) {
            //index=0
            first = next;
        } else {
            prev.next = next;
        }
        if (next == null) {
            //index-1;
            last = prev;
        } else {
            next.prev = prev;
        }
        size--;
        return node.element;
    }

    /**
     * 查找某元素的索引位置
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
        string.append(", [");
        Node<E> node = first;
//        for (int i = 0; i < size; i++) {
//            if (i != 0) {
//                string.append(',');
//            }
//            string.append(node.element);
//            node = node.next;
//        }
        while (node != null) {
            string.append(node);//这里最好用node,调用node的tostring
            node = node.next;
//            if (node==null){
//                break;
//            }
            string.append(",");
        }
        string.deleteCharAt(string.length() - 1);//删除最后一个,
        string.append("]");
        return string.toString();
    }
}
