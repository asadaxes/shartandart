<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SMCE Contact Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .branding {
            background-color: #f9f9f9;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="branding">
        <h1 style="color: #cf2948;">SMCE</h1>
    </div>
    <p>We have received a new contact submission.</p>
    <table>
        <body>
            <tr>
                <td>Sender</td>
                <td>:</td>
                <td>{{ $mail_from }}</td>
            </tr>
            <tr>
                <td>Subject</td>
                <td>:</td>
                <td>{{ $mail_subject }}</td>
            </tr>
        </body>
    </table>
    <br>
    <p>{{ $mail_body }}</p>
    <br><br>
    <p>Thank you for stay with SMCE</p>
</body>
</html>