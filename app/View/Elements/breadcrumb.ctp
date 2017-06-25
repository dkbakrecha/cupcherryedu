<?php
    //$moduleTitle = "";
?>

<section class="breadcrumb-wrapper">
	<div class="container">
		<h1>
                    <?php
                    if(isset($postDetail) && !empty($postDetail['Post']['title'])){
                        echo $postDetail['Post']['title'];
                    }
                    ?>
                    
                </h1>
            <?php /*
		<div class="breadcrumb">
			<a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'home')); ?>">Home</a>
			<span class="default"> </span>
			<h4><?php echo $this->fetch('title'); ?></h4>
		</div>
             */ ?>
	</div>
</section>