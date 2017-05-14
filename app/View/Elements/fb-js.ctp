<div id="fb-root" class=" fb_reset"></div>
<script type="text/javascript">
    var fbuserid, fbtoken;
    window.fbAsyncInit = function () {
        FB.init({
            appId: "1517016001851586",
            xfbml: true,
            cookie: true,
            status: true,
            version: 'v2.3'
        });

        FB.getLoginStatus(function (response) {
            if (response.authResponse) {
                fbtoken = response.authResponse.accessToken;
                fbuserid = response.authResponse.userID;
            }
        });
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/<?= $fb_lang ?>/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    $("#login, #signin, .menus").on("click", ".fb_login", function () {
        alert("gf");
        FB_login(this);
    });

    $(".responsive_menu .fb_login, .login-box .fb_login").click(function () {
        FB_login(this);
    });

    function FB_login(ele) {
        /*
         if ($(ele).closest('#login').length){
         $(ele).closest('#login').modal("hide");
         } else if ($(ele).closest("#signin").length){
         $(ele).closest('#signin').modal("hide");
         }*/
        FB.login(function (loginResponse) {
            if (loginResponse.authResponse) {
                fbtoken = loginResponse.authResponse.accessToken;
                fbuserid = loginResponse.authResponse.userID;
                FB.api('/me', function (response) {
                    response['access_token'] = fbtoken;

                    $('#social_responseResFrom').val("FB");
                    $('#social_responseResData').val(JSON.stringify(response));

                    $('#social_responseLoginForm').submit();
                    //blockUIWait();
                    /*$.ajax({
                     url: '<?php //echo $this->Html->url(array('controller'=>'users', 'action'=>'reg_facebook'))    ?>',
                     type: "POST",
                     data: response,
                     success: function(data){
                     $.unblockUI();
                     try{
                     var p = $.parseJSON(data);
                     if (p.status==1){
                     window.location.reload();
                     } else {
                     alert(p.msg);
                     }
                     }catch(e){
                     
                     }
                     },
                     error: function(xhr){
                     $.unblockUI();
                     ajaxErrorCallback(xhr);
                     }
                     });*/
                });
            }
        }, {
            scope: 'publish_actions, email, user_events',
            return_scopes: true
        });
    }

    /*
    $(window).load(function () {
        FB.Event.subscribe('xfbml.render', finished_rendering);
    });

    var finished_rendering = function () {
        //console.log("finished rendering plugins");
        $('.eventdetailnewthirddivleft .nano-pane').css('display', 'block');
        var fbc = $('fb-comments-count').val();
        console.log(fbc);
    }*/
</script>