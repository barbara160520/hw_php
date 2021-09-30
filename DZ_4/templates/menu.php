<div class="header">
	<ul>
    <? foreach ($menu as $item): ?>
       <li><a class="menu" href="<?=$item['href']?>"><?=$item['name']?></a></li>
    <? endforeach; ?>
	</ul>
</div>