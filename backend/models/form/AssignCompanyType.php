<?php

namespace backend\models\form;

use Yii;
use yii\rbac\Item;
use yii\helpers\Json;
use yii\base\Model;
use backend\models\MasterCategory;
use backend\models\TVendorCompany;
use backend\models\TCompanyCategory;
use mdm\admin\components\Helper;

/**
 * This is the model class for table "tbl_auth_item".
 *
 * @property string $name
 * @property integer $type
 * @property string $description
 * @property string $ruleName
 * @property string $data
 *
 */
class AssignCompanyType extends Model
{
    public $t_vendor_company_id;
    public $p_master_category_id;
    public $create_date;
    public $create_user;
    public $update_date;
    public $update_user;
    /**
     * @var Item
     */

    /**
     * Get items
     * @return array
     */
    public function getItems($id)
    {
		$categ = MasterCategory::find()
			->indexBy('category_name')
			->all();
        $avaliable = [];
		foreach ($categ as $row) {
                //$avaliable[$row['unit_id']] = $row['unit_name'];
                //$avaliable[$row['unit_name']] = 'unit';
                $avaliable['category'][$row['p_master_catagory_id']] = $row['category_name'];
            }
		//die(print_r($avaliable));

        $assigned = [];
        $companycateg = MasterCategory::find()
			->select('p_master_category.p_master_catagory_id,p_master_category.category_name')
			->leftJoin('t_company_category', 'p_master_category.p_master_catagory_id = t_company_category.p_master_category_id')
			->where(['t_company_category.t_vendor_company_id' => $id])
			//->with('orders')
			->all();
		//die(print_r($userunits));
		foreach ($companycateg as $rows) {
                //$assigned[$rows['unit_id']] = $rows['unit_name'];
                $assigned['category'][$rows['p_master_catagory_id']] = $rows['category_name'];
				//unset($avaliable[$rows['unit_id']]);
				unset($avaliable['category'][$rows['p_master_catagory_id']]);
                //$avaliable[$row['unit_name']] = 'unit';
                //$avaliable['unit'][$row['unit_id']] = $row['unit_name'];
            }

		//die(print_r($assigned));
        //unset($avaliable[$this->unit_id]);
        return[
            'avaliable' => $avaliable,
            'assigned' => $assigned
        ];
    }

}
