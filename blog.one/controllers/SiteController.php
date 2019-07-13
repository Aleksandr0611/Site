<?php

namespace app\controllers;

use app\models\Entry;
use app\models\Category;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;


class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $data = Entry::getAll(5);
        $popular = Entry::getPopular();
        $categories = Category::getAll();
        
        return $this->render('index',[
            'entries'=>$data['entries'],
            'pagination'=>$data['pagination'],
            'popular'=>$popular,
            'categories'=>$categories
        ]);
    }
    
    public function actionView($id)
    {
        $entry = Entry::findOne($id);
        $popular = Entry::getPopular();
        $categories = Category::getAll();
        

        $entry->viewedCounter();
        
        return $this->render('single',[
            'entry'=>$entry,
            'popular'=>$popular,
            'categories'=>$categories
        ]);
    }
    
    public function actionCategory($id)
    {

        $data = Category::getEntriesByCategory($id);
        $popular = Entry::getPopular();
        $categories = Category::getAll();
        
        return $this->render('category',[
            'entries'=>$data['entries'],
            'pagination'=>$data['pagination'],
            'popular'=>$popular,
            'categories'=>$categories
        ]);
    }

}
