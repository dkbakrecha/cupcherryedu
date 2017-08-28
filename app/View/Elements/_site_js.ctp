<script type="text/javascript">
    $(function () {
        var _scv = '<?php echo Configure::read('Site.SCV'); ?>';
        var _x_scv = getCookie('server_cookie_ver');
        if (!_x_scv || _x_scv !== _scv) {
            setCookie('server_cookie_ver', _scv, 7);
            window.location.reload(true);
        }


        $('input[type="radio"].r-green, input[type="checkbox"].r-green').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });


        if ($('#resentPost').length) {
            $("#resentPost").owlCarousel({
                autoPlay: 10000, //Set AutoPlay to 3 seconds
                items: 4,
                
                itemsDesktop: [1199, 3],
                itemsDesktopSmall: [979, 3],
                itemsMobile:[479, 1]
            });
        }
        
        $("#TestWrapper").on("submit", "#QuizViewForm", function (e) {
            e.preventDefault();
            //var _formData = $("#QuizViewForm").serialize();
            $(this).ajaxSubmit({
                url: "<?php echo $this->Html->url(array('controller' => 'questions', 'action' => 'getanswer')) ?>",
                type: "POST",
                //data: {'formData': _formData},
                success: function (rd) {
                    $('#questionContent').html(rd);
                    if (rd != 0) {
                        var obj = jQuery.parseJSON(rd);

                        $.each(obj, function (key, value) {
                            $('#' + key).val(value);
                        });
                    }
                },
                error: function (xhr) {
                }
            });
        });
        
        $(".comment_form").on("submit", "#commentForm", function (e) {
            e.preventDefault();
            
            $(this).ajaxSubmit({
                success: function (rd) {
                    var resData = $.parseJSON(rd);
                    if (resData.status == 0) {
                        alert(resData.msg);
                    } else {
                        alert(resData.msg);
                    }
                },
                error: function (xhr) {
                }
            });
        });
        
        $(".footer-subscribe").on("submit", "#hr-subscribe-form", function (e) {
            e.preventDefault();
            
            $(this).ajaxSubmit({
                success: function (rd) {
                    var resData = $.parseJSON(rd);
                    if (resData.status == 0) {
                        alert(resData.msg);
                    } else {
                        alert(resData.msg);
                    }
                },
                error: function (xhr) {
                }
            });
        });
        
        // browser window scroll (in pixels) after which the "back to top" link is shown
        var offset = 200,
        //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
        offset_opacity = 1200,
        //duration of the top scrolling animation (in ms)
        scroll_top_duration = 700,
        //grab the "back to top" link
        $back_to_top = $('.cd-top');

        //hide or show the "back to top" link
        $(window).scroll(function(){
            ( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
            if( $(this).scrollTop() > offset_opacity ) { 
                $back_to_top.addClass('cd-fade-out');
            }
        });

        //smooth scroll to top
        $back_to_top.on('click', function(event){
            event.preventDefault();
            $('body,html').animate({
                scrollTop: 0 ,
            }, scroll_top_duration
        );
        });
    });



    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + "; " + expires;
    }

    function getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ')
                c = c.substring(1);
            if (c.indexOf(name) == 0)
                return c.substring(name.length, c.length);
        }
        return "";
    }

    function checkCookie() {
        var user = getCookie("username");
        if (user != "") {
            alert("Welcome again " + user);
        } else {
            user = prompt("Please enter your name:", "");
            if (user != "" && user != null) {
                setCookie("username", user, 365);
            }
        }
    }

</script>