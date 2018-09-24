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

            echo $this->render("_adminquestionForm", false);

            echo $this->Form->end();
            ?>
        </div>
    </div>
</div>
<!-- Warper Ends Here (working area) -->    
