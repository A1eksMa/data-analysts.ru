<?php
require_once '../php/markdown/Michelf/Markdown.inc.php';
use Michelf\Markdown;
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Data-Analysts</title>
		<link href="css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
<?php
require '../header.php';

if (isset($_COOKIE['userlog']))
{   if ($_COOKIE['userlog']!="guest")
        {require 'content.php';}
    else
        {require '../auth/auth.php';}
}
else
{require '../auth/auth.php';}

require '../footer.php';
?>

        </body>
</html>
