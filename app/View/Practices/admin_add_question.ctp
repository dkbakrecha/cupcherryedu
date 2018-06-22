<div class="warper container-fluid">
    <div class="panel-body">
        <div class="col-lg-6 col-lg-offset-3">
            <?php
            //pr($allPractices);
            echo $this->Form->create('PracticeQuestion', array('class' => 'form-horizontal'));
            echo $this->Form->hidden('question_id',array('value' => $question_id));
            echo $this->Form->input('practice_id', array(
                'type'=>'select',
                'options' => $allPractices,
                'placeholder' => 'Title',
            ));

            echo $this->Form->submit("Add It", array("class" => "btn btn-primary"));
            echo $this->Form->end();
            ?>
        </div>
    </div>
</div>