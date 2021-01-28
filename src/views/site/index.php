<?php

use yii\helpers\Url;

$this->title = 'Journal';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Journal!</h1>

        <p>
          <a class="btn btn-lg btn-success" href="<?=Url::to(['author/index'])?>">show Authors</a>
          <a class="btn btn-lg btn-primary" href="<?=Url::to(['journal/index'])?>">show Journals</a>
      </p>
    </div>

    </div>
</div>
