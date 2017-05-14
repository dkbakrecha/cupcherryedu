<div class="row">
    <div class="col-lg-8">
        <div class="box" id="TestWrapper">
            <div class="quiz_title">
                <h2><?php //echo $question['Quiz']['title'];           ?></h2>
            </div>

            <div class="box-content">
                <div id="questionContent">
                    <?php
                    echo $this->element('question_format');
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>