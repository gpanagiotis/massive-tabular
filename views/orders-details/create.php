<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OrdersDetails */

$this->title = 'Create Orders Details';
$this->params['breadcrumbs'][] = ['label' => 'Orders Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-details-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
