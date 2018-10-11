<?php
echo $this->Html->script('jquery.infinitescroll.min');
?>
<div class="row">

    <div id="question-list" class="col-lg-8">
        <?php
        if (!empty($allQuestions)) {
            foreach ($allQuestions as $questionData) {
                ?>
                <div class="question-item">
                    <div class="question_title">
                        <?php
                        echo "<span>#" . $questionData['Question']['id'] . "</span> " . $questionData['Question']['question'];
                        ?>
                    </div>
                    <div class="question_option">
                        <div class="<?php echo ($questionData['Question']['correct_option'] == 1) ? "correct_ans" : ""; ?>"><?php echo $questionData['Question']['option1']; ?></div>
                        <div class="<?php echo ($questionData['Question']['correct_option'] == 2) ? "correct_ans" : ""; ?>"><?php echo $questionData['Question']['option2']; ?></div>
                        <div class="<?php echo ($questionData['Question']['correct_option'] == 3) ? "correct_ans" : ""; ?>"><?php echo $questionData['Question']['option3']; ?></div>
                        <div class="<?php echo ($questionData['Question']['correct_option'] == 4) ? "correct_ans" : ""; ?>"><?php echo $questionData['Question']['option4']; ?></div>

                    </div>
                </div>
                <?php
            }
        }
        ?>
        <div class="row">
            <div class="col-lg-6">
        <?php echo $this->Paginator->counter(); ?>
            </div>
            <div class="col-lg-6">
                <div class=" pull-right">
                <?php
                echo $this->Paginator->numbers(array(
                    'before' => '<ul class="pagination">',
                    'separator' => '',
                    'currentTag' => 'a',
                    'currentClass' => 'active',
                    'tag' => 'li',
                    'after' => '</ul>'
                ));
                ?>
                </div>
            </div>
        </div>
    </div>


</div>

