package _leetcode.b栈._150_逆波兰表达式求值;

//https://leetcode-cn.com/problems/evaluate-reverse-polish-notation/
//逆波兰表达式,就是后缀 12+  =>1+2  123+- 1-(2+3)

import java.util.Stack;
class MySolution {
  public int evalRPN(String[] tokens) {
    Stack<Integer> numStack = new Stack<>();
    Integer back, front;
    for (String s : tokens) {
      switch (s){
        case "+":
          back=numStack.pop();
          front=numStack.pop();
          numStack.push(front+back);
          break;
        case "-":
          back=numStack.pop();
          front=numStack.pop();
          numStack.push(front-back);
          break;
        case "*":
          back=numStack.pop();
          front=numStack.pop();
          numStack.push(front*back);
          break;
        case "/":
          back=numStack.pop();
          front=numStack.pop();
          numStack.push(front/back);
          break;
        default:
          numStack.push(Integer.parseInt(s));
          break;
      }
    }
    return numStack.pop();
  }
}