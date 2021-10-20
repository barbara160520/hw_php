<h2>Новости</h2>
<div class='block-news'>
    <?php foreach ($news as $item):?>
       <p><a class='link-news' href="/news/onenews/?id=<?=$item['id']?>"><?=$item['title']?></a>
       &ensp;<a class='delete' href="?api=likes&id=<?=$item['id']?>">Like</a>
       &ensp;<span class='text'><?=$item['likes']?></span>
       &ensp;<a class='delete' href="?api=delete&id=<?=$item['id']?>">[X]</a></p>
    <?php endforeach;?>
</div>