
<div class="catalog-menu">
<div class='catalog-list'>
	<h2><?=$catalog['name']?></h2>
    <img src="/img/<?=$catalog['image']?>">
   <h2><span class="price">Цена:<?=$catalog['price']?>$</span></h2>
    <button class="buy">Купить</button>
</div>
</div>
<hr>
<!--привязать к товару по id-->
<div class='info-news'>
    <?php foreach ($feedbacks as $feedback):?>
    	<p class="text"><b><?=$feedback['name']?> :</b> <?=$feedback['feedback']?>&ensp;<a class="delete" href="?api=delete&id=<?=$feedback['id']?>">[X]</a></p>
                <!--<a href="?api=edit&id=<?=$feedback['id']?>">[edit]</a>-->
    <?php endforeach;?>
</div>