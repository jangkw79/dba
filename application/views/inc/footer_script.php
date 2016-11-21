</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("div .box-tools.pull-right").remove();
        $("div").find(".users-list > li span ").wrap("<a href='/detail'></a>");

        var expires = new Date(0);
        var flag = document.cookie.match(new RegExp('flag=([^;]+)'));

        function playbtn() {
            setInterval(function() {
                window.location.reload();
            }, 10000);
        }
        function stopbtn() { clearInterval(playbtn); }

        function pageStatus(arg) {
            if(arg == "play") {
                $(this).children("i").removeClass("fa-play");
                $(this).children("i").addClass("fa-pause");
                $(this).children("span").text('Pause');
                document.cookie = "flag=play";
                playbtn();
            } else {
                $(this).children("i").removeClass("fa-pause");
                $(this).children("i").addClass("fa-play");
                $(this).children("span").text('Play');
                document.cookie = flag[0] + "; max-age=0";
                stopbtn();
            }
        }

        $(".pagebtn a").click(function() {
            if(flag == undefined || flag[1].length > 0) {
                pageStatus("play");
            } else {
                pageStatus("stop");
            }
        });
/*
        if(flag == undefined || flag[1].length > 0) {
            pageStatus("play");
        } else {
            pageStatus("stop");
        }*/
    })
</script>
</body>
</html>