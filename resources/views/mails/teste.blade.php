<!DOCTYPE html>
<html lang="pt">
<head>
    <meta content="width=device-width" name="viewport">
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>Tidescape</title>

    <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,400i,700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Ubuntu', sans-serif;
        }

        h1 {
            font-weight: 300;
        }

        p, span, li, legend {
            font-size: 1rem;
        }
    </style>

    @yield('myStyles')
</head>
<body
    style="background-color: #ececec; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
<table border="0" cellpadding="0" cellspacing="0" style="background-color: #ececec; width: 100%;">
    <tbody>
    <tr>
        <td style="display: block; margin: 0 auto; max-width: 580px; padding: 10px; width: auto !important;">
            <div class="content"
                 style="box-sizing: border-box; display: block; margin: 0 auto; max-width: 580px; padding: 10px;">
                <div style="width: 100%; background-color: #fff; text-align: center; padding-top: 14px">
                    <a href="{{ route('home') }}" target="_blank">
                        <img src="http://tidescape.pt/assets/img/logo.png" alt="" width="40%">
                    </a>
                </div>
                <table style="background: #fff; border-radius: 3px; width: 100%;">
                    <tbody>
                    <tr>
                        <td style="box-sizing: border-box; padding: 20px;">
                            <table border="0" cellpadding="0" cellspacing="0" style="width: 100%">
                                <tbody>
                                <tr>
                                    <td>
                                        <p>Envio de contacto</p>
                                        <p>ola {{ $nome_cliente }}</p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>

                </table>
                <div style="clear: both; padding-top: 10px; text-align: center; width: 100%;">
                    <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                        <tbody>
                        <tr>
                            <td>
                                                <span style="color: #999999; font-size: 12px; text-align: center;">
                                                    Ignore este e-mail se não solicitou ou entre em contato conosco.
                                                </span>
                                <br/>
                                <span style="color: #999999; font-size: 12px; text-align: center;">
                                                    Copyright &copy; {{ date('Y') }} <a href="{{ route('home') }}" target="_blank"
                                                                                   style="color: #999999; font-size: 12px; text-align: center; text-decoration: underline; font-weight: bold;">Tidescape.pt</a>
                                                </span>
                                <br>
                                <span style="color: #999999; font-size: 12px; text-align: center;">
                                                    <a href="https://anm-consulting.com/pt" target="_blank" style="color: #999999; font-size: 12px; text-align: center; text-decoration: underline; font-weight: bold;">
                            <small>Developed by ANM Connection - Marketing e Web</small>
                        </a>
                                                </span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </td>
    </tr>
    </tbody>
</table>
</body>
</html>
