<h2>Товар</h2>

<div class="catalog-menu">
<div class='catalog-list'>
<form action="/basket/add/" method="post">
    <input type="text" name="id" value="<?= $product->id ?>" hidden>  
    <p class='text'><?=$product->name?></p>
    <img src="/img/<?=$product->image?>">
    <span class="price">Цена: <?=$product->price?></span>
    <p class="text"><?=$product->description?></p>
    <button lass="buy" type="submit">Купить</button>
</form>
</div>
</div>