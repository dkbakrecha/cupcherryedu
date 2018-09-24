<div class="row note_list cardbox">
    <?php
    if (empty($LoggedinUser)) {
        $_notesclass = "col-lg-4";
    } else {
        $_notesclass = "col-lg-12";
    }
    if (!empty($notesData)) {
        foreach ($notesData as $note) {
            ?>
            <div class="<?php echo $_notesclass; ?>">
                <div class="list-box ">
                    <div class="note-short">
                        <div class="notes-category"><a href="#"><?php echo $this->Common->get_category_by_id($note['Note']['category_id']); ?></a> - <a href="#"><?php echo $this->Common->get_category_by_id($note['Note']['sub_category_id']); ?></a></div>
                        <h2 class="notes-title">
                            <a href="<?php echo $this->Html->url(array('controller' => 'notes', 'action' => 'view', $note['Note']['id'])); ?>">
                                <?php echo $note['Note']['title']; ?>
                            </a>
                        </h2>
                        <div class="notes-shortdesc">
                            <?php echo substr(strip_tags($note['Note']['description']), 0, 160) . "..."; ?>
                        </div>
                        <div class="meta-info" style="display: none;">
                            <a href="#">By <?php echo $note['User']['name']; ?></a> on <?php echo date(Configure::read('Site.front_date_format'), strtotime($note['Note']['created'])) ?> 
                        </div>                    </div>
                    <div class="note-footer">
                        <?php
                        $SHORT_URL = $ShareProductUrl = $this->Html->url(array('controller' => 'notes', 'action' => 'view', $note['Note']['id']), true);
                        $ShareImagePath = Router::url('/', true) . "img/no_user.png";
                        //$ShareImagePath = $this->Html->image('user.png');
                        $shareTitle = strip_tags($note['Note']['title']);
                        $shareSummary = substr(strip_tags($note['Note']['description']), 0, 150) . "...";

                        //prd($ShareImagePath);
                        $fbDescriptionwant = $shareSummary; //@$cmsDataProDetail[0]['Cmspage']['description'].' '.$shareSummary;
                        $twDescriptionwant = ""; //@$cmsDataProDetail[2]['Cmspage']['description'];
                        $pinDescriptionwant = $shareTitle; //@$cmsDataProDetail[1]['Cmspage']['description'].' '.$shareTitle;
                        ?>
                        <span class="notes-action"><i class="fa fa-heart-o"></i></span>
                        <div class="pull-right"> <?php echo $this->General->fbShareButtonLink("ui_images/images/facebookcopy.jpg", $ShareProductUrl, $ShareImagePath, $shareTitle, $fbDescriptionwant); ?> </div>
                        <div class="pull-right"> <?php echo $this->General->twitterShareButtonLink("ui_images/images/twitter-copy.jpg", $SHORT_URL, $twDescriptionwant); ?> </div>
                        <div class="pull-right"> <?php echo $this->General->pinterestShareButtonLink("ui_images/images/pinterest-copy.jpg", $ShareProductUrl, $ShareImagePath, $pinDescriptionwant, $shareSummary); ?> </div>
                    </div>
                </div>
            </div>


            <?php
        }
    }
    ?>
</div>
<?php
if (!empty($LoggedinUser)) {
    ?>

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
    <?php
}
?>