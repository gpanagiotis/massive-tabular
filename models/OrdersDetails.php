<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders_details".
 *
 * @property int $id
 * @property int $orders_id
 * @property string $item
 * @property int $the_number
 *
 * @property Orders $orders
 */
class OrdersDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['orders_id'], 'required'],
            [['orders_id', 'the_number'], 'integer'],
            [['item'], 'string', 'max' => 255],
            [['orders_id'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::className(), 'targetAttribute' => ['orders_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'orders_id' => 'Orders ID',
            'item' => 'Item',
            'the_number' => 'The Number',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasOne(Orders::className(), ['id' => 'orders_id']);
    }
}
