<?php
/**
 * Created by PhpStorm.
 * User: Евгений
 * Date: 25.04.2017
 * Time: 12:43
 */

namespace app\controllers;

use yii\rest\ActiveController;

use app\models\User;

use Yii;

class UserController extends \yii\rest\ActiveController
{

    public $modelClass = 'app\models\User';

    public function actions()
    {
        $actions =  parent::actions(); // TODO: Change the autogenerated stub
        unset($actions['create']);
        return $actions;
    }

    public function actionAuthorize(){

        $username = $_POST['username'];
        $password = $_POST['password'];
        $model = User::find()->where(array('username'=>$username, 'password' => $password))->all();
        //mail("kil-ler097@tut.by", "kil-ler097@tut.by", $res);
        $answer = array();
        $answer= ["asd"=>"0"];
        if (count($model)>0)
        {
            header('Message: true');
            echo  Json::encode($model);
        }else{
            header('Content-Type: application/json');
            header('Message: false');
            echo  Json::encode($model);
        }
    }


}