<div class="box">
    <?PHP
    $_postData = $this->request->data;
    ?>
    <div class="box-header">
        <h3 class="box-title">Article</h3>
    </div>
    <div class="box-content">
        <div class="form-horizontal" >
            <?php echo $this->Form->create('Post', array("role" => "form")); ?>  
            <div class="row">


                <div class="col-lg-8">
                    <div class="form-group">
                        <?php
                        echo $this->Form->input('title', array(
                            'class' => 'form-control',
                            'label' => false,
                            'placeholder' => 'Enter article title'
                        ));
                        ?>
                    </div>

                    <div class="form-group">
                        <?php
                        echo $this->Form->input('content', array(
                            'class' => 'form-control richEditor',
                            'label' => false,
                            'placeholder' => 'Enter article description',
                            'type' => 'textarea'
                        ));
                        ?>
                    </div>

                </div>
                <div class="col-lg-4">
                    <?php
                    //prd($_postData);
                    if ($_postData['Post']['post_type'] == 1) {
                        ?>
                        <div class="form-group">
                            <label class="control-label">Notes Category / Sub Category</label>

                            <div class="">
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
                            <div class="">
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
                        <div class="form-group">
                            <label class="control-label">Cover Image</label>
                            <div class="">
                                <?php
                                echo $this->Form->input('cover_image', array(
                                    'class' => 'form-control',
                                    'label' => false,
                                    'placeholder' => 'Cover Image',
                                    'options' => $mediaImages
                                ));
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                    ?>

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


            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>