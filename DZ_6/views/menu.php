<?php if ($isAuth): ?>
    Добро пожаловать <?= $username ?> <a class='buy' href="/auth/logout/">[Выход]</a>
<?php else: ?>
    <form action="/auth/login/" method="post">
        <input type="text" name="login" placeholder="Логин">
        <input type="text" name="pass" placeholder="Пароль">
        <input type="submit" class='buy' name="submit" value="Войти">
    </form>
<?php endif; ?>
<br>
<div class="header">
	<ul>
    <li><a class="menu" href="/">Главная</a></li>
    <li><a class="menu" href="/product/catalog">Каталог</a></li>
    <li><a class="menu" href="/gallery">Галерея</a></li>
    <li><a class="menu" href="/news/news">Новости</a></li>
    <li><a class="menu" href="/feedback/feedback">Отзывы</a></li>
    <li><a class="menu" href="/basket">Корзина <span><?=$count?></span> </a></li>
    <?php if ($isAdmin): ?>
    <li><a class="menu" href="/admin">Заказы</a></li>
    <li><a class="menu" href="/users">Пользователи</a></li>
    <?php endif; ?>
</ul>
</div>
<!--<div class="header">
	<ul>
    <? foreach ($menu as $item): ?>
            <li><a class="menu" href="<?=$item['href']?>"><?=$item['name']?></a></li>
    <? endforeach; ?>
	</ul>
</div>-->