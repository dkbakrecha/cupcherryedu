<div class="row note_list">
    <div class="col-lg-9">
        <?php
        if (!empty($noteData)) {
            ?>
            <div class="list-box">
                <div class="user-info">
                    <?php
                    if (!empty($noteData['User']['image'])) {
                        
                    } else {
                        
                    }

                    echo $this->Html->image('user.png');
                    ?>
                </div>
                <div class="note-short">
                    <h2><?php echo $noteData['Note']['title']; ?></h2>
                    <?php echo $noteData['Note']['description']; ?>
                </div>
                <div class="note-rigntinfo">
    <!--                        <span><i class="fa fa-comments-o"></i> Comments</span>
                    <span><i class="fa fa-eye"></i> View</span>-->
                </div>
                <div class="meta-info">
                    <?php //pr($note); ?>
                    <a href="#">By <?php echo $noteData['User']['name']; ?></a> on <?php echo date(Configure::read('Site.front_date_format'), strtotime($noteData['Note']['created'])) ?> | 
                    <a href="#"><?php echo $this->Common->get_category_by_id($noteData['Note']['category_id']); ?></a> - <a href="#"><?php echo $this->Common->get_category_by_id($noteData['Note']['sub_category_id']); ?></a>
                </div>
            </div>


            <?php
        }
        ?>
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