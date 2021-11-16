<h2>Корзина</h2>
<p class="summ">ИТОГО: <?=$summ?> $</p><!-- нет пока запроса-->
<div id='main' class='cart-list'>
    <?php if (!empty($basket)): ?>
        Оформите заказ:
        <form class='f-calc'action='/admin/add' method="post" ><!--должна получать телефон и имя-->
            <input type="text" name="name" placeholder="Имя">
            <input type="text" name="phone" placeholder="Телефон">
            <input type="submit"  class='buy' value="Оформить заказ">
        </form><br>
        <?php foreach ($basket as $item): ?>
            <div class='list-cart'>
                <form >
                    <input type="text" name="id" value="<?= $item['basket_id'] ?>" hidden>
                    <p class="text-cart"><?= $item['name'] ?></p>
                    <img  src="/img/<?=$item['image']?>">
                    <span class="cart-price">Цена:<?= $item['price'] ?>$</span>
                    <span><?= $item['description']?></span></p>
                    <button data-id="<?= $item['basket_id'] ?>" class='delete' >Удалить</button>
                </form>
            </div>
        <?php endforeach; ?>
        <br>
    <?php else: ?>
        <h2>Корзина пуста</h2>
    <?php endif; ?>
</div>


<script>
    let buttons = document.querySelectorAll('.delete');
    buttons.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            console.log(id);
            (
                async () => {
                    const response = await fetch('/basket/delete/?id=' + id);
                    const answer = await response.json();
                    document.getElementById('count').innerText = answer.count;
                    document.getElementById(id).remove();
                }
            )();
        });
    });
</script>