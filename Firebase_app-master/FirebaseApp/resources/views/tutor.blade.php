<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
</head>
<body>
@include('includes.nav')

@include ('tutor_ui')

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
