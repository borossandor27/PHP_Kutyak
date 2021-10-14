<?php
header('Content-Type: text/html; charset=utf-8'); 
$menu = filter_input(INPUT_GET, "menu", FILTER_SANITIZE_STRING);
?>
<!DOCTYPE html>
<html lang="hu"> <!-- a böngészőnek az alapértelemezett nyelvet -->
    <head>
        <meta charset="UTF-8"> <!-- a böngészőnek is megadjuk a kódolást -->
        <title>Kutyák</title>
        <link href="BootStrap/css/bootstrap.css" rel="stylesheet">
        <script src="BootStrap/js/bootstrap.bundle.js"></script>
        <link href="php_elso.css" rel="stylesheet" />
    </head>
    <body>
        <?php require_once 'menu.php'; ?>
        <div class="container">
            <?php
            switch ($menu) {
                case 'felvetel':
                    include_once './felvetel.php';
                    break;
                case 'modositas':
                    include_once './modositas.php';
                    break;
                default:
                    include_once './listazas.php';
                    break;
            }
            ?>
        </div> <!--          container vége-->
       
    </body>
</html>
