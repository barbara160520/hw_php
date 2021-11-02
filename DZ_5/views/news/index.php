<h2>Новости</h2>
<div class='block-news'>
<? if (!empty($news)): ?>
    <?php foreach ($news as $item):?>
       <p><a class='link-news' href="/?c=news&a=card&id=<?=$item['id']?>"><?=$item['title']?></a>
       &ensp;<a class='delete' href="/?c=news&a=delete&id=<?=$item['id']?>">[X]</a></p>
    <? endforeach;?>
    <? else: ?>
        <p class="info">Новостей нет</p>
    <? endif; ?>  
    <a class='also' href="/?c=news&a=news&page=<?=$page?>">Еще</a>
</div>
