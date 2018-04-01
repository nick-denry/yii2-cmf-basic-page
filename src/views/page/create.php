<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model nickdenry\cmf\pages\basic\models\Page */

$this->title = Yii::t('cmfBasicPage', 'Create page');
$this->params['breadcrumbs'][] = ['label' => Yii::t('cmfBasicPage', 'Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
