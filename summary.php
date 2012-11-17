<?php
$home = getenv("HOME");
require_once("$home/git/php-markdown-extra-math/markdown.php");
require_once("$home/git/php-smartypants/smartypants.php");
$md = stream_get_contents(STDIN);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
  <title>Summary</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style>
    * {
      margin: 0;
      padding: 0;
    }

    body {
      font-family: Times;
      font-size: 12pt;
    }

    h1, h2 {
      font-family: Optima;
    }

    h1 {
      font-size: 1.5em;
      font-weight: bold;
      text-align: center;
      margin-bottom: 1em;
    }

    h2 {
      font-size: 1em;
      font-weight: bold;
      text-align: center;
      margin-top: -1.5em;
      margin-bottom: 1.5em;
    }

    a:link {
      color: navy;
      text-decoration: none;
    }

    p {
      margin-bottom: .75em;
    }
  </style>
</head>
<body>
  <?php echo SmartyPants(Markdown($md)) ?>
</body>
</html>

