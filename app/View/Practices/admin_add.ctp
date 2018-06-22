<?php
echo $this->Html->script(array(
    'ckeditor/ckeditor',
    'ckeditor/adapters/jquery',
));
?>

<div class="warper container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            Add Practice Set
            <a class='btn btn-success btn-xs pull-right' href='<?php echo $this->Html->url(array('controller' => 'practices', 'action' => 'index', 'admin' => true)); ?>'>
                Back
            </a>
        </div>
        <div class="panel-body">
            <div class="col-lg-6 col-lg-offset-3">
                <?php
                echo $this->Form->create('Practice', array('class' => 'form-horizontal'));
                
                echo $this->Form->input('title', array(
                    'class' => 'form-control',
                    'placeholder' => 'Title',
                ));

                echo $this->Form->input('slug', array(
                    'class' => 'form-control',
                    'placeholder' => 'URL Slug',
                ));

                echo $this->Form->input('description', array(
                    'class' => 'form-control',
                    'placeholder' => 'Enter Description',
                    'type' => 'textarea'
                ));
                echo $this->Form->submit("Create", array("class" => "btn btn-primary"));
                echo $this->Form->end();
                ?>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('textarea#ExamDescription').ckeditor();
    });
</script>