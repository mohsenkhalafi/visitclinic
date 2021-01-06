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
                <img src="/plugin/images/slider-img.jpg" />
            </li>
            <li>
                <img src="/plugin/images/slider-img2.jpg" />
            </li>
            <li>
                <img src="/plugin/images/slider-img3.jpg" />
            </li>
        </ul>
    </div>


    <!-- Book Apointment -->

    <!-- End Book Apointment -->
</div>


    <!-- Book Apointment -->

    <!-- End Book Apointment -->
</div>


<link rel="stylesheet" href="{{URL::asset('/plugin/css/table.css')}}">
<h3 align="center">آزمایش های دریافتی</h3>
<table class='responstable' id="tbl" >
    <tr>


        <th class='text-left'>نام بیمار</th>
        <th class='text-left'>مشاهده آزمایش</th>

        <th class='text-left' align="center">ثبت نظر</th>
        <th class='text-left'  align="center">ثبت نسخه</th>

        <body>
    </tr>

    @foreach($view as $timelist)
        <tr>
            <td class='text-left'>{{$timelist->fname}}{{" "}}{{$timelist->lname}} </td>
            <td class='text-left'><div align="center"><img src="/uploads/photos/{{$timelist->doctype}}" height="200" width="200" id="myImg" ></div></td>


            <td class='text-left'>{!! Form::open(array('url' => "cmreg/id=$timelist->id",'id'=>'cm', 'files'=>true)) !!}


                {!! Form::Label('comment','نظر') !!}
                {!! Form::textarea('comment',null,['class' => 'form-control']) !!}


                <div class="form-group" align="center">
                    {!! Form::submit('ثبت', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}</td>
            <td class='text-left'>{!! Form::open(array('url' => "prreg/id=$timelist->id",'id'=>'pr', 'files'=>true)) !!}


                    {!! Form::Label('pres','نسخه') !!}
                    {!! Form::textarea('pres',null,['class' => 'form-control']) !!}


                    <div class="form-group" align="center">
                        {!! Form::submit('ثبت', ['class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!} </td>
        </tr>
    @endforeach
</table>
<!--script -->
<!-- Trigger the Modal -->


<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- The Close Button -->
    <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

    <!-- Modal Content (The Image) -->
    <img class="modal-content" id="img01">

    <!-- Modal Caption (Image Text) -->
    <div id="caption"></div>
</div>


        <!--script -->
<style>
#myImg {
border-radius: 5px;
cursor: pointer;
transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
display: none; /* Hidden by default */
position: fixed; /* Stay in place */
z-index: 1; /* Sit on top */
padding-top: 100px; /* Location of the box */
left: 0;
top: 0;
width: 100%; /* Full width */
height: 100%; /* Full height */
overflow: auto; /* Enable scroll if needed */
background-color: rgb(0,0,0); /* Fallback color */
background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (Image) */
.modal-content {
margin: auto;
display: block;
width: 80%;
max-width: 700px;
}

/* Caption of Modal Image (Image Text) - Same Width as the Image */
#caption {
margin: auto;
display: block;
width: 80%;
max-width: 700px;
text-align: center;
color: #ccc;
padding: 10px 0;
height: 150px;
}

/* Add Animation - Zoom in the Modal */
.modal-content, #caption {
-webkit-animation-name: zoom;
-webkit-animation-duration: 0.6s;
animation-name: zoom;
animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
from {-webkit-transform:scale(0)}
to {-webkit-transform:scale(1)}
}

@keyframes zoom {
from {transform:scale(0)}
to {transform:scale(1)}
}

/* The Close Button */
.close {
position: absolute;
top: 15px;
right: 35px;
color: #f1f1f1;
font-size: 40px;
font-weight: bold;
transition: 0.3s;
}

.close:hover,
.close:focus {
color: #bbb;
text-decoration: none;
cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
.modal-content {
width: 100%;
}
}
</style>
<script>var modal = document.getElementById('myModal');

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById('myImg');
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }</script>

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


</body>
</div>
</html>
