<h2>Пользователи</h2>
<div id='main'>       
<? foreach ($users as $user): ?>
    <div>
       <span class='summ'> <?= $user['login'] ?> </span>
        <? if ($user['role'] == 0): ?>
            <button class='bnt-bux toggleAdmin' data-id="<?= $user["id"] ?>"><span id="text<?= $user["id"] ?>">Назначить админа</span></button>
        <? else: ?>
           <? if ($user['role'] == 1 and $user['login'] == 'admin') :?>
            <button hidden class='bnt-bux toggleAdmin' data-id="<?= $user["id"] ?>"><span id="text<?= $user["id"] ?>">Снять админа</span></button>
            <?else:?>
            <button class='bnt-bux toggleAdmin' data-id="<?= $user["id"] ?>"><span id="text<?= $user["id"] ?>">Снять админа</span></button>
            <? endif; ?>
        <? endif; ?>
    </div><br>
<? endforeach; ?>
</div>

<script>
    let buttonsBuy = document.querySelectorAll('.toggleAdmin');
    buttonsBuy.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            console.log(id);
            (async () => {
                const response = await fetch('/users/toggleAdmin/?id=' + id);
                const answer = await response.json();
                document.getElementById('text' + id).innerText = answer.text;
            })();
        })
    })
</script>