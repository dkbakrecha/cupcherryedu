<?php
if ($_body_class == "users-edit_profile") {
    ?>
    <div class="box m-bottom15">
        <div class="box-content">
            <ul class="side-links">
                <li><a href="<?php echo $this->Html->url(array('controller' => 'notes', 'action' => 'add')); ?>"> View Profile </a></li>
                <li><a href="<?php echo $this->Html->url(array('controller' => 'questions', 'action' => 'add')); ?>"> Change Password </a></li>

                <li><a href="<?php echo $this->Html->url(array('controller' => 'questions', 'action' => 'add')); ?>"> Account Setting </a></li>

            </ul>
        </div>
    </div>
    <?php
}
?>

<div class="box m-bottom15 thoughtofday no-height">
    <div class="box-content">
        Great achievement is usually born of great sacrifice, and is never the result of selfishness.
    </div>
</div>

<div class="box">
    <div class="box-content">
        <ul class="side-links">
            <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'feedback')); ?>"> Make a Feedback </a></li>
            <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'help')); ?>"> Help </a></li>
        </ul>
    </div>
</div>

