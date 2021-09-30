<h2>Новости</h2>
<div class='block-news'>
    <?php foreach ($news as $item):?>
        <a class='link-news' href="/onenews/?id=<?=$item['id']?>">
        <?=$item['title']?></a>
    <?php endforeach;?>
</div>