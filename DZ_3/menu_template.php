<!--<ul>
	<li><a href='#'>Меню1</a></li>
	<li><a href='#'>Меню2</a></li>
	<li><a href='#'>Меню3</a></li>
	<li><a href='#'>Меню4</a></li>
</ul>-->


<div >
	<ul>
    <? foreach ($menu as $item): ?>
       <li><a class="menu" href="<?=$item['href']?>"><?=$item['name']?></a></li>
    <? endforeach; ?>
	</ul>
</div>