<!--<a href="/">Главная</a>
<a href="/catalogspa">Каталог spa</a>
<a href="/catalogssr">Каталог ssr</a>
<a href="/about">О нас</a>
<a href="/bux">Бухгалтерия</a>
<a href="/news">Новости</a>
<a href="/feedback">Отзывы</a><br>-->
<div class="header">
	<ul>
    <? foreach ($menu as $item): ?>
       <li><a class="menu" href="<?=$item['href']?>"><?=$item['name']?></a></li>
    <? endforeach; ?>
	</ul>
</div>