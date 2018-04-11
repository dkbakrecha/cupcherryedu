<?php
echo $this->Html->script(array(
    'ckeditor/ckeditor',
    'ckeditor/adapters/jquery',
));
?>

<div class="box">
    <div class="box-header">
        <div class="box-title">
            Add New Question
            <a class='btn btn-purple btn-sm pull-right' href='<?php
            echo $this->Html->url(array('controller' => 'questions', 'action' => 'index'));
            ?>'>Back</a>
        </div>
    </div>
    <div class="box-content">
        <?php
        echo $this->Form->create('Question', array(
            "role" => "form",
            'class' => 'site-from')
        );
        
        ?>
        
        
        <div class="form-horizontal" >
            <div class="col-md-7">
                <div class="row">
                    <div class="col-lg-6">
                        <?php
                        echo $this->Form->input('category_id', array(
                            'options' => $cateList,
                            'placeholder' => 'Category',
                            'placeholder' => 'Post Title'
                        ));
                        ?>
                    </div>
                    <div class="col-lg-6">
                        <?php
                        echo $this->Form->input('sub_category_id', array(
                            'placeholder' => 'Sub Category',
                            'type' => 'select',
                            'options' => $subcateList,
                            'require' => false
                        ));
                        ?>
                    </div>
                </div>
                <?php
                echo $this->Form->input('question', array(
                    'placeholder' => 'Question Here'
                ));
                echo $this->Form->input('description', array(
                'placeholder' => 'Question description'
                ));
                ?>
            </div>
            <div class="col-md-5">
                <label><?php echo __("Level") ?></label>
                <div class="level_wrap">
                    <?php
                    $options = array(
                        '0' => 'Bigener', 
                        '1' => 'Medium', 
                        '2' => 'Hard', 
                        '3' => 'Harder'
                        );
                    $attributes = array('legend' => false, 'class' => 'r-green','value' => 1);
                    echo $this->Form->radio('level', $options, $attributes);
                    ?>
                </div>

                <div id="question_box">
                    <div>
                        <label><?php echo __("Options") ?></label>
                        <div class="row">
                            <div class="option_wrap">
                                <input id="option1" type="radio" value="1" class="r-green fa fa-dot-circle-o" name="data[Question][correct_option]" checked="checked" required="required">
                                <?php
                                echo $this->Form->input('Option.option1', array(
                                    'label' => false,
                                    'placeholder' => 'Option 1',
                                    'div' => array('class' => 'col-md-11 col-sm-10 col-xs-11 pull-right padd0'),
                                    'required' => true
                                ));
                                ?>
                            </div>

                            <div class="option_wrap">
                                <input id="option2" type="radio" value="2" class="r-green fa fa-dot-circle-o" name="data[Question][correct_option]" required="required">
                                <?php
                                echo $this->Form->input('Option.option2', array(
                                    'label' => false,
                                    'placeholder' => 'Option 2',
                                    'div' => array('class' => 'col-md-11 col-sm-10 col-xs-11 pull-right padd0'),
                                    'required' => true
                                ));
                                ?>
                            </div>

                            <div class="option_wrap">
                                <input id="option3" type="radio" value="3" class="r-green fa fa-dot-circle-o" name="data[Question][correct_option]">
                                <?php
                                echo $this->Form->input('Option.option3', array(
                                    'label' => false,
                                    'placeholder' => 'Option 3',
                                    'div' => array('class' => 'col-md-11 col-sm-10 col-xs-11 pull-right padd0')
                                ));
                                ?>
                            </div>


                            <div class="option_wrap">
                                <input id="option4" type="radio" value="4" class="r-green fa fa-dot-circle-o" name="data[Question][correct_option]">
                                <?php
                                echo $this->Form->input('Option.option4', array(
                                    'label' => false,
                                    'placeholder' => 'Option 4',
                                    'div' => array('class' => 'col-md-11 col-sm-10 col-xs-10 pull-right padd0')
                                ));
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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



        </div>
        <?php echo $this->Form->end(); ?>
    </div>

</div>
<!-- Warper Ends Here (working area) -->    

<script>
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