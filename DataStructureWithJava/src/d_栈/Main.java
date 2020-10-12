package d_栈;

public class Main {
    public static void main(String[] args) {

//        StackExtendsArrayList<Integer> stack = new StackExtendsArrayList<>();
        Stack使用组合来实现<Integer> stack=new Stack使用组合来实现<>();
        stack.push(11);
        stack.push(22);
        stack.push(33);
        stack.push(44);

        while (!stack.isEmpty()) {
            System.out.println(stack.pop());
        }

//        java.util.Stack 继承Vector ,这个Vector基本上类似数组,Vector是线程安全的.
    }
}
