<?php

namespace api\modules\v1\controllers;

use Yii;
use yii\rest\ActiveController;
use common\models\LoginForm;
use common\models\User;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;

/**
 * Unit Controller API
 */
class UnitController extends ActiveController
{
    public $modelClass = 'api\modules\v1\models\Unit';   
    
    public function behaviors()
    {
		$behaviors = parent::behaviors();
		/* http://domain.name/api/web/v1/unit?access-token=YOUR_AUTH_KEY*/
		$behaviors['authenticator'] = [
			'class' => QueryParamAuth::className(),
			/*'class' => CompositeAuth::className(),
			'authMethods' => [
				HttpBasicAuth::className(),
				HttpBearerAuth::className(),
				QueryParamAuth::className(),
			],*/
		];
		return $behaviors;
    } 
}


