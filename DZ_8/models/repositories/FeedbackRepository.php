<?php

namespace app\models\repositories;

use app\engine\App;
use app\models\entities\Reviews;
use app\models\Repository;

class FeedbackRepository extends Repository
{
    public  function getRviews($id = 0){
        if ($id != 0) {
            $sql = "SELECT * FROM reviews WHERE id_product = :id order by id DESC";
            return App::call()->db->queryAll($sql,['id' => $id]);
        }
        else {
            $sql = "SELECT * FROM reviews order by id DESC";
            return App::call()->db->queryAll($sql);
        }
    }
    protected function getEntityClass() {
        return Reviews::class;
    }
    protected  function getTableName()
    {
        return 'reviews';
    }
}