<script src="https://apis.google.com/js/platform.js" async defer></script>
<meta name="google-signin-client_id" content="400487607264-j2sillr3c5sd0vkoo0bq3n5ni1fl81l6.apps.googleusercontent.com">

<script type="text/javascript">
    var googleUser;
    function onSignIn(googleUser) {
        var profile = googleUser.getBasicProfile();
        console.log(profile);
        $('#social_responseResFrom').val("GP");
        $('#social_responseResData').val(JSON.stringify(profile));

        $('#social_responseHomeForm').submit();

        /*
         console.log(profile);
         console.log(profile.getGivenName());
         
         console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
         console.log('Name: ' + profile.getName());
         console.log('Image URL: ' + profile.getImageUrl());
         console.log('Email: ' + profile.getEmail());
         */
    }


    function signOutGoogle() {

    }

    // Alerts on link clicked to verify it works
    $(document).on("click", "a.logoutUrl", function () {
        var auth2 = gapi.auth2.getAuthInstance();
        googleUser.signOut().then(function () {
            alert("Asd");
            window.location.href = "<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'logout'),true); ?>";
        });
    });

</script>