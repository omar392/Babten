<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New application job</title>
</head>
<body>
    <div style="text-align: center;">

        <div style="width:90%; margin:0 auto; padding-top:15px;font-family: Arial, Helvetica, sans-serif;font-size: large;margin-bottom:50px;">
        <h2>
        <p>Dears, My Name Is : {{$details['name']}}</p> <br>
        <p>Email Is : {{ $details['email'] }}</p><br>
        <p> Phone Is : {{$details['phone']}}</p><br>
        <p> Age Is : {{$details['age']}}</p><br>
        <p> Address Is : {{$details['address']}}</p><br>
        <p> Qualifications Is : {{$details['qualifications']}}</p><br>


        </h2>
        </div>


        <div style="width:90%; margin:0 auto; padding-top:15px;font-family: Arial, Helvetica, sans-serif;font-size: large;margin-bottom:50px;">
          <p>Please treat email with care</p>
        </div>


</body>
</html>
