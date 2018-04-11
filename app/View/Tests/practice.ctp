<div class="row">
    <div class="col-lg-3 nomobile">
        <?php echo $this->element("sidebar/dashboard_left"); ?>
    </div>

    <div class="col-lg-6">
        <div class="row">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Practice <span class="">Test your skills</span></h3>
                </div>
                <div class="box-content">
                    <?php
                    if (!empty($practiceQuestion)) {
                        //pr($practiceQuestion);
                        echo $this->Form->create('Quiz');
                        echo $this->Form->hidden('question_id', array('value' => $practiceQuestion['Question']['id']));
                        ?>

                        <h4 class="title"><?php echo $practiceQuestion['Question']['question']; ?></h4>
                        <div class="option-wrap">
                            <?php
                            foreach ($practiceQuestion['Options'] as $answer) {
                                //pr($answer);
                                $options[$answer['id']] = "&nbsp;" . $answer['answer'];
                            }

                            $attributes = array(
                                'legend' => false,
                                'div' => 'ans_wrap',
                                'separator' => '</div><div class="option-wrap">',
                                'class' => 'r-green',
                                'required' => true
                            );

                            echo $this->Form->radio('answers', $options, $attributes);
                            ?>
                        </div> 
                        <?php
                        echo $this->Form->button("Check Answer", array(
                            'type' => 'button',
                            'class' => 'btn btn-primary',
                            'onclick' => 'chk_answer()'
                        ));
                        echo $this->Form->button("RELOAD", array('class' => 'btn btn-primary'));
                        echo $this->Form->end();
                        ?>


                        <?php
                    } else {
                        if (!empty($subcateList)) {
                            foreach ($subcateList as $cate_key => $cate_val) {
                                //pr($cate_key);
                                ?>
                                <div class="col-lg-4 ">
                                    <a href="<?php echo $this->Html->url(array('controller' => 'tests', 'action' => 'practice', $cate_id, $cate_key)) ?>" class="noline">
                                        <div class="practice-category">

                                            <?php echo $cate_val; ?>

                                        </div>
                                    </a>
                                </div>    
                                <?php
                            }
                        } else {
                            foreach ($cateList as $cate_key => $cate_val) {
                                //pr($cate_key);
                                ?>
                                <div class="col-lg-4">
                                    <a href="<?php echo $this->Html->url(array('controller' => 'tests', 'action' => 'practice', $cate_key)) ?>" class="noline">
                                        <div class="practice-category">
                                            <?php echo $cate_val; ?>

                                        </div>
                                    </a>
                                </div>    
                                <?php
                            }
                        }
                    }
                    ?>
                </div>
            </div>


        </div>
    </div>

    <div class="col-lg-3">

<?php echo $this->element("sidebar/dashboard_right"); ?>
        
    </div>

</div>

<script type="text/javascript">
    $(function () {
       
    });
    
<?php
if (!empty($practiceQuestion)) {
    ?>
            function chk_answer(){
                var _cans = "<?php echo $practiceQuestion['Option']['id']; ?>";
                //alert($('input[name="data[Quiz][answers]"]:checked', '#QuizPracticeForm').val()); 
                var _val = $('input[name="data[Quiz][answers]"]:checked').val();
                $( ".a_option" ).remove();
                if(_cans == _val){
                    $("#QuizAnswers" + _cans).parents(".option-wrap").append("<div class='a_option y_option'>Correct</div>");
                    //alert("correct");
                }else{
                    $("#QuizAnswers" + _cans).parents(".option-wrap").append("<div class='a_option y_option'>Right Answer</div>");
                    $("#QuizAnswers" + _val).parents(".option-wrap").append("<div class='a_option n_option'>Incorrect</div>");
                   // alert("incorrect");
                }
            }
    <?php
}
?>
    
</script>