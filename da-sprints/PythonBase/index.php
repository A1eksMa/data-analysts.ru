<?php
require_once '../../php/markdown/Michelf/Markdown.inc.php';
use Michelf\Markdown;
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Data-Analysts</title>
                <style type="text/css">
                </style>
	</head>

	<body>
<?php require '../../header.php'; ?>
<?php
    //Формируем массив "$list" из трех столбцов ('№','Название темы','Путь к файлу')
$files = glob("./theme*.txt");
$list = [['№','Название темы','Путь к файлу']];

$n = 0;
foreach ($files as $row) {
    $list = array_merge($list, [[($n+1),substr(fgets(fopen($row, 'r')),1),$row]]);
    $n = $n + 1;
    };

$list = array_merge($list, [[($n+1),fgets(fopen("./project.txt", 'r')),"./project.txt"]]);
unset($n);

if (isset($_GET['theme'])) {
    //Блок вывода каждой отдельной темы из текстового файла в формате "markdown":
    echo "<a href=".${_SERVER['SCRIPT_NAME']}."?>Назад к списку тем</a><br>";
    $text = file_get_contents($_GET['theme']);
    $html = Markdown::defaultTransform($text);
    echo $html;
    echo "<br><a href=".${_SERVER['SCRIPT_NAME']}."?>Назад к списку тем</a><br>";
    }
else {
    //Блок вывода перечня тем списком:
    echo "<h1>БАЗОВЫЙ ПИТОН</h1><br>";
    for ($i = 1; $i < count($list); $i++) {
        echo "<a href=".${_SERVER['SCRIPT_NAME']}."?theme=".$list[$i][2]."><h1>"."Тема ".$list[$i][0]." ".$list[$i][1]."</h1></a><br>";
        }
    }
unset($i);
unset($list, $files);
?>


<?php require '../../footer.php'; ?>

	</body>
</html>
