<?php

use yii\helpers\Html;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
\yii\bootstrap\BootstrapAsset::register($this);
\yii\web\YiiAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <?= Html::csrfMetaTags() ?>
</head>
<body>
<?php $this->beginBody() ?>
    <?php
    NavBar::begin([
        'brandLabel' => 'Service CRM',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default',
        ],
    ]);
    // $mainNavItems = [
    //     ['label' => 'Home', 'url' => ['/site/index']],
    // ];
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            [
                'label' => 'Users',
                'url' => ['/users/index'],
                'visible' => Yii::$app->user->can('viewOnlyUsers')
            ],
            ['label' => 'Cars', 'url' => ['/cars/index']],
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            Yii::$app->user->isGuest ? (['label' => 'Login', 'url' => ['/site/login']]) : ''
        ],
    ]);
    if (!Yii::$app->user->isGuest) {
        echo Html::beginForm(
            ['/site/logout'],
            'post',
            [
                'class' => 'navbar-form navbar-right'
            ]
        );
        echo Html::submitButton(
            'Logout (' . Html::encode(Yii::$app->user->identity->username) . ')',
            ['class' => 'btn btn-link']
        );
        echo Html::endForm();
    }
    NavBar::end();
    ?>

    <div class="container">
        <?= $content ?>
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>