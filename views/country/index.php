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

    

    <!-- <?php // echo $this->render('_search', ['model' => $searchModel]); ?> -->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Country $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'Code' => $model->Code]);
                 }
            ],
            ['class' => 'yii\grid\SerialColumn'],
            
            'Code',
            [
                'label' => 'Name',
                'attribute' => 'Name',
                'format' => 'raw',
                'contentOptions' => ['style' => 'width:200px; white-space: normal; font-weight: bold;'],
                'value' => function($data) {
                    return $data->Name; 
                }
            ],
            
            
            [
                'label' => 'Hoofdstad',
                'attribute' => 'Capital',
                'headerOptions' => [ 'style' => 'text-align:right;' ],
                'contentOptions' => ['style' => 'width:200px; white-space: normal;text-align:right;'],
                'format' => 'raw',
                'value' => function($data) {
                    return Html::a('Naar hoofdstad', ['/city/index', 'CitySearch[ID]' => $data->Capital]);
                }
            ],
            // 'Population',
            [
                'label' => 'Inwoners', 
                'attribute' => 'Population', 
                'contentOptions' => ['style' => 'width:200px; white-space: normal;text-align:right;'],
                'value' => function ($data) {
                    if ($data->Population == 0) {
                        return 'onbewoond';
                    } else {
                        return number_format($data->Population, 0, ',', ' ');
                    }
                },
            ],            
            
            // 'Continent',
            // 'Region',
            // 'SurfaceArea',
            [
                'label' => 'Oppervlakte',
                'attribute' => 'SurfaceArea',
                'format' => 'raw',
                'contentOptions' => ['style' => 'width:200px; white-space: normal;text-align:right;'],
                'value' => function($data) {
                    return sprintf("%8d k&#13217", $data->SurfaceArea);
                }
            ],
            //'IndepYear',
            ['label' => 'Bevolkingsdichtheid',
            'value' => function ($model) 
            {return $model->SurfaceArea > 0 ? round($model->Population / $model->SurfaceArea, 2) : 0;},
            'contentOptions' => ['style' => 'width:30px; white-space: normal;text-align:right;'],],
            //'LifeExpectancy',
            //'GNP',
            //'GNPOld',
            //'LocalName',
            //'GovernmentForm',
            //'HeadOfState',
            // 'Hoofdstad',
            
            
            
            
        ],
    ]); ?>

<p>
        <?= Html::a('Create Country', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
