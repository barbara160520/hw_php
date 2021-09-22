<!--<a class="menu" href="/">Главная</a>
<a class="menu" href="/?page=catalogspa">Каталог spa</a>
<a class="menu" href="/?page=catalogssr">Каталог ssr</a>
<a class="menu" href="/?page=about">О нас</a><br>-->

<div class="header">
	<ul>
    <? foreach ($menu as $item): ?>
       <li><a class="menu" href="<?=$item['href']?>"><?=$item['name']?></a></li>
    <? endforeach; ?>
	</ul>
</div>
