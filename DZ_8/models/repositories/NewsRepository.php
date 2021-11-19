<?php

namespace app\models\repositories;

use app\engine\App;
use app\models\entities\News;
use app\models\Repository;

class NewsRepository extends Repository
{
    public function addLikes($id){
        $sql ="UPDATE news SET likes = likes + 1 WHERE id = :id";
        return App::call()->db->execute($sql,['id' => $id]);
    }

    protected function getEntityClass() {
        return News::class;
    }

    public function getTableName()
    {
        return 'news';
    }
}