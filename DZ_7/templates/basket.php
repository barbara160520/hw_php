<?php
/*session_start();
$db = getDb();
$session = session_id();

$basket = mysqli_query($db, "SELECT * FROM basket, goods WHERE basket.goods_id = goods.id AND session_id = '{$session}'");

$result = mysqli_query($db, "SELECT count(id) as count FROM `basket` WHERE `session_id` = '{$session}'");
$count = mysqli_fetch_assoc($result)['count'];

$result2 = mysqli_query($db, "SELECT SUM(goods.price) as summ FROM basket, goods WHERE basket.goods_id=goods.id AND session_id = '{$session}'");
$summ = mysqli_fetch_assoc($result2)['summ'];*/
?>
<h2>Корзина</h2>

<p class="summ">ИТОГО: <?=$summ?> $
<span><?=$message?></span></p>
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
    <? else: ?>
        <p class="info">Товаров нет</p>
    <? endif; ?>
    
</div>  

