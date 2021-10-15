<h2>Каталог</h2>
<div class="catalog">
<p class='text'><?= $message ?></p>
	<ul class="catalog-menu">
<? if (!empty($goods)): ?>
    <? foreach ($goods as $value): ?>
        <li class="catalog-list">
       
         <p class="text"><?=$value['name']?>
           <span class="price">Цена: <?=$value['price']?>$</span></p>
           <a class='catalog-img' href="/catalog/oneprod/?id=<?=$value['id']?>"><img src="/img/<?=$value['image']?>"></a>
          <!-- <button class="like" data-id="<?=$value["id"]?>">like</button>-->
         <p class='like'><span class='text' id="like<?=$value["id"]?>"><?=$value["likes"]?></span>
         <a  class="delete" href="/catalog/like/?id=<?= $value['id'] ?>">like</a></p>
           <!-- <button class="buy" data-id="<?=$value["id"]?>">Купить</button><hr>
    --><a  class="delete" href="/catalog/buy/?id=<?= $value['id'] ?>">Купить</a>
        </li>
    <? endforeach; ?>
    <? else: ?>
        <p class="info">Товаров нет</p>
    <? endif; ?>
	</ul>
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
