<style>
	#sortable-1 { 
		list-style-type: none; margin: 0; 
		padding: 0; width: 25%; }
	#sortable-1 li { 
		background: #cedc98;
		border: 1px solid #DDDDDD;
		color: #333333;
		float: left;
		width: 30px;
		margin: 0 3px 3px 3px; padding: 5px; 
		font-size: 14px; }

</style>
<script src = "https://rawgit.com/carlo/jquery-base64/master/jquery.base64.min.js"></script>
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<div class="row">
	<div class="col-lg-8 col-lg-offset-2">
		<?php
		//pr($question); 
		//$sessionUser = $this->Session->read('Auth.User'); 
		//pr($sessionUser);
		/*
		?>

		<?php
		if (!empty($question))
		{
			echo $this->Form->create('Quiz');
			echo $this->Form->hidden('question_id', array('value' => $question['Question']['id']));
			?>

			<h3 class="title"><?php echo $question['Question']['question']; ?></h3>

			<?php
			foreach ($question['Answers'] as $answer)
			{
				//pr($answer);
				$options[$answer['Answers']['id']] = $answer['Answers']['answer'];
			}

			$attributes = array(
				'legend' => false,
				'div' => 'ans_wrap',
				'separator' => '<br/>'
			);
			echo $this->Form->radio('answers', $options, $attributes);
			echo $this->Form->submit("NEXT");
			echo $this->Form->end();
		}*/
		?>
	</div>
	
	<?php 
	$_word = "hello";
	$_codeWord = base64_encode($_word);
	$arr1 = str_split(str_shuffle($_word));
	
	if(!empty($arr1)){
		?><ul id="sortable-1" data-key="<?php echo $_codeWord; ?>"><?php
		foreach($arr1 as $_c){
			?><li id="<?php echo $_c; ?>"><?php echo $_c; ?></li><?php
		}
		?></ul><?php
	}
	?>
	<br>
	<h3><span id = "sortable-9"></span></h3>
	<script>
        $(function () {
			var _codeword = $("#sortable-1").data("key");			
			var _decodedString = $.base64.decode(_codeword);
			//alert(_decodedString);
            $("#sortable-1").sortable({
                update: function (event, ui) {
                    var productOrder = $(this).sortable('toArray');
					_productOrder = productOrder.join("");
					if(_productOrder == _decodedString){
						alert(_productOrder);
					}
                }
            });
        });
	</script>
</div>