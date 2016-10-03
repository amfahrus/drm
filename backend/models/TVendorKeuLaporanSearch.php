<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TVendorKeuLaporan;
use backend\models\TVendorCompany;

/**
 * TVendorKeuLaporanSearch represents the model behind the search form about `frontend\models\TVendorKeuLaporan`.
 */
class TVendorKeuLaporanSearch extends TVendorKeuLaporan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['t_vendor_keu_laporan_id', 't_vendor_company_id', 'fk_master_currency', 'create_user', 'update_user'], 'integer'],
            [['tahun_laporan', 'jenis_laporan', 'lampiran', 'create_date', 'update_date'], 'safe'],
            [['nilai_aset', 'hutang', 'pendapatan_kotor', 'laba_bersih'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params,$id)
    {
        $query = TVendorKeuLaporan::find()->where(['=','t_vendor_company_id', $id]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            't_vendor_keu_laporan_id' => $this->t_vendor_keu_laporan_id,
            't_vendor_company_id' => $this->t_vendor_company_id,
            'fk_master_currency' => $this->fk_master_currency,
            'nilai_aset' => $this->nilai_aset,
            'hutang' => $this->hutang,
            'pendapatan_kotor' => $this->pendapatan_kotor,
            'laba_bersih' => $this->laba_bersih,
            'create_date' => $this->create_date,
            'create_user' => $this->create_user,
            'update_date' => $this->update_date,
            'update_user' => $this->update_user,
        ]);

        $query->andFilterWhere(['like', 'tahun_laporan', $this->tahun_laporan])
            ->andFilterWhere(['like', 'jenis_laporan', $this->jenis_laporan])
            ->andFilterWhere(['like', 'lampiran', $this->lampiran]);

        return $dataProvider;
    }
}
