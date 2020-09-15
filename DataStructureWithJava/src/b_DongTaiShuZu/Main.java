package b_DongTaiShuZu;

public class Main {

    public static void main(String[] args) {
//         两种写法.
//        int[] arr1 = new int[]{1, 2, 3};
//        int arr2[] = new int[]{4, 5, 6};

        ArrayList<Integer> arrayList = new ArrayList<>();
        arrayList.add(1);
        arrayList.add(2);
        arrayList.add(3);
        arrayList.add(4);
        arrayList.add(4, 5);
        Asserts.test(arrayList.get(4) == 5);//断言

        arrayList.remove(0);
        Asserts.test(arrayList.get(0) == 2);
        Asserts.test(arrayList.size() == 4);
        arrayList.add(2, 100);
        System.out.println(arrayList.toString());
        //堆空间和栈空间在本函数执行完后删除。

        ArrayList<Person> persons = new ArrayList<>();
        persons.add(new Person(10, "Jack"));
        persons.add(null);
        persons.add(new Person(15, "Bob"));
        persons.add(new Person(20, "Michael"));
        persons.add(new Person(25, "alex"));
        persons.indexOf(null);

        System.out.println(persons);
        persons.clear();
        System.gc();

        java.util.ArrayList test=new java.util.ArrayList();
        test.add(Integer.valueOf(122));
        test.add(100);
        test.add("hello");
        System.out.println(test);

    }

}
