<h2>Каталог</h2>
<div class="catalog">
	<ul class="catalog-menu">
<?php foreach ($catalog as $item): ?>
    <li class="catalog-list">
    <input type="text" name="id" value="<?= $item['id'] ?>" hidden>
            <p class="text"><?=$item['name']?><span class="price">Цена: <?=$item['price']?>$</span></p>
			<a class='catalog-img' href="/product/card/?id=<?= $item['id'] ?>">
            <img src="/img/<?=$item['image']?>"></a>
            <button data-id="<?= $item['id'] ?>" class="buy">Купить</button>

</li>
<?php endforeach; ?>
</ul>
<a class="also" href="/product/catalog/?page=<?= $page ?>">Еще</a>
</div>

<script>
    let buttons = document.querySelectorAll('.buy');
    buttons.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            console.log(id);
            (
                async () => {
                    const response = await fetch('/basket/add/?id=' + id);
                    const answer = await response.json();
                    document.getElementById('count').innerText = answer.count;
                }
            )();
        });
    });
</script>