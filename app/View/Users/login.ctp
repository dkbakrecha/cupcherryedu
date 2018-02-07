<!--//app/View/Users/login.ctp-->
<div class="box login-box">
    <h3 class="be-center">
        Log in to your account
    </h3> 
    <div class="center-heading">
        <div class="col-lg-4 col-lg-offset-4">
    <span class="site-hr-top"> <i class="fa fa-child" aria-hidden="true"></i> </span>
        </div>
    </div>
    <div class="col-lg-4 col-lg-offset-3">
        <div class="users box-form">
            <?php echo $this->Session->flash('auth'); ?>
            <?php echo $this->Form->create('User', array('class' => 'site-from')); ?>
            <fieldset>
                <?php
                echo $this->Form->input('email', array('label' => false, 'placeholder' => 'Username or Email'));
                echo $this->Form->input('password', array('label' => false, 'placeholder' => 'Password'));
                ?>
            </fieldset>

            <div class="row">
                <div class="col-lg-5">
                    <?php echo $this->Form->submit(__('Login')); ?>
                </div>
                <div class="col-lg-7">
                    <div class="btn btn-default fb_login"><i class="fa fa-facebook"></i>Sign in with Facebook</div>
                </div>
            </div>
            <?php echo $this->Form->end(); ?>
            <div class="box-form-action">
                <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'register')); ?>">Register</a> | 
                <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'lost_password')); ?>">Lost Password</a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 ">
        <div class="loginSupportContainer">
            <h4>Need a Study.com Account?</h4>
            <ul class="benefitsList">
                <li><span class="fa fa-check"></span> Simple &amp; engaging videos to help you learn</li>
                <li><span class="icon-ok"></span> Unlimited access to 70,000+ lessons</li>
                <li><span class="icon-ok"></span> The lowest-cost way to earn college credit</li>
            </ul>
            <a data-cname="login_page_create_account" test-id="login_page_create_account" href="/academy/plans.html" class="btn btn-cta cta-gold btn-lg btn-block">Create Account</a>


            
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