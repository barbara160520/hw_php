<div class="post_title">
<h2>Моя галерея</h2>
<?=$message?>
</div>
<div class="gallery">
	<? foreach ($gallery as $item): ?>
	<a rel="gallery" class="photo" href="<?=IMG_BIG . $item?>">
	<img src="<?=IMG_SMALL . $item?>" width="150" height="100" /></a>
	<? endforeach ;?>

	<? foreach ($images as $item):?>
	<a rel="gallery" class="photo" href="<?=IMG_NEW . $item?>">
	<img src="<?=IMG_NEW . $item?>" width="150" height="100" /></a>
	<? endforeach;?>

	<form method="post" enctype="multipart/form-data" action="index.php">
	<input type="file" name="myfile">
	<input type="submit" value="Загрузить">
	</form>

</div>