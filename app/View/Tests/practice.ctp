
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
                'id' => 'chkBtn',
                'type' => 'button',
                'class' => 'btn btn-primary col-xs-12',
                'onclick' => 'chk_answer()'
            ));
            echo $this->Form->button("RELOAD", array(
                'id' => 'reloadBtn',
                'class' => 'btn btn-primary col-xs-12'
                ));
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

                                <?php echo $cate_val; ?><br>
                                <?php echo (!empty($catQuesCount[$cate_key])) ? $catQuesCount[$cate_key] : "0"; ?>
                            </div>
                        </a>
                    </div>    
                    <?php
                }
            } else {
                foreach ($cateList as $cate_key => $cate_val) {
                    //pr($cateList);
                    //pr($catQuesCount);
                    ?>
                    <div class="col-lg-4">
                        <a href="<?php echo $this->Html->url(array('controller' => 'tests', 'action' => 'practice', $cate_key)) ?>" class="noline">
                            <div class="practice-category">
                                <?php echo $cate_val; ?><br>
                                <?php echo (!empty($catQuesCount[$cate_key])) ? $catQuesCount[$cate_key] : "0"; ?>
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




<script type="text/javascript">
    $(function () {
        $("#reloadBtn").hide();
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
                
                $("#chkBtn").hide();
                $("#reloadBtn").show();
            }
    <?php
}
?>
    
</script>