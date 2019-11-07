<?php
use yii\helpers\Html;
?>
<p>You have entered the following information:</p>

<ul>
    <li><label>nama</label>: <?= Html::encode($model->nama) ?></li>
    <li><label>kelas</label>: <?= Html::encode($model->id_kelas) ?></li>
</ul>