<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "items".
 *
 * @property integer $id
 * @property string $item_name
 * @property string $item_brand
 * @property string $item_desc
 * @property integer $item_sprice
 * @property integer $item_rprice
 * @property integer $item_onHand
 * @property string $item_pic
 * @property integer $Logs_id
 * @property integer $Supplier_id
 *
 * @property Logs $logs
 * @property Supplier $supplier
 */
class Items extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_name', 'item_sprice', 'item_rprice', 'item_onHand', 'Logs_id', 'Supplier_id'], 'required'],
            [['item_sprice', 'item_rprice', 'item_onHand', 'Logs_id', 'Supplier_id'], 'integer'],
            [['item_name'], 'string', 'max' => 100],
            [['item_brand'], 'string', 'max' => 50],
            [['item_desc'], 'string', 'max' => 250],
            [['item_pic'], 'string', 'max' => 45],
            [['Logs_id'], 'exist', 'skipOnError' => true, 'targetClass' => Logs::className(), 'targetAttribute' => ['Logs_id' => 'id']],
            [['Supplier_id'], 'exist', 'skipOnError' => true, 'targetClass' => Supplier::className(), 'targetAttribute' => ['Supplier_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_name' => 'Item Name',
            'item_brand' => 'Item Brand',
            'item_desc' => 'Item Description',
            'item_sprice' => "Supplier's Price",
            'item_rprice' => "Retail Price",
            'item_onHand' => 'Available Supply',
            'item_pic' => 'Item Picture',
            'Logs_id' => 'Logs ID',
            'Supplier_id' => 'Supplier Info',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLogs()
    {
        return $this->hasOne(Logs::className(), ['id' => 'Logs_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupplier()
    {
        return $this->hasOne(Supplier::className(), ['id' => 'Supplier_id']);
    }
}
