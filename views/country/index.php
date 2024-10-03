<?php

use app\models\Country;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\CountrySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Countries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-index">

    <h1><?= Html::encode($this->title) ?></h1>

    

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Code',
            'Name', 
            
            [
                'label' => 'Hoofdstad',
                'attribute' => 'Capital',
                'contentOptions' => ['style' => 'width:200px; white-space: normal;'],
                'format' => 'raw',
                'value' => function($data) {
                    return Html::a('Naar hoofdstad', ['/city/index', 'CitySearch[ID]' => $data->Capital]);
                }
            ],
            // 'Population',
            ['label' => 'Inwoners', 
            'attribute' => 'Population', 
            'contentOptions' => ['style' => 'width:200px; white-space: normal;'],],
            // 'Continent',
            // 'Region',
            // 'SurfaceArea',
            [
                'label' => 'Oppervlakte',
                'attribute' => 'SurfaceArea',
                'format' => 'raw',
                'value' => function($data) {
                    return sprintf("%8d k&#13217", $data->SurfaceArea);
                }
            ],
            //'IndepYear',
            ['label' => 'Bevolkingsdichtheid',
            'value' => function ($model) 
            {return $model->SurfaceArea > 0 ? round($model->Population / $model->SurfaceArea) : 0;},
            'contentOptions' => ['style' => 'width:30px; white-space: normal;'],],
            //'LifeExpectancy',
            //'GNP',
            //'GNPOld',
            //'LocalName',
            //'GovernmentForm',
            //'HeadOfState',
            // 'Hoofdstad',
            
            
            
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Country $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'Code' => $model->Code]);
                 }
            ],
        ],
    ]); ?>

<p>
        <?= Html::a('Create Country', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
