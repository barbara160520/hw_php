	<? foreach ($gallery as $item): ?>
        <a rel="gallery" class="photo" href="<?=IMG_BIG . $item?>">
        <img src="<?=IMG_SMALL . $item?>"  /></a>
    <? endforeach ;?>