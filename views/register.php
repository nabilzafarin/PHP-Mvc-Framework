<?php
    use App\core\form\Form;
    use App\models\User;

    /** @var User $model */

    // SUBTOPIC: CREATE VIEW COMPONENT & IMPLEMENT PAGE TITLE -- (set the title at here or inside AuthController.php for each method example: profile() {...here...})
    /** @var \App\core\View $this */
    $this->title = 'Register';
?>
<h1>Create an account</h1>
<br>
<card>
    <?php $form = Form::begin('', "post"); ?>
        <div class="row">
            <div class="col">
                <?= $form->field($model, 'firstname') ?>
            </div>
            <div class="col">
                <?= $form->field($model, 'lastname') ?>
            </div>
        </div>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'password')->passwordField(); ?>
        <?= $form->field($model, 'confirmPassword')->passwordField(); ?>
        <button type="submit" class="btn btn-primary">Submit</button>
    <?php Form::end(); ?>
</card>
    <!-- 
    <form action="" method="post">
        <div class="row">
            <div class="col">
                 <div class="mb-3">
                    <label class="form-label">Firstname</label>
                    <input type="text" name="firstname" value="<?php //echo $model->firstname ?>" class="form-control<?php //echo $model->hasError('firstname') ? ' is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php //echo $model->getFirstError('firstname') ?>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label class="form-label">Lastname</label>
                    <input type="text" class="form-control" name="lastname">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="confirmPassword">
            <div id="pwdHelp" class="form-text">Repeat your password for confirmation.</div>
        </div>
    </form> 
    -->

    <!-- 
    How we get $model? => Inside the AuthController
    - apa2 tekan mesti ke index.php dulu $app->router->get('/register', [AuthController::class, 'register']);
    - ke class AuthController dan Masuk ke register() function
    - baru ke View page render() function.

        return $this->render('register', [
                'model' => $user
            ]); 
    -->