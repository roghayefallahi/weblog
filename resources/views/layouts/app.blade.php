<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/assets/css/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="/assets/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="/assets/css/animate.min.css" />
    <link rel="stylesheet" href="/assets/css/main.css" />
    <link rel="stylesheet" href="/assets/css/style.css" />
    <script src="{{ asset('js/app.js') }}"></script>
    <title>آسان آموز برنامه نویسی</title>
    {!! htmlScriptTagJsApi() !!}
    @livewireStyles
</head>


<body dir="rtl">

    <livewire:header />
    {{ $slot }}

    <livewire:footer />

    <script src="/assets/js/jquery-3.5.1.min.js"></script>
    <script src="/assets/js/popper.js"></script>
    <script src="/assets/js/bootstrap/bootstrap.min.js"></script>
    <script src="/assets/js/grid.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
        data-turbolinks-eval="false" data-turbo-eval="false"></script>
    <script>
        window.livewire.on('showAlert', function(message) {
            Swal.fire({
                title: message,
                icon: 'success',
                showConfirmButtonText: false,

            })

        })
    </script>
</body>

</html>
