<div class="box">
    <div class="box-header">
        <div class="box-title">
            <h3>Learning Offers</h3> 
            <h4>Wanna earning with learning ;)</h4>
            <i class="fa fa-gift pull-right cms-header-icon"></i>
        </div>
    </div>

    <div class="box-content">
        <div class="row">
            <div class="box-body">
                <div class="col-lg-10 col-lg-offset-1" style="padding-top: 20px;">
                    <?php
                    foreach ($content as $offer) {
                        ?>
                        <div class="col-lg-9">
                            <h2><?php echo $offer['CmsPage']['title']; ?></h2>
                            <div><?php echo $offer['CmsPage']['content']; ?></div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>

        </div>
    </div>
</div>
