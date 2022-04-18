<?php
$url = 'https://api-alkitab.herokuapp.com/v2/passage/list';
$json = file_get_contents($url);
$passage_list = json_decode($json);
$max_length = count($passage_list->passage_list);
// echo $max_length;
for($i = 0; $i < $max_length ; $i++){
    echo $passage_list->passage_list[$i]->book_name . '<br>';

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>