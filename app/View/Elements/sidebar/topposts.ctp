<div class="sidebar">
    <h2>Top Blogs</h2>
    <ul>
        <?php
        $newPosts = $this->Common->get_topposts();
        foreach ($newPosts as $post) {
            ?>
            <li><a href="<?php echo $this->Html->url(array('controller' => 'posts', 'action' => 'view', $post['Post']['title_slug'])); ?>">
                    <?php
                    echo $post['Post']['title'];
                    ?>
                </a></li>
            <?php
        }
        ?>
    </ul>
</div>