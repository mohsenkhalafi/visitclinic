

<div lang="en">
    <head>
        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>سیستم آنلاین نوبت دهی</title>

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
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


        <link type="text/css" href="{{asset('plugin/styles/jquery-ui-1.8.14.css')}}" rel="stylesheet" />

        <script type="text/javascript" src="{{URL::asset('/plugin/scripts/jquery-1.6.2.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('/plugin/scripts/jquery.ui.core.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('/plugin/scripts/jquery.ui.datepicker-cc.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('/plugin/scripts/calendar.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('/plugin/scripts/jquery.ui.datepicker-cc-ar.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('/plugin/scripts/jquery.ui.datepicker-cc-fa.js')}}"></script>

        <link href="/plugin/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <script src="/plugin/bootstrap/js/respond.js"></script>
        <script type="text/javascript">
            $(function() {
                $("#date").datepicker({
                    showOn: 'button',
                    buttonImage: '/plugin/images/calendarr.png',
                    buttonImageOnly: true});


            });
        </script>

        <script>
            $(function(){

                $('#').submit(function(e){
                    $.ajaxSetup({
                        header:$('meta[name="_token"]').attr('content')
                    })
                    e.preventDefault(e);

                    $.ajax({

                        type:"POST",
                        url:'/addtimes',
                        data:$(this).serialize(),
                        dataType: 'json',
                        success: function(data){
                            $('#msg2').html('با موفقیت ذخیره شد');
                            alert('با موفقیت ذخیره شد');

                        },
                        error: function(data){

                        }
                    })
                });
            });
        </script>
    </head>
    <body>

    <!-- Start Header -->
    <header>

        <div class="subheader clearfix">
            <div class="inner-subheader">
                <div class="phone">+123456789</div>

                <div class="subheader2">
                    <ul>

                        <li><p>خوش آمدید</p></li>
                        <a href="logout"> <li>خروج</li></a>
                    <?php   session_start();
                    $value = Session::get('state');
                    ?>

                </div>
            </div>

            </ul>
        </div>
</div>
</div>

<div class="row2">
    <div class="upper-header">
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
            <?php $t=session()->get('table'); if($t=='patient'){ echo  '<li><a href="getappoint">اخذ نوبت</a></li>';} ?>
            <?php $t=session()->get('table'); if($t=='doctor'){ echo  '<li><a href="addtime">ثبت برنامه حضور</a></li>' ;}?>
            <?php $t=session()->get('table'); if($t=='doctor'){ echo  '<li><a href="recieve">آزمایش های دریافتی</a></li>';} ?>
            <?php $t=session()->get('table'); if($t=='patient'){ echo  '<li><a href="schedule">نوبت های اخذ شده</a></li>';} ?>
            <?php $t=session()->get('table'); if($t=='patient'){ echo  '<li><a href="getazmayesh">بارگزاری آزمایش</a></li>';} ?>
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

            </li>
            <li>

            </li>
        </ul>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <!-- Book Apointment -->
    <div class="book-form">
        <div class="inner-form">

            <h4><img src="/plugin/images/calendar.png" alt="">ثبت آزمایش
            </h4> &nbsp;
            <br>

            {!! Form::open(array('action' => 'Usercontroller@upload', 'files'=>true)) !!}

            <div class="form-group">
                {!! Form::label('بارگذاری', 'Profile Picture:') !!}
                {!! Form::file('image',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('بارگذاری آزمایش', ['class' => 'btn btn-primary form-control']) !!}
            </div>
            {!! Form::close() !!}
                <br>
            <br>
            <br>

        </div>


        </form>
        <div id="msg2" class="message"></div>

        <span id="result"></span>
    </div>
</div>
<!-- End Book Apointment -->
</div>
<!-- End SLider -->


<!-- Container -->
<div class="wrapper">

    <!-- Recent Works -->
    <div class="features dark">
        <div class="features-items column3">
            <a href="#">
                <div class="service-item">
                    <a href="#" class="service-img"><img src="/plugin/images/scope.png" alt=""></a>
                </div>
                <h4>ضربان سنج</h4>
                <div class="line"></div>
                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است</p>
            </a>
        </div>
        <div class="features-items column3">
            <a href="#">
                <div class="service-item">
                    <a href="#" class="service-img"><img src="/plugin/images/diograph.png" alt=""></a>
                </div>
                <h4>الکتروکاردیوگرافی</h4>
                <div class="line"></div>
                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است</p>
            </a>
        </div>
        <div class="features-items column3">
            <a href="#">
                <div class="service-item">
                    <a href="#" class="service-img"><img src="/plugin/images/care.png" alt=""></a>
                </div>
                <h4>مراقبت از کودکان</h4>
                <div class="line"></div>
                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است</p>
            </a>
        </div>
        <div class="features-items column3">
            <a href="#">
                <div class="service-item">
                    <a href="#" class="service-img"><img src="/plugin/images/ambulance.png" alt=""></a>
                </div>
                <h4>24/7 آمبولانس</h4>
                <div class="line"></div>
                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است</p>
            </a>
        </div>
        <div class="clear"></div>
    </div>
    <!-- End Recent Works -->
    <!--ترجمه شده توسط مرجع تخصصی برنامه نویسان-->
    <div class="l-more">
        <div class="l-banner">
            <p><strong>ما اهمیت میدهیم</strong>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است</p>
            <a href="#">بیشتر بدانید</a>
            <div class="clear"></div>
        </div>
    </div>


    <!-- End Wrapper -->

    <!-- Footer -->
    <footer>
        <div class="inner-footer dark">

            <div class="about column3">
                <h4>درباره ما</h4>
                <ul>
                    <li><a href="#">ما کی هستیم</a></li>
                    <li><a href="#">چه کار می کنیم</a></li>
                    <li><a href="#">آنچه ما ارائه می دهیم</a></li>
                    <li><a href="#">ماموریت ما</a></li>
                    <li><a href="#">دیدگاه ما</a></li>
                </ul>
            </div>

            <div class="service column3">
                <h4>خدمات</h4>
                <ul>
                    <li><a href="#">دندان های سفید</a></li>
                    <li><a href="#">دندانپزشکی</a></li>
                    <li><a href="#">اشعه ایکس</a></li>
                    <li><a href="#">خدمات</a></li>
                </ul>
            </div>

            <div class="text-widget column3">
                <h4>ویجت متن</h4>
                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد</p>
            </div>

            <div class="contact column3">
                <h4>تماس با ما</h4>
                <p></p>
                <p></p>
                <p></p>
            </div>
            <div class="clear"></div>
            <!-- End Contact -->
            <div id="back-to-top">
                <a href="#top">بازگشت به بالا</a>
            </div>
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


    <!--  <script type="text/javascript" src="/plugin/js/jquery.min.js"></script> -->
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
