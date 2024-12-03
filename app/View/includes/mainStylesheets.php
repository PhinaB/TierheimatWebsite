<?php
    $page = "page/";
    $baseDir = str_contains($_SERVER['PHP_SELF'], '/'.$page) ? '../../../' : '';
?>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="<?php echo $baseDir; ?>public/css/menu.css" media="all"/>
<link rel="stylesheet" href="<?php echo $baseDir; ?>public/css/main.css" media="all"/>
<link rel="stylesheet" href="<?php echo $baseDir; ?>public/css/footer.css" media="all"/>

<link rel="stylesheet" href="<?php echo $baseDir; ?>fontawesome-6.5.2/css/all.min.css" >


<title>Tierheimat</title>
<style>
    .onlySmallMenu {
        display: none;
    }

    @media only screen and (max-width: 900px) {
        .onlySmallMenu {
            display: inline;
        }
    }
</style>