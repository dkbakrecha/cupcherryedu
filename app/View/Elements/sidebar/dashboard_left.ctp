<div class="box user-info m-bottom15">
    <div class="box-content">
        <a href="#">
            <?php
            $imgPathBig = $this->webroot . "img/no_user.jpg";
            if (isset($LoggedinUser["image"]) && !empty($LoggedinUser["image"])) {
                $imgPathBig = $this->webroot . "files/profile/" . $LoggedinUser["image"] . "?t=" . time();
            }
            ?>

            <img src="<?php echo $imgPathBig; ?>" alt="Responsive image" class="img-thumbnail profile" >
            <div class="profile-name"><?php echo $LoggedinUser['name']; ?> </div>
        </a>

    </div>
</div>
<?php /*
<div class="box">
    <div class="box-content">
        <ul class="side-links">
            <li><a href="<?php echo $this->Html->url(array('controller' => 'notes', 'action' => 'add')); ?>"> Submit a Note </a></li>
            <li><a href="<?php echo $this->Html->url(array('controller' => 'questions', 'action' => 'add')); ?>"> Submit a Question </a></li>
            <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'feedback')); ?>"> Make a Feedback </a></li>
            <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'help')); ?>"> Help </a></li>
        </ul>
    </div>
</div>
 * 
 */ ?>