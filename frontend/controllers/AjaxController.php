<?php

namespace frontend\controllers;

use yii;
use common\models\Product;
use common\models\Cart;
use common\models\WishList;

class AjaxController extends \yii\web\Controller {
    /*
     * This function add product to cart
     * parameeters @quantity and @product_canonical_name
     * Return success if added to the cart
     */

    public function actionAddToCart() {
        if (yii::$app->request->isAjax) {
            $canonical_name = Yii::$app->request->post()['product'];
            $qty = Yii::$app->request->post()['qty'];
            $product = Product::find()->where(['canonical_name' => $canonical_name, 'status' => '1'])->one();
            $type = $_POST['type'];
            $condition = Yii::$app->CartFunctionality->UserCheck();
            
            if ($product->stock > 0) {
                $user_id = isset(Yii::$app->user->identity->id) ? Yii::$app->user->identity->id : '';
                $cart = Cart::find()->where(['product_id' => $product->id])->andWhere($condition)->one();
                if (!empty($cart)) {
                    $quantity = $cart->quantity + $qty;
                    $stock =Yii::$app->CartFunctionality->productStock($product->id);
                    $cart->quantity = $quantity;
                    if ($stock >= $quantity) {
                        $cart->save();
                    }
                } else {
                    Yii::$app->CartFunctionality->AddToCart($user_id, Yii::$app->session['temp_user'], $product->id, $qty);
                }
            } else {
                
                $cart_data = 0;
                exit;
            }
            if ($type == 2) {
                return $this->redirect(['cart/mycart']);
            }
            $cart_contents = Cart::find()->where($condition)->all();
            $carrt_count = count($cart_contents);
            if (!empty($cart_contents)) {
                $cart_data = $this->renderPartial('cart_contents', ['cart_contents' => $cart_contents]);
            } else {
                $cart_data = '';
            }
            $arr_variable = array('content' => $cart_data, 'count' => $carrt_count);
            $data['result'] = $arr_variable;
            return json_encode($data);
        }
    }

    /*
     * Remove item from cart
     * parameeters @cart_id
     * Return success if remove item from cart
     */

    public function actionRemoveCart() {
        if (yii::$app->request->isAjax) {
            $id = Yii::$app->request->post()['id'];
            $condition = Yii::$app->CartFunctionality->UserCheck();
            $cart = Cart::find()->where(['id' => yii::$app->EncryptDecrypt->Encrypt('decrypt', $id)])->andWhere($condition)->one();
            if ($cart) {
                $cart->delete();
                $cart_contents = Cart::find()->where($condition)->all();
                $carrt_count = count($cart_contents);
                if (!empty($cart_contents)) {
                    $cart_data = $this->renderPartial('cart_contents', ['cart_contents' => $cart_contents]);
                } else {
                    $cart_data = '';
                }
                $arr_variable = array('content' => $cart_data, 'count' => $carrt_count, 'msg' => 'success', 'href' => Yii::$app->request->referrer);
                $data['result'] = $arr_variable;
                return json_encode($data);
            }
        }
    }

    /**
     * Save product to wish list.
     * @param product id
     * if user logged in set user id otherwise redirect to login
     */
    public function actionSavewishlist() {
        if (Yii::$app->request->isAjax) {
            $canonical = $_POST['product'];
            $product = \common\models\Product::find()->where(['canonical_name' => $canonical, 'status' => '1'])->one();
            $product_id = $product->id;
            if ($product_id != '') {
                $flag = Yii::$app->CartFunctionality->AddToWishlist($product_id);
            }
            echo $flag;
        }
    }

}
