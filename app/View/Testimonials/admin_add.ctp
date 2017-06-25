<div class="warper container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo "Add Testimonial"; ?>
            <a class='btn btn-success btn-xs pull-right' href='<?php echo $this->Html->url(array('controller' => 'testimonials', 'action' => 'add', 'admin' => true)); ?>'>
                Back
            </a>
        </div>
        <div class="panel-body">

            <?php echo $this->Form->create('Testimonial', array('class' => 'form-horizontal')); ?>    
            <div class="form-group">
                <label class="col-sm-2 control-label">Title</label>
                <div class="col-sm-7">
                    <?php
                    echo $this->Form->input('testimonial_text', array(
                        'class' => 'form-control',
                        'label' => false,
                        'placeholder' => 'Testimonial Text'
                    ));
                    ?>
                </div>
            </div>
            <hr class="dotted">

            <div class="form-group">
                <label class="col-sm-2 control-label">User ID</label>
                <div class="col-sm-7">
                    <?php
                    echo $this->Form->input('user_id', array(
                        'class' => 'form-control',
                        'label' => false,
                        'placeholder' => 'Select User',
                        'options' => $userList
                    ));
                    ?>
                </div>
            </div>
            <hr class="dotted">

            <button type="submit" class="btn btn-purple col-lg-offset-2">Submit</button>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>

</div>
<!-- Warper Ends Here (working area) -->    