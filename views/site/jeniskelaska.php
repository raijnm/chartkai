<?php
use miloschuman\highcharts\Highcharts;

$this->title = 'Dashboard|Jenis Kelas KA';

foreach($data as $value){
    $a[] = array('type' => 'column', 'name' => $value['nama'], 'data' => array((int)$value['jml']));
}
?>

<div class="content">
    <?php

        echo Highcharts::widget([
            'options' => [
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