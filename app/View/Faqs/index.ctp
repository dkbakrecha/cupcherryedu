<?php
echo $this->Html->css(array(
    'smk-accordion'
));

echo $this->Html->script(array(
    'smk-accordion'
));
?>


<div class="aboutusmain faq-mainpannal-outer">
    
    <div class="faqbuttom faq-headpannal-contantpannal">
        <div class="container">
            <div class="faqbuttom_left premimum_pad faq-leftpannalouter" >
<?php
foreach ($FaqList as $k => $v) {
    ?>
                    <div class="accordion_example1 " style="display:none"   id="faqCData_<?php echo $v["FaqTopic"]["id"]; ?>">
                    <?php
                    foreach ($v["Faq"] as $ks => $vs) {
                        ?>
                            <!-- Section 1 -->
                            <div class="accordion_in" id="<?php echo $vs["id"]; ?>">
                                <div class="acc_head">
                                    <div class="accordion_intext">
        <?php echo $vs["question"]; ?>
                                    </div>
                                </div>
                                <div class="acc_content"> 
                                    <div class="faqtabtextdiv bordernone"><?php echo $vs["answer"]; ?></div>
                                </div>
                            </div>
        <?php
    }
    ?>
                    </div>    
                        <?php
                    }
                    ?>
            </div>

            <div class="faqbuttom_right premimum_pad2 faq-rightpannalouter ">
                <div class="faqbuttom_righttitle"><?php echo __("Topic"); ?></div>

                <div class="faqbuttom_rightmenu">
                    <ul id="faqCatDiv">
<?php
foreach ($FaqList as $k => $v) {
    ?>
                            <li style="cursor:pointer" id="faqCat_<?php echo $v["FaqTopic"]["id"]; ?>" rel="<?php echo $v["FaqTopic"]["id"]; ?>" >
                            <?php echo $v["FaqTopic"]["name"]; ?> 
                                <span class="faqbuttom_rightfirst_nu faqright-curcle"><?php echo count($v["Faq"]); ?></span>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>





<script type="text/javascript">
    $(document).ready(function () {
        $("#faqCatDiv li").click(function () {
            var id = $(this).attr("rel");
            $("#faqCatDiv li").removeClass("active");
            $(this).addClass("active");
            $(".accordion_example1").hide();
            $("#faqCData_" + id).show();
        });


        $("#faqCatDiv li:first").trigger("click");


        $(".accordion_example1").smk_Accordion({
            closeAble: true, //boolean
        });

    });
		
</script>