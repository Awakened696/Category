<?php

namespace app\controllers;

use Yii;
use app\models\Category;
use yii\db\Query;
use yii\web\Controller;


class JsonController extends Controller
{

    public function actionIndex()
    {

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $model = new Query;
        $model->select('id, brands.name_brand, brands.producing_country, platforms.name_platforms, games.name_games, genres.name_genre, accessories.name_accessorie')->from('category')->join('left join', 'brands', 'brands.id_brands = category.name_brand')->join('left join', 'platforms', 'platforms.id_platforms = category.name_platform ')->join('left join', 'games', 'games.id_games = category.name_game')->join('left join', 'accessories', 'accessories.id_accessorie = category.name_accessories')->join('left join', 'genres', 'genres.id_genre = games.id_games');
        $command = $model->createCommand();
        $model = $command->queryAll();

        return $model;

    }
}