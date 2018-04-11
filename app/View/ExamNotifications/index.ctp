<div class="row">
    <div class="col-xs-12 col-sm-8 ">
        <div class="box ">
            <div class="box-content">
                <h3>Exam Notification</h3> 

                <?php
                foreach ($notificationList as $notifiation) {
                    ?>


                    <?php
                    $_slug = $notifiation['ExamNotification']['id'];
                    if (!empty($notifiation['ExamNotification']['title_slug'])) {
                        $_slug = $notifiation['ExamNotification']['title_slug'];
                    }
                    //pr($notifiation);
                    ?>
                    <a href="<?php echo $this->Html->url(array('controller' => 'exam_notifications', 'action' => 'view', $_slug)); ?>">
                        <div class="bs-callout bs-callout-warning" > 
                            <div class="row">
                                <div class="col-md-7">
                                    <h4 class="clr-orange"><?php echo $notifiation['ExamNotification']['title']; ?>	</h4> 
                                </div>
                                <div class="col-md-3 ">
                                    <label>Last Apply Date</label>
                                    <div class="clr-orange"><?php
                if ($notifiation['ExamNotification']['lastapply_date'] != "0000-00-00") {
                    echo $notifiation['ExamNotification']['lastapply_date'];
                } else {
                    echo "Not mation yet";
                }
                    ?></div>
                                </div>
                                <div class="col-md-2">
                                    <label>Exam Date </label>
                                    <div class="clr-orange"><?php
                                    if ($notifiation['ExamNotification']['exam_date'] != "0000-00-00") {
                                        echo $notifiation['ExamNotification']['exam_date'];
                                    } else {
                                        echo "Not mation yet";
                                    }
                    ?></div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-4">
        <?php echo $this->element('ask_question'); ?>
    </div>
</div>