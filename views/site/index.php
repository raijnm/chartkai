<?php
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'Dashboard';
?>
<nav class="navbar navbar-transparent navbar-absolute">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"></a>
        </div>
    </div>
</nav>
<div class="container-fluid">
    <div class="site-index">

        <div class="jumbotron">
        <?= Html::img('@web/image/logo.png', ['alt'=>'logo kai', 'class'=>'img-fluid', 'width' => '55%', 'height' => 'auto']);?>
            <h2>Dashboard Informasi Keterlambatan</h2>

            <p class="lead"></p>

        </div>

    </div>
</div>