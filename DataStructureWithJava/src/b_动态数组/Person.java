package b_动态数组;

public class Person {
    private int age;
    private String name;

    public Person(int age, String name) {
        this.age = age;
        this.name = name;
    }

    /**
     * 同ArrayList
     *
     * @return
     */
    @Override
    public String toString() {
        return "Person [age=" + age + ", name=" + name + "]";
    }

    /**
     * 遗言,相当于析构函数
     *
     * @throws Throwable
     */
    @Override
    protected void finalize() throws Throwable {
        super.finalize();
        System.out.println("Person - finalize");
    }

    /**
     * 对象的判断
     *
     * @param obj
     * @return
     */
    @Override
    public boolean equals(Object obj) {
        if (obj == null) {
            return false;
        }
        if (obj instanceof Person) {
            Person person = (Person) obj;
            return this.age == person.age;
        }
        return false;
    }
}
