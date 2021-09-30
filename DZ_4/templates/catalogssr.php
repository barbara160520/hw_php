<h2>Каталог</h2>

<div class="catalog">
	<ul class="catalog-menu">
    <? foreach ($catalog as $item): ?>
        <li class="catalog-list">
         <p class="text"><?=$item['name']?>
           <span class="price">Цена: <?=$item['price']?>$</span></p>
            <img src="/img/<?=$item['image']?>">
            <button class="buy">Купить</button>
        </li>
    <? endforeach; ?>
	</ul>
</div>