<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "v_keterlambatan".
 *
 * @property string $no_ka
 * @property string $nama
 * @property int $id_kelas
 * @property string $jml
 */
class VKeterlambatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'v_keterlambatan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kelas'], 'integer'],
            [['jml'], 'number'],
            [['no_ka'], 'string', 'max' => 100],
            [['nama'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'no_ka' => 'No Ka',
            'nama' => 'Nama',
            'id_kelas' => 'Id Kelas',
            'jml' => 'Jml',
        ];
    }
}
