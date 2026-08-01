<?php
    use App\core\form\Form;
    use App\models\User;
    
    /** @var User $model */

    // SUBTOPIC: CREATE VIEW COMPONENT & IMPLEMENT PAGE TITLE -- (set the title at here or inside AuthController.php for each method example: profile() {...here...})
     /** @var \App\core\View $this */
    $this->title = 'Login';

?>
<h1>Login</h1>
<br>
<card>
    <?php $form = Form::begin('', "post"); ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'password')->passwordField(); ?>
        <button type="submit" class="btn btn-primary">Submit</button>
    <?php Form::end(); ?>
</card>

    <!-- 
    How we get $model? => Inside the AuthController
    - apa2 tekan mesti ke index.php dulu $app->router->get('/register', [AuthController::class, 'register']);
    - ke class AuthController dan Masuk ke register() function
    - baru ke View page render() function.

        return $this->render('register', [
                'model' => $user
            ]); 
    -->