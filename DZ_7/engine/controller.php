<?php

function prepareVariables($page, $action) {


    $params = ['menu' => getMenu()['menu']];
    $params['layout'] = 'main';
    $params['count'] = getBasketCount();

    $params['name'] = get_user();
    $params['auth'] = isAuth();

    switch ($page) {
        case 'login':
            $login = $_POST['login'];
            $pass = $_POST['pass'];
            if (auth($login, $pass)) {
                if (isset($_POST['save'])) {
                    $hash = uniqid(rand(), true);
                    $id = $_SESSION['id'];
                    //TODO завернуть рабоуту с хеш в модель
                    $sql = "UPDATE users SET hash = '{$hash}' WHERE id = {$id}";
                    $result = mysqli_query(getDb(), $sql);
                    setcookie("hash", $hash, time() + 3600, "/");
                }
                header("Location: /");
                die();
            } else {
                die("Не верный логин пароль");
            }
            break;

        case 'logout':
            setcookie("hash", "", time()-1, "/");
            session_regenerate_id();
            session_destroy();
            header("Location: /");
            die();
            break;

        case 'index':
            $params['title'] = 'Главная';
            break;

        case 'news':
            $params['news'] = getNews();
            break;

        case 'onenews':
            $id = (int)$_GET['id'];
            $params['news'] = getOneNews($id);
            break;


        case 'feedback':
            $message = [
                'success_add' => 'Отзыв успешно добавлен',
                'success_edit' => 'Отзыв успешно отредактирован',
                'success_delete' => 'Отзыв успешно удален'
            ];
            $params['reviews'] = getReviews();
            $params['message'] = $message[$_GET["message"]];

            if ($_POST["id"]){
                $id = (int)$_POST['id'];
            } else {
                $id = (int)$_GET['id'];
            }

            if ($action == "edit") {
                $params['current_review'] = doReviewsAction($action, $id);
            }

            if (in_array($action,["add", "save", "delete"])) {
                header("Location: /feedback/?message=" . doReviewsAction($action, $id));
            }
            break;

        case 'bux':
            $params['message'] = 'Файл загружен';
            $params['title'] = 'Бухи';
            $params['files'] = getFiles();
            break;

        case 'gallery':
            $params['message'] = 'message';
            $params['title'] = 'Галерея';
            $params['image'] = getImages();
            $params['layout'] = 'gallery';
            break;

        case 'oneimage':
            addLikes($_GET['id']);
            $params['image'] = getOneImage($_GET['id']);
            $params['layout'] = 'gallery';
            break;

        case 'catalog':
            $session = session_id();
            $id = (int)$_GET['id'];
            $params['title'] = 'Каталог';
            $params['goods'] = getGoods();

            $message = [
                'success_buy' => 'Товар успешно добавлен'
            ];
            $params['message'] = $message[$_GET["message"]];

            if (in_array($action,["buy"])) {
                header("Location: /catalog/?id={$id_product}&message=" . doFromBasket($action, $id,$session));
            }
            break;

        case 'basket':
            $session = session_id();
            $id = (int)$_GET['id'];
            $params['title'] = 'Корзина';
            $params['basket'] = getBasket($session);
            $params['summ'] = getSumm($session);

            $message = [
                'success_delete' => 'Товар успешно удален'
            ];
            $params['message'] = $message[$_GET["message"]];

            if (in_array($action,["delete"])) {
                header("Location: /basket/?id={$id_product}&message=" . deleteFromBasket($action, $id,$session));
            }
            break;

        case 'oneprod':
            $session = session_id();
            $id_product = (int)$_GET['id'];
            $params['title'] = 'Товар';
            $id = (int)$_GET['id'];

            $params['goods'] = getOneProduct($id_product);

            $message = [
                'success_add' => 'Отзыв успешно добавлен',
                'success_edit' => 'Отзыв успешно отредактирован',
                'success_delete' => 'Отзыв успешно удален',
                'success_buy' => 'Товар успешно добавлен'
            ];
            $params['reviews'] = getReviews($id_product);
            $params['message'] = $message[$_GET["message"]];

            if ($_POST["id"]) {
                $id = (int)$_POST['id'];
            } else {
                $id = (int)$_GET['id_review'];
                if ($action == "add") {
                    $id = $id_product;
                }
            }
            if (in_array($action,["buy"])) {
                header("Location: /oneprod/?id={$id_product}&message=" . doFromBasket($action, $id_product,$session));
            }

            if ($action == "edit") {
                $params['current_review'] = doReviewsAction($action, $id);
            }

            if (in_array($action,["add", "save", "delete"])) {
                header("Location: /oneprod/?id={$id_product}&message=" . doReviewsAction($action, $id));
            }
            break;

        case 'catalogspa':
            $params['title'] = 'Каталог spa';
            break;

        case 'about':
            $params['title'] = 'about';
            $params['phone'] = 79281444333;
            break;

        case 'calc':
            $params['title'] = 'Калькулятор';
            break;

        case 'apicatalog':
            echo json_encode(getCatalog(), JSON_UNESCAPED_UNICODE);
            die();
    }
    return $params;
}