<div class="row">
    <div class="col-lg-8">
        <?php
        //pr($testInfo);
        if (!empty($testInfo)) {
            foreach ($testInfo as $test) {
                ?>
                <div class="col-lg-4">
                    <div class="panel panel-body">
                        <a href="<?php echo $this->Html->url(array('controller' => 'tests', 'action' => 'view', $test['TestType']['unique_id'])); ?>">
                            <?php echo $test['TestType']['name']; ?>
                        </a>
                    </div>
                </div>
                <?php
            }
        }

        /*
          ?>
          <div class="row">
          <div class="col-lg-6">
          <?php echo $this->Paginator->counter(); ?>
          </div>
          <div class="col-lg-6">
          <div class=" pull-right">
          <?php
          echo $this->Paginator->numbers(array(
          'before' => '<ul class="pagination">',
          'separator' => '',
          'currentTag' => 'a',
          'currentClass' => 'active',
          'tag' => 'li',
          'after' => '</ul>'
          ));
          ?>
          </div>
          </div>
          </div>
         * 
         */
        ?>
    </div>
    <div class="col-lg-4">
        <!--<div class="fb-page" data-href="https://www.facebook.com/cupcherry" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/cupcherry"><a href="https://www.facebook.com/cupcherry">Cupcherry</a></blockquote></div></div>-->
    </div>
</div>