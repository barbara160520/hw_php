<?php
include "config/config.php";
$page = 'gallery';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

switch ($page){
    case 'gallery':
        $params['title'] = 'Моя галерея';
        $params['gallery'] = $gallery;
        $params['images'] = $images;
        $params['message'] = $message;
    break;       
}

echo render($page, $params);
function render($page, $params = [])
{
    return renderTemplate(LAYOUTS_DIR . 'main', [
            'title' => $params['title'],
            'scripts' => renderTemplate('scripts'),
            'content' => renderTemplate($page, $params)
        ]
    );
}

function renderTemplate($page, $params = [])
{
    extract($params);

    ob_start();
    include TEMPLATES_DIR . $page . ".php";
    return ob_get_clean();
}