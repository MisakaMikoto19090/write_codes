package _practice;

public class ArrayList<E> {
    private int size;
    private E[] elements;

    private final static int DEFAULT_CAPACITY = 10;
    private final static int ELEMENT_NOT_FOUND = -1;

    ArrayList(int capacity) {
        if (capacity<DEFAULT_CAPACITY){
            elements=(E[])new Object[DEFAULT_CAPACITY];
        }

    }

}
