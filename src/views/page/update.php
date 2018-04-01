<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model nickdenry\cmf\pages\basic\models\Page */

$this->title = Yii::t('cmfBasicPage', 'Update page: {nameAttribute}', [
    'nameAttribute' => $model->title,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('cmfBasicPage', 'Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('cmfBasicPage', 'Update');
?>
<div class="page-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
