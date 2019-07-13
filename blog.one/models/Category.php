<?php

namespace app\models;

use Yii;
use yii\data\Pagination;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $title
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }
    
     public function getEntries()
    {
        return $this->hasMany(Entry::className(), ['category_id' => 'id']);
    }
    public function getEntriesCount()
    {
        return $this->getEntries()->count();
    }
    
     public static function getAll()
    {
        return Category::find()->all();
    }
    
    public static function getEntriesByCategory($id)
    {
        // build a DB query to get all entries
        $query = Entry::find()->where(['category_id'=>$id]);
        // get the total number of entries (but do not fetch the entry data yet)
        $count = $query->count();
        // create a pagination object with the total count
        $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>6]);
        // limit the query using the pagination and retrieve the entries
        $entries = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        $data['entries'] = $entries;
        $data['pagination'] = $pagination;
        
        return $data;
    }
}
