<div class="row note_list cardbox">
    <div class="col-lg-8 postList">
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

        <div class="show_more_main" id="show_more_main<?php echo $postID; ?>">
            <span id="<?php echo $postID; ?>" class="show_more btn btn-info btn-full" title="Load more posts">Show more</span>
            <span class="loding" style="display: none;"><span class="loding_txt">Loading...</span></span>
        </div>
    </div>

</div>


<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click', '.show_more', function () {
            var ID = $(this).attr('id');
            $('.show_more').hide();
            $('.loding').show();
            $.ajax({
                type: 'POST',
                url: '<?php echo $this->html->url(array('controller' => 'posts', 'action' => 'nextposts'), true) ?>',
                data: 'id=' + ID,
                success: function (html) {
                    $('#show_more_main' + ID).remove();
                    $('.postList').append(html);
                }
            });
        });
    });
</script>