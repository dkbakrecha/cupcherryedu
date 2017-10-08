<div class="row note_list">

    <div class="col-lg-8">
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

                        echo $this->Html->image('user.png');
                        ?>
                    </div>
                    <div class="note-short">
                        <h2><a href="<?php echo $this->Html->url(array('controller' => 'notes', 'action' => 'view', $note['Note']['id'])); ?>"><?php echo $note['Note']['title']; ?></a></h2>
                        <?php echo substr(strip_tags($note['Note']['description']), 0, 150); ?>
                    </div>
                    <div class="note-rigntinfo">
        <!--                        <span><i class="fa fa-comments-o"></i> Comments</span>
                        <span><i class="fa fa-eye"></i> View</span>-->
                    </div>
                    <div class="meta-info">
                        <?php //pr($note);       ?>
                        <a href="#">By <?php echo $note['User']['name']; ?></a> on <?php echo date(Configure::read('Site.front_date_format'), strtotime($note['Note']['created'])) ?> | 
                        <a href="#"><?php echo $this->Common->get_category_by_id($note['Note']['category_id']); ?></a> - <a href="#"><?php echo $this->Common->get_category_by_id($note['Note']['sub_category_id']); ?></a>
                    </div>
                </div>


                <?php
            }
        }
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


    </div>

    <div class="col-lg-4 side-bar-section">
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