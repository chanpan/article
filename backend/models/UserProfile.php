<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user_profile".
 *
 * @property integer $user_id
 * @property string $fname
 * @property string $lname
 * @property integer $gender
 * @property string $tel
 * @property string $address
 * @property string $image
 */
class UserProfile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lname', 'gender', 'tel', 'address'], 'required','message'=>'กรุณาระบุ'],
            
            [['fname'],'required','message'=>"กรุณากรอกชื่อ"],
            
            [['user_id', 'gender'], 'integer'],
            [['fname', 'lname', 'address', 'image'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'fname' => 'ชื่อ',
            'lname' => 'นามสกุล',
            'gender' => 'เพศ',
            'tel' => 'เบอร์โทรศัพท์',
            'address' => 'ที่อยู่',
            'image' => 'รูปภาพ',
        ];
    }
    
}













