<!-- app/View/Users/add.ctp -->
<div class="box login-box">
    <h3 class="be-center">Sign Up</h3> 
    <div class="col-lg-6 col-lg-offset-1">
        <div class="col-lg-12">
            <div class="">
                <div class="be-center">
                    <?php echo $this->Html->image('feature-icons/students_header.png') ?>
                </div>
                <div >
                    <div class="sub-title be-center">For Student</div>
                    <div class="section-description"> Whether a starter or advanced, we got you covered </div>
                    <div class="be-center"> For Teachers </div>
                </div>
            </div>
        </div>


    </div>
    <div class="col-lg-4 ">
        <div class="users box-form">
            <?php echo $this->Form->create('User'); ?>
            <fieldset>
                <?php
                echo $this->Form->input('first_name', array('label' => false, 'placeholder' => 'First Name'));
                echo $this->Form->input('last_name', array('label' => false, 'placeholder' => 'Last Name'));
                echo $this->Form->input('email', array('label' => false, 'placeholder' => 'Email Address'));
                echo $this->Form->input('password', array('label' => false, 'placeholder' => 'Password'));
                ?>
            </fieldset>
            <?php echo $this->Form->end(__('Submit')); ?>
            <div class="box-form-action">
                <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'login')); ?>">Login</a> | 
                <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'lost_password')); ?>">Lost Password</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="col-lg-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php echo $this->Html->image('feature-icons/students_podcasts.png') ?>
                    </div>
                    <div class="panel-body">
                        Access hundreds of free podcasts
                    </div>
                </div>
            </div>
            <div class="col-lg-3">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php echo $this->Html->image('feature-icons/students_delivery.png') ?>
                    </div>
                    <div class="panel-body">
                        Delivered by students, consultants and professors 
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php echo $this->Html->image('feature-icons/students_peer_review.png') ?>
                    </div>
                    <div class="panel-body">
                        Peer-reviewed to ensure quality 
                    </div>
                </div>

            </div>
            <div class="col-lg-3">
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
    </div>
</div>