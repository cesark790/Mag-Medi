<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title><?= $titulo?></title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<?foreach ($estilos as $estilo ) {
		echo $estilo['estilos'];
	}?>
	<?foreach ($js as $java ) {
		echo $java['js'];
	}?>
</head>
<body>

