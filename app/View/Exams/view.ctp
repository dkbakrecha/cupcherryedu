<div id="exam_details" class="row gkbytes">
    <div class="col-lg-8">
        <div class="box no-hight">
            <div class="box-content">
                <h2><?php echo $examInfo['Exam']['title']; ?></h2>
            </div>
        </div>

        <div class="box topic-list">
            <div class="box-header">
                <h3 class="box-title">Description</h3>
            </div>
            <div class="box-content">
                <?php echo $examInfo['Exam']['description']; ?>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="box no-hight">
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