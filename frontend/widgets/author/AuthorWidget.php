<?php
/**
 * Created by PhpStorm.
 * User: tea
 * Date: 7/11/18
 * Time: 12:02 PM
 */

namespace frontend\widgets\author;

use common\models\Authors;
use common\models\Relations;
use yii\base\Widget;
use yii\data\ActiveDataProvider;

class AuthorWidget extends Widget
{
    public $author;

    private $author_item;

    public function init()
    {
        parent::init();
        if(is_numeric($this->author)){
            $this->author_item = Authors::findOne($this->author);
        }elseif($this->author instanceof Authors){  //check if object and if object is an instance of Authors
            $this->author_item = $this->author;
        }

    }

    public function run()
    {
        $model = new Relations;
        $dataProvider = null;
        $author_name = '';
        if(!empty($this->author_item)) {
            $author = $model->getBooksByAuthor($this->author_item->id);
            $dataProvider = new ActiveDataProvider(['query' => $author]);
            $author_name = $this->author_item->firstName . ' ' . $this->author_item->lastName;
        }

        return $this->render('author',
            [
                'dataProvider' => $dataProvider,
                'author' => $author_name
            ]
        );
    }
}