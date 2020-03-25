<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
</head>
<body>

@include('includes.nav')

@include('subjects_ui')

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>