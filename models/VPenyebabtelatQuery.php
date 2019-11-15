<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[VPenyebabtelat]].
 *
 * @see VPenyebabtelat
 */
class VPenyebabtelatQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return VPenyebabtelat[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return VPenyebabtelat|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
