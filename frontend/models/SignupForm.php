<?php

namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model {

    public $email;
    public $password;
    public $first_name;
    public $last_name;
    public $dob;
    public $contact_no;
    public $country_code;
    public $country;
    public $gender;
    public $confirm_password;
    public $rules = true;
    public $notification = 0;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            ['password', 'required'],
            [['first_name', 'last_name'], 'string', 'max' => 50],
            [['first_name', 'contact_no', 'dob', 'confirm_password', 'contact_no'], 'required'],
            ['confirm_password', 'compare', 'compareAttribute' => 'password', 'message' => "Passwords don't match"],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'rules' => "By clicking the 'Sign Up' button, you confirm that you accept our Terms of use and Privacy Policy ",
            'country' => 'Nationality',
            'contact_no' => 'Contact Number',
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup() {
        $guest = $this->usercheck();
        if ($guest) {
            return $guest;
        } else {
            if (!$this->validate()) {
                return null;
            }

            $user = new User();
            $user->first_name = $this->first_name;
            $user->email = $this->email;
            $user->dob = date("Y-m-d", strtotime($this->dob));
            $user->country = $this->country;
            $user->mobile_no = $this->contact_no;
            $user->email_verification = 0;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            return $user->save() ? $user : null;
        }
    }

    public function usercheck() {
        $user_guest = User::find()->where(['email' => $this->email])->one();

        if (!empty($user_guest)) {
            $user_guest->first_name = $this->first_name;
            $user_guest->country = $this->country;
            $user_guest->dob = date("Y-m-d", strtotime($this->dob));
            $user_guest->mobile_no = $this->contact_no;
            $user_guest->usertype = 1;
            $user_guest->email_verification = 0;
            $user_guest->setPassword($this->password);
            $user_guest->generateAuthKey();
            if ($user_guest->save()) {
                return $user_guest;
            }
        } else {
            return FALSE;
        }
    }

}
