<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="csrf-token" content="{{ csrf_token() }}" />

	<title>{{ config('app.name', 'Laravel') }} - @yield('sub_title', 'Indonesia Fundraising Platform')</title>
  <link rel="icon" type="image/png" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSEJOOS7dMGZTJA0CkeYbx1_AfS1BGcsdPmM9ndv-GeNpzpnHSU" />
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
</head>
<body>
  @yield('content')
</body>
</html>