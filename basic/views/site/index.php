<?php

use yii\helpers\Html;
use yii\db\Query;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'id',
            'name_brand',
            'name_platform',
            'name_game',
            'name_accessories',

        ],
    ]); ?>

    <?php

    $model = new Query;
    $model->select('id, brands.name_brand, brands.producing_country, platforms.name_platforms, games.name_games, genres.name_genre , GROUP_CONCAT(accessories.name_accessorie) as name_accessorie')->from('category')->join('left join', 'brands', 'brands.id_brands = category.name_brand')->join('left join', 'platforms', 'platforms.id_platforms = category.name_platform ')->join('left join', 'games', 'games.id_games = category.name_game')->join('left join', 'accessories', 'accessories.id_accessorie = category.name_accessories')->join('left join', 'genres', 'genres.id_genre = games.id_games')->groupBy('name_platforms');
    $command = $model->createCommand();
    $model = $command->queryAll();

    $file = file_get_contents('../../src/data.json');  // Открыть файл data.json

    $taskList = json_decode($file,TRUE);        // Декодировать в массив

    unset($file);                               // Очистить переменную $file

    $taskList = array('model'=>$model);        // Представить новую переменную как элемент массива, в формате 'ключ'=>'имя переменной'

    $result = array_unique($taskList, SORT_REGULAR);

    file_put_contents('../../src/data.json',json_encode($result));  // Перекодировать в формат и записать в файл.

    unset($taskList);

    ?>


</div>
