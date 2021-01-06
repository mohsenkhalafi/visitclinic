
<html>
<head>
    <meta charset="utf-8">
    <title>اتوماسیون سلامت</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="/plugin/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <script src="/plugin/bootstrap/js/respond.js"></script>
</head>

<div class="container">
    <div class="row">



    </div>
    <br>

    <div align="center">


        <div class="img-thumbnail">
            <?php   session()->regenerate();
            $value = Session::get('state');
            // echo session()->get('test');
            if($value=='no'){
                echo 'مشخصات یافت نشد'.'<br>';
            }
            ?>
            {!! Form::Open(array('action' => "LoginControl@index")) !!}
            {!! Form::Label('username','نام کاربری') !!}
            {!! Form::text('username',null,['class' => 'form-control']) !!}

            {!! Form::Label('password','رمز عبور') !!}
            {!! Form::text('password',null,['class' => 'form-control']) !!} <br>




            <br>
            {!! Form::submit('ورود',['class' => 'btn btn-success btn-lg btn-block']) !!}
            {!! Form::close() !!}
            <?php
            use App\Pezeshk;
            //  $users = Pezeshk::all();
            // echo $user;
            ?>

        </div>
    </div>
</div>
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="/plugin/avgrund.css">
    <style type="text/css">
        body {

        }

        #sample {
            width: 300px;
            height: 37px;
            background-color: #247bd5;
            text-align: center;
            margin: 50px auto;
            cursor: pointer;
            padding-top: 1px;
            font-size: 20px;
        }

        .holder {
            background-color: white;
            border-radius: 5px;
            box-shadow: 1px 1px 1px gray;
            color:white;
        }
    </style>
</head>
<body>



<script type="text/javascript" src="/plugin/jquery.js"></script>
<script type="text/javascript" src="/plugin/jquery.avgrund.min.js"></script>
<script type="text/javascript">
    $('#sample').avgrund({
        width: 300, // max is 640px
        height: '250px', // max is 350px
        showClose: true, // switch to 'true' for enabling close button
        showCloseText: 'بستن', // type your text for close button
        closeByEscape: true, // enables closing popup by 'Esc'..
        closeByDocument: true, // ..and by clicking document itself
        holderClass: 'holder', // lets you name custom class for popin holder..
        overlayClass: '', // ..and overlay block
        enableStackAnimation: false, // enables different type of popin's animation
        onBlurContainer: '#sample', // enables blur filter for specified block
        openOnEvent: true, // set to 'false' to init on load
        setEvent: 'click', // use your event like 'mouseover', 'touchmove', etc.
        onLoad: function (elem) {}, // set custom call before popin is inited..
        onUnload: function (elem) {}, // ..and after it was closed
        template: '<p style="color:white;font-weight:bold" align="center"><a href="doctorreg">ثبت نام به عنوان پزشک</a><br /></p><br />'
        + '<p style="color:white;font-weight:bold" align="center"><a href="bimarreg">ثبت نام به عنوان بیمار</a><br /></p><br />'

    });
</script>
</body>
</html>


