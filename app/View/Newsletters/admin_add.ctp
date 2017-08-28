<?php
echo $this->Html->script(array(
    'ckeditor/ckeditor',
    'ckeditor/adapters/jquery',
));
?>

<div class="warper container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            <?php
            echo "Add Categories";
            ?>
            <a class='btn btn-success btn-xs pull-right' href='<?php echo $this->Html->url(array('controller' => 'exams', 'action' => 'index', 'admin' => true)); ?>'>
                Back
            </a>
        </div>
        <div class="panel-body">

            <?php echo $this->Form->create('Exam', array('class' => 'form-horizontal')); ?>    
            <div class="form-group">
                <label class="col-sm-2 control-label">Title</label>
                <div class="col-sm-7">
                    <?php
                    echo $this->Form->input('title', array(
                        'class' => 'form-control',
                        'placeholder' => 'Title',
                        'label' => false,
                    ));
                    ?>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label">Description</label>
                <div class="col-sm-7">
                    <?php
                    echo $this->Form->input('description', array(
                        'class' => 'form-control',
                        'placeholder' => 'Enter Description',
                        'label' => false,
                        'type' => 'textarea'
                    ));
                    ?>
                </div>
            </div>

            <button type="submit" class="btn btn-purple col-lg-offset-2">Submit</button>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>

</div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('textarea#ExamDescription').ckeditor();
        });
    </script>