<?php

use function root\src\Views\getHeads;
use function root\src\Views\renderNode;

include_once('./src/Views/tab/scripts/tab.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User List</title>
    <link rel="stylesheet" href="./../../../src/Views/tab/styles/tab.css">
</head>
<body>
    <h1>Tabs</h1>
    <div id='tree'>
        <?php
        $heads = getHeads($tabs);
        foreach($heads as $head) renderNode($head, $tabs);
        ?>
    </div>
    <p id='message'><?php echo $message?></p>
    <script type="text/javascript" src="./../../../src/Views/tab/scripts/tab.js"></script>
</body>
</html>