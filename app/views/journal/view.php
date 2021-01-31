<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Journal */

$this->title = $model->journal_title;
$this->params['breadcrumbs'][] = ['label' => 'Journals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="journal-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->journal_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->journal_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'journal_title',
            [
                'attribute'=>'journal_img',
                'label' => 'Image',
                'format' => ['image', ['width' => '190', 'height'=>'300']],
                'value'=> '../'.$model->journal_img
    
            ],
            'journal_description',
            'journal_date',
        ],
    ]) ?>

    <h2>Authors</h2>

    <table class="table table-bordered">
    <thead class="thead-default">
        <tr>
        <th>#</th>
        <th>Author</th>
        <th></th>
        </tr>
    </thead>
    <tbody>
        <?php $i=0; ?>
        <?php foreach($Authors as $author): $i++; ?>
                <tr>
                    <th scope="row"><?=$i?></th>
                    <td><?=$author['author_surname']." ".$author['author_name']." ".$author['author_patronymic'] ?></td>
                    <td><a href="<?=Url::to(['author/view', 'id'=> $author['author_id']])?>" class="btn btn-primary">Перейти</a></td>
                </tr>
        <?php endforeach ?>
    </tbody>
    </table>

</div>
