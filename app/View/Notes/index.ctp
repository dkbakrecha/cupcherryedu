<div class="row note_list" style="width: 100%;">
    <div class="col-lg-9">
        <div  id="pinBoot">
            <?php
            if (!empty($notesData)) {
                foreach ($notesData as $note) {
                    ?>
                    <div class="list-box">
                        <div class="user-info">
                            <?php
                            if (!empty($note['User']['image'])) {
                                
                            } else {
                                
                            }

                            echo $this->Html->image('no_user.png');
                            ?>

                        </div>
                        <div class="note-short">
                            <h2><a href="<?php echo $this->Html->url(array('controller' => 'notes', 'action' => 'view', $note['Note']['id'])); ?>"><?php echo $note['Note']['title']; ?></a></h2>
                            <?php echo substr(strip_tags($note['Note']['description']), 0, 150); ?>
                        </div>
                        <?php /* <div class="note-rigntinfo">

                          <span><i class="fa fa-comments-o"></i> Comments</span>
                          <span><i class="fa fa-eye"></i> View</span>

                          </div> */ ?>
                        <div class="meta-info">
                            <?php //pr($note);       ?>
                            <div class="contendlastimagdiv">
                                <?php
                                $SHORT_URL = $ShareProductUrl = $this->Html->url(array('controller' => 'notes', 'action' => 'view', $note['Note']['id']), true);
                                $ShareImagePath = Router::url('/', true) . "img/no_user.png";
                                //$ShareImagePath = $this->Html->image('user.png');
                                $shareTitle = strip_tags($note['Note']['title']);
                                $shareSummary = substr(strip_tags($note['Note']['description']), 0, 150);

                                //prd($ShareImagePath);
                                $fbDescriptionwant = $shareSummary; //@$cmsDataProDetail[0]['Cmspage']['description'].' '.$shareSummary;
                                $twDescriptionwant = ""; //@$cmsDataProDetail[2]['Cmspage']['description'];
                                $pinDescriptionwant = $shareTitle; //@$cmsDataProDetail[1]['Cmspage']['description'].' '.$shareTitle;
                                ?>
                                <div class="contendlastsocialimage"> <?php echo $this->General->fbShareButtonLink("ui_images/images/facebookcopy.jpg", $ShareProductUrl, $ShareImagePath, $shareTitle, $fbDescriptionwant); ?> </div>
                                <div class="contendlastsocialimage"> <?php echo $this->General->twitterShareButtonLink("ui_images/images/twitter-copy.jpg", $SHORT_URL, $twDescriptionwant); ?> </div>
                                <div class="contendlastsocialimage"> <?php echo $this->General->pinterestShareButtonLink("ui_images/images/pinterest-copy.jpg", $ShareProductUrl, $ShareImagePath, $pinDescriptionwant, $shareSummary); ?> </div>

                            </div>
                            <a href="#">By <?php echo $note['User']['name']; ?></a> on <?php echo date(Configure::read('Site.front_date_format'), strtotime($note['Note']['created'])) ?> | 
                            <a href="#"><?php echo $this->Common->get_category_by_id($note['Note']['category_id']); ?></a> - <a href="#"><?php echo $this->Common->get_category_by_id($note['Note']['sub_category_id']); ?></a>
                        </div>
                    </div>


                    <?php
                }
            }
            ?>



        </div>
        <ul class="pagination ">
            <?php
            //This is important which converts
            $this->paginator->options(array(
                'url' => $this->request->query,
                'convertKeys' => array_keys($this->request->query)
            ));

            // echo $this->paginator->first('First');
            echo $this->paginator->prev('&laquo;', array('tag' => 'li', 'escape' => false), '<a href="#">&laquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
            echo $this->paginator->numbers(array(
                //'before' => '<div ><ul class="pagination">',
                'separator' => '',
                'currentClass' => 'active',
                'tag' => 'li',
                //  'after' => '</ul></div>',
                'modulus' => 4, 'currentTag' => 'a'));
            echo $this->paginator->next('&raquo;', array('tag' => 'li', 'escape' => false), '<a href="#">&raquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
            //  echo $this->paginator->last('Last');
            ?>
        </ul>

    </div>


    <div class="col-lg-3 side-bar-section">
        <?php
        if (!empty($LoggedinUser)) {
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
        ?>


        <div class="box">
            <div class="box-widget-title">
                <h4>Main Categories</h4>
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

    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#pinBoot').pinterest_grid({
            no_columns: 2,
            padding_x: 10,
            padding_y: 10,
            margin_bottom: 50,
            single_column_breakpoint: 700
        });
    });

</script>