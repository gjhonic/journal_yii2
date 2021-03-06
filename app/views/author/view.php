<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

$this->title = $model->author_name." ".$model->author_surname;
$this->params['breadcrumbs'][] = ['label' => 'Authors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="author-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->author_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->author_id], [
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
            'author_name',
            'author_surname',
            'author_patronymic',
        ],
    ]) ?>

    <h2>Jornals</h2>

    <table class="table table-bordered">
    <thead class="thead-default">
        <tr>
        <th>#</th>
        <th>Title</th>
        <th>Date</th>
        <th></th>
        </tr>
    </thead>
    <tbody>
        <?php $i=0; ?>
        <?php foreach($Jornals as $journal): $i++; ?>
                <tr>
                    <th scope="row"><?=$i?></th>
                    <td><?=$journal['journal_title']?></td>
                    <td><?=$journal['journal_date']?></td>
                    <td><a href="<?=Url::to(['journal/view', 'id'=> $journal['journal_id']])?>" class="btn btn-primary">Подробнее...</a></td>
                </tr>
        <?php endforeach ?>
    </tbody>
    </table>

</div>
