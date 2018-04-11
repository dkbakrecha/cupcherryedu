
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

    <div class="col-lg-6">
        <div class="row">
            <div class="box">
                <div class="box-content">
                    <div class="btn btn-primary"> Post a Notes </div>
                    <div class="btn btn-primary"> Post a Question </div>
                    <div class="btn btn-primary"> Post a Query </div>
                    
                    <div id="FeedFormOuter">
                    <?php
                    echo $this->Form->create("Contact" , array(
                        'name' => 'feedsQueryAdd',
                        'id' => 'feedsQueryAdd'
                    ));
                    
                    echo $this->Form->hidden("mail_type", array(
                        'value' => 1,
                    ));
                    
                    echo $this->Form->input("message", array(
                        'label' => false,
                        'placeholder' => 'Enter your question or query here'
                    ));
                    
                    echo $this->Form->submit("Save",array(
                        'class' => 'btn btn-primary'
                    ));
                    ?>
                    </div>
                </div>
            </div>
            
            <div class="box">
                <div class="box-content">
                    <?php pr($feedsList); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">


        <div class="box">
            <div class="box-content">
                <ul class="side-links">
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'notes', 'action' => 'add')); ?>"> Notes </a></li>
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'questions', 'action' => 'add')); ?>"> Questions </a></li>
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'feedback')); ?>"> Exams </a></li>
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'help')); ?>"> Courses </a></li>
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'help')); ?>"> Students </a></li>
                </ul>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">
    $(function () {
        $('#short').sortable();
    });
</script>