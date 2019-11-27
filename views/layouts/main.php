<?php

/* @var $this \yii\web\View */
/* @var $content string */
use Yii;
use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
if (class_exists('ramosisw\CImaterial\web\MaterialAsset')) {
    ramosisw\CImaterial\web\MaterialAsset::register($this);
}

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

    <div class="wrapper">
        <div class="sidebar" data-color="blue" data-image="">

            <div class="logo">
                <a href="<?php echo Url::to(['site/index']); ?>" class="simple-text">
                    Kereta Api Indonesia
                </a>
            </div>

            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li>
                        <a href="<?php echo Url::to(['site/index']); ?>">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo Url::to(['site/jeniskelaska']); ?>">
                            <i class="material-icons">bar_chart</i>
                            <p>Jenis & Kelas KA</p>
                        </a>
                    </li>
                    </li>
                    <li>
                        <a href="<?php echo Url::to(['site/penyebabtelatka']); ?>">
                            <i class="material-icons">show_chart</i>
                            <p>Penyebab KA Telat</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <?= $content ?>
        </div>
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
