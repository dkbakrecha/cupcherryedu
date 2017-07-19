<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-8">
            <div class="home-text">
                <h3>Exam Notification</h3> 

                <div class="content-text">
                    <div class="panel-group" id="faqAccordion">
                        <?php
                        foreach ($notificationList as $notifiation) {
                            ?>
                            <div class="panel panel-default ">
                                <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion" data-target="#notification<?php echo $notifiation['ExamNotification']['id']; ?>">
                                    <h4 class="panel-title">
                                        <?php echo $notifiation['ExamNotification']['title']; ?>	
                                    </h4>

                                </div>
                                <div id="notification<?php echo $notifiation['ExamNotification']['id']; ?>" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                        <?php echo $notifiation['ExamNotification']['notification_text']; ?>	                                
                                        <a href="<?php echo $notifiation['ExamNotification']['link']; ?>">
                                            Link                            
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-xs-12 col-sm-4">
            <?php echo $this->element('ask_question'); ?>
        </div>
    </div>
</div>