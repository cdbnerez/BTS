<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "supplier".
 *
 * @property integer $id
 * @property string $supplier_lname
 * @property string $supplier_fname
 * @property string $supplier_desc
 *
 * @property Items[] $items
 */
class Supplier extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'supplier';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['supplier_lname', 'supplier_fname'], 'required'],
            [['supplier_lname', 'supplier_fname'], 'string', 'max' => 100],
            [['supplier_desc'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'supplier_lname' => "Supplier's Last Name",
            'supplier_fname' => "Supplier's First Name",
            'supplier_desc' => 'Supplier Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(Items::className(), ['Supplier_id' => 'id']);
    }
	
	public function getSFullname()
	{
		return $this->supplier_lname . ', ' . $this->supplier_fname;
	}

}
