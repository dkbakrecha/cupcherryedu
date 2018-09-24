<div class="warper container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            Add Note
            <a class='btn btn-purple btn-sm pull-right' href='<?php
            echo $this->Html->url(array('controller' => 'notes', 'action' => 'index',
                'admin' => true));
            ?>'>Back</a>
        </div>
        <div class="panel-body">
            <div class="form-horizontal" >
                <?php
                echo $this->Form->create('Note', array("role" => "form"));
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
                        echo $this->Form->input('title', array(
                            'class' => 'form-control',
                            'placeholder' => 'Title',
                            'label' => false,
                        ));
                        ?>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <?php
                        echo $this->Form->input('description', array(
                            'class' => 'form-control',
                            'placeholder' => 'Description',
                            'label' => false,
                            'type' => 'textarea'
                        ));
                        ?>
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

    <script type="text/javascript">
        
          $(document).ready(function () {
            $('#NoteDescription').summernote();
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