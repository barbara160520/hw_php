<h2>Все заказы</h2>
<div class="info-news">
    <? foreach ($orders as $order): ?>
        <div id="<?= $order['id'] ?>">
        <input type="text" name="id" value="<?= $order['id'] ?>" hidden>
        <p class="text"><b><?= $order["name"] ?>:</b> <?= $order["phone"] ?>
                <a class = "bnt" href="/admin/order/?id=<?= $order['id'] ?>"><sup>[детали заказа]</sup></a>
     <a class = "delete" data-id="<?= $order['id'] ?>">Удалить</a>  
     </div>
    <? endforeach; ?>
</div>

<script>
    let buttons = document.querySelectorAll('.delete');
    buttons.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            console.log(id);
            (
                async () => {
                    const response = await fetch('/admin/delete/?id=' + id);
                    const answer = await response.json();
                    document.getElementById('cnt_order').innerText = answer.cnt_order;
                    document.getElementById(id).remove();
                }
            )();
        });
    });
    
</script>