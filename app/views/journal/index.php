<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Journals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="journal-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Add Journal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'journal_id',

            [
                'attribute'=>'journal_img',
                'label'=>'Изображения',
                'format'=>'html',
                'content'=>function($data){
                    return  '<img src="'.$data->journal_img.'">';
                },
            ],

            'journal_title',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
