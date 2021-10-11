<div id='main' class='gallery'>
    <? if (!empty($image)): ?>
        <?php foreach ($image as $item):?>
        <a rel='gallery' class='photo' href="/oneimage/?id=<?=$item['id']?>">
            <img class='gallery_img' src="/gallery_img/small/<?=$item['name']?>">
            <h2><?=$item['likes']?></h2></a>
            <!--<a href="?api=delete&id=<?=$item['id']?>">[X]</a>-->
            
            <?php endforeach;?>
    <? else: ?>
        <p class="h2">Галерея пуста</p>
    <? endif; ?>
</div>
<form class='f-gall' method="post" enctype="multipart/form-data" action="gallery.php">
    <input class='bnt-file' type="file" name="myfile">
	<input class='bnt-gall' type="submit" name='load' value="Загрузить">
</form>