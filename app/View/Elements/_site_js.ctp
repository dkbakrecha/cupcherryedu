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

        if ($('.richEditor').length) {
            $('.richEditor').summernote();
        }

    });

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
        $(".ask_question").click(function () {
            $.ajax({
                url: '<?php echo $this->Html->url(array("controller" => "comments", "action" => "create")); ?>',
                type: "GET",
                success: function (data) {
                    $("#siteModal").html(data);
                    $("#siteModal").modal('show');
                },
                error: function (xhr) {
                    //ajaxErrorCallback(xhr);
                }
            });
        });

        $("#fotterMnu").click(function () {
            console.log("ss");
            $(".mainmenucover.menu-ipad .ipad-responsive-menu-outer").click();

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




    /*
     Ref:
     Thanks to:
     http://www.jqueryscript.net/layout/Simple-jQuery-Plugin-To-Create-Pinterest-Style-Grid-Layout-Pinterest-Grid.html
     */


    /*
     Pinterest Grid Plugin
     Copyright 2014 Mediademons
     @author smm 16/04/2014
     
     usage:
     
     $(document).ready(function() {
     
     $('#blog-landing').pinterest_grid({
     no_columns: 4
     });
     
     });
     
     
     */
    ;
    (function ($, window, document, undefined) {
        var pluginName = 'pinterest_grid',
                defaults = {
                    padding_x: 10,
                    padding_y: 10,
                    no_columns: 3,
                    margin_bottom: 50,
                    single_column_breakpoint: 700
                },
                columns,
                $article,
                article_width;

        function Plugin(element, options) {
            this.element = element;
            this.options = $.extend({}, defaults, options);
            this._defaults = defaults;
            this._name = pluginName;
            this.init();
        }

        Plugin.prototype.init = function () {
            var self = this,
                    resize_finish;

            $(window).resize(function () {
                clearTimeout(resize_finish);
                resize_finish = setTimeout(function () {
                    self.make_layout_change(self);
                }, 11);
            });

            self.make_layout_change(self);

            setTimeout(function () {
                $(window).resize();
            }, 500);
        };

        Plugin.prototype.calculate = function (single_column_mode) {
            var self = this,
                    tallest = 0,
                    row = 0,
                    $container = $(this.element),
                    container_width = $container.width();
            $article = $(this.element).children();

            if (single_column_mode === true) {
                article_width = $container.width() - self.options.padding_x;
            } else {
                article_width = ($container.width() - self.options.padding_x * self.options.no_columns) / self.options.no_columns;
            }

            $article.each(function () {
                $(this).css('width', article_width);
            });

            columns = self.options.no_columns;

            $article.each(function (index) {
                var current_column,
                        left_out = 0,
                        top = 0,
                        $this = $(this),
                        prevAll = $this.prevAll(),
                        tallest = 0;

                if (single_column_mode === false) {
                    current_column = (index % columns);
                } else {
                    current_column = 0;
                }

                for (var t = 0; t < columns; t++) {
                    $this.removeClass('c' + t);
                }

                if (index % columns === 0) {
                    row++;
                }

                $this.addClass('c' + current_column);
                $this.addClass('r' + row);

                prevAll.each(function (index) {
                    if ($(this).hasClass('c' + current_column)) {
                        top += $(this).outerHeight() + self.options.padding_y;
                    }
                });

                if (single_column_mode === true) {
                    left_out = 0;
                } else {
                    left_out = (index % columns) * (article_width + self.options.padding_x);
                }

                $this.css({
                    'left': left_out,
                    'top': top
                });
            });

            this.tallest($container);
            $(window).resize();
        };

        Plugin.prototype.tallest = function (_container) {
            var column_heights = [],
                    largest = 0;

            for (var z = 0; z < columns; z++) {
                var temp_height = 0;
                _container.find('.c' + z).each(function () {
                    temp_height += $(this).outerHeight();
                });
                column_heights[z] = temp_height;
            }

            largest = Math.max.apply(Math, column_heights);
            _container.css('height', largest + (this.options.padding_y + this.options.margin_bottom));
        };

        Plugin.prototype.make_layout_change = function (_self) {
            if ($(window).width() < _self.options.single_column_breakpoint) {
                _self.calculate(true);
            } else {
                _self.calculate(false);
            }
        };

        $.fn[pluginName] = function (options) {
            return this.each(function () {
                if (!$.data(this, 'plugin_' + pluginName)) {
                    $.data(this, 'plugin_' + pluginName,
                            new Plugin(this, options));
                }
            });
        }

    })(jQuery, window, document);

</script>