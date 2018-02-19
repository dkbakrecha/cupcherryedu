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
                <div class="bs-callout bs-callout-warning" > 
                    <div class="row">
                        <div class="col-md-3 ">
                            <label>Post Date</label>
                            <div class="clr-orange"><?php
                if ($notification['ExamNotification']['post_date'] != "0000-00-00") {
                    echo $notification['ExamNotification']['post_date'];
                } else {
                    echo "Not mation yet";
                }
                ?></div>
                        </div>

                        <div class="col-md-3 ">
                            <label>Last Apply Date</label>
                            <div class="clr-orange"><?php
                                if ($notification['ExamNotification']['lastapply_date'] != "0000-00-00") {
                                    echo $notification['ExamNotification']['lastapply_date'];
                                } else {
                                    echo "Not mation yet";
                                }
                ?></div>
                        </div>
                        <div class="col-md-3">
                            <label>Exam Date </label>
                            <div class="clr-orange"><?php
                                if ($notification['ExamNotification']['exam_date'] != "0000-00-00") {
                                    echo $notification['ExamNotification']['exam_date'];
                                } else {
                                    echo "Not mation yet";
                                }
                ?></div>
                        </div>
                    </div>
                </div>
                <p> <?php echo $notification['ExamNotification']['notification_text']; ?></p>

                <div class="row">
                    <div class="col-sm-4">
                        <?php
                        if (!empty($notification['ExamNotification']['source'])) {
                            ?>
                            <a class="btn btn-primary btn-lg" target="_BLANK" href="<?php echo $notification['ExamNotification']['source']; ?>">Notification Here</a>    
                            <?php
                        }
                        ?>
                    </div>
                    <div class="col-sm-4">
                        <?php
                        if (!empty($notification['ExamNotification']['syllabus_url'])) {
                            ?>
                            <a class="btn btn-primary btn-lg" target="_BLANK" href="<?php echo $notification['ExamNotification']['syllabus_url']; ?>">Syllabus Here</a>    
                            <?php
                        }
                        ?>
                    </div>
                    <div class="col-sm-4">
                        <?php
                        if (!empty($notification['ExamNotification']['official_url'])) {
                            ?>
                            <a class="btn btn-primary btn-lg" target="_BLANK" href="<?php echo $notification['ExamNotification']['official_url']; ?>">Official Link</a>    
                            <?php
                        }
                        ?>
                    </div>
                </div>
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