<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body style="font-family: Arial, sans-serif; background-color: #135f1c; margin: 0; padding: 0;">

<table align="center" width="600"
       style="margin: 0 auto;" cellspacing="0" cellpadding="0" border="0" aliargin-top: 30px; background-color: #fff;">
<tr>
    <td style="padding: 20px 0; text-align: center;">
        {{--<img src="{{asset('nira_logo.png')}}" width="100" height="auto">--}}
        <h2 align="center" style="color:white;font-family: Apple;"> Nigerian Internet Registration Association </h2>
        <strong align="center" style="color:white;"> FAQ Platform </strong>
    </td>
</tr>
<tr>
    <td style="background-color: #fff; padding: 30px 30px;">
        <h1 style="font-size: 20px; color: #333; margin: 0; font-weight: bold; text-align: center;">Meeting Mail</h1>
        <p style="font-size: 16px; color: black; margin: 20px 0;">A new meeting has been scheduled with the following details</p>
        <p style="font-size: 16px; color: black; margin: 20px 0;"><strong> Meeting ID : {{$meet_id}}</strong></p>
        <p style="font-size: 16px; color: black; margin: 20px 0;"><strong> Title: {{$meet_title}}</strong></p>
        <p style="font-size: 16px; color: black; margin: 20px 0;"><strong> Schedule: {{$schedule}}</strong></p>
        <p style="font-size: 16px; color: black; margin: 20px 0;"><a href="{{route('host_join', $meet_id)}}" class="btn btn-success mb-3"> join meeting</a></p>
        <p style="font-size: 16px; color: #333; margin: 0;">Best regards, <br> NIRA Support Team.</p>
    </td>
</tr>
</table>

<!-- Footer -->
<table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="600"
       style="margin: 0 auto; margin-bottom: 20px; background-color: lightgray;">

    <tr>
        <td style="padding: 20px 0; text-align: center;">
            <p style="font-size: 13px; color: white; margin: 0;">8, Funsho Wiliams Avenue, Iponri, Surulere, Lagos. Nigeria.</p>
            <p style="font-size: 13px; color: white; margin: 0;">&copy;Copyright - 2024 - NIRA. All right reserved.</p>
        </td>
    </tr>
</table>

</body>

</html>
