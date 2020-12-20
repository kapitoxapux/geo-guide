<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Заказ задач и контрольных, готовые решения по гидравлике, геодезии, геологии | Geo-Guide</title>
    <meta name="keywords" content="geo guide задачи контрольные решение геология геодезия гидравлика заказать онлайн скачать" />
    <meta name="description" content="Нужно решение контрольной или задачи по гидравлике, геодезии, геологии? Закажи на geo-guide онлайн и скачай готовый ответ." />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/favicon.gif" type="image/gif">
    <link href='{{ url('sitemap.xml') }}' rel='alternate' title='Sitemap' type='application/rss+xml'/>
    <meta name="webmoney" content="F7732FF0-AD4D-48C5-A35B-9E5EEC858605"/>
    <link rel="canonical" href="https://geo-guide.ru" />

    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="/css/main.css" rel="stylesheet" />
    <link href="/css/slick.css" rel="stylesheet" />
    @yield('styles')
    <link href="/css/mobile.css" rel="stylesheet"  media="handheld, screen and (max-device-width:480px)"/>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-57900482-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-57900482-1');
    </script>

</head>
<body id="particleground">
@include('nav')
<div id="application" class="col-12 col-md-10 offset-md-1 col-lg-10 offset-lg-1 d-flex flex-column">
    @yield('content')
</div>
@include('footer')
</body>
<!-- Yandex.Metrika counter -->
{{-- <script type="text/javascript">
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(38415135, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true
    });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/38415135" style="position:absolute; left:-9999px;" alt="" /></div></noscript> --}}
<!-- /Yandex.Metrika counter -->
<script type="text/javascript" src="/js/app.js" defer></script>
@yield('scripts')
</html>
