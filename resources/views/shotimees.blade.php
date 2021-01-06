
<!doctype html>
<div lang="en">
    <head>
        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>سیستم_ آنلاین نوبت دهی</title>

        <link rel="stylesheet" href="/plugin/css/style.css" type="text/css" media="screen">
        <link rel="stylesheet" href="/plugin/css/zebra.css" type="text/css" media="screen">
        <link rel="stylesheet" href="/plugin/css/dr-framework.css" type="text/css" media="screen">
        <link rel="stylesheet" href="/plugin/css/navigation.css" type="text/css" media="screen">
        <link rel="stylesheet" type="/plugin/text/css" href="css/fullwidth.css" media="screen" />
        <link rel="stylesheet" href="/plugin/css/revslider.css" type="text/css" media="screen">
        <link rel="stylesheet" href="/plugin/css/jquery.bxslider.css" type="text/css" media="screen">
        <link rel="stylesheet" href="/plugin/css/responsive.css" type="text/css" media="screen">
        <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Philosopher:400,700,400italic' rel='stylesheet' type='text/css'>

        <link href="/plugin/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <script src="/plugin/bootstrap/js/respond.js"></script>
    </head>
    <body>

    <!-- Start Header -->
    <header>

        <div class="subheader clearfix">
            <div class="inner-subheader">
                <div class="phone">+123456789</div>

                <div class="subheader2">
                    <ul>

                        <li> <?php echo session()->get('level'). session()->get('fname')." ".session()->get('lname')." "; ?>خوش آمدید</li>
                        <a href="logout"> <li>خروج</li></a>


                </div>
            </div>

            </ul>
        </div>
</div>
</div>

<div class="row2">
    <div class="upper-header">
        <br>
        <br>

        <div class="logo">
            <a href="#"><img src="/plugin/images/logo.png" alt=""></a>
        </div>

        <!-- Navigation -->
        <nav id="nav">
            <ul id="navlist" class="sf-menu clearfix">
                <li class="current"><a href="/">صفحه اصلی</a>
                    <ul class="sub-menu">

                    </ul>
                </li>
            <?php $t=session()->get('table'); if($t=='admin'){ echo  '<li><a href="doctor">گزارش گیری</a></li>';} ?>
            <?php $t=session()->get('table'); if($t=='admin'){ echo  '<li><a href="timelist">قرار ملاقات ها</a></li>';} ?>
            <?php $t=session()->get('table'); if($t=='admin'){ echo  '<li><a href="report">لیست پزشکان</a></li>';} ?>
            <?php $t=session()->get('table'); if($t=='patient'){ echo  '<li><a href="timee">اخذ نوبت</a></li>';} ?>
            <?php $t=session()->get('table'); if($t=='doctor'){ echo  '<li><a href="addtime">ثبت برنامه حضور</a></li>' ;}?>
            <?php $t=session()->get('table'); if($t=='doctor'){ echo  '<li><a href="recieve">آزمایش های دریافتی</a></li>';} ?>
            <?php $t=session()->get('table'); if($t=='patient'){ echo  '<li><a href="schedule">نوبت های اخذ شده</a></li>';} ?>

            <!--<li><a href="about.html">گزارش گیری</a></li> --!>
        </nav>
        <!-- Navigation -->
                <div class="clear"></div>
    </div>
    <!-- End Upper Header -->
</div>
<!-- End Row2 -->

</header>
<!-- End Header -->
<!-- Slider -->
<div class="slider" >
    <div class="flexslider">
        <ul class="slides">
            <li>
                <img src="/plugin/images/slider-img.jpg" />
            </li>
            <li>
                <img src="/plugin/images/slider-img2.jpg" />
            </li>
            <li>
                <img src="/plugin/images/slider-img3.jpg" />
        </ul>
    </div>
</div>

    <!-- Book Apointment -->

    <!-- End Book Apointment -->

<!-- End SLider -->


<!-- Container -->


<!-- Recent Works -->

<div class="row">
<div>
    <div class="book-form">
        <div class="inner-form">

            <h4><img src="/plugin/images/calendarr.png" alt="">رزرو وقت ملاقات
            </h4>

            <form id="frmm" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <br class="inputs">
                <br> <input id="submit" type="submit" value="جستجو">
                {{ csrf_field() }}

                <div clas="day">
                    &nbsp;
                    <br>
                    &nbsp; <label for="se1" ><font color="white">تخصص: </font></label>
                    <select name="expert" id="se1">
                        <?php $sho=DB::table('doctor')->get();
                        compact('sho'); ?>
                        @foreach($sho as $create)
                            <option value=""></option>
                            <option value="{{$create ->expert}}">{{$create->expert}}</option> @endforeach

                    </select>
            </form>
        </div>
    </div>
</div>
</div>

<!-- End Wrapper -->

<!-- Footer -->
<footer>
    <div class="inner-footer dark">

        <div class="about column3">
            <h4>درباره ما</h4>

        </div>




        <div class="clear"></div>
        <!-- End Contact -->
        <div id="back-to-top">
            <a href="#top">بازگشت به بالا</a>
        </div>

        <!-- End inner Footer -->

        <div class="end-footer">
            <div class="lastdiv">
                <div class="copyleft">

                </div>

                <div class="f-socials">
                    <a href="#"><img src="/plugin/images/feed.png" alt=""></a>
                    <a href="#"><img src="/plugin/images/tweet.png" alt=""></a>
                    <a href="#"><img src="/plugin/images/fcb.png" alt=""></a>
                    <a href="#"><img src="/plugin/images/gplus.png" alt=""></a>
                    <a href="#"><img src="/plugin/images/pin.png" alt=""></a>
                </div>
                <div class="clear"></div>
            </div>
        </div>
</footer>


<script type="text/javascript" src="/plugin/js/jquery.min.js"></script>
<script src="/plugin/js/jquery.flexslider.js"></script>
<script type="text/javascript" charset="utf-8">
    $(window).load(function() {
        $('.flexslider').flexslider();
    });
</script>
<script type="text/javascript" src="/plugin/js/jquery.superfish.js"></script>
<script type="text/javascript" src="/plugin/js/script.js"></script>
<script type="text/javascript" src="/plugin/js/zebra_datepicker.js"></script>
<script type="text/javascript" src="/plugin/js/core.js"></script>

</body>
</div>
</html>
