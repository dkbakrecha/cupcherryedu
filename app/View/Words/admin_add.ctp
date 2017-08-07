<div class="warper container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            NEW WORD <a class='btn btn-success btn-sm pull-right' href='<?php echo $this->Html->url(array('controller' => 'words', 'action' => 'index', 'admin' => true)); ?>'>Back</a>
        </div>

        <div class="panel-body">
            <div class="form-horizontal" >
                <?php echo $this->Form->create('Word', array("role" => "form")); ?>  
                <div class="form-group">
                    <label class="col-sm-2 control-label">Word</label>
                    <div class="col-sm-5">
                        <?php
                        echo $this->Form->input('word', array(
                            'class' => 'form-control',
                            'placeholder' => 'Word',
                            'label' => false,
                        ));
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Hint</label>
                    <div class="col-sm-5">
                        <?php
                        echo $this->Form->input('description', array(
                            'class' => 'form-control',
                            'placeholder' => 'Hint',
                            'label' => false,
                            'type' => 'textarea'
                        ));
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Example</label>
                    <div class="col-sm-5">
                        <?php
                        echo $this->Form->input('example', array(
                            'class' => 'form-control',
                            'placeholder' => 'Example',
                            'label' => false,
                            'type' => 'textarea'
                        ));
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label"></label>

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