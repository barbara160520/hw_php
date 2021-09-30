<div id='main' class='gallery'>
    <?php foreach ($image as $item):?>
    <a rel='gallery' class='photo' href="/oneimage/?id=<?=$item['id']?>">
        <img class='gallery_img' src="<?=$item['path_small']?><?=$item['name']?>"></a>
        <!--<a href="?api=delete&id=<?=$item['id']?>">[X]</a>-->
        <h2><?=$item['likes']?></h2>
        <?php endforeach;?>
</div>