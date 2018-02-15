<?php
require('./class/Chess.php');

$chess = new Chess();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Chess</title>
	<link rel="stylesheet" href="public/css/style.css">
</head>
<body>
<h3>Chess</h3>
	<?php $chess->board->render(); ?>
</body>
</html>

