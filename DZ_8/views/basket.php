<h2>Корзина</h2>
<p  class="summ">ИТОГО: <span id='summ'><?=$summ?></span> $</p>
<div id='main' class='cart-list'>
    <?php if (!empty($basket)): ?>
        Оформите заказ:
        <p  id='message' class='text-cart'><?= $message ?></p>
        <div class='f-calc'>
            <input type="text" id="name" placeholder="Имя">
            <input type="text" id="phone" placeholder="Телефон">
            <button  class='buy' >Оформить заказ</button>
        </div><br>
        <?php foreach ($basket as $item): ?>
            <div id="<?= $item['basket_id'] ?>" class='list-cart'>

                    <input type="text" name="id" value="<?= $item['basket_id'] ?>" hidden>
                    <p class="text-cart"><?= $item['name'] ?></p>
                    <img  src="/img/<?=$item['image']?>">
                    <span class="cart-price">Цена:<?= $item['price'] ?>$</span>
                    <span><?= $item['description']?></span></p>
                    <button data-id="<?= $item['basket_id'] ?>" class='delete' >Удалить</button>

            </div>
        <?php endforeach; ?>
        <br>
    <?php else: ?>
        <h2>Корзина пуста</h2>
    <?php endif; ?>
</div>


<script>
    let buttons1 = document.querySelectorAll('.buy');
    buttons1.forEach((elem) => {
        elem.addEventListener('click', () => {
                let name = document.getElementById('name').value;
                let phone = document.getElementById('phone').value;
            console.log(name);
            console.log(phone);
            (
                async () => {
                    const response = await fetch('/admin/add',{
                    method: 'POST',
                    headers: new Headers({
                        'Content-Type': 'application/json'
                    }),
                    body: JSON.stringify({
                        name: name,
                        phone: phone
                    }),
                });
                const answer = await response.json();
                document.getElementById('message').innerText = answer.message;
                document.getElementById('name').value = '';
                document.getElementById('phone').value = '';
                }
            )();
        });
    });

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
                    document.getElementById('summ').innerText = answer.summ;
                }
            )();
        });
    });
</script>