<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "relations".
 *
 * @property int $book_id
 * @property int $author_id
 */
class Relations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'relations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['book_id', 'author_id'], 'required'],
            [['book_id', 'author_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'book_id' => Yii::t('app', 'Book ID'),
            'author_id' => Yii::t('app', 'Author ID'),
        ];
    }

    public function getBooksByAuthor($author_id){
        return Books::find()->select('b.*')->from('books AS b')
            ->innerJoin('relations r',"b.`id` = r.`book_id`")
            ->where(['r.author_id'=>$author_id]);
    }

    public function getAuthorsOfBook($book_id){
        return Authors::find()->select('a.*')->from('authors AS a')
            ->innerJoin('relations r',"a.`id` = r.`author_id`")
            ->where(['r.book_id'=>$book_id])->asArray()->all();
    }
}
