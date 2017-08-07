<style>
    .jumbbleword-wrapper{
        padding: 50px 0;
        text-align: center;
    }

    #sortable-1 { 
        list-style-type: none; margin: 0; 
        padding: 0; 
        display: inline-block;
    }

    #sortable-1 li { 
        background: #355c7d;
        border: 1px solid #EFEFEF;
        border-radius: 4px;
        color: #EFEFEF;
        cursor: pointer;
        float: left;
        width: 30px;
        margin: 4px; 
        line-height: 40px;
        width: 40px;
        height: 40px;
        font-size: 18px; 
    }

    .jumbbleword-wrapper{
        background: rgba(0, 0, 0, 0) url("<?php echo $this->webroot; ?>img/bg-blur.png") repeat scroll 0 0;
        border:2px solid #355c7d ;
        margin-top: 40px;
        border-radius: 4px;
    }   

    .word-time-wrapper{
        position: relative;
    }

    .word-time-wrapper .word-time {
        background: #fff none repeat scroll 0 0;
        border: 2px solid;
        border-radius: 4px;
        font-size: 30px;
        left: 30px;
        line-height: 30px;
        padding: 5px;
        position: absolute;
        top: -75px;
        width: 150px;
    }

    .wordresult-box {
        padding: 40px 100px 0;
    }
</style>

<script src = "https://rawgit.com/carlo/jquery-base64/master/jquery.base64.min.js"></script>
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<?php echo $this->Html->script(array('jquery.ui.touch-punch.min')); ?>

<div class="home-text">
    <h3>Word <span>Jumble</span></h3> 

    <div class="content-text">
        <div class="row">	
            <div class="col-lg-12">
                <div class="alert alert-info top-message">
                    <?php echo $wordContent['CmsPage']['content']; ?>
                </div>
                <div class="jumbbleword-wrapper">
                    <div class="word-time-wrapper">
                        <div class="word-time">
                            <label id="minutes">00</label>:<label id="seconds">00</label>
                        </div>
                    </div>
                    <?php
                    if (!empty($codeArry)) {
                        ?><ul id="sortable-1" data-key="<?php echo $codeWord; ?>"><?php
                    foreach ($codeArry as $_c) {
                            ?><li id="<?php echo $_c; ?>"><?php echo $_c; ?></li><?php
                    }
                        ?></ul><?php
                    }
                    ?>
                    <div class="hind-box">
                        <?php echo $codeRow['Word']['description']; ?>
                    </div>

                    <div class="wordresult-box">
                        <?php echo $wordContentBottom['CmsPage']['content']; ?>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>



<script>    
    var minutesLabel = document.getElementById("minutes");
    var secondsLabel = document.getElementById("seconds");
    var totalSeconds = 0;
    var wordTimer = setInterval(setTime, 1000);

    $(function () {
        var _codeword = $("#sortable-1").data("key");			
        var _decodedString = $.base64.decode(_codeword);
        //alert(_decodedString);
        $("#sortable-1").sortable({
            update: function (event, ui) {
                var productOrder = $(this).sortable('toArray');
                _productOrder = productOrder.join("");
                if(_productOrder == _decodedString){
                    $(".wordresult-box").show();
                    clearInterval(wordTimer);
                }
            }
        });
    });

    function setTime()
    {
        ++totalSeconds;
        secondsLabel.innerHTML = pad(totalSeconds%60);
        minutesLabel.innerHTML = pad(parseInt(totalSeconds/60));
    }

    function pad(val)
    {
        var valString = val + "";
        if(valString.length < 2)
        {
            return "0" + valString;
        }
        else
        {
            return valString;
        }
    }
</script>