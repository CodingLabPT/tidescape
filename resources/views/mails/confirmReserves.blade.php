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
                                        @if ($locale == 'es')
                                            <h1>Reserva Validada</h1>
                                            <p>La reserva que realizó ha sido validada. Aquí están los detalles que proporcionó:</p>
                                            <p>Reserva realizada para: {{ $tourName }} </p>
                                            @if ($boat === 'small')
                                                <p>Barco Elegido: Pequeño</p>
                                            @elseif($boat === 'big')
                                                <p>Barco Elegido: Grande</p>
                                            @else
                                                <p>Barco Elegido: Muy Grande</p>
                                            @endif
                                            <p>Correo Electrónico de la Reserva: {{ $email }}</p>
                                            <p>Teléfono Asociado: {{ $phone }}</p>
                                            <p>Fecha de la Reserva: {{ $day }} a las {{ $time }}</p>
                                            <p>Pronto recibirá una llamada de nuestro equipo para más información.</p>
                                        @elseif($locale == 'pt')
                                            <h1>Reserva Validada</h1>
                                            <p>A reserva que efetuou foi validada. Aqui estão os detalhes que forneceu:</p>
                                            <p>Reserva feita para: {{ $tourName }} </p>
                                            @if ($boat === 'small')
                                                <p>Barco Escolhido: Pequeno</p>
                                            @elseif($boat === 'big')
                                                <p>Barco Escolhido: Grande</p>
                                            @else
                                                <p>Barco Escolhido: Muito Grande</p>
                                            @endif
                                            <p>Email da Reserva: {{ $email }}</p>
                                            <p>Telefone Associado: {{ $phone }}</p>
                                            <p>Data da Reserva: {{ $day }} às {{ $time }}</p>
                                            <p>Em breve, receberá uma chamada da nossa equipa para mais informações.</p>
                                        @else
                                            <h1>Booking Validated</h1>
                                            <p>The booking you made has been validated. Here are the details you provided:</p>
                                            <p>Booking made for: {{ $tourName }} </p>
                                            @if ($boat === 'small')
                                            <p>Chosen Boat: Small</p>
                                            @elseif($boat === 'big')
                                            <p>Chosen Boat: Big</p>
                                            @else
                                            <p>Chosen Boat: Very big</p>
                                            @endif
                                            <p>Booking Email: {{ $email }}</p>
                                            <p>Associated Phone: {{ $phone }}</p>
                                            <p>Booking Date: {{ $day }} at {{ $time }}</p>
                                            <p>You will soon receive a call from our team for further information.</p>
                                        @endif
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
                                                    Ignore este e-mail se n���o solicitou ou entre em contato conosco.
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
