<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('assets/phone/css/demo.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/phone/css/intlTelInput.css') }}">

    <title>Document</title>
</head>
<body>
    <h1>Phone</h1>
    <form action="">
        <div class="single-input">
            <input type="tel" class="form--control radius-10" placeholder="Type Phone number" id="phone" name="phone" required>
        </div>
    </form>
    <script src="{{ asset('assets/phone/js/intlTelInput.js') }}"></script>
    <script>
        var input = document.querySelector("#phone");
        window.intlTelInput(input,{});
    </script>
</body>
</html>