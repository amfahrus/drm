<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "t_vendor_legal_npwp".
 *
 * @property integer $t_vendor_legal_npwp_id
 * @property integer $t_vendor_company_id
 * @property string $nomor
 * @property string $alamat
 * @property integer $p_master_city_id
 * @property integer $p_master_region_id
 * @property string $kode_pos
 * @property integer $status_pkp
 * @property string $nomor_pkp
 * @property string $lampiran
 * @property string $create_date
 * @property integer $create_user
 * @property string $update_date
 * @property integer $update_user
 *
 * @property PMasterCity $pMasterCity
 * @property PMasterRegion $pMasterRegion
 * @property TVendorCompany $tVendorCompany
 */
class TVendorLegalNpwp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $uploadFile;

    public static function tableName()
    {
        return 't_vendor_legal_npwp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['t_vendor_company_id', 'p_master_city_id', 'p_master_region_id', 'status_pkp', 'create_user', 'update_user'], 'integer'],
            [['uploadFile'], 'file', 'maxSize' => 1572864, 'skipOnEmpty' => false, 'extensions' => 'zip'],
            [['nomor', 'alamat', 'kode_pos', 'nomor_pkp', 'lampiran'], 'string'],
            [['create_date', 'update_date'], 'safe'],
            [['p_master_city_id', 'p_master_region_id', 'status_pkp', 'nomor', 'alamat', 'kode_pos', 'nomor_pkp', 'create_user', 'update_user'], 'required'],
            [['p_master_city_id'], 'exist', 'skipOnError' => true, 'targetClass' => PMasterCity::className(), 'targetAttribute' => ['p_master_city_id' => 'p_master_city_id']],
            [['p_master_region_id'], 'exist', 'skipOnError' => true, 'targetClass' => PMasterRegion::className(), 'targetAttribute' => ['p_master_region_id' => 'p_master_region_id']],
            [['t_vendor_company_id'], 'exist', 'skipOnError' => true, 'targetClass' => TVendorCompany::className(), 'targetAttribute' => ['t_vendor_company_id' => 't_vendor_company_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            't_vendor_legal_npwp_id' => 'Vendor Legal Npwp ID',
            't_vendor_company_id' => 'Vendor Company ID',
            'nomor' => 'Nomor',
            'alamat' => 'Alamat',
            'p_master_city_id' => 'Kota',
            'p_master_region_id' => 'Provinsi',
            'kode_pos' => 'Kode Pos',
            'status_pkp' => 'Status Pkp',
            'nomor_pkp' => 'Nomor Pkp',
            'lampiran' => 'Lampiran',
            'uploadFile' => 'Lampiran',
            'create_date' => 'Create Date',
            'create_user' => 'Create User',
            'update_date' => 'Update Date',
            'update_user' => 'Update User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPMasterCity()
    {
        return $this->hasOne(PMasterCity::className(), ['p_master_city_id' => 'p_master_city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPMasterRegion()
    {
        return $this->hasOne(PMasterRegion::className(), ['p_master_region_id' => 'p_master_region_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTVendorCompany()
    {
        return $this->hasOne(TVendorCompany::className(), ['t_vendor_company_id' => 't_vendor_company_id']);
    }
}
