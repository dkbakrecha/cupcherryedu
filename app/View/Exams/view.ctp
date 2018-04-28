<div id="exam_details" class="row gkbytes">
    <div class="col-lg-8">
        <div class="box no-height">
            <div class="box-content">
                <h2>
                    <?php
                    echo $this->Html->image('exams/' . $examInfo['Exam']['logo_pic'], array('class' => 'img-responsive exam-logo'));
                    //pr($examInfo);
                    ?>
                    <div class="exam-title">
                        <?php echo $examInfo['Exam']['title']; ?>
                    </div>
                </h2>
            </div>
        </div>

        <div class="box topic-list">
            <div class="box-header">
                <h3 class="box-title">Description</h3>
            </div>
            <div class="box-content">
                <?php echo $examInfo['Exam']['description']; ?>


            </div>

            <?php
            if (!empty($examposts)) {
                foreach ($examposts as $postData) {
                    ?>
                    <div class="post-item">

                        <?php $_linkUrl = $this->Html->url(array('controller' => 'posts', 'action' => 'view', $postData['Post']['title_slug'])); ?>
                        <div class="col-lg-4">
                            <?php if (!empty($postData['Post']['cover_image'])) {
                                ?>
                                <div class="row"><?php echo $this->html->image('/files/images/' . $postData['Post']['cover_image'], array('class' => 'img-responsive')); ?></div>
                            <?php } else {
                                ?>
                                <div class="row"><?php echo $this->html->image('/files/images/post_default.png', array('class' => 'img-responsive')); ?></div>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="col-lg-8">
                            <a href="<?php echo $_linkUrl; ?>">
                                <h1 class=""><?php echo $postData['Post']['title']; ?></h1>
                            </a>
                            <div class="post-content">
                                <?php
                                echo $this->Classy->short_description($postData['Post']['content'], $_linkUrl);
                                ?>
                            </div>
                            <div class="post-info m-top2 m-bottom5">
                                <i class="fa fa-user"></i> <a href="#">By <?php // echo $postData['User']['name']; ?></a> on <?php echo date(Configure::read('Site.front_date_format'), strtotime($postData['Post']['created'])) ?> 
                                <!--<span class="pull-right"><i class="fa fa-comments"></i> <a href="#">2456</a> &nbsp;/&nbsp; <a href="#">Business</a> - <a href="#">UX</a> - <a href="#">Web Design</a> - <a href="#">UI</a> - <a href="#">Social Media</a></span>--> 
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="box no-height">
            <div class="box-content">
                <div class="fb-page" data-href="<?php echo $examInfo['Exam']['fb_page']; ?>" data-tabs="messages" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                    <blockquote cite="<?php echo $examInfo['Exam']['fb_page']; ?>" class="fb-xfbml-parse-ignore">
                        <a href="<?php echo $examInfo['Exam']['fb_page']; ?>">IBPS PO Exam Preparation</a>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="fb-root"></div>
<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9&appId=681834088533348";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>