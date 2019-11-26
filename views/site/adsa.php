<?php
use yii\helpers\Html;
//use miloschuman\highcharts\Highcharts;
$this->title = 'Dashboard|Penyebab KA Telat';
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
            <a class="navbar-brand" href="#">Penyebab Keterlambatan | Berdasarkan : <?= Html::encode($model->tgl_ka) ?>  <?= Html::encode($model->id_kelas) ?>  <?= Html::encode($model->nama) ?></a>
        </div>
    </div>
</nav>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title"><i class="material-icons">double_arrow</i>Grafik Akibat</h4>
                        <!-- <p class="category">Berdasarkan Kelas & Jenis</p> -->
                    </div>
                    <div class="card-content">
                        <?php echo $charting1 ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title"><i class="material-icons">double_arrow</i>Grafik Penyebab</h4>
                        <!-- <p class="category">Berdasarkan Kelas & Jenis</p> -->
                    </div>
                    <div class="card-content">
                        <?php echo $charting2 ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
