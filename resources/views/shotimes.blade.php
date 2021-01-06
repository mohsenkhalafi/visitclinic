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
            <?php $t=session()->get('admin'); if($t=='admin'){ echo  '<li><a href="doctor">گزارش گیری</a></li>';} ?>
            <?php $t=session()->get('admin'); if($t=='admin'){ echo  '<li><a href="report">لیست پزشکان</a></li>';} ?>
            <?php $t=session()->get('patient'); if($t=='true'){ echo  '<li><a href="timee">اخذ نوبت</a></li>';} ?>
            <?php $t=session()->get('doctor'); if($t=='doctor'){ echo  '<li><a href="addtime">ثبت برنامه حضور</a></li>' ;}?>
            <?php $t=session()->get('doctor'); if($t=='doctor'){ echo  '<li><a href="recieve">آزمایش های دریافتی</a></li>';} ?>
            <?php $t=session()->get('patient'); if($t=='true'){ echo  '<li><a href="schedule">نوبت های اخذ شده</a></li>';} ?>
            <?php $t=session()->get('table'); if($t=='admin'){ echo  '<li><a href="timelist">قرار ملاقات ها</a></li>';} ?>
    </div>
    <script>
        function showUser(str) {
            if (str=="") {
                document.getElementById("tbody").innerHTML="";
                return;
            }
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
            } else { // code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function() {
                if (this.readyState==4 && this.status==200) {
                    document.getElementById("tbody").innerHTML=this.responseText;
                }
            }
            xmlhttp.open("GET","search/q="+str,true);
            xmlhttp.send();
        }
    </script>
</header>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="book-form">
        <div class="inner-form">

            <h4><img src="/plugin/images/calendar.png" alt="">رزرو وقت ملاقات
            </h4>


                <div clas="day">
                    &nbsp;
                    <br>
                    &nbsp; <label for="se1" ><font color="white">تخصص: </font></label>
                    <select name="expert" id="se1" onchange="showUser(this.value)">
                        <?php $sho=DB::table('doctor')->get();
                        compact('sho'); ?>
                        @foreach($sho as $create)
                            <option value=""></option>
                            <option value="{{$create ->expert}}">{{$create->expert}}</option> @endforeach
                        ?>
                    </select>
            </form>
            <div class="form-group">
                <label for="se1" ><font color="white">نام پزشک: </font></label>
<input type="text" class="form-controller" id="search" name="search"></input>

            </div>
                </div>
    </div>

    <br>






         <link rel="stylesheet" href="{{URL::asset('/plugin/css/table.css')}}">
        <h3 align="center">لیست پزشکان و زمان های قابل اخذ</h3>

        <table class='responstable' id="tbl" >
            <tr>

                <th class='text-left'>نام پزشک</th>
                <th class='text-left'>تخصص</th>

                <th class='text-left'>ساعت</th>
                <th class='text-left'>تاریخ</th>
                <th class='text-left'>ثبت نوبت</th>
            </tr>;
            <tbody id="tbody">




            </tbody>
                </tr>

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

<script src="/plugin/js/jquery.flexslider.js"></script>
<script type="text/javascript" charset="utf-8">
    $(window).load(function() {
        $('.flexslider').flexslider();
    });
</script>
<script type="text/javascript">
    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });


    $(".btn-submit").click(function(e){

        e.preventDefault();


        var expert = $("input[name=expert]").val();







        $.ajax({

            type:'POST',

            url:'/login',

            data:{username:username, password:password},

            success:function(data){


                if(data.Msg=='error') {

                    $(".alert").hide();
                    $("#err").show();
                }
                else if(data.auth=='true'){
                    window.location.href=data.redirecturl;
                    //  alert('wlc');
                }



            }

        });


    });






</script>
<script type="text/javascript">

    $('#search').on('keyup',function(){

        $value=$(this).val();

        $.ajax({

            type : 'get',

            url : '{{URL::to('search')}}',

            data:{'search':$value},

            success:function(data){

                $('tbody').html(data);

            }

        });



    })

</script>

<script type="text/javascript">

    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

</script>
<script type="text/javascript" src="/plugin/js/jquery.superfish.js"></script>
<script type="text/javascript" src="/plugin/js/script.js"></script>
<script type="text/javascript" src="/plugin/js/zebra_datepicker.js"></script>
<script type="text/javascript" src="/plugin/js/core.js"></script>

</body>
</div>
</html>
