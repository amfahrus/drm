<?php

namespace api\modules\v1\controllers;

use Yii;
use yii\rest\Controller;
use app\models\LoginForm;
/**
 * Auth Controller API
 */
class AuthController extends Controller
{
	public function actions()
	{
		return [
				'error' => [
				'class' => 'yii\web\ErrorAction',
			],
		];
	}

    public function actionLogin(){
		$model = new LoginForm();
			if ($model->load(Yii::$app->getRequest()->getBodyParams(), '') && $model->login()) {
				return [
					'message' => 'Login sukses',
					'username' => Yii::$app->user->identity->username,
					'token' => Yii::$app->user->identity->access_token
				];
			} else {
				return [
					'message' => 'Login gagal'
			];
		}
	}   
	
	
}


