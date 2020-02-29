<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "authors".
 *
 * @property int $id
 * @property string $firstName
 * @property string $lastName
 */
class Authors extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'authors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstName', 'lastName'], 'required'],
            [['firstName'], 'string', 'max' => 20],
            [['lastName'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'firstName' => Yii::t('app', 'First Name'),
            'lastName' => Yii::t('app', 'Last Name'),
        ];
    }
}
