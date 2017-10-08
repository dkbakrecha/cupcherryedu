<!--  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->
<div class="row">
    <div class="col-lg-3">
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
    </div>

    <div class="col-lg-9">
            <div class="row">
                <div class="col-lg-6">
                    <a href="<?php echo $this->Html->url(array('controller' => 'notes', 'action' => 'home')); ?>"  class="nodecor">
                        <div class="dashboard-box">
                            <?php echo $this->Html->image("dashboardicon02.png", array("class" => "")); ?>
                            <h4>Notes</h4>
                            <div>1 My Notes | 1 Favorite</div>
                        </div>
                    </a>
                </div>
                
                <div class="col-lg-6">
                    <a href="<?php echo $this->Html->url(array('controller' => 'questions', 'action' => 'index')); ?>"  class="nodecor">
                        <div class="dashboard-box">
                            <?php echo $this->Html->image("dashboardicon04.png", array("class" => "")); ?>
                            <h4>Questions</h4>
                            <div>1 My Questions | 1 My Favorite</div>
                        </div>
                    </a>
                </div>
                
                <div class="col-lg-4">
                    <a href="<?php echo $this->Html->url(array('controller' => 'tests', 'action' => 'index')); ?>" class="nodecor">
                        <div class="dashboard-box">
                            <?php echo $this->Html->image("dashboardicon03.png", array("class" => "")); ?>
                            <h4>Exams</h4>
                            <div>1 Total | 1 Running</div>
                        </div>
                    </a>
                </div>
                
                

                <div class="col-lg-4">
                    <a href="<?php echo $this->Html->url(array('controller' => 'notes', 'action' => 'index')); ?>"  class="nodecor">
                        <div class="dashboard-box">
                            <?php echo $this->Html->image("dashboardicon02.png", array("class" => "")); ?>
                            <h4>Courses</h4>
                            <div>1 My Notes | 1 Favorite</div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4">
                    <a href="<?php echo $this->Html->url(array('controller' => 'notes', 'action' => 'index')); ?>"  class="nodecor">
                        <div class="dashboard-box">
                            <?php echo $this->Html->image("dashboardicon02.png", array("class" => "")); ?>
                            <h4>Students</h4>
                            <div>1 My Notes | 1 Favorite</div>
                        </div>
                    </a>
                </div>
            </div>
    </div>


</div>

<script type="text/javascript">
    $(function () {
        $('#short').sortable();
    });
</script>