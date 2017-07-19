<div class="box ask_question_form">
    <div class="box-header">
        <?php echo $this->Html->image('ask-question.png',array('class' =>'ask_question_img')); ?>
        <h3 class="box-title">Have a Question?</h3>
        <span class="box-infotext">
            Get Advice from experts, for free, in 48 Hours
            <div>Post Your Thought</div>
        </span>
    </div>
    <div class="box-content">
        <?php
        echo $this->Form->create('Comment', array(
            'id' => 'commentForm', 'class' => 'from vertical-form',
            "url" => array("controller" => "comments", "action" => "update"),
        ));
        ?>
        <?php echo $this->Form->hidden('type', array('value' => 3)); ?>
        <?php echo $this->Form->hidden('type_id', array('value' => 0)); ?>

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <?php
                echo $this->Form->input('name', array(
                    'label' => false,
                    'placeholder' => 'Your Name *'
                ));
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <?php
                echo $this->Form->input('email', array(
                    'label' => false,
                    'placeholder' => 'Your Email *'
                ));
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <?php
                echo $this->Form->input('comment', array(
                    'type' => 'textarea',
                    'label' => false,
                    'placeholder' => 'Your Question ... *'
                ));
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <?php echo $this->Form->submit('Post It!'); ?>
            </div>
        </div>

        <?php echo $this->Form->end(); ?>

    </div>
</div>

<script type="text/javascript">
    $('#commentForm').validate({
        rules: {
            'data[Comment][name]': {
                required: true
            },
            'data[Comment][email]': {
                required: true
            },
            'data[Comment][comment]': {
                required: true
            }
        },
        messages: {
            'data[Comment][email]': {
                required: "Please enter your correct email address"
            },
            'data[Comment][name]': {
                required: "Please enter your name"
            },
            'data[Comment][comment]': {
                required: "Please enter your comment here"
            }
        }
    });
</script>