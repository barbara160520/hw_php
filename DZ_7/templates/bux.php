<h2>Список файлов</h2>
<p class="info-bux"><?=$message?></p>
<?php foreach ($files as $file): ?>
    <a class='bux' href="docs/<?=$file?>"><?=$file?></a><br>
<?php endforeach;?>
<br>
<form class='f-bux'>
    <input class='bnt-file' type="file">
    <input class='bnt-bux' type="submit" value="Загрузить">
</form>