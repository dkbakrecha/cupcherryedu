<div class="row">
    <div class="col-xs-12 col-lg-10 col-lg-offset-1 mobNoMargin">
        <div class="box practice-set-view">

            <div class="box-content">
                <h1><?php echo $practice['Practice']['title']; ?></h1>
                <div class="practice-question">
                    <h2><?php echo $practiceList['Question']['question']; ?></h2>

                    <?php
                    foreach ($practiceList['Question']['Option'] as $option) {
                        ?>
                        <label class="container-radio" data-opt="<?php echo $option['correct']; ?>"><?php echo $option['answer']; ?>
                            <input type="radio" name="<?php echo "ques_" . $option['question_id']; ?>">
                            <span class="checkmark"></span>
                        </label>    
                        <?php
                        $options[$option['id']] = $option['answer'];
                    }
                    ?>
                </div>

                <div class="intro-text" style="display: none;">
                    <?php echo $practiceList['Question']['description']; ?>
                </div>
                <?php
                if (!empty($neighborQuestion['prev']['PracticeQuestion'])) {
                    ?>
                    <a class="btn btn-primary btn-mini" href="<?php echo $this->Html->url(array('controller' => 'practices', 'action' => 'view', $practice['Practice']['slug'], $neighborQuestion['prev']['PracticeQuestion']['question_id'])); ?>">PREVIOUS Question</a>
                    <?php
                }
                if (!empty($neighborQuestion['next']['PracticeQuestion'])) {
                    ?>
                    <a class="btn btn-primary btn-mini" href="<?php echo $this->Html->url(array('controller' => 'practices', 'action' => 'view', $practice['Practice']['slug'], $neighborQuestion['next']['PracticeQuestion']['question_id'])); ?>">NEXT Question</a>
                    <?php
                }
                //pr($neighborQuestion);
                ?>
            </div>
        </div>
    </div>
</div>

<script>
    $(".practice-question").on('click', '.container-radio', function () {
        var _o = $(this).data('opt');
        if (_o == 1) {
            $(this).addClass("correct");
            $(".intro-text").slideDown("slow");
        } else {
            $(this).addClass("incorrect");
        }
    });
</script>