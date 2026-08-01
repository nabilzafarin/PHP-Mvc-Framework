<?php

 /** @var \App\core\View $this */
use App\core\form\TextareaField; // SUBTOPIC: IMPROVE FROM WIDGET WITH ABSTRACTION -- (Call Object class TextareaField.)

// SUBTOPIC: CREATE VIEW COMPONENT & IMPLEMENT PAGE TITLE -- (set the title at here or inside AuthController.php for each method example: profile() {...here...})
/** @var \App\models\ContactForm $model */
 $this->title = 'Contact';
?>

<h1>Contact us</h1>
<br>
<card>
    <!-- // SUBTOPIC: IMPROVE FROM WIDGET WITH ABSTRACTION -- (Change html to php form and field widget)  -->
    <?php $form = \App\core\form\Form::begin('', 'post') ?>
        <?php echo $form->field($model, 'subject') ?>
        <?php echo $form->field($model, 'email') ?>
        <?php echo new TextareaField($model, 'body') ?>  <!-- SUBTOPIC: IMPROVE FROM WIDGET WITH ABSTRACTION -- (Call Object class TextareaField.) -->
        <button type="submit" class="btn btn-primary">Submit</button>
    <?php \App\core\form\Form::end() ?>

    <!-- <form action="" method="post">
        <div class="mb-3">
            <label class="form-label">Subject</label>
            <input type="text" class="form-control" name="subject">
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label class="form-label">Body</label>
            <textarea name="body" class="form-text"></textarea> 
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form> -->

</card>
