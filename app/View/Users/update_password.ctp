<div class="box login-box">
    <h3 class="be-center"><?php echo __($title) ?></h3> 

    <div class="col-lg-4 col-lg-offset-4">
        <div class="users box-form">

            <div class="alert alert-info">Please enter new password</div>

            <?php echo $this->Session->flash(); ?>
            <?php echo $this->Form->create('User'); ?>

            <?php
            echo $this->Form->input('password', array(
                'label' => false,
                'required' => true,
                'class' => 'inputstyle',
                'placeholder' => 'Please enter new password',
                'div' => false,
            ));
            ?>
            <?php
            echo $this->Form->input('confirm_password', array(
                'label' => false,
                'type' => 'password',
                'required' => true,
                'class' => 'inputstyle',
                'placeholder' => 'Please re-enter your password',
                'div' => false,
            ));
            ?>

            <?php echo $this->Form->submit('Update password', array('class' => 'btn btn-primary')); ?>
            <?php echo $this->Form->end() ?>

            <div class="box-form-action">
                <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'login')); ?>">Back to login</a>               
            </div>
        </div>
    </div>
</div>