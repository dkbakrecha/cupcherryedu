<nav class="navbar navbar-default menu-desktopmobile navbar-fixed-top">
    

    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            

        </div>

        
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
                        <?php
                        if (!empty($LoggedinUser)) {
                            ?>
                            <li class="side-mobilemenuuser"><?php echo $this->element("widget-user"); ?></li>

                            <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'edit_profile')); ?>"><i class="fa fa-user"></i> Edit Profile</a></li>
                            <li><a href="<?php echo $this->Html->url(array('controller' => 'tests', 'action' => 'practice')); ?>"><i class="fa fa-edit"></i> Practice Test</a></li>

                        <?php } ?>

                                                    <!--<li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'features')); ?>"><i class="fa fa-desktop"></i> Features</a></li>-->
                        <li><a href="<?php echo $this->Html->url(array('controller' => 'testimonials', 'action' => 'index')); ?>"><i class="fa fa-comments-o"></i> Testimonials</a></li>
                        <!--<li><a href="<?php //echo $this->Html->url(array('controller' => 'faqs', 'action' => 'index'));                                                 ?>"><i class="fa fa-list"></i> FAQ'S</a></li>-->
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