<div class="row note_list cardbox">
    <div class="col-lg-8">
        <?php
        if (!empty($all_posts)) {
            foreach ($all_posts as $postData) {
                $_linkUrl = $this->Html->url(array('controller' => 'posts', 'action' => 'view', $postData['Post']['title_slug']));
                ?>
                <div class="col-lg-6">
                    <div class="list-box">
                        <?php if (!empty($postData['Post']['cover_image'])) {
                            echo $this->html->image('/files/images/' . $postData['Post']['cover_image'], array('class' => 'img-responsive'));
                        }
                        ?>
                        <div class='note-short'>


                            <h2 class="notes-title">
                                <a href="<?php echo $_linkUrl; ?>">
        <?php echo $postData['Post']['title']; ?>
                                </a>
                            </h2>
                            <div class="notes-shortdesc">
                                <?php
                                echo $this->Classy->short_description($postData['Post']['content'], $_linkUrl);
                                ?>
                            </div>

                        </div>
                        <div class="note-footer">
                            <?php
                            $SHORT_URL = $ShareProductUrl = $this->Html->url(array('controller' => 'posts', 'action' => 'view', $postData['Post']['id']), true);
                            $ShareImagePath = Router::url('/', true) . "img/no_user.png";
                            //$ShareImagePath = $this->Html->image('user.png');
                            $shareTitle = strip_tags($postData['Post']['title']);
                            $shareSummary = substr(strip_tags($postData['Post']['content']), 0, 150) . "...";

                            //prd($ShareImagePath);
                            $fbDescriptionwant = $shareSummary; //@$cmsDataProDetail[0]['Cmspage']['description'].' '.$shareSummary;
                            $twDescriptionwant = ""; //@$cmsDataProDetail[2]['Cmspage']['description'];
                            $pinDescriptionwant = $shareTitle; //@$cmsDataProDetail[1]['Cmspage']['description'].' '.$shareTitle;
                            ?>
                            <span class="notes-action"><i class="fa fa-heart-o"></i></span>
                            <i class="fa fa-eye"></i> <?php echo $postData['Post']['view_count']; ?>
                            <div class="pull-right"> <?php echo $this->General->fbShareButtonLink("ui_images/images/facebookcopy.jpg", $ShareProductUrl, $ShareImagePath, $shareTitle, $fbDescriptionwant); ?> </div>
                            <div class="pull-right"> <?php echo $this->General->twitterShareButtonLink("ui_images/images/twitter-copy.jpg", $SHORT_URL, $twDescriptionwant); ?> </div>
                            <div class="pull-right"> <?php echo $this->General->pinterestShareButtonLink("ui_images/images/pinterest-copy.jpg", $ShareProductUrl, $ShareImagePath, $pinDescriptionwant, $shareSummary); ?> </div>
                        </div>
                        <div class="post-info m-top2 m-bottom5" style="display: none;">
                            <i class="fa fa-user"></i> <a href="#">By <?php echo $postData['User']['name']; ?></a> on <?php echo date(Configure::read('Site.front_date_format'), strtotime($postData['Post']['created'])) ?> 

                        </div>
                    </div>
                </div>
                <?php
            }
        }
        ?>
        <div class="row site-pagination">
            <div class="col-lg-6">
<?php echo $this->Paginator->counter(); ?>
            </div>
            <div class="col-lg-6">
                <div class=" pull-right">
                    <?php
                    echo $this->Paginator->numbers(array(
                        'before' => '<ul class="pagination">',
                        'separator' => '',
                        'currentTag' => 'a',
                        'currentClass' => 'active',
                        'tag' => 'li',
                        'after' => '</ul>'
                    ));
                    ?>
                </div>
            </div>
        </div>	
    </div>

    <?php
    if (empty($LoggedinUser)) {
        ?>
        <div class="col-lg-4">
            <div class="box sidebar m-bottom15">
                <div class="box-header">
                    <h3 class="box-title">Stay Updated</h3>
                </div>
                <div class="box-content">
                    <p>Get daily articles in your inbox for free.</p>
                    <div id="home_subscribe" >

                        <form role="form" id="hr-subscribe-form" action="<?php echo $this->Html->url(array('controller' => 'newsletters', 'action' => 'add')); ?>" method="post" name="hr-subscribe-form" novalidate="" class="hr-subscribe-form">
                            <div class="input-group input-group-lg">
                                <?php
                                echo $this->Form->input('email_address', array(
                                    'type' => 'email',
                                    'class' => 'form-control',
                                    'placeholder' => 'Email address...',
                                    'label' => false,
                                    'div' => false
                                ));
                                ?>
                                <span class="input-group-btn">
                                    <button type="submit" name="subscribe" id="mc-embedded-subscribe" class="btn btn-secondary">Subscribe!</button>
                                </span>
                            </div>
                            <div id="responses">
                                <div class="response" id="mce-response" style="display:none"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        <?php echo $this->element('sidebar/topposts'); ?>
        <?php //echo $this->element('sidebar/newnotes'); ?>
        </div>  
        <?php
    }
    ?>

</div>