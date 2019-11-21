<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

//use \yii;
/* @var $this yii\web\View */
/* @var $model app\models\Orders */
/* @var $form yii\widgets\ActiveForm */


/* $this->registerJsFile(Yii::$app->request->baseUrl.'/js/youFile.js',['depends' => [\yii\web\JqueryAsset::className()]]); */
?>

<link href = "https://unpkg.com/tabulator-tables@4.2.2/dist/css/tabulator.min.css" rel = "stylesheet">

<div class="orders-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <!--    <div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>-->
    <a class="btn btn-success add-row" href='javascript:void(0)'>+</a>

    <?php ActiveForm::end(); ?>




</div>

<?= $this->render('_modal'); ?>

<div id="example-table"></div>

<a class="btn btn-success save-order-button" href='javascript:void(0)'>Save Order</a>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type = "text/javascript" src = "https://unpkg.com/tabulator-tables@4.2.2/dist/js/tabulator.min.js"></script>
<script>

    $(document).ready(function () {

        var table = new Tabulator("#example-table", {
            height: "311px",
            columns: [
                {title: "Item", field: "item"},
                {title: "Quantity", field: "quantity"},
            ],
        });



        $('.add-row').click(function () {
            $('#modal-item').modal('show');
        });


        $('#modal-item').on('show.bs.modal', function (e) {

            var $form = $('#modal-item .modal-body');
            $form.find('#item, #quantity').val(null);

        });

        $('#ok-item-button').on('click', function () {
            var $modal = $('#modal-item');
            var $form = $modal.find('.modal-body');
            var data = {item: $form.find('#item').val(), quantity: $form.find('#quantity').val()};
            //console.log(data);
            table.addRow(data, true, 1);
            $modal.modal('hide');
        });


        //#orders-title, table
        $('.save-order-button').click(function () {
            //alert('a');
            var title = $('#orders-title').val();
            var details = table.getData();
            var data = {title:title, details: details};
            console.log(data);
            
              $.ajax({
                    url: '<?= Url::to(['new-save']); ?>',
                    type: "POST",
                    data: data,
                    success: function (result) {
                        
                        console.log(result);
                        if (result.status == true) {
                            alert('ok');
                        } else {                           
                            console.log('Something error');
                            alert('Something error');
                        }
                    },
                    fail: function (error) {
                        console.log(error);
                    }
                });
            
        });

    });
</script>