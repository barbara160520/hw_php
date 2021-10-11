<div class="catalog-menu">
<div class='catalog-list'>
	<h2><?=$goods['name']?></h2>
    <img src="/img/<?=$goods['image']?>">
   <span class="price">Цена:<?=$goods['price']?>$</span>
   <p class="text"><?=$goods['description']?></p>
   <a  class="buy" href="/oneprod/buy/?id=<?= $goods['id'] ?>">Купить</a>
</div>
</div>
<hr>
<!--привязать к товару по id-->
<div class='info-news'>
    <p>Добавить отзыв:</p>
    <p class='text'><?= $message ?></p>
    <form action="/oneprod/<? if ($current_review): ?>save<? else: ?>add<? endif; ?>/?id=<?= (int)$_GET['id'] ?>"
        method="post" class="f-feed">
        <input name="name" type="text" class="input" value="<?= $current_review["name"] ?>">
        <input name="comment" type="text" class="input" value="<?= $current_review["comment"] ?>">
        <input name="id" type="text" hidden value="<?= $current_review["id"] ?>">
        <input type="submit" value="<? if ($current_review): ?>Редактировать<? else: ?>Добавить<? endif; ?>" name="load"
            class="delete">
    </form>
    <div class="info-news">
        <? foreach ($reviews as $review): ?>
            <p class="text"><b><?= $review["name"] ?>:</b> <?= $review["comment"] ?>
                    <a class = "bnt" href="/feedback/edit/?id=<?= $review['id'] ?>"><sup>[редактировать]</sup></a>
                    <a class = "bnt" href="/feedback/delete/?id=<?= $review['id'] ?>"><sup>[удалить]</sup></a>  
        <? endforeach; ?>
    </div>
</div>