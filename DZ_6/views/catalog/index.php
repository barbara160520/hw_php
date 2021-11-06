<h2>Каталог</h2>
<div class="catalog">
	<ul class="catalog-menu">
<?php foreach ($catalog as $item): ?>
    <li class="catalog-list">
        <form action="/basket/add/" method="post">
            <input type="text" name="id" value="<?= $item['id'] ?>" hidden>
            <p class="text"><?=$item['name']?><span class="price">Цена: <?=$item['price']?>$</span></p>
			<a class='catalog-img' href="/product/card/?id=<?= $item['id'] ?>">
            <img src="/img/<?=$item['image']?>"></a>
            <button class='buy' type="submit">Купить</button>
        </form>
    </li>
<?php endforeach; ?>
</ul>
<a class="also" href="/product/catalog/?page=<?= $page ?>">Еще</a>
</div>