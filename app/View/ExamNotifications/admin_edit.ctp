<?php
echo $this->Html->script(array(
    'ckeditor/ckeditor',
    'ckeditor/adapters/jquery',
    'bootstrap-datetimepicker/js/bootstrap-datetimepicker.min',
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
                    <div class="col-sm-7">
                        <?php
                        echo $this->Form->input('title', array(
                            'class' => 'form-control',
                            'placeholder' => 'Title',
                            'type' => 'textbox'
                        ));
                        ?>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-7">
                        <?php
                        echo $this->Form->input('title_slug', array(
                            'class' => 'form-control',
                            'placeholder' => 'Title',
                            'type' => 'textbox'
                        ));
                        ?>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-sm-7">
                        <?php
                        echo $this->Form->input('notification_board', array(
                            'class' => 'form-control',
                            'placeholder' => 'Title',
                            'type' => 'textbox'
                        ));
                        ?>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-sm-7">
                        <?php
                        echo $this->Form->input('qualification', array(
                            'class' => 'form-control',
                            'placeholder' => 'Title',
                            'type' => 'textbox'
                        ));
                        ?>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-sm-7">
                        <?php
                        echo $this->Form->input('remark', array(
                            'class' => 'form-control',
                            'placeholder' => 'Title',
                            'type' => 'textbox'
                        ));
                        ?>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-sm-7">
                        <?php
                        echo $this->Form->input('source', array(
                            'class' => 'form-control',
                            'placeholder' => 'Title',
                            'type' => 'textbox'
                        ));
                        ?>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-sm-7">
                        <?php
                        echo $this->Form->input('state', array(
                            'class' => 'form-control',
                            'placeholder' => 'Title',
                            'type' => 'textbox'
                        ));
                        ?>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-sm-7">
                        <?php
                        echo $this->Form->input('city', array(
                            'class' => 'form-control',
                            'placeholder' => 'Title',
                            'type' => 'textbox'
                        ));
                        ?>
                    </div>
                </div>
                

                <div class="form-group">
                    <div class="col-sm-3">
                        <?php
                        echo $this->Form->input('post_date', array(
                            'class' => 'form-control form_datetime',
                            'placeholder' => 'Title',
                            'label' => 'Post Date',
                            'type' => 'textbox'
                        ));
                        ?>
                    </div>

                    <div class="col-sm-3">
                        <?php
                        echo $this->Form->input('lastapply_date', array(
                            'class' => 'form-control form_datetime',
                            'placeholder' => 'Title',
                            'label' => 'Last Apply Date',
                            'type' => 'textbox'
                        ));
                        ?>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-7">
                        <?php
                        echo $this->Form->input('notification_text', array(
                            'class' => 'form-control',
                            'placeholder' => 'Notification Text',
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
        $(".form_datetime").datetimepicker({format: 'yyyy-mm-dd hh:ii',todayBtn: true});

    });
</script>