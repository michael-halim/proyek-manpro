<?php

// tokenize bibleInfo from string
function tokenize($string)
{
    $kitab = strtok($string, ' ');
    $pasal = strtok($string, ':');
    $pasal = str_replace($kitab . ' ', '', $pasal);

    $ayatAwal = strtok($string, '-');
    $ayatAwal = str_replace($kitab . ' ' . $pasal . ':', '', $ayatAwal);

    $ayatAkhir = str_replace($kitab . ' ' . $pasal . ':' . $ayatAwal . '-', '', $string);
    if ($ayatAkhir == $string){
        $ayatAkhir = '';
    }
    return [$kitab, $pasal, $ayatAwal, $ayatAkhir];
}

$string = 'Lukas 10:21-31';
$bibleInfo = tokenize($string);

var_dump($bibleInfo);
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