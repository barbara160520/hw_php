<? if (!empty($image)): ?>
    <?php foreach ($image as $item):?>
    <a rel='gallery' class='photo' href="/?c=gallery&a=imagecard&id=<?=$item['id']?>">
        <img class='gallery_img' src="/gallery_img/small/<?=$item['name']?>">
        <h2><?=$item['likes']?></h2></a>            
        <?php endforeach;?>
<? else: ?>
    <p class="h2">Галерея пуста</p>
<? endif; ?>
<form class='f-gall' method="post" enctype="multipart/form-data" action="gallery">
    <input class='bnt-file' type="file" name="myfile">
	<input class='bnt-gall' type="submit" name='load' value="Загрузить">
</form>