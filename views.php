<?php
// устанавливаем заголовки для возврата JSON
header('Content-Type: application/json');
// получаем URL документа из GET-параметров
$url = $_GET['url'];
// путь до файла счетчика просмотров (в этом примере в той же директории, что и views.php)
$counter_file = 'views-counter.txt';
// если файл существует, считываем число просмотров
if (file_exists($counter_file)) {
  $count = (int)file_get_contents($counter_file);
} else {
  $count = 0;
}
// увеличиваем счетчик просмотров для данного документа
$counts = json_decode(file_get_contents($counter_file . '.json'), true);
if (isset($counts[$url])) {
    $counts[$url]++;
} else {
    $counts[$url] = 1;
}
file_put_contents($counter_file . '.json', json_encode($counts, JSON_PRETTY_PRINT)); 
// возвращаем JSON с числом просмотров для данного документа
echo json_encode(array('views' => $counts[$url]));
?>
