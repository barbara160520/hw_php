<?php

namespace app\models\repositories;

use app\engine\App;
use app\engine\Db;
use app\models\entities\Images;
use app\models\Repository;

class GalleryRepository extends Repository
{
    public function getImages(){
        $sql = "SELECT * FROM images order by likes DESC";
        return App::call()->db->queryAll($sql);
    }
    public function addLikes($id){
        $sql ="UPDATE images SET likes = likes + 1 WHERE id = :id";
        return App::call()->db->execute($sql,['id' => $id]);
    }
    protected function getEntityClass() {
        return Images::class;
    }

    public function getTableName()
    {
        return 'images';
    }
}