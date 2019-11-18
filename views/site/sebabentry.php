<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
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

                        <?= $form->field($model, 'tgl_ka')->widget(\yii\jui\DatePicker::class, [
                            //'language' => 'ru',
                            'dateFormat' => 'yyyy-MM-dd',
                        ])->textInput(['class' => 'form-control']) ?>

                        <?= $form->field($model, 'nama')->textInput(['id' => 'namai']) ?>

                        <?= $form->field($model, 'id_kelas')->textInput(['id' => 'kelasi']) ?>

                        <div class="form-group">
                            <?= Html::submitButton('Submit', ['id' => 'tombol','class' => 'btn btn-primary']) ?>
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