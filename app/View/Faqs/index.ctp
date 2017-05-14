<style>
	.faq_wrapper .panel-default{
		margin-bottom: 15px;
		border: 0px;
	}
	
	.faq_wrapper .panel-default > .panel-heading{
		background: transparent;
		border: 0px;
	}
	
	.faq_wrapper .panel-title{
		color: #333;
		font-size: 16px;
		line-height: 22px;
		text-transform: uppercase;
	}
	
	.faq_wrapper .panel-group .panel-heading + .panel-collapse > .panel-body, 
	.faq_wrapper .panel-group .panel-heading + .panel-collapse > .list-group{
		border: 0px;
		color: #555555;
	}
	
</style>

<section class="faq_wrapper">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-8 panel-group clearfix">
				<?php
				foreach ($faqList as $faq)
				{
					?>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								Q. <?php echo $faq['Faq']['question']; ?>	
							</h4>
						</div>
						<div class="panel-collapse">
							<div class="panel-body">
								<?php echo $faq['Faq']['answer']; ?>
							</div>
						</div>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>

</section>