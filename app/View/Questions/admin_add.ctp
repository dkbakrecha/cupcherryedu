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
            echo $this->Form->hidden('quiz_id', array("value" => "0"));
            ?>  
            <div class="form-group">
                <label class="col-sm-2 control-label">Category / Sub Category</label>
                <div class="col-sm-7">
                    <div class="row">
                        <div class="col-md-6">
                            <?php
                            echo $this->Form->input('category_id', array(
                                'options' => $cateList,
                                'class' => 'form-control',
                                'placeholder' => 'Category',
                                'label' => false,
                                'placeholder' => 'Post Title'
                            ));
                            ?>
                        </div>
                        <div class="col-md-6">
                            <?php
                            echo $this->Form->input('sub_category_id', array(
                                'class' => 'form-control',
                                'placeholder' => 'Sub Category',
                                'label' => false,
                                'type' => 'select',
                                'empty' => __('Select Sub Category'),
                                'require' => false
                            ));
                            ?>
                        </div> 
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Title</label>
                <div class="col-sm-7">
                    <?php
                    echo $this->Form->input('question', array(
                        'class' => 'form-control',
                        'placeholder' => 'Description',
                        'label' => false,
                        'placeholder' => 'Post Title'
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
                        'placeholder' => 'Description',
                        'label' => false,
                        'placeholder' => 'Post Title'
                    ));
                    ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Level</label>
                <div class="col-sm-7">
                    <?php
                    $options = array('0' => 'Bigener', '1' => 'Medium', '2' => 'Hard', '3' => 'Harder');
                    $attributes = array('legend' => false, 'class' => 'r-green');
                    echo $this->Form->radio('level', $options, $attributes);
                    ?>
                </div>
            </div>



            <hr class="dotted">


            <div id="question_box">


                <div class="form-group">
                    <div class="col-md-2 col-sm-4 col-xs-12 control-label">
                        <span><?php echo __("Options") ?></span>
                    </div>
                    <div class="col-md-10 col-sm-6 col-xs-12">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="option1" type="radio" value="1" class="r-green fa fa-dot-circle-o" name="data[Question][correct_option]" checked="checked" required="required">
                                <?php
                                echo $this->Form->input('Answer.option1', array(
                                    'label' => false,
                                    'placeholder' => 'Option 1',
                                    'class' => 'form-control',
                                    'div' => array('class' => 'col-md-11 col-sm-10 col-xs-11 pull-right padd0'),
                                    'required' => true
                                ));
                                ?>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="option2" type="radio" value="2" class="r-green fa fa-dot-circle-o" name="data[Question][correct_option]" required="required">
                                <?php
                                echo $this->Form->input('Answer.option2', array(
                                    'label' => false,
                                    'placeholder' => 'Option 2',
                                    'class' => 'form-control',
                                    'div' => array('class' => 'col-md-11 col-sm-10 col-xs-11 pull-right padd0'),
                                    'required' => true
                                ));
                                ?>
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="option3" type="radio" value="3" class="r-green fa fa-dot-circle-o" name="data[Question][correct_option]">
                                <?php
                                echo $this->Form->input('Answer.option3', array(
                                    'label' => false,
                                    'placeholder' => 'Option 3',
                                    'class' => 'form-control',
                                    'div' => array('class' => 'col-md-11 col-sm-10 col-xs-11 pull-right padd0')
                                ));
                                ?>
                            </div>


                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="option4" type="radio" value="4" class="r-green fa fa-dot-circle-o" name="data[Question][correct_option]">
                                <?php
                                echo $this->Form->input('Answer.option4', array(
                                    'label' => false,
                                    'placeholder' => 'Option 4',
                                    'class' => 'form-control',
                                    'div' => array('class' => 'col-md-11 col-sm-10 col-xs-10 pull-right padd0')
                                ));
                                ?>
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


            <?php echo $this->Form->end(); ?>
        </div>
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