<?php
namespace app\models;

class News extends Model
{
    public $id;
    public $title;
    public $text;
    public $likes;

    public function __construct($title = null,$text=null, $likes = 0)
    {
        $this->title = $title;
        $this->text = $text;
        $this->likes = $likes;
    }

    public static function getTableName()
    {
        return 'news';
    }
}