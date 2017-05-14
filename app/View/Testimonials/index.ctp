<style>
    input[type="password"], input[type="text"], input[type="search"], input[type="url"], input[type="email"], input[type="number"], input[type="date"], select {
        border: 1px solid #ccc;
        font-size: 14px;
        height: 27px;
        line-height: 27px;
        max-width: 100%;
        padding: 3px 6px;
    }

    .testinomail-head {
        padding-left: 30px;
        margin-bottom: 24px;
    }

    .testinomail-head strong {
        color: #1c1c1c;
        display: block;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 1px;
        margin-bottom: 14px;
        text-transform: uppercase;
    }

    .testimonial-info i.fa-quote-left, .testimonial-info i.fa-quote-right {
        color: #1c1c1c;
        font-size: 18px;
        left: 0;
        position: absolute;
        top: -8px;
    }

    .testimonial-info i.fa-quote-right {
        bottom: -8px;
        left: auto;
        right: 20px;
        top: auto;
        transform: rotateX(-165deg);
    }

    .testimonial-comment, .testimonial_wrapper{
        padding: 40px 0 0;
    }

    .testimonial-comment .heading-wrap {
        margin-bottom: 40px;
    }

    .heading-wrap h2 {
        font-weight: 900;
        margin-bottom: 0;
        color: #1c1c1c;
        text-transform: uppercase;
    }

    .heading-wrap span {
        color: #1c1c1c;
        display: block;
        font-size: 16px;
        font-style: italic;
        padding-top: 10px;
    }

    .testimonial-comment .form-control {
        border-radius: 0;
        box-shadow: none;
        font-size: 13px;
        height: 44px;
        margin-bottom: 20px;
        padding-left: 27px;
    }

    .testimonial-comment textarea.form-control {
        height: 172px;
        padding-top: 12px;
    }

    .testimonial-comment input[type="submit"] {
        background-color: transparent;
        border: 2px solid #ffaf36;
        color: #ffaf36;
        border-radius: 0;
    }

    .triangle-img svg {
        bottom: 0;
        height: 80px;
        right: 80px;
        position: absolute;
    }

    .triangle-img {
        margin-bottom: -30px;
    }

    .testimonials {
        float: left;
        margin: 5px 25px 40px;
        padding: 0 0 3px;
        width:100%;
    }

    .testim {
        background: #fff none repeat scroll 0 0;
        border-radius: 5px;
        border-top: 1px solid #eaeaea;
        box-shadow: 1px 2px 2px 1px rgba(0, 0, 0, 0.1);
        font-size: 14px;
        margin-bottom: 35px;
        padding: 16px;
    }

    .testim p {
        color: #666;
        line-height: 1.5em;
        font-size: 16px;
    }

    .arrow_box {
        background: rgba(0, 0, 0, 0) url("<?php echo $this->webroot; ?>img/testimonial-down-arrow.gif") no-repeat scroll 0 0;
        bottom: -48px;
        height: 32px;
        left: 30px;
        margin-top: -32px;
        position: relative;
        width: 50px;
    }

    .client {
        float: left;
    }   

    .client img {
        border: 1px solid #eaeaea;
        border-radius: 50%;
        float: left;
        max-width: 80px;
        width: 82px;
        height: 82px;
    }

    .client p {
        color: #666;
        float: left;
        line-height: 1em;
        padding-left: 10px;
        width: 250px;
    }   

    .client .name {
        display: block;
        font-size: 15px;
        padding: 10px 0 4px;
    }

    .client .inst {
        display: block;
        font-size: 11px;
        text-transform: uppercase;
        color: #e84c3d;
    }


</style>

<section class="testimonial_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-offset-1 col-lg-10">
                <?php
                //pr($testionialsList);
                foreach ($testionialsList as $testimonial) {
                    ?>
                    <div class="col-xs-12 col-sm-6 clearfix">
                        <div class="testimonials">
                            <div class="testim">
                                <p><i class="fa fa-quote-left"> </i> <?php echo $testimonial['Testimonial']['testimonial_text']; ?></p>
                                <div class="arrow_box"></div>
                            </div>
                            <div class="client">
                                <?php echo $this->Html->image('no_user.png', array('alt' => 'St.Mary\'s High School')); ?>
                                <p>
                                    <span class="name"><?php echo $testimonial['Testimonial']['name']; ?></span>
                                    <a target="_blank" href="http://www.vidyasoudha.com/" class="inst">Vidya Soudha Public School, Bangalore</a>
                                </p>
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
<?php /*
  <section class="testimonial-comment">

  <div class="container">
  <div class="row">
  <?php echo $this->Form->create('Testimonial', array('class' => 'wpcf7-form')); ?>

  <div class="col-xs-12 col-lg-offset-1 col-sm-8">
  <div class="heading-wrap">
  <h2>Post testimonial</h2>
  <span>Post Your testimonial now</span>
  </div>
  <span class="wpcf7-form-control-wrap your-name">
  <?php
  echo $this->Form->input('name', array(
  'placeholder' => 'Name*',
  'class' => 'form-control',
  'size' => 40,
  'label' => false,
  'div' => false
  ));
  ?>
  <!--<input class="form-control" size="40" value="" name="your-name">-->
  </span>
  <span class="wpcf7-form-control-wrap your-email">
  <?php
  echo $this->Form->input('email', array(
  'placeholder' => 'Email*',
  'class' => 'form-control',
  'size' => 40,
  'label' => false,
  'div' => false
  ));
  ?>
  <!--<input type="email" placeholder="Email*" aria-invalid="false" aria-required="true" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email form-control" size="40" value="" name="your-email">-->
  </span>
  <span class="wpcf7-form-control-wrap your-message">
  <?php
  echo $this->Form->input('testimonial_text', array(
  'placeholder' => 'Comment*',
  'class' => 'form-control',
  'size' => 40,
  'label' => false,
  'div' => false,
  'type' => 'textarea'
  ));
  ?>
  <!--<textarea placeholder="comment" aria-invalid="false" class="wpcf7-form-control wpcf7-textarea form-control" rows="10" cols="40" name="your-message"></textarea>-->
  </span>
  <?php
  echo $this->Form->submit('submit now', array(
  'class' => 'btn btn-default btn-submit',
  ));
  ?>
  <!--<input type="submit" class="wpcf7-form-control wpcf7-submit " >-->
  </div>

  <?php echo $this->Form->end(); ?>
  </div>

  <div class="row">
  <div class="col-xs-12 triangle-img" style="text-align: right;">
  <svg version="1.1" baseProfile="tiny" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 135 71" xml:space="preserve" class="triangle-svg pos-r svg replaced-svg">
  <polygon class="triangle-fill" fill="#F4AD23" points="0.2,71.2 66.8,2.2 133.5,71.2 "/>
  </svg>
  <img src="http://theemon.com/b/businessplus-wp/LivePreview/wp-content/uploads/2015/11/sky-blue-triangle.png" alt="sky-triangel" class="blue-triangle">
  </div>
  </div>

  </div>

  </section>

  <script type="text/javascript">
  $(document).ready(function () {
  $('#TestimonialIndexForm .btn-submit').click(function (e) {
  var _form = $('#TestimonialIndexForm');
  var _formData = _form.serialize();
  e.preventDefault();
  e.stopPropagation();

  $.ajax({
  url: '<?php echo $this->Html->url(array("controller" => "testimonials", "action" => "create")) ?>',
  type: 'POST',
  data: _formData,
  success: function (data) {
  //alert(data)
  try {
  var pd = $.parseJSON(data);
  if (pd.status == 0) {
  alert(pd.msg);
  window.location = 'https://web.facebook.com/cupcherry/';
  } else {
  alert(pd.msg);
  //window.location = '<?php //echo $this->Html->url(array("controller" => "users", "action" => "index"));              ?>';
  //window.location.reload();
  }
  } catch (e) {
  window.console && console.log(e);
  }
  }
  });
  });
  });
  </script>
 * 
 */ ?>