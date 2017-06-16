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
        /*        float: left;
                margin: 5px 25px 40px;
                padding: 0 0 3px;
                width:100%;*/
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
        min-height: 70px;
        color: #575757;
        font-family: "Droid Serif";
        font-size: 16px;
        line-height: 22px;
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


    .testinomail-icon{
        color: #f5f7fa;
        float: left;
        font-size: 80px;
        margin-right: 15px;    
    }

</style>

<div class="home-text">
    <h3>A few Happy <span>cupcherry Users</span></h3> 

    <section class="testimonial_wrapper">

        <?php
        //pr($testionialsList);
        foreach ($testionialsList as $testimonial) {
            ?>
            <div class="col-xs-12 col-sm-6">
                <div class="testimonials">
                    <div class="testim">
                        <p><i class="fa fa-quote-left testinomail-icon"> </i> <?php echo $testimonial['Testimonial']['testimonial_text']; ?></p>
                        <div class="arrow_box"></div>
                    </div>
                    <div class="client">
                        <?php echo $this->Html->image('no_user.png', array('alt' => 'St.Mary\'s High School')); ?>
                        <p>
                            <span class="name"><?php echo $testimonial['User']['first_name'] . " " . $testimonial['User']['last_name']; ?></span>
                            <a class="inst"><?php echo $testimonial['User']['profession']; ?></a>
                        </p>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </section>
</div>