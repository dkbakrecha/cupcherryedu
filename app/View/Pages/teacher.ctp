<div class="row">
    <div class="col-lg-8">
        <div class="home-text">
            <h3><?php echo $content['CmsPage']['title']; ?></h3> 
            <div class="content-text">
                <?php echo $content['CmsPage']['content']; ?>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <?php echo $this->element('sidebar/newposts'); ?>
    </div>
</div>
