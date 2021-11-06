<h2>Оставьте отзыв</h2>
<p class='text'><?= $message ?></p>
<form class ='f-feed' action="/feedback/add/" method="post">
    <input name="name" type="text" class="input" value="<?= $name?>" placeholder='Ваше имя'>
    <input name="comment" type="text" class="input" value="<?=$text?>" placeholder='Ваш отзыв'>
    <input name="id" type="text" hidden value="<?=$id?>">
    <input type="submit" value="<?=$button?>" name="load" class="delete">
</form>
<div class="info-news">
    <? foreach ($reviews as $review): ?>
        <p class="text"><b><?= $review["name"] ?>:</b> <?= $review["comment"] ?>
                <a class = "bnt" href="/feedback/edit/?id=<?= $review['id'] ?>"><sup>[редактировать]</sup></a>
                <a class = "bnt" href="/feedback/delete/?id=<?= $review['id'] ?>"><sup>[удалить]</sup></a>  
    <? endforeach; ?>
    <a class='also' href="/feedback/feedback/?page=<?=$page?>">Еще</a>
</div>
