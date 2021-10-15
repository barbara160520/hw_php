<!--
<?if (is_admin()):?>
<a href="/admin/">Заказы</a>
<a href="/users/">Пользователи</a>
<?endif;?>
<br>-->


<?if (!$auth) :?>

    <form method="post" action="/auth/login/">
        <input type='text' name='login' placeholder='Логин'>
        <input type='password' name='pass' placeholder='Пароль'>
        Save? <input type='checkbox' name='save'>
        <input class='buy' type='submit' name='send'>
    </form>

<? else: ?>
    Добро пожаловать! <?=$user?> <a class='buy' href="/auth/logout/">Выход</a><br>
<? endif; ?>
<br>
<div class="header">
	<ul>
    <? foreach ($menu as $item): ?>
        <?if ($item['name'] == 'Корзина'):?>
            <li><a class="menu" href="<?=$item['href']?>"><?=$item['name']?><span class="count"><?=$count?></span></a></li>
        <? else:?>
            <li><a class="menu" href="<?=$item['href']?>"><?=$item['name']?></a></li>
        <? endif;?>
    <? endforeach; ?>
	</ul>
</div>