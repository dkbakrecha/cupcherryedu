<?php
$_linkUrl = $this->Html->url(array('controller' => 'exam_notifications', 'action' => 'view', $notification['Post']['id']), TRUE);
?>

<div class="row">
    <div class="col-xs-12 col-sm-8">
        <div class="home-text">
            <h3>
                <?php echo $notification['Post']['title']; ?>
            </h3> 
            <div class="share-article"></div>
            <div class="content-text">
                <div class="bs-callout bs-callout-warning" > 
                    <div class="row">
                        <div class="col-md-3 ">
                            <label>Post Date</label>
                            <div class="clr-orange"><?php
                                $_meta = array();
                                if (!empty($notification['PostMeta'])) {
                                    foreach ($notification['PostMeta'] as $metaValue) {
                                        $_meta[$metaValue['meta_key']] = $metaValue['meta_value'];
                                    }
                                }
                                // prd($_meta);
                                if ($_meta['post_date'] != "0000-00-00") {
                                    echo $_meta['post_date'];
                                } else {
                                    echo "Not mation yet";
                                }
                                ?></div>
                        </div>

                        <div class="col-md-3 ">
                            <label>Last Apply Date</label>
                            <div class="clr-orange"><?php
                                if ($_meta['lastapply_date'] != "0000-00-00") {
                                    echo $_meta['lastapply_date'];
                                } else {
                                    echo "Not mation yet";
                                }
                                ?></div>
                        </div>
                        <div class="col-md-3">
                            <label>Exam Date </label>
                            <div class="clr-orange"><?php
                                if (!empty($_meta['exam_date']) && $_meta['exam_date'] != "0000-00-00") {
                                    echo $_meta;
                                } else {
                                    echo "Not mation yet";
                                }
                                ?></div>
                        </div>
                    </div>
                </div>
                <p> <?php echo $notification['Post']['content']; ?></p>

                <div class="row">
                    <div class="col-sm-4">
<?php
if (!empty($notification['Post']['source'])) {
    ?>
                            <a class="btn btn-primary btn-lg" target="_BLANK" href="<?php echo $notification['Post']['source']; ?>">Notification Here</a>    
                            <?php
                        }
                        ?>
                    </div>
                    <div class="col-sm-4">
                        <?php
                        if (!empty($notification['Post']['syllabus_url'])) {
                            ?>
                            <a class="btn btn-primary btn-lg" target="_BLANK" href="<?php echo $notification['Post']['syllabus_url']; ?>">Syllabus Here</a>    
                            <?php
                        }
                        ?>
                    </div>
                    <div class="col-sm-4">
                        <?php
                        if (!empty($notification['Post']['official_url'])) {
                            ?>
                            <a class="btn btn-primary btn-lg" target="_BLANK" href="<?php echo $notification['Post']['official_url']; ?>">Official Link</a>    
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-4">
<?php echo $this->element('ask_question'); ?>
    </div>
</div>


<script>
    $(document).ready(function () {
        $(".share-article").sharepage({
            networks: ["facebook", "twitter", "googleplus", "linkedin"],
            url: "<?php echo $_linkUrl; ?>",
            title: "SharePage example title",
            source: "SharePage example page",
            width: 650,
            height: 600,
            design: "buttons"
        });
    });
</script>