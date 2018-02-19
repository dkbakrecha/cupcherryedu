<?php
echo $this->Html->script(array(
	'ckeditor/ckeditor',
	'ckeditor/adapters/jquery',
));
?>
<div class="box">
    <div class="box-header">
        <h4>Add New Question</h4>
        <a class='btn btn-purple btn-sm pull-right' href='<?php
		echo $this->Html->url(array('controller' => 'questions', 'action' => 'index',
			'admin' => true));
		?>'>Back</a>
    </div>
    <div class="box-content">
        <div class="form-horizontal" >
			<?php
			echo $this->Form->create('Question', array("role" => "form"));
			
			echo $this->render("_adminquestionForm", false);

			echo $this->Form->end();
			?>
        </div>
    </div>
</div>
<!-- Warper Ends Here (working area) -->    

<script>
    $(document).ready(function () {
        $('textarea#QuestionQuestion').ckeditor();
        $('textarea#QuestionDescription').ckeditor();
    });

    $('#QuestionCategoryId').change(function () {
        if ($(this).val() == '') {
            $('#QuestionSubCategoryId').html('<option value="">' + "<?php echo __('Select Sub Category'); ?>" + '</option>');
        } else {
            changeTopic($(this).val());
        }
    });

    function changeTopic(topic) {
        // Fire the ajax
        $.ajax({
            url: "<?php echo $this->Html->url(array('controller' => 'categories', 'action' => 'findSubCategory')); ?>",
            type: "POST",
            data: {category_id: topic},
            success: function (retData, response) {
                if (retData != '0') {
                    $('#QuestionSubCategoryId').html(retData);
                    //$('.selectpicker').selectpicker('refresh');
                }
            },
            error: function (xhr) {
                alert("<?php echo __('No Subtopic found for this Topic.'); ?>");
            }
        });
    }

</script>