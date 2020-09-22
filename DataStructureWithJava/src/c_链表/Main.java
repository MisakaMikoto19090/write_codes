package c_链表;

import b_动态数组.Asserts;
import c_链表.circle.DoubleCircleLinkedList;
import c_链表.circle.SingleCircleLinkedList;
import c_链表.single.SingleHeadLinkedList;
import c_链表.single.SingleLinkedList;

public class Main {

    public static void testList(List<Integer> list) {
        list.add(1);
        list.add(2);
        list.add(3);
        list.add(4);
        list.add(0, 5);//[5,1,2,3,4]
        list.add(2, 66);//[5,1,66,2,3,4]
        list.add(list.size(), 77);//[5,1,66,2,3,4,7]

        list.remove(0);//[1,66,2,3,4,7]
        list.remove(2);//[1,66,3,4,7]
        list.remove(list.size() - 1);//[1,66,3,4]

        Asserts.test(list.size() == 4);
        list.add(2, 100);//[1,66,100,3,4]
        Asserts.test(list.indexOf(0) == List.ELEMENT_NOT_FOUND);
        Asserts.test(list.indexOf(1) == 0);
        Asserts.test(list.indexOf(66) == 1);
        Asserts.test(list.indexOf(100) == 2);
        Asserts.test(list.get(0) == 1);
        Asserts.test(list.get(2) == 100);
        Asserts.test(list.indexOf(4) == 4);
        System.out.println(list);
        //堆空间和栈空间在本函数执行完后删除。


//        java.util.ArrayList arrayList = new java.util.ArrayList();
//        java.util.LinkedList linkedList = new java.util.LinkedList<>();
    }

    public static void main(String[] args) {
//        testList(new DoubleLinkedList<>());
//        testList(new SingleLinkedList<>());
        testList(new SingleHeadLinkedList<>());
//        testList(new SingleCircleLinkedList<>());
//        testList(new DoubleCircleLinkedList<>());

    }
}
