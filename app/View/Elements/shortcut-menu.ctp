<section class="shortcut-menu">
    <ul class="shortcut-nav">
        <li>
            <a href="<?php echo $this->Html->url(array('controller' => 'notes', 'action' => 'index')); ?>">
                <i class="fa fa-file-text-o"></i>
                <span>Notes</span>
            </a>
        </li>
        <li>
            <a href="<?php echo $this->Html->url(array('controller' => 'exam_notifications', 'action' => 'index')); ?>">
                <i class="fa fa-bell-o"></i>
                <span>Alert</span>
            </a>
        </li>
        <li>
            <a href="<?php echo $this->Html->url(array('controller' => 'questions', 'action' => 'gkbytes')); ?>">
                <i class="fa fa-file-text"></i>
                <span>GK bytes</span>
            </a>
        </li>
        <li>
            <?php
            if (empty($LoggedinUser)) {
                ?>
                <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'login')); ?>">
                    <i class="fa fa-lock"></i>
                    <span>Login</span>
                </a>     
                <?php
            } else {
                ?>
                <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'dashboard')); ?>">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>   
                <?php
            }
            ?>

        </li>
        
        <li id="fotterMnu" class="navbar-toggle">
            <a href="#">
                <i class="fa fa-cogs"></i>
                <span>Menu</span>
            </a>
        </li>
    </ul>
</section>