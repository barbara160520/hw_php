<h2>Корзина</h2>
<p class="summ">ИТОГО: <?=$summ?> $</p>
<div id='main' class='cart-list'>
    <? if (!empty($basket)): ?>
        <?php foreach ($basket as $value): ?>
            <div class='list-cart'>
            <p class="text-cart"><?=$value['name']?>
            <img  src="/img/<?=$value['image']?>">
            <span class="cart-price">Цена:<?=$value['price']?> $</span></p>
                <a class='delete' href="/basket/delete/?id=<?=$value['id']?>">[X]</a>
            </div>
        <? endforeach; ?>
        <br>
    <!--Оформите заказ:
    <form action="/basket/order" method="post">
        <input type="text" name="name" placeholder="Имя">
        <input type="text" name="phone" placeholder="Телефон">
        <input type="submit" value="Оформить заказ">
    </form>-->
    <? else: ?>
        <h2>Товаров нет</h2>
    <? endif; ?>
</div>  
