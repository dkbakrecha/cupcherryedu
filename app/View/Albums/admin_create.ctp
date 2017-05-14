<?php
echo $this->Html->css('/js/cropper/cropper');
echo $this->Html->script('cropper/cropper');
?>        

<div class="warper container-fluid">
	<div class="panel panel-default">
		<div class="panel-heading">
			Add Album
			<a class='btn btn-purple btn-xs pull-right' href='<?php
			echo $this->Html->url(array('controller' => 'albums', 'action' => 'index',
				'admin' => true));
			?>'>Back</a>
		</div>
		<div class="panel-body">

			<?php echo $this->Form->create('Album', array('class' => 'form-horizontal')); ?>    
			<div class="form-group">
				<label class="col-sm-2 control-label">Title</label>
				<div class="col-sm-7">
					<?php
					echo $this->Form->input('title', array(
						'class' => 'form-control',
						'placeholder' => 'Description',
						'label' => false,
						'placeholder' => 'Category Title'
					));
					?>
				</div>
			</div>
			<hr class="dotted">


			<div class="form-group">
				<label class="col-sm-2 control-label">Images</label>
				<div class="col-sm-7">
					<div class="image_container">
						<div class="row">
							<div class="col-sm-6">
								<?php echo $this->Html->image('test.jpg', array('class' => 'img-responsive', 'id' => 'image1')); ?>
							</div>
							<div class="col-sm-6">
								<?php echo $this->Html->image('test.jpg', array('class' => 'img-responsive', 'id' => 'image2')); ?>
							</div>
							<div class="col-sm-6">
								<?php echo $this->Html->image('test.jpg', array('class' => 'img-responsive', 'id' => 'image3')); ?>
							</div>
							<div class="col-sm-6">
								<div class="thumbnail">
									<?php echo $this->Html->image('test.jpg', array('class' => 'img-responsive', 'id' => 'image4')); ?>

									<label title="Upload image file" for="inputImage" class="btn btn-upload">
										<input type="file" accept="image/*" name="file" id="inputImage" class="sr-only">
										<span title="" data-toggle="tooltip" class="docs-tooltip" data-original-title="Import image with Blob URLs">
											<span class="fa fa-upload"></span>
										</span>
									</label>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<hr class="dotted">


			<button type="submit" class="btn btn-purple col-lg-offset-2">Submit</button>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>

</div>
<!-- Warper Ends Here (working area) -->    


<div class="modal fade" id="cropper-modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<div id="cropper-example-2" class="img-container" width="100%" height="300px">
					<img src="" alt="Picture" id="cropImage">
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
    $('#image1').cropper({
        built: function () {
            $(this).cropper('rotate', 90);
        }
    });

    $('#image2').cropper({
        built: function () {
            $(this).cropper('zoom', 0.1);
        }
    });

    $('#image3').cropper({
        built: function () {
            $(this).cropper('move', 0, 1);
        }
    });
	
	$('#cropImage').cropper();

    /*
     $('#image4').cropper({
     
     });
     */
	$(document).ready(function(){
		//Image For crop
		var $image = $('.img-container > img');

		
		// Import image
        var $inputImage = $('#inputImage');
        var URL = window.URL || window.webkitURL;
        var blobURL;

        if (URL) {
            $inputImage.change(function () {
				console.log("Inside image chanege");
                var files = this.files;
                var file;

                if (!$image.data('cropper')) {
                    return;
                }

                if (files && files.length) {
                    file = files[0];

                    if (/^image\/\w+$/.test(file.type)) {
                        blobURL = URL.createObjectURL(file);
						console.log(blobURL);
						$('#cropper-modal').modal('show');
						
						
                        $image.one('built.cropper', function () {
                            URL.revokeObjectURL(blobURL); // Revoke when load complete
                        }).cropper('reset').cropper('replace', blobURL);
						
                        $inputImage.val('');
                    } else {
                        $body.tooltip('Please choose an image file.', 'warning');
                    }
                }
            });
        } else {
            $inputImage.prop('disabled', true).parent().addClass('disabled');
        }
	});
</script>