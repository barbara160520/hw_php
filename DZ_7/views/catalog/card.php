<h2>Товар</h2>
<div class="catalog-menu">
    <div class='catalog-list'>
        <input type="text" name="id" value="<?= $product->id ?>" hidden>  
        <p class='text'><?=$product->name?></p>
        <img src="/img/<?=$product->image?>">
        <span class="price">Цена: <?=$product->price?></span>
        <p class="text"><?=$product->description?></p>
        <button data-id="<?= $product->id?>" class="buy">Купить</button>
    </div>
</div>
<hr>
<div class='info-news'>
    <p>Добавить отзыв:</p>
    <p class='text'><?= $message ?></p>
    <form action="/feedback/add" method="post" class="f-calc">
        <input name="name" type="text" class="input" value="<?= $name?>" placeholder='Ваше имя'>
        <input name="comment" type="text" class="input" value="<?=$text?>" placeholder='Ваш отзыв'>
        <input type="text" name="id" value="<?= $product->id ?>" hidden> 
        <input type="submit" value="Добавить" name="load" class="buy">
    </form>
    <div class="info-news">
        <? foreach ($reviews as $review): ?>
            <p class="text"><b><?= $review["name"] ?>:</b> <?= $review["comment"] ?>
                  <!--  <a class = "bnt" href="/feedback/edit/?id=<?= $review['id'] ?>"><sup>[редактировать]</sup></a>-->
                    <button class = "delete" data-id="<?= $review['id'] ?>">Удалить</button>  
        <? endforeach; ?>
    </div>
</div>

<script>
    let buttons = document.querySelectorAll('.buy');
    buttons.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            (
                async () => {
                    const response = await fetch('/basket/add/?id=' + id);
                    const answer = await response.json();
                    document.getElementById('count').innerText = answer.count;
                }
            )();
        });
    });

    let buttons2 = document.querySelectorAll('.delete');
    buttons2.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            console.log(id);
            (
                async () => {
                    const response = await fetch('/feedback/delete/?id=' + id);
                    const answer = await response.json();
                    //ассинхронно не удаляеться, только если перезагрузить страницу
                    document.getElementById(id).remove();
                }
            )();
        });
    });
</script>