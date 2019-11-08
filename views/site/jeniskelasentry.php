<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'Dashboard|Jenis Kelas KA';
?>
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

                        <?= $form->field($model, 'nama')->textInput(['id' => 'namai', 'onclick' => 'funama()']) ?>

                        <?= $form->field($model, 'id_kelas')->textInput(['id' => 'kelasi', 'onclick' => 'fukelas()']) ?>

                        <div class="form-group">
                            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
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
</script>