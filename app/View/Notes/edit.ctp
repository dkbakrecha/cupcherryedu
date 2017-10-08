<?php
echo $this->Html->script(array(
    'ckeditor/ckeditor',
    'ckeditor/adapters/jquery',
));
?>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Notes Add</h3>
    </div>

    <div class="box-content">

        <?php
        echo $this->Form->create('Note', array(
            'class' => 'site-from'
        ));
        ?>
        <div class="row">
            <div class="col-lg-3">
                <?php
                echo $this->Form->input('category_id', array('options' => $cateList));
                ?>
            </div>
            <div class="col-lg-3">
                <?php echo $this->Form->input('sub_category_id'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <?php echo $this->Form->input('title'); ?>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-10">
                <?php echo $this->Form->input('description'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <?php
                echo $this->Form->input('notes_type', array('options' => array(
                        '1' => 'Text Document',
                        '2' => 'Video',
                        '3' => 'PDF Document',
                        )));
                ?>
            </div>

        </div>

        <?php echo $this->Form->checkbox('published', array('hiddenField' => false)); ?>
        <div class="box-bottom-butngroup">
            <?php echo $this->Form->submit('save', array('class' => 'box-submitbtn', 'div' => false)); ?>
            <?php echo $this->Form->botton('cancel', array('class' => 'box-cancelbtn', 'type' => 'button')); ?>
        </div>
        <?php
        echo $this->Form->end();
        ?>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('textarea#NoteDescription').ckeditor();
    });


    $('#NoteCategoryId').change(function () {
        if ($(this).val() == '') {
            $('#NoteSubCategoryId').html('<option value="">' + "<?php echo __('Select Sub Category'); ?>" + '</option>');
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
                    $('#NoteSubCategoryId').html(retData);
                    //$('.selectpicker').selectpicker('refresh');
                }
            },
            error: function (xhr) {
                alert("<?php echo __('No Subtopic found for this Topic.'); ?>");
            }
        });
    }

</script>