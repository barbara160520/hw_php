<h2>Оставьте отзыв</h2>
<p id='message' class='text'><?= $message ?></p>
<div class ='f-feed'>
    <input id="name" type="text" class="input" value="<?= $name?>" placeholder='Ваше имя'>
    <input id="comment" type="text" class="input" value="<?=$text?>" placeholder='Ваш отзыв'>
    <input id="id" type="text" value="<?=$id?>" hidden>
    <button value="<?=$button?>"  id="add" class="buy">Добавить</button>
</div>
<div class="info-news">
    <? foreach ($reviews as $review): ?>
<div id='<?= $review['id'] ?>'>
        <p class="text"><b><?= $review["name"] ?>:</b> <?= $review["comment"] ?>
        <input type="text" value="<?= $review['id'] ?>" hidden>
        <!--
        <button data-id="<?= $review['id'] ?>" class='edit'">Редактировать</button>-->
        <button class = "delete" data-id="<?= $review['id'] ?>">Удалить</button>
   </div>
    <? endforeach; ?>

</div>

<script>
    let buttons = document.querySelectorAll('.buy');
    buttons.forEach((elem) => {
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



   /* let buttons3 = document.querySelectorAll('.edit');
    buttons3.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = = elem.getAttribute('data-id');
            let name = document.getElementsByName('name')[0].value;
            let comment = document.getElementsByName('comment')[0].value;
            console.log(name);
            console.log(comment);
            (
                async () => {
                    const response = await fetch('/feedback/add/?id=' + id+'&?name=' + name +'&?comment=' + comment);
                    const answer = await response.json();
                    //document.getElementById('count').innerText = answer.count;
                }
            )();
        });
    });*/
</script>