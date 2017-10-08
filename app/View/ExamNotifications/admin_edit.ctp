<?php
echo $this->Html->script(array(
    'ckeditor/ckeditor',
    'ckeditor/adapters/jquery',
));
?>
<div class="warper container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            Edit Content
            <a class='btn btn-success btn-sm pull-right' href='<?php echo $this->Html->url(array('controller' => 'cms_pages', 'action' => 'index', 'admin' => true)); ?>'>Back</a>
        </div>

        <div class="panel-body">
            <div class="form-horizontal" >
                <?php
                echo $this->Form->create('ExamNotification', array("role" => "form"));
                echo $this->Form->hidden('id');
                ?>  
                <div class="form-group">
                    <label class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-7">
                        <?php
                        echo $this->Form->input('title', array(
                            'class' => 'form-control',
                            'placeholder' => 'Title',
                            'label' => false,
                            'type' => 'textbox'
                        ));
                        ?>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">Title Slug</label>
                    <div class="col-sm-7">
                        <?php
                        echo $this->Form->input('title_slug', array(
                            'class' => 'form-control',
                            'placeholder' => 'Title',
                            'label' => false,
                            'type' => 'textbox'
                        ));
                        ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Notification Text</label>
                    <div class="col-sm-7">
                        <?php
                        echo $this->Form->input('notification_text', array(
                            'class' => 'form-control',
                            'placeholder' => 'Notification Text',
                            'label' => false,
                            'type' => 'textarea'
                        ));
                        ?>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-md-5 col-sm-6 col-xs-12">
                        <?php
                        echo $this->Form->button(__('Save'), array(
                            'class' => 'btn btn-primary btn-flat',
                            'type' => 'submit'
                        ));
                        ?>

                        <?php
                        echo $this->Form->button(__('Cancel'), array(
                            'class' => 'btn btn-default btn-flat',
                            'type' => 'button',
                            'onclick' => 'goBack()',
                        ));
                        ?>
                    </div>
                </div>


                <?php echo $this->Form->end(); ?>

            </div>

        </div>
        <!-- Warper Ends Here (working area) -->    
    </div>
</div>
<script>
    $(document).ready(function () {
        $('textarea#ExamNotificationNotificationText').ckeditor();
    });
</script>