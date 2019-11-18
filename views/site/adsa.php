<?php
use yii\helpers\Html;
use miloschuman\highcharts\Highcharts;
use miloschuman\highcharts\SeriesDataHelper;

$pia = array();
$isi = array_count_values(array_column($dat, 'm_penyebab'));
foreach($isi as $key => $value){
    array_push($pia,['name' => $key, 'y'=> (int)$value]);
}
$cia = array();
$isia = array_count_values(array_column($dat, 'akibat_nama'));
foreach($isia as $key => $value){
    array_push($cia,['name' => $key, 'y'=> (int)$value]);
}
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

                        <?php
                            if(isset($cia)){
                                
                                echo Highcharts::widget([
                                    'options' => [
                                        'title' => ['text' => ''],
                                        'plotOptions' => [
                                            'pie' => [
                                                'cursor' => 'pointer',
                                            ],
                                        ],
                                        'series' => [
                                            [ // new opening bracket
                                                'type' => 'pie',
                                                'name' => 'Elements',
                                                'data' => $cia
                                            ] // new closing bracket
                                        ],
                                    ],
                                ]); 
                            
                            }else{
                                ?>
	                                <div class="alert alert-warning alert-with-icon" data-notify="container">
                                    <i data-notify="icon" class="material-icons">add_alert</i>
	                                <span data-notify="message">Kata Kunci yang Anda cari tidak tersedia.</span>    
	                                </div>                                
                                <?php
                            }
                        ?>
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

                        <?php
                            if(isset($pia)){
                                
                                echo Highcharts::widget([
                                    'options' => [
                                        'title' => ['text' => ''],
                                        'plotOptions' => [
                                            'pie' => [
                                                'cursor' => 'pointer',
                                            ],
                                        ],
                                        'series' => [
                                            [ // new opening bracket
                                                'type' => 'pie',
                                                'name' => 'Elements',
                                                'data' => $pia
                                            ] // new closing bracket
                                        ],
                                    ],
                                ]); 
                            
                            }else{
                                ?>
	                                <div class="alert alert-warning alert-with-icon" data-notify="container">
                                    <i data-notify="icon" class="material-icons">add_alert</i>
	                                <span data-notify="message">Kata Kunci yang Anda cari tidak tersedia.</span>    
	                                </div>                                
                                <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
