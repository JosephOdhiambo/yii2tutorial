<?php
namespace frontend\components;
use Yii;
use yii\base\Behavior;
use yii\web\Application;

class CheckIfLoggedIn extends Behavior{
 public function events(){
  return [
   Application::EVENT_BEFORE_REQUEST => 'checkIfLoggedIn',
  ];
 }

//  public function checkIfLoggedIn(){
//      if(Yii::$app->user->isGuest){
//          echo 'you are a guest ';
//      }
// //     else{
// //         echo 'you are logged in';
// //     }
// //     die();
//  }
// }

?>