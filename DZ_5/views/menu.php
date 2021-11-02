
<?if (!$auth) :?>

    <form method="post" action="/?c=auth&a=login">
        <input type='text' name='login' placeholder='Логин'>
        <input type='password' name='pass' placeholder='Пароль'>
        Save? <input type='checkbox' name='save'>
        <input class='buy' type='submit' name='send'>
    </form>

<? else: ?>
    Добро пожаловать! <?=$user?> <a class='buy' href="/?c=auth&a=logout/">Выход</a><br>
<? endif; ?>
<br>
<div class="header">
	<ul>
    <li><a class="menu" href="/">Главная</a></li>
    <li><a class="menu" href="/?c=product&a=catalog">Каталог</a></li>
    <li><a class="menu" href="/?c=gallery&a=gallery">Галерея</a></li>
    <li><a class="menu" href="/?c=news&a=news">Новости</a></li>
    <li><a class="menu" href="/?c=feedback&a=feedback">Отзывы</a></li>
    <li><a class="menu" href="/?c=basket&a=basket">Корзина</a></li>
    <li><a class="menu" href="/?c=admin&a=admin">Заказы</a></li>
    <li><a class="menu" href="/?c=users&a=users">Пользователи</a></li>
</ul>
</div>

<!--<div class="header">
	<ul>
    <? foreach ($menu as $item): ?>
            <li><a class="menu" href="<?=$item['href']?>"><?=$item['name']?></a></li>
    <? endforeach; ?>
	</ul>
</div>-->