<div class="row">
    <?php
        if (empty($LoggedinUser)) {
            $_notesclass = "col-lg-8";
        }else{
            $_notesclass = "col-lg-12";
        }
    ?>
    <div class="<?php echo $_notesclass; ?>">
        <?php
        if (!empty($all_posts)) {
            foreach ($all_posts as $postData) {
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
                            <i class="fa fa-user"></i> <a href="#">By <?php echo $postData['User']['name']; ?></a> on <?php echo date(Configure::read('Site.front_date_format'), strtotime($postData['Post']['created'])) ?> 
                            <span class="pull-right">
                                <!--<i class="fa fa-comments"></i> <a href="#">2456</a>--> 
                                <i class="fa fa-eye"></i> <?php echo $postData['Post']['view_count']; ?>
                                <!--&nbsp;/&nbsp; <a href="#">Business</a> - <a href="#">UX</a> - <a href="#">Web Design</a> - <a href="#">UI</a> - <a href="#">Social Media</a>-->
                            </span> 
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
            <?php echo $this->element('sidebar/newnotes'); ?>
        </div>  
        <?php
    }
    ?>

</div>