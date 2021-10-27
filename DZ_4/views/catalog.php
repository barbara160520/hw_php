<h2>Каталог</h2>
<div class="catalog">
	<ul class="catalog-menu">
		<? if (!empty($catalog)): ?>
			<?php foreach ($catalog as $item):?>
			    <li class="catalog-list">
			        <p class="text"><?=$item['name']?><span class="price">Цена: <?=$item['price']?>$</span></p>
			        	<a class='catalog-img' href="/?c=product&a=card&id=<?=$item['id']?>"> <img src="/img/<?=$item['image']?>"></a>
			        <button class="buy">Купить</button>
			    </li>
			<? endforeach;?>
			    <? else: ?>
        <p class="info">Товаров нет</p>
    <? endif; ?>
	</ul>
	<a class="also" href="/?c=product&a=catalog&page=<?=$page?>">Еще</a>
</div>

