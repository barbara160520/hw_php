<?php
function feedbackController(&$params, $action)
{
    $session = session_id();
    doReviewsAction($params, $action);
    $params['title'] = 'Отзывы';
    $params['reviews'] = getReviews();
    $templateName = 'feedback';

    return render($templateName, $params);
}