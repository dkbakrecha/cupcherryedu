<?php
echo $this->Html->css('/js/owl-carousel/owl.carousel');
echo $this->Html->script('owl-carousel/owl.carousel.min');
?>
<style>
    .home_section
    {
        /*background-attachment: fixed;*/
        background-image: url("<?php echo $this->webroot; ?>img/home.jpg");
        background-position: bottom center;
        background-repeat: no-repeat;
        background-size: cover;
        /*width: 100%;*/
        height: 450px;
        position:relative;
    }

    .exam_section, .footer-subscribe
    {
        background : #337ab7;
        background-image: url("<?php echo $this->webroot; ?>img/bs-docs-masthead-pattern.png");
        background-position: 50% 0;
    }

    .bedgeforyear{
        background-image: url("<?php echo $this->webroot; ?>img/bs-docs-masthead-pattern.png");
    }

    .recent-blogs{
        background-image: url("<?php echo $this->webroot; ?>img/bg-bricks.png");
        background-position: 50% 0;
        position:relative;        
    }

    .testlist-section{
        background: #337ab7 url(http://modeltheme.com/lmstudy/wp-content/uploads/2015/04/mt_lmstudybg-1.png?id=14697) !important;
        color : #FFF;
    }


</style>
<?php /*
  <div class="home_section">
  <div class="color-overlay"></div>
  <div class="container">
  <div class="intro-text type1">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <!--
  <ol class="carousel-indicators">
  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
  <li data-target="#myCarousel" data-slide-to="1"></li>
  <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  -->
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
  <div class="item active">
  <h4>Helping you to achieve your aims & dreams in future</h4>
  <h5>One of the best E-learning platform available.</h5>
  </div>

  <div class="item">
  <h4>Online Learning made Easy</h4>
  <h5>Non stop learning whenever you want wherever you want.</h5>
  </div>

  <div class="item">
  <h4>The Best questions like Elsewhere. Come get trained.</h4>
  <h5>You’ll get what you came for!</h5>
  </div>


  </div>

  <!-- Left and right controls -->
  <!--
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
  <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
  <span class="sr-only">Next</span>
  </a>
  -->
  </div>

  <?php if (empty($LoggedinUser)) { ?>
  <a class="btn btn-primary btn-home-slider btn-lg register_open" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'login')); ?>" id="">Login</a>
  <a class="btn btn-primary btn-home-slider btn-lg register_open" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'register')); ?>" id="">New Profile</a>
  <!--<a class="dt-sc-button small " href="<?php //echo $this->Html->url(array('controller' => 'pages', 'action' => 'about'));                              ?>">Read More</a>-->
  <?php } ?>
  </div>
  </div>
  </div>
 */ ?>
<div class="exam_section">
    <div class="container">
        <!--<h3 class="sub-title be-center">Exam Study Guide</h3>-->
        <div class="row">
            <div class="col-lg-8">
                <div class="site-info-top-box">
                    <h1>New Education Practice Tests 2018</h1>
                    <?php echo $homeContent['CmsPage']['content']; ?>
                </div>
            </div>
            <div class="col-lg-4 nomobile">
                <?php echo $this->Html->image('home-img1.png', array('class' => 'img-responsive')); ?>
                <a href="<?php echo $this->Html->url(array('controller' => 'exam_notifications', 'action' => 'index')); ?>"><div class="new-notification-home-box">New Exam Notifications</div></a>
            </div>


        </div>

    </div>    
</div>

<div class="bedgeforyear">
    <div class="container">
        <div class="col-xs-12 col-sm-3 col-md-1">
            <div class="row">    
                <?php echo $this->Html->image('1YearW.png', array('class' => 'img-responsive pull-right')); ?>
            </div>
        </div>
        <div class="col-xs-12 col-sm-9 col-md-11">
            <div class="bedgetext">
                Find Right Knowledge! Right Time! Right Place!

                <div class="g-signin2 pull-right btn-googleHome" data-onsuccess="onSignIn" data-width="250" data-height="60" data-longtitle="true">
                </div>

                <?php //echo $this->Html->image('footersocial03.png', array('onclick' => 'click_gp();', 'class' => "pull-right btn-googleHome")); ?>
            </div>
        </div>
    </div>
</div>

<div class="home-exam-list">
    <div class="container">
        <h2 class="sub-title be-center">UpComing Exams</h2>
        <div class="col-xs-12 col-sm-9 col-md-8">
            <div class="list-group">
                <?php
                foreach ($notificationList as $exam) {
                    $_slug = $exam['ExamNotification']['title_slug'];
                    ?>
                    <a href="<?php echo $this->Html->url(array('controller' => 'exam_notifications', 'action' => 'view', $_slug)); ?>" class="list-group-item">
                        <?php echo $exam['ExamNotification']['title']; ?> 
                        <span class="pull-right">Last Date :
                            <?php
                            if ($exam['ExamNotification']['lastapply_date'] != "0000-00-00" && $exam['ExamNotification']['lastapply_date'] != "") {
                                echo $exam['ExamNotification']['lastapply_date'];
                            } else {
                                echo 'Not Mation';
                            }
                            ?> 
                        </span>
                    </a>
                <?php }
                ?>


            </div>
        </div>
        <div class="col-xs-12 col-sm-9 col-md-4">
            <div class="exam-callaction backgroundSrudent">
                <div class="layer">
                    <h3>
                        Subscribe to our mailing list to receive an update when new exam notification arrive!
                    </h3>
                    <a href="<?php echo $this->Html->url(array('controller' => 'newsletters', 'action' => 'index')); ?>" class="btn btn-primary">Subscribe Here</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="recent-blogs" >
    <div class="container">
        <h2 class="sub-title be-center">Recent Articles</h2>
        <div class="section-description">Articles are for user to spread their thoughts and collection of matter to users and updates for currents news.</div>
        <div id="resentPost">
            <?php
            foreach ($blogList as $blogpost) {
                ?>
                <div class="card">
                    <a href="<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'view', $blogpost['Post']['title_slug'])); ?>">
                        <?php
                        if (!empty($blogpost['Post']['cover_image'])) {
                            echo $this->Html->image('/files/images/' . $blogpost['Post']['cover_image'], array(
                                'class' => 'img-responsive',
                                'title' => $blogpost['Post']['title'],
                                'alt' => $blogpost['Post']['title']
                            ));
                        } else {
                            echo $this->Html->image('/files/images/post_default.png', array(
                                'class' => 'img-responsive',
                                'title' => $blogpost['Post']['title'],
                                'alt' => $blogpost['Post']['title']
                            ));
                        }
                        ?>
                        <div class="cardcontainer">
                            <h3><?php echo $blogpost['Post']['title']; ?></h3>
                            <div class="post-author">
                                By <?php echo $blogpost['User']['name']; ?>
                            </div>
                        </div>
                    </a>
                </div>

                <?php
            }
            ?>
        </div>
        <div class="callToAction">
            <a href="<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'index')); ?>"><span class="btn btn-primary ">All Articles</span></a>
        </div>

    </div>
</div>

<?php
echo $this->Form->create('social_response', array('url' => array('controller' => 'users', 'action' => 'socialResponse')));
echo $this->Form->hidden('resData');
echo $this->Form->hidden('resFrom');
echo $this->Form->end();
?>




<script>
    jQuery('.creload').on('click', function () {
        var mySrc = $(this).prev().attr('src');
        var glue = '?';
        if (mySrc.indexOf('?') != -1) {
            glue = '&';
        }
        $(this).prev().attr('src', mySrc + glue + new Date().getTime());
        return false;
    });




    function click_gp() {
        $('#GoogleLogin').click();
    }
</script>