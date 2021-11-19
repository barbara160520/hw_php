<?php if ($isAuth): ?>
    Добро пожаловать <?= $username ?> <a class='bnt-bux' href="/auth/logout/">[Выход]</a>
<?php else: ?>
    <form action="/auth/login/" method="post">
        <input type="text" name="login" placeholder="Логин">
        <input type="password" name="pass" placeholder="Пароль">
        Save? <input type='checkbox' name='save'>
        <input type="submit" class='bnt-bux' name="submit" value="Войти">
    </form>
<?php endif; ?>
<br>
<div class="header">
	<ul>
    <li><a class="menu" href="/">Главная</a></li>
    <li><a class="menu" href="/product/catalog">Каталог</a></li>
    <li><a class="menu" href="/gallery">Галерея</a></li>
    <li><a class="menu" href="/news/news">Новости</a></li>
    <li><a class="menu" href="/feedback">Отзывы</a></li><!--посмотреть как была сделана корзина-->
    <li><a class="menu" href="/basket">Корзина <span id="count"><?=$count?></span> </a></li>
    <?php if ($isAdmin): ?>
    <li><a class="menu" href="/admin">Заказы <span id="cnt_order"><?=$cnt_order?></span></a></li>
    <li><a class="menu" href="/users">Пользователи</a></li>
    <?php endif; ?>
</ul>
</div>
