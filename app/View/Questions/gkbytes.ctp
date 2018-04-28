<div id="gkbytes" class="row gkbytes">
    <div class="col-lg-4">
        <div class="box no-height title">
            <div class="box-content">
                <h2>GK Bytes of <?php echo date('F Y'); ?></h2>
            </div>
        </div>

        <div class="box topic-list">
            <div class="box-header">
                <h3 class="box-title">Topics</h3>
            </div>
            <div class="box-content">
                <?php
                echo $this->Form->create("Question", array());

                $options = $subcateList;

                $attributes = array(
                    'legend' => false,
                    'class' => 'r-green',
                    //'value' => $foo
                    'separator' => '</li><li>'
                );
                ?><ul class="side-links">
                    <li>
                        <?php
                        echo $this->Form->radio('topic', $options, $attributes);
                        ?>
                    </li>
                </ul>
                <?php
                echo $this->Form->end();
                ?>

            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <?php
        if (!empty($allQuestions)) {
            foreach ($allQuestions as $questionData) {
                ?>
                <div class="question_wrap">
                    <div class="question_title">
                        <?php
                        echo "<span>#" . $questionData['Question']['id'] . "</span> " . $questionData['Question']['question'];
                        ?>
                    </div>
                    <div class="question_option">
                        <?php
                        foreach ($questionData['Options'] as $optList) {
                            //pr($optList);
                            $_cls = ($optList['correct'] == 1) ? "correct_ans" : "";
                            ;

                            echo "<div class='" . $_cls . "'>" . $optList['answer'] . "</div>";
                        }
                        ?>
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

<script type="text/javascript">
    $(document).ready(function() {
        $("input[name='data[Question][topic]']:radio").click(function () {
            $("#QuestionGkbytesForm").submit();
        });
    });
</script>