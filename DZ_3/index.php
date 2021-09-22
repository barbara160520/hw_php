<?php
define('TEMPLATES_DIR', 'templates/');
define('LAYOUTS_DIR', 'layouts/');


$page = 'index';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

$params = ['menu' => getMenu()['menu']];

switch ($page) {
    case 'index':
        $params['title'] = 'Главная';
        break;

    case 'catalogssr':
        $params['title'] = 'Каталог';
        $params['catalog'] = getCatalog()['catalog'];
        break;

    case 'catalogspa':
        $params['title'] = 'Каталог spa';
        break;

    case 'exercises':
        $params['title'] = 'Упражнения';
        break;

    case 'about':
        $params['title'] = 'about';
        $params['phone'] = 444333;
        break;

    case 'apicatalog':
        echo json_encode(getCatalog(), JSON_UNESCAPED_UNICODE);
        die();
}

echo render($page, $params);


function getCatalog()
{
    return [
        'catalog' => [
            [
                'name' => 'Пицца',
                'price' => 24,
                'image' => 'pizza.jpeg'
            ],
            [
                'name' => 'Чай',
                'price' => 1,
                'image' => 'tea.png'
            ],
            [
                'name' => 'Яблоко',
                'price' => 12,
                'image' => 'apple.jpg'
            ],
        ]
    ];

}

function getMenu(){
        return [
        'menu' => [
            [
                'name' => 'Главная',
                'href' => "/"
            ],
            [
                'name' => 'Каталог spa',
                'href' => "/?page=catalogspa"
            ],
            [
                'name' => 'Каталог ssr',
                'href' => "/?page=catalogssr"
            ],
            [
                'name' => 'О нас',
                'href' => "/?page=about",
            ],
            [
                'name' => 'Упражнения',
                'href' => "/?page=exercises",
            ]
        ]
    ];
}

function render($page, $params = [])
{
    return renderTemplate(LAYOUTS_DIR . 'main', [
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

