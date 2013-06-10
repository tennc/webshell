package enigma.shells.jython;

import java.io.*;
import java.awt.*;
import javax.swing.*;

import enigma.console.*;
import enigma.console.java2d.*;

import org.python.core.*;
import org.python.util.*;

public class JythonShell extends JPanel implements Runnable {
	public static int DEFAULT_ROWS = 20;
	public static int DEFAULT_COLUMNS = 80;
	public static int DEFAULT_SCROLLBACK = 100;
	
	public PrintStream out;
	
	public Console console;
	public Java2DTextWindow text;
	public JScrollPane scrollPane;
	public PythonInterpreter interp;
	
	private Color colorBackground = new Color(0, 0, 0);
	private Color colorForeground = new Color(187, 187, 187);
	private Color colorError = new Color(187, 0, 0);
	private Color colorCursor = new Color(187, 187, 0);
	
	public JythonShell() {
		this(null, Py.getSystemState());
	}
	
	public JythonShell(PyObject dict) {
		this(dict, Py.getSystemState());
	}
	
	public JythonShell(int columns, int rows, int scrollback) {
		this(null, Py.getSystemState(), columns, rows, scrollback);
	}
	
	public JythonShell(PyObject dict, PySystemState systemState) {
		this(dict, systemState, DEFAULT_COLUMNS, DEFAULT_ROWS, DEFAULT_SCROLLBACK);
	}
	
	public JythonShell(PyObject dict, PySystemState systemState, int columns, int rows, int scrollback) {
		super(new BorderLayout());
		
		text = new Java2DTextWindow(columns, rows, scrollback);
		text.setBackground(colorBackground);
		
		scrollPane = new JScrollPane();
		scrollPane.setViewportView(text);
		
		add(scrollPane, BorderLayout.CENTER);
		
		console = new DefaultConsoleImpl(text);
		out = console.getOutputStream();
		
		interp = new PythonInterpreter(dict, systemState);
		interp.setOut(out);
		interp.setErr(out);
	}
	
	public void run() {
		int pos = 0;
		int tbs = 4;
		
		String line = "";
		String command = "";
		
		for (;;) {
			String space = "";
			for (int i = 0; i < pos * tbs; i++) {
				space += " ";
			}
			
			try {
				console.setTextAttributes(new TextAttributes(colorCursor));
				
				if (pos > 0) {
					out.print(space + "... ");
				} else {
					out.print(">> ");
				}
				
				console.setTextAttributes(new TextAttributes(colorForeground));
				
				line = console.readLine().trim();
				if (line.length() == 0 && pos > 0) {
					pos--;
				} else if (line.endsWith(":")) {
					command += space + line + "\n";
					pos++;
				} else {
					command += space + line + "\n";
				}
				
				if (pos == 0) {
					interp.exec(command);
					command = "";
				}
			} catch (Exception e) {
				console.setTextAttributes(new TextAttributes(colorError));
				
				e.printStackTrace();
				command = "";
			}
		}
	}
	
	public static void main(String[] argv) {
		PySystemState.initialize(System.getProperties(), null, argv);
		
		JFrame frame = new JFrame("Jython Console");
		JythonShell console = new JythonShell();
		
		frame.add(console, BorderLayout.CENTER);
		frame.pack();
		frame.setVisible(true);
		frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		
		console.run();
	}
}