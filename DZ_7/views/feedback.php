<h2>Оставьте отзыв</h2>
<p class='text'><?= $message ?></p>
<form class ='f-feed' action="/feedback/add" method="post">
    <input name="name" type="text" class="input" value="<?= $name?>" placeholder='Ваше имя'>
    <input name="comment" type="text" class="input" value="<?=$text?>" placeholder='Ваш отзыв'>
    <input name="id" type="text" value="<?=$id?>" hidden>
    <input type="submit" value="<?=$button?>" name="load" class="buy">
</form>

<div class="info-news">
    <? foreach ($reviews as $review): ?>
        <p class="text"><b><?= $review["name"] ?>:</b> <?= $review["comment"] ?>
        <input type="text" name="id" value="<?= $review['id'] ?>" hidden>
        <!--сделать метод для редактирования 
        <button data-id="<?= $review['id'] ?>" class='edit'">Редактировать</button>-->
        <button class = "delete" data-id="<?= $review['id'] ?>">Удалить</button>  
    <? endforeach; ?>
    <a class='also' href="/feedback/?page=<?=$page?>">Еще</a>
</div>

<script>

    let buttons2 = document.querySelectorAll('.delete');
    buttons2.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
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