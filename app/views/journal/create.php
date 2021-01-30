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

	<?php $form = ActiveForm::begin(['id' => 'login-form','action'=> 'journal/save']); ?>

	<div class="form-group">
		<label for="journal_title">Title journal</label>
		<input type="text" class="form-control" id="journal_title" placeholder="" name="journal_title" required>
	</div>

	<input type="submit" value="Сохранить" class="btn btn-success">

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
