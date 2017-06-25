<div class="warper container-fluid">

    <div class="page-header"><h1>Add New Test <small>Test create by specific questions set</small></h1></div>


    <div class="panel panel-default">
        <div class="panel-heading">
            <a class='btn btn-purple btn-sm pull-right' href='<?php
echo $this->Html->url(array('controller' => 'test_types', 'action' => 'index',
    'admin' => true));
?>'>Back</a>
        </div>
        <div class="panel-body">
            <div class="form-horizontal" >
                <?php echo $this->Form->create('TestType', array("role" => "form")); ?>  
                <div class="form-group">
                    <label class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-7">
                        <?php
                        echo $this->Form->input('name', array(
                            'class' => 'form-control',
                            'placeholder' => 'Test Title',
                            'label' => false,
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
                        ));
                        ?>
                    </div>
                </div>

                <hr class="dotted">
                <h3>Select Questions</h3>
                <?php
                if (!empty($QuestionList)) {
                    ?>
                    <table class="table">	
                        <tr>
                            <td><input type="checkbox" id="selectall"/></td>
                            <td>Question Title</td>
                            <td>Category</td>
                            <td>Sub Category</td>
                        </tr>
                        <?php
                        foreach ($QuestionList as $question) { //pr($question);
                            ?>
                            <tr>
                                <td><input type="checkbox" class="case" name="data[questions][]" value="<?php echo $question['Question']['id']; ?>"/></td>
                                <td><?php echo $question['Question']['question']; ?></td>
                                <td><?php echo $question['Question']['category_id']; ?></td>
                                <td><?php echo $question['Question']['sub_category_id']; ?></td>
                            </tr>

                            <?php
                        }
                        ?>

                    </table>
                    <?php
                }
                ?>
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

    <script>
        

    </script>