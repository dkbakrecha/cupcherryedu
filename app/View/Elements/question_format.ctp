<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!empty($question)) {
    echo $this->Form->create('Quiz',array(
        'id' => 'QuizViewForm'
    ));
    echo $this->Form->hidden('question_id', array('value' => $question['Question']['id']));
    echo $this->Form->hidden('test_id', array('value' => $test_id));
    ?>

    <h3 class="title"><?php echo $question['Question']['question']; ?></h3>
    <div>
        <?php
        foreach ($question['Answers'] as $answer) {
            //pr($answer);
            $options[$answer['id']] = $answer['answer'];
        }

        $attributes = array(
            'legend' => false,
            'div' => 'ans_wrap',
            'separator' => '</div><div>',
            'class' => 'r-green',
            'required' => true
        );
        echo $this->Form->radio('answers', $options, $attributes);
        ?>
    </div>
    <?php
    echo $this->Form->submit("NEXT");
    echo $this->Form->end();
}
?>