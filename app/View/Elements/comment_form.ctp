<div class="box comment_form">
    <div class="box-header">
        <h3 class="box-title">Add your thoughts</h3>
        <span class="box-infotext">Your email address will not be published. Required fields are marked *</span>
    </div>
    <div class="box-content">
        <?php
        echo $this->Form->create('Comment', array(
            'id' => 'commentForm', 'class' => 'from vertical-form',
            "url" => array("controller" => "comments", "action" => "update"),
        ));
        ?>
<?php echo $this->Form->hidden('type', array('value' => $type)); ?>
<?php echo $this->Form->hidden('type_id', array('value' => $type_id)); ?>

        <div class="row">
            <div class="col-lg-6 col-md-6">
                <?php
                echo $this->Form->input('name', array(
                    'label' => false,
                    'placeholder' => 'Name *'
                ));
                ?>
            </div>
            <div class="col-lg-6 col-md-6">
                <?php
                echo $this->Form->input('email', array(
                    'label' => false,
                    'placeholder' => 'Email *'
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
                    'placeholder' => 'Comment *'
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