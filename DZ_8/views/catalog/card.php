<h2>Товар</h2>
<div class="catalog-menu">
    <div class='catalog-list'>
        <input type="text" name="id" value="<?=$product->id ?>" hidden>
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
<p id='message' class='text'><?= $message ?></p>
<div class ='f-calc'>
    <input id="name" type="text" class="input" value="<?= $name?>" placeholder='Ваше имя'>
    <input id="comment" type="text" class="input" value="<?=$text?>" placeholder='Ваш отзыв'>
    <input id="id" type="text" value="<?=$product->id ?>" hidden>
    <button value="<?=$button?>"  id="add" class="bnt-bux">Добавить</button>
</div>

    <div class="info-news">
        <? foreach ($reviews as $review): ?>
            <div id='<?= $review['id']?>'>
            <p class="text"><b><?= $review["name"] ?>:</b> <?= $review["comment"] ?>
                  <!--  <a class = "bnt" href="/feedback/edit/?id=<?= $review['id'] ?>"><sup>[редактировать]</sup></a>-->
                    <button class = "delete" data-id="<?= $review['id'] ?>">Удалить</button>
            </div>
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

    let buttons1 = document.querySelectorAll('.bnt-bux');
    buttons1.forEach((elem) => {
        elem.addEventListener('click', () => {
                let name = document.getElementById('name').value;
                let comment = document.getElementById('comment').value;
                let id = document.getElementById('id').value;
            console.log(name);
            console.log(comment);
            console.log(id);
            (
                async () => {
                    const response = await fetch('/feedback/add',{
                    method: 'POST',
                    headers: new Headers({
                        'Content-Type': 'application/json'
                    }),
                    body: JSON.stringify({
                        name: name,
                        comment: comment,
                        id: id
                    }),
                });
                const answer = await response.json();
                document.getElementById('message').innerText = answer.message;
                document.getElementById('name').value = '';
                document.getElementById('comment').value = '';
                }
            )();
        });
    });

    let buttons2 = document.querySelectorAll('.delete');
    buttons2.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            (
                async () => {
                    const response = await fetch('/feedback/delete/?id=' + id);
                    const answer = await response.json();
                    document.getElementById('message').innerText = answer.message;
                    document.getElementById(id).remove();
                }
            )();
        });
    });
</script>