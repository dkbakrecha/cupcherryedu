<div class="box login-box">
    <h3 class="be-center">
        Newsletter Updates
    </h3> 
    <div class="center-heading">
        <div class="col-lg-4 col-lg-offset-4">
            Subscribe to our mailing list to receive an update when new exam notification arrive!
        </div>
    </div>

    <div class="users box-form">
        <div class="col-lg-4 col-lg-offset-4">
            <?php echo $this->Session->flash('auth'); ?>
            <?php echo $this->Form->create('Newsletter', array('class' => 'site-from')); ?>
            <?php
            echo $this->Form->input('name', array(
                'type' => 'text',
                'placeholder' => 'Your Name...',
                'label' => false,
                'div' => false
            ));

            echo $this->Form->input('email_address', array(
                'type' => 'email',
                'placeholder' => 'Your Email address...',
                'label' => false,
                'div' => false
            ));



            //echo $this->Html->link("Reload", "#",['class' => 'reload_captcha']);
            ?>

            <div class="row">
                <div class="col-lg-6">
                    <?php
                    echo $this->Form->input('captcha', array(
                        'placeholder' => 'Enter captcha ...',
                        'label' => false,
                        'div' => FALSE
                    ));
                    ?>
                </div>
                <div class="col-lg-4">
                    <?php
                    $img = $this->Html->url(array('controller' => 'pages', 'action' => 'captcha'), TRUE);
                    echo $this->Html->image($img, ['class' => 'captcha']);
                    ?>

                </div>
                <div class="col-lg-1">
                    <i class="btn btn-default fa fa-refresh reload_captcha"></i>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-6">
<?php echo $this->Form->submit(__('Subscribe')); ?>
                </div>

            </div>
<?php echo $this->Form->end(); ?>

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

    $(function () {
        $(".reload_captcha").click(function () {
            d = new Date();
            $(".captcha").attr('src', $(".captcha").attr('src') + "/" + d.getTime());
        });
    });
</script>