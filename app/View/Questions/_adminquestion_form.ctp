<?php
$reqData = $this->request->data;
?>

<div class="row">
    <div class="col-sm-7">
        <div class="form-group">
            <div class="col-md-6">
                <?php
                echo $this->Form->input('category_id', array(
                    'options' => $cateList,
                    'class' => 'form-control',
                    'placeholder' => 'Category',
                    'placeholder' => 'Post Title',
                    'size' => 10
                ));
                ?>
            </div>
            <div class="col-md-6">
                <?php
                echo $this->Form->input('sub_category_id', array(
                    'options' => $subcateList,
                    'class' => 'form-control',
                    'placeholder' => 'Sub Category',
                    'require' => false,
                    'size' => 10
                ));
                ?>
            </div> 
        </div>

        <?php
        echo $this->Form->input('question', array(
            'class' => 'form-control',
            'placeholder' => 'Description',
            'placeholder' => 'Post Title'
        ));
        ?>
        <?php
        echo $this->Form->input('description', array(
            'class' => 'form-control',
            'placeholder' => 'Description',
            'placeholder' => 'Post Title'
        ));
        ?>
    </div>
    <div class="col-md-5">
        <?php
        $options = array('0' => 'Bigener', '1' => 'Medium', '2' => 'Hard', '3' => 'Harder');
        $attributes = array(
            'legend' => false,
            'class' => 'r-green',
            'default' => 1
        );
        echo $this->Form->radio('level', $options, $attributes);
        ?>
        <hr class="dotted">
        <div id="question_box">


            <div class="form-group">
                <div class="col-md-10 col-md-offset-1 col-sm-6 col-xs-12">
                    <div class="row">


                        <div class="col-md-12 col-sm-6 col-xs-12">
                            <?php
                            $_checked = "";
                            if (!empty($reqData['Options'][0]['correct']) && $reqData['Options'][0]['correct'] == 1) {
                                $_checked = 'checked="checked"';
                            }
                            ?>
                            <input id="option1" 
                                   type="radio" 
                                   value="1" 
                                   class="r-green fa fa-dot-circle-o" 
                                   name="data[Question][correct_option]" 
                                   <?php echo $_checked; ?>
                                   required="required">

                            <?php
                            echo $this->Form->hidden('Options.1.id', array(
                                'value' => (!empty($reqData['Options'][0]['id'])) ? $reqData['Options'][0]['id'] : "",
                            ));
                            echo $this->Form->input('Options.1.val', array(
                                'label' => false,
                                'placeholder' => 'Option 1',
                                'class' => 'form-control',
                                'value' => (!empty($reqData['Options'][0]['answer'])) ? $reqData['Options'][0]['answer'] : "",
                                'required' => true
                            ));
                            ?>
                        </div>

                        <div class="col-md-12 col-sm-6 col-xs-12">
                            <?php
                            $_checked = "";
                            if (!empty($reqData['Options'][1]['correct']) && $reqData['Options'][1]['correct'] == 1) {
                                $_checked = 'checked="checked"';
                            }
                            ?>
                            <input id="option2" 
                                   type="radio" 
                                   value="2" 
                                   class="r-green fa fa-dot-circle-o" 
                                   name="data[Question][correct_option]" 
<?php echo $_checked; ?>
                                   required="required">

<?php
echo $this->Form->hidden('Options.2.id', array(
    'value' => (!empty($reqData['Options'][1]['id'])) ? $reqData['Options'][1]['id'] : "",
));
echo $this->Form->input('Options.2.val', array(
    'label' => false,
    'placeholder' => 'Option 2',
    'class' => 'form-control',
    'value' => (!empty($reqData['Options'][1]['answer'])) ? $reqData['Options'][1]['answer'] : "",
    'required' => true,
));
?>
                        </div>

                        <div class="col-md-12 col-sm-6 col-xs-12">
<?php
$_checked = "";
if (!empty($reqData['Options'][2]['correct']) && $reqData['Options'][2]['correct'] == 1) {
    $_checked = 'checked="checked"';
}
?>
                            <input id="option3" 
                                   type="radio" 
                                   value="3" 
                                   class="r-green fa fa-dot-circle-o" 
                                   name="data[Question][correct_option]" 
<?php echo $_checked; ?>
                                   required="required">

                                   <?php
                                   echo $this->Form->hidden('Options.3.id', array(
                                       'value' => (!empty($reqData['Options'][2]['id'])) ? $reqData['Options'][2]['id'] : "",
                                   ));
                                   echo $this->Form->input('Options.3.val', array(
                                       'label' => false,
                                       'placeholder' => 'Option 3',
                                       'class' => 'form-control',
                                       'value' => (!empty($reqData['Options'][2]['answer'])) ? $reqData['Options'][2]['answer'] : "",
                                   ));
                                   ?>
                        </div>


                        <div class="col-md-12 col-sm-6 col-xs-12">
<?php
$_checked = "";
if (!empty($reqData['Options'][4]['correct']) && $reqData['Options'][3]['correct'] == 1) {
    $_checked = 'checked="checked"';
}
?>
                            <input id="option4" 
                                   type="radio" 
                                   value="4" 
                                   class="r-green fa fa-dot-circle-o" 
                                   name="data[Question][correct_option]" 
<?php echo $_checked; ?>
                                   required="required">					<?php
echo $this->Form->hidden('Options.4.id', array(
    'value' => (!empty($reqData['Options'][3]['id'])) ? $reqData['Options'][3]['id'] : "",
));
echo $this->Form->input('Options.4.val', array(
    'label' => false,
    'placeholder' => 'Option 4',
    'class' => 'form-control',
    'value' => (!empty($reqData['Options'][3]['answer'])) ? $reqData['Options'][3]['answer'] : "",
));
?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>








<hr class="dotted">
<div class="form-group">
    <div class="col-md-2 col-sm-4 col-xs-12 control-label">
        <span></span>
    </div>
    <div class="col-md-5 col-sm-6 col-xs-12">
<?=
$this->Form->button(__('Save'), array(
    'class' => 'btn btn-primary btn-flat',
    'type' => 'submit'
));
?>
        &nbsp;
        <?=
        $this->Form->button(__('Cancel'), array(
            'class' => 'btn btn-default btn-flat',
            'type' => 'button',
            'onclick' => 'goBack()',
        ));
        ?>
    </div>
</div>


<script>
    /* $(document).ready(function () {
     $('textarea#QuestionQuestion').ckeditor();
     $('textarea#QuestionDescription').ckeditor();
     });
     ClassicEditor
     .create(document.querySelector('#QuestionQuestion'))
     .then(editor => {
     console.log(editor);
     })
     .catch(error => {
     console.error(error);
     });
     **/

    $(document).ready(function () {
        $('#QuestionQuestion').summernote();
        $('#QuestionDescription').summernote();
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