
<!DOCTYPE html>
<html>
<head>
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
</head>
<body>

<form>
    <select name="users" onchange="showUser(this.value)">
        <option value="">Select a person:</option>
        <option value="1">Peter Griffin</option>
        <option value="4689">Lois Griffin</option>
        <option value="3">Joseph Swanson</option>
        <option value="4">Glenn Quagmire</option>
    </select>
</form>
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


    </table>

</body>
</html>
