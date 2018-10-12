<div class="row note_list cardbox">
    <div class="col-lg-8">
        <?php echo $this->element('post_tile');?>

    </div>

    <?php
    if (empty($LoggedinUser)) {
        ?>
        <div class="col-lg-4">
            <div class="box sidebar m-bottom15">
                <div class="box-header">
                    <h3 class="box-title">Stay Updated</h3>
                </div>
                <div class="box-content">
                    <p>Get daily articles in your inbox for free.</p>
                    <div id="home_subscribe" >

                        <form role="form" id="hr-subscribe-form" action="<?php echo $this->Html->url(array('controller' => 'newsletters', 'action' => 'add')); ?>" method="post" name="hr-subscribe-form" novalidate="" class="hr-subscribe-form">
                            <div class="input-group input-group-lg">
                                <?php
                                echo $this->Form->input('email_address', array(
                                    'type' => 'email',
                                    'class' => 'form-control',
                                    'placeholder' => 'Email address...',
                                    'label' => false,
                                    'div' => false
                                ));
                                ?>
                                <span class="input-group-btn">
                                    <button type="submit" name="subscribe" id="mc-embedded-subscribe" class="btn btn-secondary">Subscribe!</button>
                                </span>
                            </div>
                            <div id="responses">
                                <div class="response" id="mce-response" style="display:none"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php //echo $this->element('sidebar/topposts'); ?>
            <?php //echo $this->element('sidebar/newnotes');  ?>
        </div>  
        <?php
    }
    ?>

</div>