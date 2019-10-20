<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="JasonVV 的个人博客" />
    <meta name="keywords" content="blog" />
    <title>JasonVV Blog</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    @include('layouts._header')
    <app></app>
    @include('layouts._footer')
</div>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>