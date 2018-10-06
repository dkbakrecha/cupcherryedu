<div class="box">
    <?PHP
    $_postData = $this->request->data;

    $_meta = array();
    if (!empty($_postData['PostMeta'])) {
        foreach ($_postData['PostMeta'] as $metaValue) {
            $_meta[$metaValue['meta_key']] = $metaValue['meta_value'];
        }
    }
    //prd($_meta);
    ?>
    <div class="box-header">
        <h3 class="box-title">
            <?php
            if (!empty($_postData['Post']['id'])) {
                //prd($_postData['Post']);
                if ($_postData['Post']['post_type'] == 1) {
                    echo "Update Notes";
                } elseif ($_postData['Post']['post_type'] == 2) {
                    echo "Update Exam Notification";
                } else {
                    echo "Update Post info";
                }
            } else {
                echo "New Article";
            }
            ?>

        </h3>
    </div>
    <div class="box-content">
        <div class="form-horizontal" >
            <?php
            echo $this->Form->create('Post', array("role" => "form"));
            echo $this->Form->hidden('id');
            ?>  
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
                    if (empty($_postData['Post']['id'])) {
                        $options = array(
                            '0' => 'Post',
                            '1' => 'Notes',
                            '3' => 'Exam Notification'
                        );

                        $attributes = array(
                            'legend' => false,
                            'value' => 1
                        );

                        echo $this->Form->radio('post_type', $options, $attributes);
                    }

                    //prd($_postData);
                    if (!empty($_postData['Post']['post_type']) && $_postData['Post']['post_type'] == 1) {
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

                        <?php
                    } elseif (!empty($_postData['Post']['post_type']) && $_postData['Post']['post_type'] == 3) {
                        echo $this->Form->input('PostMeta.notification_board', array(
                            'class' => 'form-control',
                            'placeholder' => 'Enter notification board',
                            'value' => $_meta['notification_board']
                        ));

                        echo $this->Form->input('PostMeta.qualification', array(
                            'class' => 'form-control',
                            'placeholder' => 'Enter qualification',
                            'value' => $_meta['qualification']
                        ));

                        echo $this->Form->input('PostMeta.syllabus_url', array(
                            'class' => 'form-control',
                            'placeholder' => 'Enter syllabus url',
                            'value' => $_meta['syllabus_url']
                        ));

                        echo $this->Form->input('PostMeta.official_url', array(
                            'class' => 'form-control',
                            'placeholder' => 'Enter official url',
                            'value' => $_meta['official_url']
                        ));

                        echo $this->Form->input('PostMeta.post_date', array(
                            'class' => 'form-control',
                            'placeholder' => 'Enter post date',
                            'value' => $_meta['post_date']
                        ));

                        echo $this->Form->input('PostMeta.lastapply_date', array(
                            'class' => 'form-control',
                            'placeholder' => 'Enter lastapply date',
                            'value' => $_meta['lastapply_date']
                        ));

                        echo $this->Form->input('PostMeta.exam_date', array(
                            'class' => 'form-control',
                            'placeholder' => 'Enter exam date',
                            'value' => $_meta['exam_date']
                        ));
                    }
                    echo $this->Form->input('cover_image', array(
                        'class' => 'form-control',
                        'label' => "Cover Image",
                        'placeholder' => 'Cover Image',
                        'options' => $mediaImages
                    ));
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