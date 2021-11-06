<h2>Корзина</h2>
<span class='text'><?=$message?></span>
<p class="summ">ИТОГО: <?=$summ?> $</p>
<div id='main' class='cart-list'>
    <?php if (!empty($basket)): ?>
        Оформите заказ:
        <form class='f-calc' action="/admin/add" method="post">
            <input type="text" name="name" placeholder="Имя">
            <input type="text" name="phone" placeholder="Телефон">
            <input type="submit" class='delete' value="Оформить заказ">
        </form><br>
        <?php foreach ($basket as $item): ?>
            <div class='list-cart'>
                <form action="/basket/delete/" method="post">
                    <input type="text" name="id" value="<?= $item['basket_id'] ?>" hidden>
                    <p class="text-cart"><?= $item['name'] ?></p>
                    <img  src="/img/<?=$item['image']?>">
                    <span class="cart-price">Цена:<?= $item['price'] ?>$</span>
                    <span><?= $item['description']?></span></p>
                    <button class='delete' type="submit">Удалить</button>
                </form>
            </div>
        <?php endforeach; ?>
        <br>
    <?php else: ?>
        <h2>Корзина пуста</h2>
    <?php endif; ?>
</div>