<?php

$dbh = new PDO('mysql:host=localhost;dbname=slim', "root", "acer");

$perPage= 3;

// get page
$page = isset($_GET['page'])? (int)$_GET['page']:1;

// start page
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0 ;

// get users limit
$getLimit = $dbh->query("select * from users LIMIT $start, $perPage");


// get All
$getAll = $dbh->query('select * from users');
$totalRows = $getAll->rowCount();

// ceil value
$pages = ceil($totalRows/$perPage);
// print_r($pages);

?>

<?php
    while ($resultLimit = $getLimit->fetch()) {
        echo $resultLimit['email']."<br>";
    }
?>


<div class="">
    <?php
        for ($i=1; $i <=$pages ; $i++) {
            ?>
                <a href="?page=<?= $i?>"><?= $i?></a>
            <?php
        }
    ?>
</div>
