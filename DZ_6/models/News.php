<?php
namespace app\models;

class News extends DBModel
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

    protected function __construct($title = null,$text=null, $likes = 0)
    {
        $this->title = $title;
        $this->text = $text;
        $this->likes = $likes;
    }

    protected static function getTableName()
    {
        return 'news';
    }
}