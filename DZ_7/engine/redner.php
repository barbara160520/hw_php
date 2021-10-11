<?php
function render($page, $params)
{
    return renderTemplate(LAYOUTS_DIR . $params['layout'], [
            'title' => $params['title'],
            'menu' => renderTemplate('menu', $params),
            'content' => renderTemplate($page, $params)
        ]
    );
}

function renderTemplate($page, $params = [])
{
    /*extract($params);
    ob_start();
    include TEMPLATES_DIR . $page . ".php";
    return ob_get_clean();*/

    ob_start();
    extract($params);

    $fileName = TEMPLATES_DIR . $page . ".php";
    if (file_exists($fileName)) {
        include $fileName;
    }

    return ob_get_clean();
}

