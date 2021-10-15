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
<div class='info-news'>
    <p>Добавить отзыв:</p>
    <p class='text'><?= $message ?></p>
    <form action="/oneprod/<?=$action?>/?id=<?= (int)$_GET['id'] ?>"
        method="post" class="f-calc">
    <input name="name" type="text" class="input" value="<?= $name?>" placeholder='Ваше имя'>
    <input name="comment" type="text" class="input" value="<?=$text?>" placeholder='Ваш отзыв'>
        <input name="id" type="text" hidden value="<?=$id_feed?>">
        <input type="submit" value="<?=$button?>" name="load"
            class="delete">
    </form>
    <div class="info-news">
        <? foreach ($reviews as $review): ?>
            <p class="text"><b><?= $review["name"] ?>:</b> <?= $review["comment"] ?>
                    <a class = "bnt" href="/oneprod/edit/?id=<?= $review['id'] ?>"><sup>[редактировать]</sup></a>
                    <a class = "bnt" href="/oneprod/delete/?id=<?= $review['id'] ?>"><sup>[удалить]</sup></a>  
        <? endforeach; ?>
    </div>
</div>

<script>
    let buttonsBuy = document.querySelectorAll('.buy');
    buttonsBuy.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            (async () => {
                const response = await fetch('/api/buy/?id=' + id);
                console.log(response.json());
                const answer = await response.json();
                
                document.getElementById('count').innerText = answer.count;

            })();

        })
    })

    let buttonslike = document.querySelectorAll('.like');
    buttonslike.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            (async () => {
                const response = await fetch('/api/addlike/?id=' + id);
                const answer = await response.json();
                document.getElementById('like' + id).innerText = answer.likes;
                console.log(answer.likes);

            })();

        })
    })
</script>