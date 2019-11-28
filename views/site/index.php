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

        <div class="jumbotron jumbotron-fluid">
            <?= Html::img('@web/image/logo.png', ['alt'=>'logo kai', 'class'=>'img-fluid', 'width' => '10%', 'height' => 'auto']);?>
            <h6>Dashboard Informasi Keterlambatan</h6>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" data-background-color="blue">
                        <h4 class="title"><i class="material-icons">double_arrow</i>Jumlah Gangguan Per-Daop/Divre</h4>
                    </div>
                    <div class="card-content">
                        <?php echo $chart; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" data-background-color="blue">
                        <h4 class="title"><i class="material-icons">double_arrow</i>Top 15 Jumlah Ganguan Per-KA</h4>
                    </div>
                    <div class="card-content">
                        <?php echo $chart2 ;?>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>