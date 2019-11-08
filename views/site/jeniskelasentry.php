<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-3 offset-md-6">
            
                <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($model, 'nama')->textInput(['id' => 'namai', 'onchange' => 'funama()']) ?>

                    <?= $form->field($model, 'id_kelas')->textInput(['id' => 'kelasi', 'onchange' => 'fukelas()']) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
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