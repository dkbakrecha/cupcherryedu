<div class="row">
    <div class="col-lg-2">
        <?php
        if (!empty($testQuestions)) {
            $i = 1;
            foreach ($testQuestions as $tQues) {
                ?>
                <span class="question_index" data-question_id="<?php echo $tQues['TestQuestion']['question_id']; ?>"><?php echo $i; ?></span>
                <?php
                $i++;
            }
        }
        ?>
    </div>
    <div class="col-lg-8">
        <div class="box" id="TestWrapper">
            <div class="quiz_title">
                <h2><?php //echo $question['Quiz']['title'];               ?></h2>
            </div>

            <div class="box-content">
                <div id="questionContent">
                    <input type="hidden" id="active_test_id" name="active_test_id" value="<?php echo $test_id; ?>">
                    <?php
                    echo $this->element('question_format');
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        var _q_id = $(".question_index").first().data('question_id');
        showQuestion(_q_id, 1, 'normal');
    });
    
    function showQuestion(ques_id, _sq_id, _mode) {
        var _test_id = $("#active_test_id").val(); /* Use in case of standardized case */
        /*if (tObj[ques_id]) {
            $('#questionDetail').html(tObj[ques_id].q);
            qstSeqMarkSelected();
            if (tObj[ques_id].a) {
                showAnsResult(tObj[ques_id].a, true);
            } else if (tObj[ques_id].ansgiven) {
                $('.option_'+tObj[ques_id].ansgiven).iCheck('check');
            }
        } else {*/
        $.ajax({
            url: "<?php echo $this->Html->url(array("controller" => "tests", "action" => "showquestion")); ?>",
            type: "POST",
            data: {
                test_id: _test_id,
                ques: ques_id
                //sq_id: _sq_id,
                //mode: _mode
            },
            success: function (res) {
                /* Handle Question circle css */
                //tObj[ques_id] = {q: res};
                $('#questionContent').html(res);
                //qstSeqMarkSelected();
                /* END Handle Question circle css */
            },
            error: function (ret) {
                alert("Some error occured.");
            }
        });
        //}
    }
</script>