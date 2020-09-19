package a_复杂度;

import java.text.SimpleDateFormat;
import java.util.Date;

public class Times {
	private static final SimpleDateFormat fmt = new SimpleDateFormat("HH:mm:ss.SSS");

	public interface Task {
		void execute();
	}

	public static void test(String title, Task task) {
		if (task == null) return;
		title = (title == null) ? "" : ("【" + title + "】");
		System.out.println(title);
		System.out.println("开始：" + fmt.format(new Date()));
		long begin = System.currentTimeMillis();
		task.execute();
		long end = System.currentTimeMillis();
		System.out.println("结束：" + fmt.format(new Date()));
//		double delta = (end - begin) / 1000.0;
		double delta = (end - begin);
		System.out.println("耗时：" + delta + "毫秒,相当于" + delta / 1000 + "秒");
		System.out.println("-------------------------------------");
	}
}
