<? if ($auth): ?>
    Добро пожаловать <?= $name ?>, <a href="/logout">[Выход]</a>
<? else: ?>
    <form action="/login" method="post">
        <input type="text" name="login">
        <input type="text" name="pass">
        Save? <input type='checkbox' name='save'>
        <input type="submit">
    </form>
<? endif; ?>
<br>
<div class="header">
	<ul>
    <? foreach ($menu as $item): ?>
        <? if ($item['name'] == 'Корзина'):?>
            <li><a class="menu" href="<?=$item['href']?>"><?=$item['name']?><span class="count"><?=$count?></span></a></li>
        <? else:?>
            <li><a class="menu" href="<?=$item['href']?>"><?=$item['name']?></a></li>
        <? endif;?>
    <? endforeach; ?>
	</ul>
</div>