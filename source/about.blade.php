---
title: About
description: A little bit about the site
---
@extends('_layouts.main')

@section('body')
    <h1>About</h1>

    <img src="/assets/img/about.jpeg"
        alt="About image"
        class="flex rounded-full h-64 w-64 bg-contain mx-auto md:float-right my-6 md:ml-10">

    <p class="mb-6">Generally up to writing glue code for systems that don't normally talk to each other.</p>

    <p class="mb-6">Currently focusing on eCommerce, electronic invoicing, etc.</p>

    <p class="mb-6">Using TALL stack or just plain Laravel wherever practical, but has been known to dabble in PowerShell, C#, Python, Java, and others.</p>

    <p class="mb-6">Somehow ended up having to run Laravel apps in a variety of Windows/Microsoft environments, which can require some extra fiddling 🤷‍♂️</p>

    <p class="mb-6">
        <a href="https://github.com/knutle">GitHub</a> | <a href="https://selby.no">Selby AS</a>
    </p>
@endsection
