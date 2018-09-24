<div class="">
    <h3 class="be-center">
        Create your account
    </h3> 
    <div class="center-heading">
        <div class="col-lg-4 col-lg-offset-4">
            <span class="site-hr-top"> <i class="fa fa-child" aria-hidden="true"></i> </span>
        </div>
    </div>

    <div class="col-lg-4 col-lg-offset-4">


        <div class="users box-form">
            <?php echo $this->Form->create('User', array('class' => 'site-from')); ?>
            <fieldset>
                <?php
                echo $this->Form->input('first_name', array('label' => false, 'placeholder' => 'First Name'));
                echo $this->Form->input('last_name', array('label' => false, 'placeholder' => 'Last Name'));
                echo $this->Form->input('email', array('label' => false, 'placeholder' => 'Email Address'));
                echo $this->Form->input('password', array('label' => false, 'placeholder' => 'Password'));
                ?>
            </fieldset>
            <?php
            echo $this->Form->submit(__('Create my free account'), array("class" => "btn-block btn-info"));
            echo $this->Form->end();
            ?>
            <div class="box-form-action">
                <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'login')); ?>">Do you already have an account?</a>
            </div>
        </div>
    </div>

    <div class="col-lg-5" style="display: none;">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo $this->Html->image('feature-icons/students_podcasts.png') ?>
            </div>
            <div class="panel-body">
                Access hundreds of free podcasts
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo $this->Html->image('feature-icons/students_delivery.png') ?>
            </div>
            <div class="panel-body">
                Delivered by students, consultants and professors 
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo $this->Html->image('feature-icons/students_peer_review.png') ?>
            </div>
            <div class="panel-body">
                Peer-reviewed to ensure quality 
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo $this->Html->image('feature-icons/students_bank.png') ?>
            </div>
            <div class="panel-body">
                Question bank containing hundreds of questions 
            </div>
        </div>
    </div>
</div>