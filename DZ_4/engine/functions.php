<?php




function render($page, $params = [], $layout = 'main')
{
    return renderTemplate(LAYOUTS_DIR . $layout, [
            'title' => $params['title'],
            'menu' => renderTemplate('menu', $params),
            'content' => renderTemplate($page, $params)
        ]
    );
}


//$params = ['menu' => 'код меню', 'catalog' => ['чай'], 'content' => 'Код подшаблона']
function renderTemplate($page, $params = [])
{
    /*    foreach ($params as $key => $value) {
            $$key = $value;
        }*/

    extract($params);

    ob_start();
    include TEMPLATES_DIR . $page . ".php";
    return ob_get_clean();
}

