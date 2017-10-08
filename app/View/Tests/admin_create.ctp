<div class="warper container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="page-header"><h1>Add New Test <small>Test create by specific questions set</small></h1></div>

            <a class='btn btn-purple btn-sm pull-right' href='<?php
echo $this->Html->url(array('controller' => 'tests', 'action' => 'index',
    'admin' => true));
?>'>Back</a>
        </div>
        <div class="panel-body">
            <div class="form-horizontal" >
                <?php
                echo $this->Form->create('Test', array(
                    "role" => "form"
                ));
                ?> 
                
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

                <div class="form-group">
                    <label class="col-sm-2 control-label">Total Questions</label>
                    <div class="col-sm-4">
                        <?php
                        echo $this->Form->input('total_questions', array(
                            'class' => 'form-control',
                            'placeholder' => 'Total Questions',
                            'label' => false,
                        ));
                        ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Total Time</label>
                    <div class="col-sm-4">
                        <?php
                        echo $this->Form->input('total_time', array(
                            'class' => 'form-control',
                            'placeholder' => 'Total Time',
                            'label' => false,
                        ));
                        ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Neg Marks</label>
                    <div class="col-sm-4">
                        <?php
                        echo $this->Form->input('neg_marks', array(
                            'class' => 'form-control',
                            'placeholder' => 'Neg Marks',
                            'label' => false,
                        ));
                        ?>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-2 col-sm-4 col-xs-12 control-label">
                        <span></span>
                    </div>
                    <div class="col-md-5 col-sm-6 col-xs-12">
                        <?php
                        echo $this->Form->button(__('Save'), array(
                            'class' => 'btn btn-primary btn-flat',
                            'type' => 'submit'
                        ));
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
</div>