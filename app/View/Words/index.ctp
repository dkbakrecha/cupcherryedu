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
        font-size: 18px; }

</style>
<script src = "https://rawgit.com/carlo/jquery-base64/master/jquery.base64.min.js"></script>
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>


<?php echo $this->Html->script(array('jquery.ui.touch-punch.min')); ?>

<div class="row">	
    <div class="col-lg-8">	
        <div class="jumbbleword-wrapper">
            <?php
            if (!empty($codeArry)) {
                ?><ul id="sortable-1" data-key="<?php echo $codeWord; ?>"><?php
            foreach ($codeArry as $_c) {
                    ?><li id="<?php echo $_c; ?>"><?php echo $_c; ?></li><?php
            }
                ?></ul><?php
            }
            ?>

            <label id="minutes">00</label>:<label id="seconds">00</label>
        </div>
        <div>
            <?php echo $codeRow['Word']['description']; ?>
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
                    alert(_productOrder);
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