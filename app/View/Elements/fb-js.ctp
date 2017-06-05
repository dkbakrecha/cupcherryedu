<div id="fb-root" class=" fb_reset"></div>
<script type="text/javascript">
    var fbuserid, fbtoken;
    window.fbAsyncInit = function () {
        FB.init({
            appId: "219670291726747",
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
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    $(".login-box .fb_login").click(function () {
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
                    //console.log("sdf");
                    $('#social_responseResFrom').val("FB");
                    $('#social_responseResData').val(JSON.stringify(response));

                    $('#social_responseLoginForm').submit();
                });
            }
        }, {
            scope: 'publish_actions, email, user_events',
            return_scopes: true
        });
    }
</script>