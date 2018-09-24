<div class="row">
    <div class="col-lg-10 col-lg-offset-1">
        <?php
        if (!empty($noteData)) {
            ?>
            <div class="box notes-view">
                <div class="box-header">
                    <h1 class="title"><?php echo $noteData['Note']['title']; ?></h1>

                    <div class="meta-info">
                        <a href="#">By <?php echo $noteData['User']['name']; ?></a> on <?php echo date(Configure::read('Site.front_date_format'), strtotime($noteData['Note']['created'])) ?> | 
                        <a href="#"><?php echo $this->Common->get_category_by_id($noteData['Note']['category_id']); ?></a> - <a href="#"><?php echo $this->Common->get_category_by_id($noteData['Note']['sub_category_id']); ?></a>
                    </div>
                </div>

                <div class="box-content">
                    <div class="share-box pull-right">
                        <?php
                        $SHORT_URL = $ShareProductUrl = $this->Html->url(array('controller' => 'notes', 'action' => 'view', $noteData['Note']['id']), true);
                        $ShareImagePath = Router::url('/', true) . "img/no_user.png";
                        //$ShareImagePath = $this->Html->image('user.png');
                        $shareTitle = strip_tags($noteData['Note']['title']);
                        $shareSummary = substr(strip_tags($noteData['Note']['description']), 0, 150) . "...";

                        //prd($ShareImagePath);
                        $fbDescriptionwant = $shareSummary; //@$cmsDataProDetail[0]['Cmspage']['description'].' '.$shareSummary;
                        $twDescriptionwant = ""; //@$cmsDataProDetail[2]['Cmspage']['description'];
                        $pinDescriptionwant = $shareTitle; //@$cmsDataProDetail[1]['Cmspage']['description'].' '.$shareTitle;
                        ?>
                        <?php echo $this->General->fbShareButtonLink("ui_images/images/facebookcopy.jpg", $ShareProductUrl, $ShareImagePath, $shareTitle, $fbDescriptionwant); ?> 
                        <?php echo $this->General->twitterShareButtonLink("ui_images/images/twitter-copy.jpg", $SHORT_URL, $twDescriptionwant); ?> 
                        <?php echo $this->General->pinterestShareButtonLink("ui_images/images/pinterest-copy.jpg", $ShareProductUrl, $ShareImagePath, $pinDescriptionwant, $shareSummary); ?> 
                    </div>
                    <?php echo $noteData['Note']['description']; ?>
                </div>

            </div>
            <?php
        }
        ?>
    </div>

    <div class="col-lg-3 side-bar-section">
        <?php
        /*         * if (!empty($LoggedinUser)) {
          ?>
          <div class="box">
          <div class="box-content">
          <ul class="side-links">
          <li><a href="<?php echo $this->Html->url(array('controller' => 'notes', 'action' => 'home')); ?>">My Notes</a></li>
          <li><a href="<?php echo $this->Html->url(array('controller' => 'notes', 'action' => 'add')); ?>">Submit a Note</a></li>
          <li><a href="<?php echo $this->Html->url(array('controller' => 'notes', 'action' => 'favorite')); ?>">My Favorite Notes</a></li>
          </ul>
          </div>
          </div>
          <?php
          }

          <div class="box">
          <div class="box-widget-title">
          <h4><?php echo $this->Common->get_category_by_id($noteData['Note']['category_id']); ?>'s Categories</h4>
          </div>
          <div class="box-content">
          <ul class="side-links">
          <?php
          if (!empty($cateList)) {
          foreach ($cateList as $cate) {
          ?>
          <li><?php echo $cate; ?></li>
          <?php
          }
          }
          ?>
          </ul>
          </div>
          </div>
         */
        ?>
    </div>
</div>



<script>
    $(function () {
        var note_id = '<?php echo $noteData['Note']['id']; ?>';
        makeCountNote(note_id);
    });


    /*
     MAKE Count use for hit calculation on particular grid
     to create sort by popularity feature.
     Dharmendra Bagrecha
     * @param {int} post id
     * @returns {json} success or error message
     *  */
    function makeCountNote(id) {
        $.ajax({
            url: '<?php echo $this->Html->url(array("controller" => "notes", "action" => "hitview")) ?>',
            type: 'POST',
            data: {id: id},
            success: function (data) {
                try {
                    //console.log(data);
                    var pd = $.parseJSON(data);
                    if (pd.status == 0) {
                        //alert(pd.msg);
                    }
                } catch (e) {
                    window.console && console.log(e);
                }
            },
            error: function (xhr) {
                console.log(xhr);
                //ajaxErrorCallback(xhr);
            }
        });
    }
</script>