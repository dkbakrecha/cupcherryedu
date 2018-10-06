<?php echo $this->element("widget-user"); ?>

<div class="box">
    <div class="box-content">
        <ul class="side-links">
            <li><a href="<?php echo $this->Html->url(array('controller' => 'tests', 'action' => 'practice')); ?>"> Practice Test </a></li>
            <li><a href="<?php echo $this->Html->url(array('controller' => 'questions', 'action' => 'index')); ?>"> Questions </a></li>

            <li><a href="<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'mylist')); ?>"> Articles </a></li>
            <li><a href="<?php echo $this->Html->url(array('controller' => 'exam_notifications', 'action' => 'index')); ?>"> Exam Notifications </a></li>

        </ul>
    </div>
</div>
 