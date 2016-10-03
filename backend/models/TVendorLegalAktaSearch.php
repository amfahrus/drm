<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TVendorLegalAkta;
use backend\models\TVendorCompany;

/**
 * TVendorLegalAktaSearch represents the model behind the search form about `frontend\models\TVendorLegalAkta`.
 */
class TVendorLegalAktaSearch extends TVendorLegalAkta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['t_vendor_legal_akta_id', 't_vendor_company_id', 'create_user', 'update_user'], 'integer'],
            [['nomor', 'jenis', 'tanggal_pembuatan', 'nama_notaris', 'alamat_notaris', 'tanggal_pengesahan', 'tanggal_berita', 'lampiran', 'create_date', 'update_date'], 'safe'],
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
        $query = TVendorLegalAkta::find()->where(['=','t_vendor_company_id', $id]);

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
            't_vendor_legal_akta_id' => $this->t_vendor_legal_akta_id,
            't_vendor_company_id' => $this->t_vendor_company_id,
            'tanggal_pembuatan' => $this->tanggal_pembuatan,
            'tanggal_pengesahan' => $this->tanggal_pengesahan,
            'tanggal_berita' => $this->tanggal_berita,
            'create_date' => $this->create_date,
            'create_user' => $this->create_user,
            'update_date' => $this->update_date,
            'update_user' => $this->update_user,
        ]);

        $query->andFilterWhere(['like', 'nomor', $this->nomor])
            ->andFilterWhere(['like', 'jenis', $this->jenis])
            ->andFilterWhere(['like', 'nama_notaris', $this->nama_notaris])
            ->andFilterWhere(['like', 'alamat_notaris', $this->alamat_notaris])
            ->andFilterWhere(['like', 'lampiran', $this->lampiran]);

        return $dataProvider;
    }
}
