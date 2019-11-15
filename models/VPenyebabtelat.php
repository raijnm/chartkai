<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "v_penyebabtelat".
 *
 * @property int $id_gangguan
 * @property string $nama
 * @property string $no_ka
 * @property int $id_kelas
 * @property string $tgl_ka
 * @property string $keterangan
 * @property string $ket
 * @property string $akibat_nama
 * @property string $m_penyebab
 */
class VPenyebabtelat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'v_penyebabtelat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_gangguan', 'id_kelas'], 'integer'],
            [['no_ka', 'tgl_ka', 'ket', 'm_penyebab'], 'required'],
            [['tgl_ka'], 'safe'],
            [['keterangan', 'ket', 'akibat_nama'], 'string'],
            [['nama'], 'string', 'max' => 255],
            [['no_ka'], 'string', 'max' => 50],
            [['m_penyebab'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_gangguan' => 'Id Gangguan',
            'nama' => 'Nama',
            'no_ka' => 'No Ka',
            'id_kelas' => 'Id Kelas',
            'tgl_ka' => 'Tgl Ka',
            'keterangan' => 'Keterangan',
            'ket' => 'Ket',
            'akibat_nama' => 'Akibat Nama',
            'm_penyebab' => 'M Penyebab',
        ];
    }

    /**
     * {@inheritdoc}
     * @return VPenyebabtelatQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VPenyebabtelatQuery(get_called_class());
    }
}
