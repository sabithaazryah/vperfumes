<?php

namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use common\components\SetLanguage;
use common\models\User;

/**
 * Site controller
 */
class SiteController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex() {
        $sliders = \common\models\Slider::find()->where(['status' => 1])->all();
        $products = \common\models\Product::find()->all();
        $banner1 = \common\models\Banner::findOne(1);
        $banner2 = \common\models\Banner::findOne(2);
        $banner3 = \common\models\Banner::findOne(3);
        $banner4 = \common\models\Banner::findOne(4);
        return $this->render('index', [
                    'sliders' => $sliders,
                    'banner1' => $banner1,
                    'banner2' => $banner2,
                    'banner3' => $banner3,
                    'banner4' => $banner4,
                    'products' => $products,
        ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if (empty($go)) {
                return $this->redirect(Yii::$app->request->referrer);
            }
            return $this->redirect($go);
        } else {
            $model->password = '';

            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout() {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup() {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
                    'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset() {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
                    'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token) {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
                    'model' => $model,
        ]);
    }

    public function actionLanguage() {
        SetLanguage::SetLanguage($_POST['lang']);
        $words = SetLanguage::Words($_POST['lang']);
        \Yii::$app->session['words'] = $words;
    }

    /*
     * forgot password
     */

    public function actionForgot() {
        $model = new User();
        if ($model->load(Yii::$app->request->post())) {
            $check_exists = User::find()->where(['email' => $model->email])->one();

            if (!empty($check_exists)) {
                $token_value = $this->tokenGenerator();
                $token = $check_exists->id . '_' . $token_value;
                $val = yii::$app->EncryptDecrypt->Encrypt('encrypt', $token);
                $token_model = new \common\models\ForgotPasswordTokens();
                $token_model->user_id = $check_exists->id;
                $token_model->token = $token_value;
                $token_model->save();
                $this->sendMail($val, $check_exists);
                Yii::$app->getSession()->setFlash('success', 'A verification email has been sent to ' . $check_exists->email . ', please check the spam box if you can not find the mail in your inbox. ');
            } else {
                Yii::$app->getSession()->setFlash('error', 'Invalid Email');
            }
            return $this->render('forgot-password', [
                        'model' => $model,
            ]);
        } else {
            return $this->render('forgot-password', [
                        'model' => $model,
            ]);
        }
    }

    public function tokenGenerator() {
        $length = rand(1, 1000);
        $chars = array_merge(range(0, 9));
        shuffle($chars);
        $token = implode(array_slice($chars, 0, $length));
        return $token;
    }

    public function sendMail($val, $model) {
        $message = Yii::$app->mailer->compose('forgot_mail', ['model' => $model,'val' => $val])
                ->setFrom('info@vperfumes.shop')
                ->setTo($model->email)
                ->setSubject('Forgot Password');
        $message->send();
    }
    
     public function actionNewPassword($token) {
        $data = yii::$app->EncryptDecrypt->Encrypt('decrypt', $token);
        $values = explode('_', $data);
        $token_exist = \common\models\ForgotPasswordTokens::find()->where("user_id = " . $values[0] . " AND token = " . $values[1])->one();
        if (!empty($token_exist)) {
            $model = User::find()->where("id = " . $token_exist->user_id)->one();
            $model_form = new \frontend\models\ForgotPassword();
            if ($model_form->load(Yii::$app->request->post()) && $model_form->validate()) {
                $model->password_hash = Yii::$app->security->generatePasswordHash($model_form->confirm_password);
                $model->update();
                $token_exist->delete();
                Yii::$app->getSession()->setFlash('success', 'Password changed successfully. Please login!');
                return $this->redirect(['login']);
            }
            return $this->render('new-password', [
                        'model' => $model,
                        'model_form' => $model_form
            ]);
        } else {
            $this->redirect('error');
        }
    }

}
