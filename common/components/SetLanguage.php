<?php

/**
 * Description of SetLnguage
 *
 * @author user
 */

namespace common\components;

use Yii;
use yii\base\Component;
use yii\web\Cookie;

class SetLanguage extends Component {

    public function init() {
        $language = $this->Language();
        Yii::$app->session['language'] = $language;

        $words = $this->Words($language);
        $words = json_decode($words);
        Yii::$app->session['words'] = $words;
        parent::init();
    }

    /*
     * check cookie set or not, if not set default language is Ebglish
     */

    public static function Language() {
        $cookies1 = Yii::$app->request->cookies;
        if ($cookies1->has('language')) {
            $language = $cookies1->getValue('language');
        } else {
            $language = 'en';
        }

        Yii::$app->session['language'] = $language;
        return $language;
    }

    /*
     * set cookie
     */

    public static function SetLanguage($langauge = null) {

        setcookie('language', '', time() - 999999, '/', '');
        $cookie = new Cookie([
            'name' => 'language',
            'value' => $langauge,
            'expire' => time() + 86400 * 1,
        ]);

        Yii::$app->getResponse()->getCookies()->add($cookie);
    }

    /*
     * json for common words in static page
     */

    public static function Words($language) {
        if ($language == 'ar') {
            require(__DIR__ . '/ArabicWords.php');
        } else {
            require(__DIR__ . '/EnglishWords.php');
        }
        $values = json_encode($array);
        return $values;
    }

}
