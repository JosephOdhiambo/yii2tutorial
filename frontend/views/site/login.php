<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>

    <div class="row">
        <div class="col-lg-12">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            <div class="input-group mb-3">
                <?= $form->field($model, 'username', [
                    'options' => ['tag' => false],
                    'template' => "{input}",
                ])->textInput(['class' => 'form-control', 'autofocus' => true]) ?>
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                </div>
            </div>


            <div class="input-group mb-3">
                <?= $form->field($model, 'password', [
                        'options' => ['tag' => false],
                        'template' => "{input}",
                ])->passwordInput(['class' => 'form-control', 'autofocus' => true]) ?>
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                </div>
            </div>
            <div class="row">
            <div class="col-8">
                <div class="icheck-primary">
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
                </div>
            </div>
            </div>

                <div class="my-1 mx-0" style="color:#999;">
                    If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                    <br>
                    Need new verification email? <?= Html::a('Resend', ['site/resend-verification-email']) ?>
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
