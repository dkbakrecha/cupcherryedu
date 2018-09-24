<div class="">
    <h3 class="be-center">
        Login to your account
    </h3> 
    <div class="center-heading">
        <div class="col-lg-4 col-lg-offset-4">
            <span class="site-hr-top"> <i class="fa fa-child" aria-hidden="true"></i> </span>
        </div>
    </div>

    <div class="users box-form">
        <div class="col-lg-3 col-lg-offset-3">
            <?php echo $this->Session->flash('auth'); ?>
            <?php echo $this->Form->create('User', array('class' => 'site-from')); ?>
            <?php
            echo $this->Form->input('email', array('label' => false, 'placeholder' => 'Username or Email'));
            echo $this->Form->input('password', array('label' => false, 'placeholder' => 'Password'));
            ?>

            <div class="row">
                <div class="col-lg-5">
                    <?php echo $this->Form->submit(__('Login')); ?>
                </div>
                <div class="col-lg-7" style="display: none;">
                    <div class="btn btn-default fb_login"><i class="fa fa-facebook"></i>Sign in with Facebook</div>
                </div>
            </div>
            <?php echo $this->Form->end(); ?>

        </div>

        <div class="col-lg-3 ">
            <div class="loginSupportContainer">
                <h4>Need a Cupcherry Account?</h4>
                <ul class="benefitsList">
                    <li><span class="fa fa-check"></span> Filter Exam Notifications with Personal Calender</li>
                    <li><span class="fa fa-check"></span> Access notes and share with friend</li>
                    <li><span class="fa fa-check"></span> Exam related Mock Tests share leaderboard among friends</li>
                </ul>
                



            </div>
        </div>
        <div class="col-lg-6 col-lg-offset-3">
            <div class="box-form-action ">
                <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'register')); ?>">Register</a> | 
                <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'lost_password')); ?>">Lost Password</a>
                <!--<a href="<?php echo $this->Html->url(array("controller" => "users", "action" => "register")); ?>" class="btn btn-primary pull-right">Create Account</a>-->
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#UserLoginForm').validate({
        rules: {
            'data[User][email]': {
                required: true
            },
            'data[User][password]': {
                required: true
            }
        },
        messages: {
            'data[User][email]': {
                required: "Please enter your correct email address or contact number"
            },
            'data[User][password]': {
                required: "Please enter your password"
            }
        }
    });
</script>
<?php
echo $this->Form->create('social_response', array('url' => array('controller' => 'users', 'action' => 'socialResponse')));
echo $this->Form->hidden('resData');
echo $this->Form->hidden('resFrom');
echo $this->Form->end();

echo $this->element('fb-js');
?>