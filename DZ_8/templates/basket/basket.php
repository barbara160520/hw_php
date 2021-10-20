<h2>Корзина</h2>
<span class='text'><?=$message?></span>
<p class="summ">ИТОГО: <?=$summ?> $</p>
<div id='main' class='cart-list'>
    <? if (!empty($basket)): ?>
        Оформите заказ:
    <form class='f-calc' action="/basket/order" method="post">
        <input type="text" name="name" placeholder="Имя">
        <input type="text" name="phone" placeholder="Телефон">
        <input class='delete' type="submit" value="Оформить заказ">
    </form>
        <?php foreach ($basket as $value): ?>
            <div class='list-cart'>
            <p class="text-cart"><?=$value['name']?>
            <img  src="/img/<?=$value['image']?>">
            <span class="cart-price">Цена:<?=$value['price']?> $</span></p>
          <!--  <button class="delete" data-id="<?=$value['id']?>">[X]</button>-->
            <a class='delete' href="/basket/delete/?id=<?=$value['id']?>">[X]</a>
            </div>
        <? endforeach; ?>
    <? else: ?>
        <h2>Товаров нет</h2>
    <? endif; ?>
</div>  
<script>
    let buttonsBuy = document.querySelectorAll('.delete');
    buttonsBuy.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            (async () => {
                const response = await fetch('/api/delete/?id=' + id);
                const answer = await response.json();
                document.getElementById('item'+id).remove();
                document.getElementById('count').innerText = answer.count;
                document.getElementById('summ').innerText = answer.summ;

            })();

        })
    })
</script>
