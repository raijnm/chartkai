<?php

use miloschuman\highcharts\Highcharts;

$this->title = 'Dashboard|Jenis Kelas KA';

foreach($data as $value){
    $a[] = array('type' => 'column', 'name' => $value['nama'].'('.$value['no_ka'].')', 'data' => array((int)$value['jml']));
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
            <a class="navbar-brand" href="#">Dashboard | Grafik</a>
        </div>
    </div>
</nav>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title"><i class="material-icons">double_arrow</i>Grafik Keterlambatan</h4>
                        <p class="category">Berdasarkan Kelas & Jenis</p>
                    </div>
                    <div class="card-content">

                        <?php
                            if(isset($a)){
                                
                                echo Highcharts::widget([
                                    'options' => [
                                        'chart'=>[
                                            'type'=>'column',
                                            'height' => 500,
                                        ],
                                    'title' => ['text' => 'Berdasarkan Jenis Atau Kelas'],
                                    'xAxis' => [
                                        'categories' => ['Kereta']
                                    ],
                                    'yAxis' => [
                                        'title' => ['text' => 'Keterlambatan (Menit)'],
                                        'type' =>'logarithmic'
                                    ],
                                    'series' => $a,
                                    ]
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