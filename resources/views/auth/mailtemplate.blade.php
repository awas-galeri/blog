<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verifikasi Akun</title>
    <link rel="icon" type="image/x-icon" href="/loggo.ico" />
</head>

<body>
    <p>
        Halo <b>{{ $details['username'] }}</b>!
    </p>
    <p>
        Berikut ini adalah data Anda:
    </p>
    <table>
        <tr>
            <td>Username</td>
            <td>:</td>
            <td>{{ $details['username'] }}</td>
        </tr>
        <tr>
            <td>Website</td>
            <td>:</td>
            <td>{{ $details['website'] }}</td>
        </tr>
        <tr>
            <td>Tanggal Register</td>
            <td>:</td>
            <td>{{ $details['datetime'] }}</td>
        </tr>
    </table>
    <center>
        <h3>
            Copy link di bawah ini ke browser Anda untuk verifikasi akun:
        </h3>
        <b style="color:blue">{{ $details['url'] }}</b>
        <p>Terimakasih telah melakukan registrasi.</p>
    </center>
</body>

</html>
