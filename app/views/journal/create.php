<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;


$this->title = 'Add Journal';
$this->params['breadcrumbs'][] = ['label' => 'Journals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="journal-create">

    <h1><?= Html::encode($this->title) ?></h1>

	<?php $form = ActiveForm::begin(['id' => 'login-form','action'=> 'create']); ?>

    <?= $form->field($model, 'journal_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'journal_description')->textarea(['rows' => '6']) ?>

	<?= $form->field($model, 'image')->fileInput() ?>


    <?php
    if($model->journal_date) {
        $model->journal_date = date("d.m.Y", (integer) $model->journal_date);
    }
    echo $form->field($model, 'journal_date')->widget(DateTimePicker::className(),[
        'name' => 'dp_1',
        'type' => DateTimePicker::TYPE_INPUT,
        'options' => ['placeholder' => 'Ввод даты/времени...'],
        'convertFormat' => true,
        'value'=> date("d.m.Y",(integer) $model->journal_date),
        'pluginOptions' => [
            'format' => 'dd.MM.yyyy',
            'autoclose'=>true,
            'weekStart'=>1, //неделя начинается с понедельника
            'startDate' => '01.05.2015', //самая ранняя возможная дата
            'todayBtn'=>true, //снизу кнопка "сегодня"
        ]
    ]); ?>

	<div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

	<h2>Authors:</h2>
	<p style="color:grey">Mark the authors</p>
	 <div class="box-author table-responsive">
		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Автор</th>
		      <th scope="col"></th>
		    </tr>
		  </thead>
		  <tbody>
			
			<?php $i=0;
				foreach ($Authors as $author) {  $i++; ?>
					<tr>
				      <th scope="row"><?=$i?></th>
				      <td>
				      	<label for='tp_"<?=$author->author_id?>"'> <?=$author->author_surname." ".$author->author_name." ".$author->author_patronymic ?></label>
				      </td>
				      	
				      <td>
				      	<input type='checkbox' style='width:20px; border:1px solid grey; height:20px;' name='tp_<?=$author->author_id?>' id='tp_"<?=$author->author_id?>"'>
				      </td>
				    </tr>
			<?php }  ?>

		  </tbody>
		</table>
	</div>
	<br>
	<?php ActiveForm::end();?>

	<style>
		.box-author{
			width: 100%;
			border: 1px solid grey;
			height: 300px;
		}
	</style>


</div>
