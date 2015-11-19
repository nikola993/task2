<?php
        require_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Task Two</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="public/css/style.css" rel="stylesheet" type="text/css" media="screen" />
        <script src="public/js/jquery.js" type="text/javascript"></script>
        <script src="public/js/custom.js" type="text/javascript"></script>
    </head>
    <body>
        <div>
            <?php
            Kalendar::getInstance();
            ?>
        </div>
    </body>
</html>
