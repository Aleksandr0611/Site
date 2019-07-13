<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\data\Pagination;

/**
 * This is the model class for table "entry".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property int $viewed
 * @property int $category_id
 */
class Entry extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'entry';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'content'], 'required'],
            [['title', 'content'], 'string'],
            [['viewed', 'category_id'], 'integer'],
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
            'content' => 'Content',
            'viewed' => 'Viewed',
            'category_id' => 'Category ID',
        ];
    }
    
    
     public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
    
    public function saveCategory($category_id)
    {
        $category = Category::findOne($category_id);
        if($category != null)
        {
            $this->link('category', $category);
            return true;            
        }
    }
    
     public static function getAll($pageSize = 5)
    {
        // build a DB query to get all entries
        $query = Entry::find();
        // get the total number of entries (but do not fetch the entry data yet)
        $count = $query->count();
        // create a pagination object with the total count
        $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize]);
        // limit the query using the pagination and retrieve the entries
        $entries = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        
        $data['entries'] = $entries;
        $data['pagination'] = $pagination;
        
        return $data;
    }
    
     public static function getPopular()
    {
        return Entry::find()->orderBy('viewed desc')->limit(3)->all();
    }
     public function viewedCounter()
    {
        $this->viewed += 1;
        return $this->save(false);
    }
}
