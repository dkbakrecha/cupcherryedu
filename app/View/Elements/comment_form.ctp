<div class="box comment_form">
    <div class="box-header">
        <h3 class="box-title">Post a comment</h3>
    </div>
    <div class="box-content">
        <?php echo $this->Form->create('Comment', array('id' => 'commentForm')); ?>
        <?php echo $this->Form->hidden('type', array('value' => $type)); ?>
        <?php echo $this->Form->hidden('type_id', array('value' => $type_id)); ?>

        <div class="row">
            <div class="col-lg-12">
                <span class="infotext">Your contact info will not be show</span>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-6">
                <?php echo $this->Form->input('name'); ?>
            </div>
            <div class="col-lg-6 col-md-6">
                <?php echo $this->Form->input('email'); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <?php
                echo $this->Form->input('comment', array(
                    'type' => 'textarea'
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