<div class="sidebar">
    <h2>New Study Notes</h2>
    <ul>
        <?php
        $newPosts = $this->Common->get_newnotes();
        foreach ($newPosts as $post) {
            ?>
            <li><a href="<?php echo $this->Html->url(array('controller' => 'notes', 'action' => 'view', $post['Note']['id'])); ?>">
                    <?php
                    echo $post['Note']['title'];
                    ?>
                </a></li>
            <?php
        }
        ?>
    </ul>
</div>