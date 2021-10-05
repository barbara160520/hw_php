<h2>Оставьте отзыв</h2>
<?=$message?><br>

<form class="f-feed" action="?api=add" method="post">
    <input type="text" name="id" value="<?=$row['id']?>" hidden>
    <input type="text" name="name" placeholder="Ваше имя" value="<?=$row['name']?>"><br>
    <input type="text" name="feedback" placeholder="Ваш отзыв" value="<?=$row['feedback']?>"><br>
    <input class="delete" type="submit" value="<?=$buttonText?>">
</form>
<hr>
<div class='info-news'>
    <?php foreach ($feedbacks as $feedback):?>
    	<p class="text"><b><?=$feedback['name']?> :</b> <?=$feedback['feedback']?>
        &ensp;<a class="delete" href="?api=edit&id=<?=$feedback['id']?>">[edit]</a>
        &ensp;<a class="delete" href="?api=delete&id=<?=$feedback['id']?>">[X]</a></p>
    <?php endforeach;?>
</div>
