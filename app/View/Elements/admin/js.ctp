<div class="modal fade" tabindex="-1" role="dialog" id="siteModal"></div><!-- /.modal -->

<script type="text/javascript">
    $(document).ready(function () {
        $("#TablePracticePracticeTableForm").submit(function () {
            var s_ans = $("#TablePracticeTblsysans").val();
            var u_ans = $("#TablePracticeTableans").val();

            if (s_ans == u_ans) {
                /*bootbox.alert({
                 message: "Your answer is correct",
                 backdrop: true,
                 size: 'small'
                 });*/
                alert("Your answer is correct");
            } else {
                /*bootbox.alert({
                 message: "Your answer is Incorrect. Correct one is " + s_ans,
                 backdrop: true,
                 size: 'small'
                 });*/
                alert("Your answer is Incorrect. Correct one is " + s_ans);
            }
            $("#TablePracticeTableans").val();
        });
    });

    $(function () {
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
                itemsMobile: [479, 1]
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
        $(window).scroll(function () {
            ($(this).scrollTop() > offset) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
            if ($(this).scrollTop() > offset_opacity) {
                $back_to_top.addClass('cd-fade-out');
            }
        });

        //smooth scroll to top
        $back_to_top.on('click', function (event) {
            event.preventDefault();
            $('body,html').animate({
                scrollTop: 0
            }, scroll_top_duration
                    );
        });


        //Edit Product model
        $("#dataTables-users").on("click", ".addtopractice", function () {
            var _qId = $(this).data('question');
            
            $.ajax({
                url: '<?php echo $this->Html->url(array("controller" => "practices", "action" => "add_question", "admin" => true)); ?>',
                type: "POST",
                data: {_question_id: _qId},
                success: function (data) {
                    $("#siteModal").html(data);
                    $("#siteModal").modal('show');
                },
                error: function (xhr) {
                    //ajaxErrorCallback(xhr);
                }
            });
        });
        
        $("#siteModal").on("submit", "#PracticeQuestionAdminAddQuestionForm", function (e) {
            e.preventDefault();
            //var _formData = $("#QuizViewForm").serialize();
            $(this).ajaxSubmit({
                url: "<?php echo $this->Html->url(array('controller' => 'practices', 'action' => 'add_question')) ?>",
                type: "POST",
                success: function (rd) {
                    if (rd != 0) {
                        var obj = jQuery.parseJSON(rd);

                        if(obj.status == 1){
                            alert("Question add to practice");
                        }
                        
                        if(obj.status == 2){
                            alert("Question already added to practice");
                        }
                         $("#siteModal").modal('hide');
                    }
                },
                error: function (xhr) {
                }
            });
        });

    });
</script>