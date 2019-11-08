<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-3 offset-md-6">
            
                <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($model, 'nama') ?>

                    <?= $form->field($model, 'id_kelas') ?>

                    <div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>