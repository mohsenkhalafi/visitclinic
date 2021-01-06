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
                        url:'/timeshow',
                        data:$(this).serialize(),
                        dataType: 'json',
                        success: function(data){
                            //  $('#msg2').html('با موفقیت ذخیره شد');
                            alert('با موفقیت ذخیره شد');
                            // alert(show.expert);
                            alert(data.day);

                            // alert($show.expert);

                        },
                        error: function(data){
                            // $("#table").load("/timesho");
                            //alert();
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
            <?php $t=session()->get('table'); if($t=='admin'){ echo  '<li><a href="report">لیست پزشکان</a></li>';} ?>
            <?php $t=session()->get('table'); if($t=='patient'){ echo  '<li><a href="getappoint">اخذ نوبت</a></li>';} ?>
            <?php $t=session()->get('table'); if($t=='doctor'){ echo  '<li><a href="addtime">ثبت برنامه حضور</a></li>' ;}?>
            <?php $t=session()->get('table'); if($t=='doctor'){ echo  '<li><a href="recieve">آزمایش های دریافتی</a></li>';} ?>
            <?php $t=session()->get('table'); if($t=='patient'){ echo  '<li><a href="schedule">نوبت های اخذ شده</a></li>';} ?>
            <?php $t=session()->get('table'); if($t=='patient'){ echo  '<li><a href="timelist">قرار ملاقات ها</a></li>';} ?>
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
    <br>
    <br>

    <!-- Book Apointment -->

    <div class="book-form">
        <div class="inner-form">

            <h4><img src="/plugin/images/calendarr.png" alt="">رزرو وقت ملاقات
            </h4>




                <div id="msg2" class="message"></div>
            </form>

        </div>
    </div>
    <!-- End Book Apointment -->

</div>
<!-- End SLider -->
<br>
<br>
<br>
<br>
<link rel="stylesheet" href="{{URL::asset('/plugin/css/table.css')}}">
<h3 align="center">لیست قرار ملاقات ها</h3>
<table class='responstable' id="tbl" >
    <tr>


        <th class='text-left'>نام پزشک</th>
        <th class='text-left'>تخصص</th>
        <th class='text-left'>نام بیمار</th>
        <th class='text-left' align="center">ساعت</th>
        <th class='text-left'  align="center">تاریخ</th>


        <?php
        $show = DB::table('doctor')
            ->leftjoin('schedule', 'schedule.dcode', '=', 'doctor.code')
            ->leftjoin('patient', 'patient.id', '=', 'schedule.pcode')
            ->select('patient.fname as fnames','patient.lname as lnames','doctor.fname','doctor.lname','schedule.*','doctor.expert')->get();
        $ct = DB::table('drtime')

            ->leftjoin('schedule', 'drtime.id', '=', 'schedule.drtimeid')
            ->select('schedule.drtimeid')->count();

        $count=count($ct);
        echo $ct;
        compact('show');

        ?>



    </tr>

    @foreach($show as $timelist)

        <tr>
            <td class='text-left'>{{$timelist->fname}} {{$timelist->lname}} </td>
            <td class='text-left'>{{$timelist->expert}}</td>
            <td class='text-left'>{{$timelist->fnames}} {{$timelist->lnames}} </td>
            <td class='text-left'>{{$timelist->hour}}</td>
            <td class='text-left'>{{$timelist->date}}</td>


        </tr>

    @endforeach
</table>

<!-- Container -->

<!-- End Wrapper -->

<!-- Footer -->

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
