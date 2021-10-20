<div class='block-news'>
    <h2><?=$orders['name']?></h2>
    <p class='text'><?=$orders['phone']?></p>
    <p class="summ">ИТОГО: <?=$summ?> $
    <div id='main' class='cart-list'>
        <? if (!empty($basket)): ?>
        <?php foreach ($basket as $item): ?>
        <div class='list-cart'>
            <p class="text-cart"><?=$item['name']?>
                <img src="/img/<?=$item['image']?>">
                <span class="cart-price">Цена:<?=$item['price']?> $</span>
            </p>
        </div>
        <? endforeach; ?>
        <? else: ?>
        <h2>Товаров нет</h2>
        <? endif; ?>
    </div>
</div>
