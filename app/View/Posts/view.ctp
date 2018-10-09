<!--<meta property="og:url"                content="http://www.nytimes.com/2015/02/19/arts/international/when-great-minds-dont-think-alike.html" />-->
<meta property="og:type"               content="article" />
<meta property="og:title"              content="CUPCHERRY : <?php echo $postDetail['Post']['title']; ?>" />
<!--<meta property="og:description"        content="How much does culture influence creative thinking?" />-->
<!--<meta property="og:image"              content="http://static01.nyt.com/images/2015/02/19/arts/international/19iht-btnumbers19A/19iht-btnumbers19A-facebookJumbo-v2.jpg" />-->

<div class="row">
    <?php
    if (empty($LoggedinUser)) {
        $_notesclass = "col-lg-8";
    } else {
        $_notesclass = "col-lg-12";
    }
    ?>
    <div class="<?php echo $_notesclass; ?>">
        <?php
        if (!empty($postDetail)) {
            $_linkUrl = $this->Html->url(array('controller' => 'posts', 'action' => 'view', $postDetail['Post']['title_slug']), TRUE);
            ?>
            <div class="box notes-view"> 
                <div class='box-header'>
                    <h1 class="title"><?php echo $postDetail['Post']['title']; ?></h1>

                    <?php if (!empty($postDetail['Post']['cover_image'])) {
                        ?>
                        <div class="cover-image">
                            <?php echo $this->Html->image('/files/images/' . $postDetail['Post']['cover_image'], array('class' => 'img-responsive')); ?>
                        </div>                    
                    <?php } ?>
                    <div class="meta-info">
                        <a href="#">By <?php echo $postDetail['User']['name']; ?></a> on <?php echo date(Configure::read('Site.front_date_format'), strtotime($postDetail['Post']['created'])) ?> | 
                        <a href="#"><?php echo $this->Common->get_category_by_id($postDetail['Post']['category_id']); ?></a> - <a href="#"><?php echo $this->Common->get_category_by_id($postDetail['Post']['sub_category_id']); ?></a>
                    </div>
                </div>

                <div class="post-content">
                    <?php
                    if ($postDetail['Post']['post_type'] == 3) {
                        $_meta = array();
                        if (!empty($postDetail['PostMeta'])) {
                            foreach ($postDetail['PostMeta'] as $metaValue) {
                                $_meta[$metaValue['meta_key']] = $metaValue['meta_value'];
                            }
                        }
                        ?>
                        <table class="table">    
                            <?php
                            foreach ($_meta as $key => $value) {
                                //pr($value);
                                ?>
                                <tr>
                                    <td><?php echo ucfirst(str_replace("_", " ", $key)); ?></td>
                                    <td>
                                        <?php
                                        if (filter_var($value, FILTER_VALIDATE_URL) == true && $key == "official_url") {
                                            echo "<a href=" . $value . " target='_BLANK'>Click Here For Official Info</a>";
                                        } elseif(!empty(strtotime($value))) {
                                            echo date('(l) d F, Y',strtotime($value));
                                        }else{
                                            echo $value;
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                        <?php
                    }
                    echo $postDetail['Post']['content'];
                    ?>
                </div>
                <div class="share-article"></div>


                <section class="author-box">
                    <?php echo $this->Html->image('user.png', array('class' => 'avatar photo', 'height' => '70', 'width' => '70')); ?>

                    <h4 class="author-box-title">
                        <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'profile', $postDetail['User']['name'])); ?>" class="aboutauthor" rel="author">
                            About <?php echo $postDetail['User']['name']; ?>
                        </a>
                    </h4>

                    <div class="author-box-content" itemprop="description">
                        <p>Software Engineer, Blogger, Roamer, Foodie</p>
                    </div>
                </section>
            </div>

            <?php
            echo $this->element('comment_form');
        }
        ?> 
    </div>

    <?php
    if (empty($LoggedinUser)) {
        ?>
        <div class="col-lg-4">
            <?php echo $this->element('sidebar/topposts'); ?>
            <?php //echo $this->element('sidebar/newnotes');  ?>
        </div>
        <?php
    }
    ?>

</div>

<script>
    $(function () {
        var blog_id = '<?php echo $postDetail['Post']['id']; ?>';
        makeCount(blog_id);
    });

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

    /*
     MAKE Count use for hit calculation on particular grid
     to create sort by popularity feature.
     Dharmendra Bagrecha
     * @param {int} post id
     * @returns {json} success or error message
     *  */
    function makeCount(id) {
        $.ajax({
            url: '<?php echo $this->Html->url(array("controller" => "posts", "action" => "hitview")) ?>',
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