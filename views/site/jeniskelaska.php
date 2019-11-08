<?php
use miloschuman\highcharts\Highcharts;

$this->title = 'Dashboard|Jenis Kelas KA';

foreach($data as $value){
    $a[] = array('type' => 'column', 'name' => $value['nama'].'('.$value['no_ka'].')', 'data' => array((int)$value['jml']));
}
?>

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
                                    'title' => ['text' => 'Keterlambatan (Menit)']
                                ],
                                'series' => $a
                                ]
                            ]);    
                        
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>