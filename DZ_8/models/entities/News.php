<?php
namespace app\models\entities;

use app\engine\Db;
use app\models\Entity;


class News extends Entity
{
    protected $id;
    protected $title;
    protected $text;
    protected $likes;

    protected $props = [
        'title' => false,
        'text' => false,
        'likes' => false
    ];

    public function __construct($title = null,$text=null, $likes = 0)
    {
        $this->title = $title;
        $this->text = $text;
        $this->likes = $likes;
    }


}