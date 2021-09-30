<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?=$title?></title>
    <link rel="stylesheet" href="/css/style.css?<?=rand(1,22323)?>">
    <script type="text/javascript" src="./scripts/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="./scripts/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="./scripts/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="./scripts/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<script type="text/javascript">
	$(document).ready(function(){
		$("a.photo").fancybox({
			transitionIn: 'elastic',
			transitionOut: 'elastic',
			speedIn: 500,
			speedOut: 500,
			hideOnOverlayClick: false,
			titlePosition: 'over'
		});	}); </script>
</head>
<body>
<?=$menu?>
<div class="post_title">
<h2>Моя галерея</h2>
<?=$message?>
</div>
<div id='main' class="gallery">
<?=$content?>
</div>
<form class='f-gall' method="post" enctype="multipart/form-data" action="gallery.php">
	<input class='bnt-file' type="file" name="myfile">
	<input class='bnt-gall' type="submit" name='load' value="Загрузить">
</form>
</body>
</html>