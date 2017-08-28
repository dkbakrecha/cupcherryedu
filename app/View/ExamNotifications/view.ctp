<?php
$_linkUrl = $this->Html->url(array('controller' => 'exam_notifications', 'action' => 'view', $notification['ExamNotification']['id']), TRUE);
?>

<div class="row">
    <div class="col-xs-12 col-sm-8">
        <div class="home-text">
            <h3>
                <?php echo $notification['ExamNotification']['title']; ?>
            </h3> 
            <div class="share-article"></div>
            <div class="content-text">
                <p> <?php echo $notification['ExamNotification']['notification_text']; ?></p>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-4">
        <?php echo $this->element('ask_question'); ?>
    </div>
</div>


<script>
    $(document).ready(function(){
        $(".share-article").sharepage({
            networks: ["facebook", "twitter", "googleplus", "linkedin"],
            url: "<?php echo $_linkUrl; ?>",
            title: "SharePage example title",
            source: "SharePage example page",
            width: 650,
            height: 600,
            design: "buttons"
        });
    });
</script>