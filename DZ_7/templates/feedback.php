<h2>Оставьте отзыв</h2>
<p class='text'><?= $message ?></p>
<form class ='f-feed' action="/feedback/<? if ($current_review): ?>save<? else: ?>add<? endif; ?>/" method="post">
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
