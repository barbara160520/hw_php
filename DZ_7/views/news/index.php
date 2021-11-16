<h2>Новости</h2>
<div class='block-news'>
<? if (!empty($news)): ?>
    <?php foreach ($news as $item):?>
       <p><input type="text" name="id" value="<?= $item['id'] ?>" hidden>
       <a class='link-news' href="/news/card/?id=<?=$item['id']?>"><?=$item['title']?></a>
       &ensp;<span class='h2'>Like: <?=$item['likes']?></span>
       &ensp;<button class='delete' data-id="<?=$item['id']?>">X</button></p>
    <? endforeach;?>
    <? else: ?>
        <p class="info">Новостей нет</p>
    <? endif; ?>  
    <a class='also' href="/news/news/?page=<?=$page?>">Еще</a>
</div>


<script>
    let buttons = document.querySelectorAll('.delete');
    buttons.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            console.log(id);
            (
                async () => {
                    const response = await fetch('/news/delete/?id=' + id);
                    const answer = await response.json();
                    //document.getElementById('count').innerText = answer.count;
                    document.getElementById(id).remove();
                }
            )();
        });
    });
</script>