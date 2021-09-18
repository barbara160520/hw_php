<?php

$about = renderTemplate('about', 777333);
$menu = renderTemplate('menu');

echo renderTemplate('layout',$menu);
echo renderTemplate('layout',$about);

function renderTemplate($page, $content = '')
{
    ob_start();
    include $page . ".php";
    return ob_get_clean();
}
