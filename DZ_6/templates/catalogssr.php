<h2>Каталог</h2>

<div class="catalog">
	<ul class="catalog-menu">
    <? foreach ($catalog as $item): ?>
        <li class="catalog-list">
         <p class="text"><?=$item['name']?>
           <span class="price">Цена: <?=$item['price']?>$</span></p>
           <a class='catalog-img' href="/oneprod/?id=<?=$item['id']?>"> <img src="/img/<?=$item['image']?>"></a>
            <button class="buy">Купить</button>
        </li>
    <? endforeach; ?>
	</ul>
</div>