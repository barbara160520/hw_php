<h2>Все заказы</h2>
<div class="info-news">
    <? foreach ($orders as $order): ?>
        <p class="text"><b><?= $order["name"] ?>:</b> <?= $order["phone"] ?>
                <a class = "bnt" href="/?c=admin&a=order&id=<?= $order['id'] ?>"><sup>[детали заказа]</sup></a>
     <a class = "bnt" href="/admin/delete/?id=<?= $order['id'] ?>"><sup>[удалить]</sup></a>  
    <? endforeach; ?>
</div>