<?php
$sm_notes = $sm_alert = $sm_gkbyte = $sm_login = "";

if ($this->request->params['controller'] == "notes") {
    $sm_notes = "active";
}

if ($this->request->params['controller'] == "exam_notifications") {
    $sm_alert = "active";
}

if ($this->request->params['controller'] == "practices") {
    $sm_gkbyte = "active";
}

if ($this->request->params['controller'] == "users" && $this->request->params['action'] == "login") {
    $sm_login = "active";
}

$_class = "";
if (!empty($LoggedinUser)) {
   $_class = "loggedin"; 
}
//prd($_body_class);
if ($_body_class != "tests-practice_table") {
    ?>

    <section class="shortcut-menu">
        <ul class="shortcut-nav <?php echo $_class; ?>">
            <li class="<?php echo $sm_gkbyte; ?>">
                <a href="<?php echo $this->Html->url(array('controller' => 'practices', 'action' => 'index')); ?>">
                    <i class="fa fa-file-text"></i>
                    <span>Practices</span>
                </a>
            </li>
            <li class="<?php echo $sm_notes; ?>">
                <?php
                if (empty($LoggedinUser)) {
                    ?>
                    <a href="<?php echo $this->Html->url(array('controller' => 'notes', 'action' => 'index')); ?>">
                        <i class="fa fa-file-text-o"></i>
                        <span>Notes</span>
                    </a>
                    <?php
                } else {
                    ?>
                    <a href="<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'wall')); ?>">
                        <i class="fa fa-file-text-o"></i>
                        <span>Wall</span>
                    </a>
                    <?php
                }
                ?>
            </li>
            <?php
            if (empty($LoggedinUser)) {
                ?>
                <li class="<?php echo $sm_alert; ?>">
                    <a href="<?php echo $this->Html->url(array('controller' => 'exam_notifications', 'action' => 'index')); ?>">
                        <i class="fa fa-bell-o"></i>
                        <span>Alert</span>
                    </a>
                </li>
                <?php
            }
            ?>
            <li class="<?php echo $sm_login; ?>">
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
    <?php
}
?>