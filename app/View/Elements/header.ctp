<style>
    .breadcrumb-wrapper {
        background-attachment: fixed;
        background-image: url("<?php echo $this->webroot; ?>img/sd-bg.png");
        background-position: 50% 0;
        background-repeat: no-repeat;
        background-size: cover;
        /*height: 450px;*/
    }

    .exams-view .breadcrumb-wrapper {
        background: rgba(0, 0, 0, 0) url("<?php echo $this->webroot; ?>img/bg-blur.png") repeat scroll 0 0;
        border-bottom:1px solid #eee;
    }
</style>

<nav class="navbar navbar-default menu-desktopmobile">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <?php
            if (!empty($LoggedinUser)) {
                ?>
                <a class="navbar-brand" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'dashboard')); ?>">
                    <?php echo $this->Html->image('The-Most-Complete-Education-Solution.png'); ?>
                </a>
            <?php } else {
                ?>
                <a class="navbar-brand" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'home')); ?>">
                    <?php echo $this->Html->image('The-Most-Complete-Education-Solution.png'); ?>
                </a>        
            <?php }
            ?>

        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php
                if (!empty($LoggedinUser)) {
                    ?>
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'questions', 'action' => 'index')); ?>"><i class="fa fa-hdd-o"></i> Questions</a></li>
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'notes', 'action' => 'index')); ?>"><i class="fa fa-files-o"></i> Notes</a></li>
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'words', 'action' => 'index')); ?>"><i class="fa fa-hdd-o"></i> Words Jumble</a></li>
                    <?php
                } else {
                    ?>


                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">About <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'aboutus')); ?>"><i class="fa fa-desktop"></i> About Cupcherry</a></li>
                            <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'features')); ?>"><i class="fa fa-desktop"></i> Features</a></li>
                            <li><a href="<?php echo $this->Html->url(array('controller' => 'testimonials', 'action' => 'index')); ?>"><i class="fa fa-comments-o"></i> Testimonials</a></li>
                            <!--<li><a href="<?php echo $this->Html->url(array('controller' => 'faqs', 'action' => 'index')); ?>"><i class="fa fa-list"></i> FAQ'S</a></li>-->

                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">How it Works <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'student')); ?>"><i class="fa fa-desktop"></i> For Learner</a></li>
                            <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'teacher')); ?>"><i class="fa fa-desktop"></i> For Instructor</a></li>
                            
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Teaching Resources <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $this->Html->url(array('controller' => 'questions', 'action' => 'gkbytes')); ?>"><i class="fa fa-files-o"></i> GK Bytes</a></li>
                            <li><a href="<?php echo $this->Html->url(array('controller' => 'notes', 'action' => 'index')); ?>"><i class="fa fa-files-o"></i> Notes</a></li>

                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Exams <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <?php
                            foreach ($examList as $exam) {
                                ?>
                                <li><a href="<?php echo $this->Html->url(array('controller' => 'exams', 'action' => 'view', $exam['Exam']['id'])); ?>"><?php echo $exam['Exam']['title']; ?></a></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </li>

                    <li><a href="<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'index')); ?>">Articles</a></li>
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'contact')); ?>">Contact</a></li>

                    <?php
                }
                ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if (empty($LoggedinUser)) {
                    ?>
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'login')); ?>">Login</a></li>
                    <li><a class="btn btn-primary" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'register')); ?>">Sign Up</a></li>
                    <?php
                } else {
                    ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle profile-mnu-wrapper" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <?php
                            $imgPathBig = $this->webroot . "img/no_user.jpg";
                            echo $this->Form->hidden('image');
                            if (isset($LoggedinUser["image"]) && !empty($LoggedinUser["image"])) {
                                $imgPathBig = $this->webroot . "files/profile/" . $LoggedinUser["image"] . "?t=" . time();
                            }
                            ?>

                            <img src="<?php echo $imgPathBig; ?>" alt="Responsive image" class="headerlgin-prflmenuimg" >
                            <?php echo $LoggedinUser['name']; ?> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'edit_profile')); ?>">Edit Profile</a></li>
                            <li><a href="#">Account Settings</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'logout')); ?>">LOGOUT</a></li>
                        </ul>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="mainmenucover menu-ipad">
    <div class="">
        <div class="navbar-default">
            <div class="navbar-header">

                <?php
                if (!empty($LoggedinUser)) {
                    ?>
                    <a class="navbar-brand" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'dashboard')); ?>">
                        <?php echo $this->Html->image('The-Most-Complete-Education-Solution.png'); ?>
                    </a>
                <?php } else {
                    ?>
                    <a class="navbar-brand" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'home')); ?>">
                        <?php echo $this->Html->image('The-Most-Complete-Education-Solution.png'); ?>
                    </a>        
                <?php }
                ?>
            </div>
            <div class="ipad-responsive-menu-outer">
                <div class="ipad-responsive-menu">
                    <ul class="mainmenuulli">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-book"></i>Learn <span class="caret"></span></a>
                            <ul class="dropdown-menu">

                                <?php
                                foreach ($examList as $exam) {
                                    ?>
                                    <li><a href="<?php echo $this->Html->url(array('controller' => 'exams', 'action' => 'view', $exam['Exam']['id'])); ?>"><?php echo $exam['Exam']['title']; ?></a></li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </li>

                                                                            <!--<li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'features')); ?>"><i class="fa fa-desktop"></i> Features</a></li>-->
                        <li><a href="<?php echo $this->Html->url(array('controller' => 'testimonials', 'action' => 'index')); ?>"><i class="fa fa-comments-o"></i> Testimonials</a></li>
                        <!--<li><a href="<?php //echo $this->Html->url(array('controller' => 'faqs', 'action' => 'index'));                                     ?>"><i class="fa fa-list"></i> FAQ'S</a></li>-->
                        <li><a href="<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'index')); ?>"><i class="fa fa-files-o"></i> Articles</a></li>
                        <li><a href="<?php echo $this->Html->url(array('controller' => 'questions', 'action' => 'gkbytes')); ?>"><i class="fa fa-files-o"></i> GK Bytes</a></li>
                        <li><a href="<?php echo $this->Html->url(array('controller' => 'notes', 'action' => 'index')); ?>"><i class="fa fa-files-o"></i> Notes</a></li>

                    </ul>
                </div>
                <button type="button" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
        </div>


    </div>
</div>

<script>
    $(document).ready(function(){
        $(".navbar-toggle").click(function(){
            $(".ipad-responsive-menu").toggleClass("ipad-responsive-menu-show");
            $("body").toggleClass("no-scroll");
        });
    });
</script>