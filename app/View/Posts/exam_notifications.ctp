<div class="row">
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
            <div class="box-content list-group">

                <?php
                foreach ($notificationList as $notifiation) {
                    $_slug = $notifiation['Post']['id'];
                    if (!empty($notifiation['Post']['title_slug'])) {
                        $_slug = $notifiation['Post']['title_slug'];
                    }
                    //pr($notifiation);
                    
                    $_meta = array();
                    if(!empty($notifiation['PostMeta'])){
                        foreach($notifiation['PostMeta'] as $metaValue){
                            $_meta[$metaValue['meta_key']] = $metaValue['meta_value'];
                        }
                    }
                    ?>
                <div class="row bs-callout">
                    <div class="clr-site en-post-date">
                        <label>Post Date</label>
                                <?php
                        if ($_meta['post_date'] != "0000-00-00") {
                            ?><div class="date-day"><?php
                            echo date("d",strtotime($_meta['post_date']));
                            ?></div><div class="date-month"><?php
                            echo date("M",strtotime($_meta['post_date']));
                            ?></div><?php
                        } 
                    ?>

                    </div>
                    <div class="en-post-detail">
                        <h4 class="clr-site">
                            <a class="" href="<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'view', $_slug)); ?>">
<?php echo $notifiation['Post']['title']; ?>	</a></h4> 

                        <div class="">
                            
                            <div class="clr-site"><label>Last Date</label> <?php
                if ($_meta['lastapply_date'] != "0000-00-00" && $_meta['lastapply_date'] != "") {
                    ?><?php
                            echo date("d",strtotime($_meta['lastapply_date']));
                            ?><?php
                            echo date("M",strtotime($_meta['lastapply_date']));
                            ?><?php
                } else {
                    echo "Not available";
                }
                    ?></div>
                       
                            
                            <div class="clr-site"><label>Exam Date </label> <?php
                           // pr($notifiation['ExamNotification']['exam_date']);
                                    if (!empty($_meta['exam_date']) && $_meta['exam_date'] != "0000-00-00") {
                                        ?><div class="date-day"><?php
                            echo date("d",strtotime($_meta['exam_date']));
                            ?></div><div class="date-month"><?php
                            echo date("M",strtotime($_meta['exam_date']));
                            ?></div><?php 
                                    } else {
                                        echo "Not available";
                                    }
                    ?></div>
                        </div>
                    </div>

                    <div class="note-footer">
                        <?php
                        $SHORT_URL = $ShareProductUrl = $this->Html->url(array('controller' => 'exam_notifications', 'action' => 'view', $_slug), true);
                        $ShareImagePath = Router::url('/', true) . "img/no_user.png";
                        //$ShareImagePath = $this->Html->image('user.png');
                        $shareTitle = strip_tags($notifiation['Post']['title']);
                        $shareSummary = substr(strip_tags($notifiation['Post']['content']), 0, 150) . "...";

                        //prd($ShareImagePath);
                        $fbDescriptionwant = $shareSummary; //@$cmsDataProDetail[0]['Cmspage']['description'].' '.$shareSummary;
                        $twDescriptionwant = ""; //@$cmsDataProDetail[2]['Cmspage']['description'];
                        $pinDescriptionwant = $shareTitle; //@$cmsDataProDetail[1]['Cmspage']['description'].' '.$shareTitle;
                        ?>
                        <span class="pull-right btn btn-primary btn-sm"><i class="fa fa-bookmark-o"></i> Bookmark</span>
                        <div class=""> <?php echo $this->General->fbShareButtonLink("ui_images/images/facebookcopy.jpg", $ShareProductUrl, $ShareImagePath, $shareTitle, $fbDescriptionwant); ?> </div>
                        <div class=""> <?php echo $this->General->twitterShareButtonLink("ui_images/images/twitter-copy.jpg", $SHORT_URL, $twDescriptionwant); ?> </div>
                        <div class=""> <?php echo $this->General->pinterestShareButtonLink("ui_images/images/pinterest-copy.jpg", $ShareProductUrl, $ShareImagePath, $pinDescriptionwant, $shareSummary); ?> </div>
                    </div>
                </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>

    <?php
    
    if (empty($LoggedinUser)) {
        ?>
    <div class="col-xs-12 col-sm-4">
        <?php echo $this->element('ask_question'); ?>
    </div>
    <?php }  ?>
</div>