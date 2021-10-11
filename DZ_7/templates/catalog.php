<?php
/*session_start();
$session = session_id();
$db = getDb();

if ($_GET['action'] == 'buy') {
    $id = (int)$_GET['id'];
    mysqli_query($db, "INSERT INTO `basket`(`session_id`, `goods_id`) VALUES ('{$session}','{$id}')");
    header("Location: /catalog");
    die();
}

$result = mysqli_query($db, "SELECT count(id) as count FROM `basket` WHERE `session_id` = '{$session}'");
$count = mysqli_fetch_assoc($result)['count'];

$catalog = mysqli_query($db, "SELECT * FROM `goods` WHERE 1");*/
?>
<h2>Каталог</h2>
<div class="catalog">
<p class='text'><?= $message ?></p>
	<ul class="catalog-menu">
<? if (!empty($goods)): ?>
    <? foreach ($goods as $item): ?>
        <li class="catalog-list">
         <p class="text"><?=$item['name']?>
           <span class="price">Цена: <?=$item['price']?>$</span></p>
           <a class='catalog-img' href="/oneprod/?id=<?=$item['id']?>"> <img src="/img/<?=$item['image']?>"></a>
            <a  class="buy" href="/catalog/buy/?id=<?= $item['id'] ?>">Купить</a>
        </li>
    <? endforeach; ?>
    <? else: ?>
        <p class="info">Товаров нет</p>
    <? endif; ?>
	</ul>
</div>