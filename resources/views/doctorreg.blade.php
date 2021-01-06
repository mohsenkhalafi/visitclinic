
<!doctype html>
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

                </div>
            </div>

            </ul>
        </div>
</div>
</div>

<div class="row2">
    <div class="upper-header">

        <div class="logo">
            <a href="#"><img src="/plugin/images/logo.png" alt=""></a>
        </div>

        <!-- Navigation -->

        <!-- Navigation -->
        <div class="clear"></div>
    </div>
    <!-- End Upper Header -->
</div>
<!-- End Row2 -->

</header>

</div>

<div align="center">
    <?php $msg=session()->get('dmsg'); echo $msg; ?>
    <br>
        <?php $msg=session()->get('edmsg'); echo $msg; ?>
        <br>
<div class="img-thumbnail" >
{!! Form::Open(array('action' => "Usercontroller@docsave")) !!}
{!! Form::Label('username','نام کاربری') !!}
{!! Form::text('username',null,['class' => 'form-control']) !!}

{!! Form::Label('password','رمز عبور') !!}
{!! Form::text('password',null,['class' => 'form-control']) !!} <br>

{!! Form::Label('fname','نام') !!}
    {!! Form::text('fname',null,['class' => 'form-control']) !!} <br>

{!! Form::Label('lname','نام خانوادگی') !!}
    {!! Form::text('lname',null,['class' => 'form-control']) !!} <br>

{!! Form::Label('expert','تخصص') !!}
    {!! Form::text('expert',null,['class' => 'form-control']) !!} <br>

    {!! Form::Label('code','کد نظام پزشکی') !!}
    {!! Form::text('code',null,['class' => 'form-control']) !!} <br>

    {!! Form::Label('email','ایمیل') !!}
    {!! Form::text('email',null,['class' => 'form-control']) !!} <br>
<br>
{!! Form::submit('ثبت',['class' => 'btn btn-success btn-lg btn-block']) !!}
{!! Form::close() !!}

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
