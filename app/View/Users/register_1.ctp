<!-- app/View/Users/add.ctp -->
<div class="box login-box">
    <div class="col-lg-5 col-lg-offset-1">
        <?php //echo $this->Html->image('register_student.png', array('class' => 'img-responsive')) ?>
        <div class="col-lg-12">
            <div class="">
                <div class="be-center">
                    
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

        <ul class="nav nav-tabs register">

            <?php
            $_sel_teacher = $_sel_student = "";
            if ($role == 3) {
                $_sel_teacher = "active";
            } else {
                $_sel_student = "active";
            }
            ?>
            <li class="<?php echo $_sel_student; ?>">
                <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'register')); ?>">
                    <?php echo $this->Html->image('feature-icons/students_header.png') ?>
                    Register as Student
                </a>
            </li>
            <li class="<?php echo $_sel_teacher; ?>">
                <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'register', 'teacher')); ?>">
                    <?php echo $this->Html->image('feature-icons/teacher_head_round.png') ?>
                    Register as Teacher
                </a>
            </li>
        </ul>

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
            <?php 
            echo $this->Form->submit(__('Join Now'),array("class" => "btn btn-primary btn-lg")); 
            echo $this->Form->end(); 
            ?>
            <div class="box-form-action">
                <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'login')); ?>">Login</a> | 
                <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'lost_password')); ?>">Lost Password</a>
            </div>
        </div>
    </div>

    <div class="row" >
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