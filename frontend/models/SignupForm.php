<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;
use frontend\models\TUndangan;
use frontend\models\TVendorCompany;
use frontend\models\TVerifikasiVendor;

/**
 * Signup form
 */
class SignupForm extends Model
{
    //public $username;
    public $email;
    public $password;
    public $no_undangan;
    public $captcha;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            /*['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],*/

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['captcha', 'required'],
            ['captcha', 'string', 'max' => 255],

            ['no_undangan', 'required'],
            ['no_undangan', 'exist', 'targetClass' => '\frontend\models\TUndangan', 'message' => 'Invitation number does not exist.'],
            ['no_undangan', 'unique', 'targetClass' => '\frontend\models\TVendorCompany', 'message' => 'Invitation number has already been taken.'],
            ['no_undangan', 'string', 'max' => 255],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        $user = new User();
        $auth = Yii::$app->authManager;
        //$user->username = $this->username;
        $user->username = $this->email;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        //return $user->save() ? $user : null;
        if($user->save()){
          //die(var_dump($user));
          $role = (object) ['name' => 'frontend'];
          $auth->assign($role,$user->id);

          $vendor = new TVendorCompany();
          $referer = TUndangan::find()->where(['=','no_undangan', $this->no_undangan])->one();

          $vendor->user_id = $user->id;
          $vendor->create_user = $user->id;
          $vendor->update_user = $user->id;
          $vendor->referer = $referer->user_id;
          $vendor->no_undangan = $this->no_undangan;
          $vendor->save();
          //die(var_dump($vendor));

          $verifikasi = new TVerifikasiVendor();
          $verifikasi->t_vendor_company_id = $vendor->t_vendor_company_id;
          $verifikasi->save();
          return $user;
        } else {
          return null;
        }
    }
}
