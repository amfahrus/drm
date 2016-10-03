<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "t_vendor_company".
 *
 * @property integer $t_vendor_company_id
 * @property integer $user_id
 * @property string $prefix
 * @property string $name
 * @property string $sufix
 * @property string $area
 * @property integer $referer
 * @property string $create_date
 * @property integer $create_user
 * @property string $update_date
 * @property integer $update_user
 * @property string $no_udangan
 *
 * @property TCompanyCategory[] $tCompanyCategories
 * @property TContactPerson[] $tContactPeople
 * @property User $user
 * @property TVendorCompanySite[] $tVendorCompanySites
 * @property TVendorKepengurusan[] $tVendorKepengurusans
 * @property TVendorKeuLaporan[] $tVendorKeuLaporans
 * @property TVendorKeuModal[] $tVendorKeuModals
 * @property TVendorKeuRekening[] $tVendorKeuRekenings
 * @property TVendorLegalAkta[] $tVendorLegalAktas
 * @property TVendorLegalDomisili[] $tVendorLegalDomisilis
 * @property TVendorLegalIjinlain[] $tVendorLegalIjinlains
 * @property TVendorLegalNpwp[] $tVendorLegalNpwps
 * @property TVendorLegalSiup[] $tVendorLegalSiups
 * @property TVendorSdm[] $tVendorSdms
 * @property TVendorTeknisAlat[] $tVendorTeknisAlats
 * @property TVendorTeknisKomoditi[] $tVendorTeknisKomoditis
 * @property TVendorTeknisPengalaman[] $tVendorTeknisPengalamen
 * @property TVendorTeknisSertifikat[] $tVendorTeknisSertifikats
 * @property TVendorTeknisTambahan[] $tVendorTeknisTambahans
 * @property TVerifikasiVendor[] $tVerifikasiVendors
 */
class TVendorCompany extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_vendor_company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'referer', 'create_user', 'update_user'], 'integer'],
            [['prefix', 'name', 'sufix', 'area'], 'string'],
            [['create_date', 'update_date'], 'safe'],
            [['create_user', 'update_user'], 'required'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            't_vendor_company_id' => 'T Vendor Company ID',
            'user_id' => 'User ID',
            'prefix' => 'Prefix',
            'name' => 'Name',
            'sufix' => 'Sufix',
            'area' => 'Area',
            'referer' => 'Referer',
            'create_date' => 'Create Date',
            'create_user' => 'Create User',
            'update_date' => 'Update Date',
            'update_user' => 'Update User',
            'no_undangan' => 'No Undangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTCompanyCategories()
    {
        return $this->hasMany(TCompanyCategory::className(), ['t_vendor_company_id' => 't_vendor_company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTContactPeople()
    {
        return $this->hasMany(TContactPerson::className(), ['t_vendor_company_id' => 't_vendor_company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserdataInternal()
    {
        return $this->hasOne(UserdataInternal::className(), ['user_id' => 'referer']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTVendorCompanySites()
    {
        return $this->hasMany(TVendorCompanySite::className(), ['t_vendor_company_id' => 't_vendor_company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTVendorKepengurusans()
    {
        return $this->hasMany(TVendorKepengurusan::className(), ['t_vendor_company_id' => 't_vendor_company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTVendorKeuLaporans()
    {
        return $this->hasMany(TVendorKeuLaporan::className(), ['t_vendor_company_id' => 't_vendor_company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTVendorKeuModals()
    {
        return $this->hasMany(TVendorKeuModal::className(), ['t_vendor_company_id' => 't_vendor_company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTVendorKeuRekenings()
    {
        return $this->hasMany(TVendorKeuRekening::className(), ['t_vendor_company' => 't_vendor_company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTVendorLegalAktas()
    {
        return $this->hasMany(TVendorLegalAkta::className(), ['t_vendor_company_id' => 't_vendor_company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTVendorLegalDomisilis()
    {
        return $this->hasMany(TVendorLegalDomisili::className(), ['t_vendor_company_id' => 't_vendor_company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTVendorLegalIjinlains()
    {
        return $this->hasMany(TVendorLegalIjinlain::className(), ['t_vendor_company_id' => 't_vendor_company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTVendorLegalNpwps()
    {
        return $this->hasMany(TVendorLegalNpwp::className(), ['t_vendor_company_id' => 't_vendor_company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTVendorLegalSiups()
    {
        return $this->hasMany(TVendorLegalSiup::className(), ['t_vendor_company_id' => 't_vendor_company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTVendorSdms()
    {
        return $this->hasMany(TVendorSdm::className(), ['t_vendor_company_id' => 't_vendor_company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTVendorTeknisAlats()
    {
        return $this->hasMany(TVendorTeknisAlat::className(), ['t_vendor_company_id' => 't_vendor_company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTVendorTeknisKomoditis()
    {
        return $this->hasMany(TVendorTeknisKomoditi::className(), ['t_vendor_company_id' => 't_vendor_company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTVendorTeknisPengalamen()
    {
        return $this->hasMany(TVendorTeknisPengalaman::className(), ['t_vendor_company_id' => 't_vendor_company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTVendorTeknisSertifikats()
    {
        return $this->hasMany(TVendorTeknisSertifikat::className(), ['t_vendor_company_id' => 't_vendor_company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTVendorTeknisTambahans()
    {
        return $this->hasMany(TVendorTeknisTambahan::className(), ['t_vendor_company_id' => 't_vendor_company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTVerifikasiVendors()
    {
        return $this->hasMany(TVerifikasiVendor::className(), ['t_vendor_company_id' => 't_vendor_company_id']);
    }
}
