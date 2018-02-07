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
        background-image: url("<?php echo $this->webroot; ?>img/bg-bricks.png");
        background-position: 50% 0;
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
                    <h1>New Education Practice Tests 2017</h1>
                    <?php echo $homeContent['CmsPage']['content']; ?>
                </div>
            </div>
            <div class="col-lg-4 nomobile">
                <?php echo $this->Html->image('home-img1.png', array('class' => 'img-responsive')); ?>
                <a href="<?php echo $this->Html->url(array('controller' => 'exam_notifications', 'action' => 'index')); ?>"><div class="new-notification-home-box">New Exam Notifications</div></a>
            </div>
            

        </div>
        <div class="row" style="">
            <?php
            foreach ($examList as $exam) {
                //pr($exam);
                ?>
                <div class="col-lg-2 col-xs-6">

                                        <!--<a href="<?php //echo $this->Html->url(array('controller' => 'exams', 'action' => 'view', $exam['Exam']['id']));      ?>">-->
                    <div class="exam-block">
                        <div class="exam-img-wrap">
                            <?php
                            echo $this->Html->image('exams/' . $exam['Exam']['logo_pic'], array('class' => 'exam-cover'));
                            ?>
                        </div>
                        <div><?php
                        echo $exam['Exam']['title'];
                            ?>
                        </div>
                    </div>

                    <!--</a>-->

                </div>
                <?php
            }
            ?>

        </div>
    </div>    
</div>
<!--
<div class="siteinfo-section">
    <div class="color-overlay-light"></div>

    <div class="container">
        
    </div>    
</div>-->

<?php /*

  <div class="testlist-section">
  <div class="container">
  <h3 class="sub-title be-center">Try our free sample test</h3>
  <div class="row">
  <?php
  foreach ($testInfo as $test) {
  ?>
  <div class="col-lg-4">
  <div>
  <a href="<?php echo $this->Html->url(array('controller' => 'tests', 'action' => 'view', $test['TestType']['unique_id'])); ?>">
  Test Here
  </a>
  </div>
  </div>
  <?php
  }
  ?>

  </div>
  </div>
  </div>
 */ ?>
<div class="category-section ">
    <div class="container">
        <h3 class="sub-title be-center" >Teaching Resources</h3>
        <div class="section-description nomobile">The content matter is divided into many different categories and their sub categories based on the pattern of the examination and latest competitive tests.</div>
        <div class="col-lg-6 nomobile">
            <?php
            foreach ($cateList as $category) {
                ?>
                <div class="col-lg-6 col-md-6">
                    <h3 class="category-title"><?php echo $category['Category']['title']; ?></h3>
                    <?php
                    $i = 1;
                    foreach ($category['SubCategories'] as $subCate) {
                        ?>
                        <h4 class="subcategory-title"> 
                            <?php
                            echo $subCate['title'];
                            if ($i == 4) {
                                echo "...";
                            }
                            ?> </h4>
                        <?php
                        $i++;
                    }
                    ?>
                </div>
                <?php
            }
            ?>
        </div>   
        <div class="col-lg-6">
            <div class="col-lg-12">
                <h3 class="category-title"><strong>Latest updates notes</strong></h3>
                <?php
                if (!empty($noteList)) {
                    foreach ($noteList as $note) {
                        //pr($note);
                        $date = date("d.m.Y");
                        $match_date = date('d.m.Y', strtotime($note['Note']['created']));
                        $_letest = "";
                        if ($date == $match_date) {
                            $_letest = "letest_note";
                        }
                        ?>
                        <h4 class="subcategory-title <?php echo $_letest; ?>">
                            <a href="<?php echo $this->Html->url(array('controller' => 'notes', 'action' => 'view', $note['Note']['id'])); ?>">
                                <?php echo $note['Note']['title'] ?> 
                            </a>
                        </h4>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>  
    <div class="callToAction">
        <a href="<?php echo $this->Html->url(array('controller' => 'questions', 'action' => 'gkbytes')); ?>"><span class="btn btn-primary ">GK Bytes</span></a>
        <a href="<?php echo $this->Html->url(array('controller' => 'notes', 'action' => 'index')); ?>"><span class="btn btn-primary ">Notes</span></a>
    </div> 
</div>

<div class="recent-blogs" >
    <div class="container">
        <h3 class="sub-title be-center">Recent Articles</h3>
        <div class="section-description">Articles are for user to spread their thoughts and collection of matter to users and updates for currents news.</div>
        <div id="resentPost">
            <?php
            foreach ($blogList as $blogpost) {
                ?>
                <div class="card">
                    <a href="<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'view', $blogpost['Post']['title_slug'])); ?>">
                        <?php
                        if (!empty($blogpost['Post']['cover_image'])) {
                            echo $this->Html->image('/files/images/' . $blogpost['Post']['cover_image'], array('class' => 'img-responsive'));
                        } else {
                            echo $this->Html->image('/files/images/post_default.png', array('class' => 'img-responsive'));
                        }
                        ?>
                        <div class="cardcontainer">
                            <p><?php echo $blogpost['Post']['title']; ?></p>
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

<div class="footer-subscribe">
    <div class="container text-center">
        <h5>Subscribe to our mailing list to receive an update when new exam notification arrive!</h5>
        <div id="home_subscribe" class="col-lg-6 col-lg-offset-3">
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
                    <!--<input type="email" name="EMAIL" class="form-control" id="mce-EMAIL" placeholder="">-->
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