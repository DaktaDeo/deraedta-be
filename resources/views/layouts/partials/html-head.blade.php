<meta charset="utf-8">

<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta name="apple-touch-fullscreen" content="yes"/>
<meta name="msapplication-tap-highlight" content="no"/>
<meta name="referrer" content="always">

<link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#a01829">
<link rel="shortcut icon" href="/favicon.ico">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

<meta name="theme-color" content="#fff">

@include('layouts.partials.seo-analytics')

{{--<script>--}}
{{--    try {--}}
{{--        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {--}}
{{--            document.documentElement.classList.add('dark')--}}
{{--            document.querySelector('meta[name="theme-color"]').setAttribute('content', '#0B1120')--}}
{{--        } else {--}}
{{--            document.documentElement.classList.remove('dark')--}}
{{--        }--}}
{{--    } catch (_) {}--}}
{{--</script>--}}
