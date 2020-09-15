package c_LianBiao;

/**
 * 链表
 */
public class LinkedList<E> extends AbstractList<E> {

    private Node<E> first;  //first指向第一个node元素节点

    /**
     * 静态内部类,旨在LinkedList中使用  节点类
     */
    private static class Node<E> {   //泛型
        //内部类可以省略修饰符
        E element;
        Node<E> next;//指向下一个节点

        public Node(E element, Node<E> next) {
            this.element = element;
            this.next = next;
        }
    }

    @Override
    public void clear() {
        size = 0;
        first = null;
    }

    @Override
    public E get(int index) {
        return null;
    }

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
        if (index == 0) {
            first = new Node<>(element, first);
        } else {
            Node<E> pre = node(index - 1);
            pre.next = new Node<>(element, pre.next);
        }
        size++;
    }

    /**
     * 指定位置添加
     *
     * @param element
     */
    @Override
    public void add(E element) {
        add(size, element);
    }

    /**
     * 删除
     *
     * @param index
     * @return
     */
    @Override
    public E remove(int index) {
        Node<E> node = first;
        if (index == 0) {
            first = first.next;
        } else {
            Node<E> pre = node(index - 1);
            node = pre.next;
            pre.next = pre.next.next;

        }
        size--;
        return node.element;

    }

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
                if (node.element == element) {
                    return i;
                }
                node = node.next;
            }
        }
        return 0;
    }

    /**
     * 返回某位置的节点
     *
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
     *
     * @return
     */
    public String toString() {
        StringBuilder string = new StringBuilder();
        string.append("size:" + size);
        string.append(" [");
        Node<E> node = first;
//        for (int i = 0; i < size; i++) {
//            if (i != 0) {
//                string.append(',');
//            }
//            string.append(node.element);
//            node = node.next;
//        }
        while (node != null) {
            string.append(node.element);
            string.append(",");
            node = node.next;
        }
        string.deleteCharAt(string.length() - 1);

        string.append("]");
        return string.toString();
    }


}
