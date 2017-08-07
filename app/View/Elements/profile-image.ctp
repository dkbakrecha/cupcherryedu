<script src="http://code.jquery.com/jquery-migrate-1.0.0.js"></script>
<!-- POP UP HTML START-->
<?php
echo $this->html->css(
        array(
            '/js/crop_image/jquery.Jcrop',
            '/js/crop_image/jcrop_main',
        )
);
echo $this->html->script(array(
    'modernizr-custom.min',
    'crop_image/jquery.Jcrop',
    'crop_image/jcrop_main_ourteam',
    'ajaxupload.3.5',
));
?>

<style >
    .profle-image-modal .modal-dialog{
        width: 800px;
    }

    .img_div {
        border: 1px solid #CCCCCC;
        height: 170px;
        margin: 26px auto;
        overflow: hidden;
        width: 170px;
    }
    .rnd{
        border-radius: 50%;
    }
</style>


<div class="modal fade profle-image-modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" id="myCloseBtn" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"><?php echo __("Crop Image"); ?></h4>
            </div>
            <div class="modal-body">
                <!--INNER CONTENT START-->
                <div class="row">
                    <div class="col-md-9">
                        <div style="float:left;min-width:329px;height:300px; width: 100%;" >
                            <center>
                                <img  id="cropbox1" style="width:400px;height:300px;" src=""  />
                            </center>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div style="box-shadow: none; "class="img_div" >                                                    
                            <img id="preview" src="" />
                        </div>
                    </div>
                </div>
                <div class="clearDiv" style="height:39px;"></div>
                <div>
                    <!--                    <button class="btn btn-primary" name="cropImgBtn" title="Crop & save" id="cropImgBtn" type="button" onclick="setCropImg()"> 
                    <?php //echo __("Crop & save"); ?>
                                        </button>-->
                </div>

                <!--HIDDEN FORM START-->
                <div style="display:none" >
                    <div style="margin:5px;">
                        <?php
                        echo $this->Form->create('image', array('enctype' => 'multipart/form-data'));
                        echo $this->Form->input('mycode', array('type' => 'text', 'id' => 'mycode', 'label' => false, 'div' => false, 'required' => false));
                        ?>
                        <label>X1 
                            <?php
                            echo $this->Form->input('x', array('type' => 'text', 'id' => 'x', 'label' => false, 'div' => false,
                                'required' => false, 'size' => '4'));
                            ?>
                        </label>
                        <label>Y1 
                            <?php
                            echo $this->Form->input('y', array('type' => 'text', 'id' => 'y', 'label' => false,
                                'div' => false, 'required' => false, 'size' => '4'));
                            ?>

                            <label>X2 
                                <?php
                                echo $this->Form->input('x2', array('type' => 'text', 'id' => 'x2', 'label' => false,
                                    'div' => false, 'required' => false, 'size' => '4'));
                                ?>
                            </label>
                            <label>Y2 
                                <?php
                                echo $this->Form->input('y2', array('type' => 'text', 'id' => 'y2', 'label' => false,
                                    'div' => false, 'required' => false, 'size' => '4'));
                                ?>
                            </label>
                            <label>W 
                                <?php
                                echo $this->Form->input('w', array('type' => 'text', 'id' => 'w', 'label' => false, 'div' => false,
                                    'required' => false, 'size' => '4'));
                                ?>
                            </label>
                            <label>H 
                                <?php
                                echo $this->Form->input('h', array('type' => 'text', 'id' => 'h', 'label' => false, 'div' => false,
                                    'required' => false, 'size' => '4'));
                                ?>
                                <?php echo $this->Form->end(); ?> 
                            </label>
                    </div>
                </div>

                <div style="clear:both;"></div>
                <!---HIDDEN FORM END->
                <!--OUTER CONTENT END-->
            </div>

            <div class="modal-footer">
                <button class="btn btn-primary pull-right" name="cropImgBtn" title="Crop & save" id="cropImgBtn" type="button" onclick="setCropImg()"> 
                    <?php echo __("Crop & save"); ?>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- POP UP END -->
<?php
$_admin = true;
if (!empty($mode) && $mode == 'signup') {
    $_admin = false;
}
?>
<script>
    /* Image Crop Functionalities */
    var PathUrl = "<?php echo $this->webroot; ?>";

    $(document).ready(function () {
        var btnUpload = $("#UserImages");

        new AjaxUpload(btnUpload, {
            action: '<?php echo $this->Html->url(array("admin" => $_admin, "controller" => "images", "action" => "uploadteam")); ?>',
            name: 'uploadfile',
            onSubmit: function (file, ext) {
                if (!(ext && /^(jpg|png|jpeg|gif)$/.test(ext))) {
                    // extension is not allowed 
                    alert('Only JPG, PNG or GIF files are allowed');
                    return false;
                }

                // $('#loading-image').fadeIn();
            },
            onComplete: function (file, response) {
                // console.log(response);
                //thumb_836266151_1418728523.jpg|t=1418728523~~~400@@250

                console.log(response);
                var imageNameArr = response.split("~~~");
                var imageName1 = imageNameArr[0].split("|");
                
                imageName = imageName1[0];
                var sizeArr = imageNameArr[1].split("@@");
                gWIDTH = sizeArr[0];
                gHEIGHT = sizeArr[1];
               
               if (gWIDTH < 200 && gHEIGHT < 220) {
                    alert("Please provide image of size Greater than 200 X 220 pixels.");
                    $('#loading-image').fadeOut();
                    return false;
                }
                $("#cropbox1").css('width', gWIDTH + "px");
                $("#cropbox1").css('height', gHEIGHT + "px");
                $("#cropbox1,#preview").attr("rel", imageName + "");
                $("#cropbox1,#preview").attr("src", PathUrl + 'files/profile/temp/' + imageName);
                setTimeout("initializingCrop()", 1000);
                $("#myModal").modal("show");
            }
        });

    });
    
    function setCropImg() {
        var pstyle = $("#preview").attr("style");
        var psrc = $("#preview").attr("src");

        var opt = {"src": psrc};
        $("#UserImages").attr(opt);

        setMyCode($("#cropbox1").attr("rel"));
    }

    function setMyCode(mySrc) {
        $("#mycode").val(mySrc);
        var mycode = $("#mycode").val();
        var x = $("#x").val();
        var y = $("#y").val();
        var x2 = $("#x2").val();
        var y2 = $("#y2").val();
        var w = $("#w").val();
        var h = $("#h").val();
        $.ajax({
            type: "POST",
            async: false,
            url: '<?php echo $this->Html->url(array("admin" => $_admin, "controller" => "images", "action" => "save_profile")); ?>',
            data: {mycode: mycode, x: x, y: y, x2: x2, y2: y2, w: w, h: h},
            success: function (retData) {
                //alert(retData);
                var s = "<?php echo $this->webroot . 'files/profile/'; ?>" + retData;
                $(".ImagePreviewBox > img").attr("src", s);
                $("#UserImage").val(retData);
				
                /* Update field of CMS Image if Exist */
                if($('.cms_image').length > 0){
                    $(".cms_image").val(retData);
                }
				
                $("#myModal").modal("hide");
            },
            error: function () {
                alert("Error occured while changing status.");
            }
        });
    }
</script>