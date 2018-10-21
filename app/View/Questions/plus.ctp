<div class="box">
    <div class="box-header">
        <div class="box-title">
            Add New Question
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
            <div class="col-md-8">
                <?php
                echo $this->Form->input('question', array(
                    'placeholder' => 'Question Here'
                ));
               
                ?>

                <div id="question_box">
                    <label><?php echo __("Options") ?></label>
                    <div class="row">
                        <div class="option_wrap">
                            <input id="option1" type="radio" value="1" class="r-green fa fa-dot-circle-o" name="data[Question][correct_option]" checked="checked" required="required">
                            <?php
                            echo $this->Form->input('option1', array(
                                'label' => false,
                                'placeholder' => 'Option 1',
                                'div' => array('class' => 'col-md-10 col-sm-10 col-xs-11 pull-right padd0'),
                                'required' => true
                            ));
                            ?>
                        </div>

                        <div class="option_wrap">
                            <input id="option2" type="radio" value="2" class="r-green fa fa-dot-circle-o" name="data[Question][correct_option]" required="required">
                            <?php
                            echo $this->Form->input('option2', array(
                                'label' => false,
                                'placeholder' => 'Option 2',
                                'div' => array('class' => 'col-md-10 col-sm-10 col-xs-11 pull-right padd0'),
                                'required' => true
                            ));
                            ?>
                        </div>

                        <div class="option_wrap">
                            <input id="option3" type="radio" value="3" class="r-green fa fa-dot-circle-o" name="data[Question][correct_option]">
                            <?php
                            echo $this->Form->input('option3', array(
                                'label' => false,
                                'placeholder' => 'Option 3',
                                'div' => array('class' => 'col-md-10 col-sm-10 col-xs-11 pull-right padd0')
                            ));
                            ?>
                        </div>


                        <div class="option_wrap">
                            <input id="option4" type="radio" value="4" class="r-green fa fa-dot-circle-o" name="data[Question][correct_option]">
                            <?php
                            echo $this->Form->input('option4', array(
                                'label' => false,
                                'placeholder' => 'Option 4',
                                'div' => array('class' => 'col-md-10 col-sm-10 col-xs-10 pull-right padd0')
                            ));
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">

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
                </div>
            </div>



        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>