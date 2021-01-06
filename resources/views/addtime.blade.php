

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
                $("#alt2").datepicker({

                    showOn: 'button',
                    buttonImage: '/plugin/images/calendarr.png',
                    minDate: '0d',
                    maxDate: '+2w ',

                    dateFormat:"yy/mm/dd",
                altField: '#alt3',

                    altFormat:'DD، d MM yy',
                buttonImageOnly: true
                });

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
            <?php $t=session()->get('table'); if($t=='patient'){ echo  '<li><a href="getappoint">اخذ نوبت</a></li>';} ?>
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


    <!-- Book Apointment -->
    <div class="book-form">
        <div class="inner-form">

            <h4><img src="/plugin/images/calendar.png" alt="">ثبت ساعت کاری
            </h4> &nbsp;
<br>

            <form id="sign" action="addtimes" method="post">
                {{ csrf_field() }}
                <input id="sub"  type="submit" value="ثبت حضور">
                <br>
                <div class="date">
                    &nbsp; <input name="date" id="alt2" type="text"   readonly>
                      <input name="dates" id="alt3" type="text"   readonly>







                    <label for="se1"><font color="white">&nbsp;ساعت حضور از:&nbsp;</label> </font>
                   <select name="fhour" id="se1">
                       <option>08:00</option>
                       <option>09:00</option>
                       <option>10:00</option>
                       <option>11:00</option>
                       <option>12:00</option>
                       <option>13:00</option>
                       <option>14:00</option>
                       <option>15:00</option>
                       <option>16:00</option>
                       <option>17:00</option>
                       <option>18:00</option>
                       <option>19:00</option>
                       <option>20:00</option>
                       <option>21:00</option>
                       <option>22:00</option>
                       <option>23:00</option>


                   </select>

                    <label for="se2"  ><font color="white">ساعت حضور تا:</label></font>
                    <select name="thour" id="se2" >
                        <option>08:00</option>
                        <option>09:00</option>
                        <option>10:00</option>
                        <option>11:00</option>
                        <option>12:00</option>
                        <option>13:00</option>
                        <option>14:00</option>
                        <option>15:00</option>
                        <option>16:00</option>
                        <option>17:00</option>
                        <option>18:00</option>
                        <option>19:00</option>
                        <option>20:00</option>
                        <option>21:00</option>
                        <option>22:00</option>
                        <option>23:00</option>


                    </select>

                </div>

        </div>
        </form>
                <div id="msg2" class="message"></div>

<span id="result"></span>
        </div>
    </div>
    <!-- End Book Apointment -->
</div>
<!-- End SLider -->

<link rel="stylesheet" href="{{URL::asset('/plugin/css/table.css')}}">
<h3 align="center">لیست روزهای کاری</h3>
<table class='responstable' id="tbl" >
    <tr>


        <th class='text-left'>روز</th>
        <th class='text-left'>ساعت</th>

        <th class='text-left'>لغو</th>


<?php  $code = session()->get('dcode');

    // $name = Input::get('name');

    $show = DB::table('drtime')->where('dcode', $code)->get();
compact('show');?>



    </tr>

    @foreach($show as $timetablelist)
        <tr>

            <td class='text-left'>{{$timetablelist->date}}</td>
            <td class='text-left'>{{$timetablelist->fhour}}-{{$timetablelist->thour}}</td>
            <td class='text-left'><a href="cancel/id={{$timetablelist->id}}">لغو</a></td>


        </tr>
    @endforeach
</table>

<!-- Container -->


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
