<div class="row note_list cardbox">
    <div class="col-xs-12 col-lg-8">
        <div class="box ">
            <div class="box-header dark-blue">
                <div class="box-title">
                    <h3>Exam Alerts</h3>
                    <div class="toptext">
                        Stay informed about the latest job openings in various government sectors. Get detailed information regarding important dates.                               
                    </div>
                    <i class="fa fa-shield pull-right cms-header-icon"></i>
                </div>
            </div>
        </div>
        <?php
        if (!empty($all_posts)) {
            foreach ($all_posts as $postData) {
                $_linkUrl = $this->Html->url(array('controller' => 'posts', 'action' => 'view', $postData['Post']['title_slug']));
                $postID = $postData['Post']['id'];
                ?>
                <div class="list-box">
                    <div class="col-lg-5 no-padding notes-image">
                        <?php
                        if (!empty($postData['Post']['cover_image'])) {
                            echo $this->html->image('/files/images/' . $postData['Post']['cover_image'], array('class' => 'img-responsive'));
                        } else {
                            if ($postData['Post']['post_type'] == 3) {
                                echo $this->html->image('exam_notification.png', array('class' => 'img-responsive'));
                            } elseif ($postData['Post']['post_type'] == 1) {
                                echo $this->html->image('study_notes.png', array('class' => 'img-responsive'));
                            } else {
                                echo $this->html->image('blog_articles.png', array('class' => 'img-responsive'));
                            }
                        }
                        ?>
                    </div>
                    <div class="col-lg-7 no-padding">
                        <div class='note-short'>


                            <h2 class="notes-title">
                                <a href="<?php echo $_linkUrl; ?>">
                                    <?php echo $postData['Post']['title']; ?>
                                </a>
                            </h2>
                        </div>
                       
                    </div>
                </div>
                <?php
            }
            ?>
            <?php
        } else {
            ?>
            <div class="alert alert-info" role="alert">
                Please try searching with other keyword!
            </div>
            <?php
        }
        ?>


    </div>

    <?php
    if (empty($LoggedinUser)) {
        ?>
        <div class="col-xs-12 col-sm-4">
            <?php echo $this->element('ask_question'); ?>
        </div>
    <?php } ?>
</div>