<?php
echo $this->Html->script(array(
	'ckeditor/ckeditor',
	'ckeditor/adapters/jquery',
	'bootstrap-datetimepicker/js/bootstrap-datetimepicker.min',
	'datepicker/js/bootstrap-datepicker'
));
?>
<div class="warper container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            Edit Content
            <a class='btn btn-success btn-sm pull-right' href='<?php
			echo $this->Html->url(array('controller' => 'cms_pages',
				'action' => 'index', 'admin' => true));
			?>'>Back</a>
        </div>

        <div class="panel-body">
            <div class="form-horizontal" >
				<?php
				echo $this->Form->create('ExamNotification', array("role" => "form"));
				echo $this->Form->hidden('id');
				
				echo $this->render("_exam_form", false);
				?>  
             
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
        //$(".form_datetime").datetimepicker({format: 'yyyy-mm-dd', todayBtn: true});
		$(".form_datetime").datepicker({format: 'yyyy-mm-dd'});
    });
</script>