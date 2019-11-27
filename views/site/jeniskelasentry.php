<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
$this->title = 'Dashboard|Jenis Kelas KA';
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
            <a class="navbar-brand" href="#">Dashboard</a>
        </div>
    </div>
</nav>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="card">
                    <div class="card-header" data-background-color="green">
                        <h6><i class="material-icons">double_arrow</i>Pencarian</h6>
                    </div>
                    <div class="card-content">
                    <?php $form = ActiveForm::begin(); ?>
                        <?= $form->field($model, 'nama')->widget(Select2::classname(), [
                            'data' => $nama,
                            'language' => 'en',
                            'options' => ['placeholder' => 'Select a state ...'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]) ?>
                        <?= $form->field($model, 'id_kelas')->widget(Select2::classname(), [
                            'data' => $kelas,
                            'language' => 'en',
                            'options' => ['placeholder' => 'Select a state ...'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]) ?>
                        <div class="form-group">
                            <?= Html::submitButton('Submit', ['id' => 'tombol','class' => 'btn btn-primary', 'disabled' => false]) ?>
                        </div>
                    <?php ActiveForm::end(); ?>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">search</i> Pencarian Grafik
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function funama(){
        document.getElementById('kelasi').type = 'hidden';
    }
    function fukelas(){
        document.getElementById('namai').type = 'hidden';
    }
    function stoppedTyping(){
        if(document.getElementById('namai').value.length > 0 || document.getElementById('kelasi').value.length > 0){
            document.getElementById('tombol').disabled = false;
        }else{
            document.getElementById('tombol').disabled = true;
        }
    }
</script>