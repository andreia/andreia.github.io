<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="{{ $page->description ?? $page->siteDescription }}">

        <meta property="og:title" content="{{ $page->title ? $page->title . ' | ' : '' }}{{ $page->siteName }}"/>
        <meta property="og:type" content="{{ $page->type ?? 'website' }}" />
        <meta property="og:url" content="{{ $page->getUrl() }}"/>
        <meta property="og:description" content="{{ $page->description ?? $page->siteDescription }}" />
        <meta name="twitter:title" content="{{ $page->title ?: $page->siteName }}">
        <meta name="twitter:description" content="{!! $page->excerpt ?: $page->siteDescription !!}">
        <meta name="twitter:image" content="{{ $page->cover_image ?: $page->siteImage }}">
        <meta name="twitter:card" content="summary">
        <meta name="twitter:site" content="{{ "@{$page->accounts->twitter}" }}">
        <meta name="twitter:creator" content="{{ "@{$page->accounts->twitter}" }}">

        <title>{{ $page->title ?  $page->title . ' | ' : '' }}{{ $page->siteName }}</title>

        <link rel="home" href="{{ $page->baseUrl }}">
        <link rel="icon" href="/favicon.png">
        <link href="/blog/feed.atom" type="application/atom+xml" rel="alternate" title="{{ $page->siteName }} Atom Feed">

        @if ($page->production)
            <!-- Insert analytics code here -->
        @endif

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,300i,400,400i,700,700i,800,800i" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">
    </head>

    <body class="flex flex-col justify-between min-h-screen bg-gray-100 text-gray-800 leading-normal font-sans">
        <div id="app">
            <header class="flex items-center shadow bg-white border-b h-24 py-4" role="banner">
                <div class="container flex items-center max-w-8xl mx-auto px-4 lg:px-8">
                    <div class="flex items-center">
                        <a href="/" title="{{ $page->siteName }} home" class="inline-flex items-center">
                            <h1 class="transition duration-500 ease-in-out text-lg md:text-xl text-pink-500 font-semibold hover:text-pink-700 my-0">~/andreia-bohner$</h1>
                            <div class="pl-3 animate-pulse flex space-x-4">
                                <div class="bg-pink-400 h-5 w-2"></div>
                            </div>
                        </a>
                    </div>

                    <div id="vue-search" class="flex flex-1 justify-end items-center">
                        <search></search>

                        @include('_nav.menu')

                        @include('_nav.menu-toggle')
                    </div>
                </div>
            </header>

            @include('_nav.menu-responsive')

            <main role="main" class="flex-auto w-full container max-w-4xl mx-auto py-16 pb-0 px-6">
                @yield('body')
            </main>

            <footer class="bg-gray-100 text-center text-sm mt-0 py-8" role="contentinfo">
                <div class="flex flex-col md:flex-row justify-center md:mr-2">
                    <span>
                        Happy coding!
                    </span>
                    <span>
                        <svg class="text-pink-500 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </div>
                <ul class="flex flex-col md:flex-row justify-center list-none">
                    <li>
                        <a href="https://twitter.com/andreiabohner" title="Andréia's Twitter">Twitter</a>
                        . <a href="https://github.com/andreia" title="Andréia's Github">Github</a> . <a href="/blog/feed.atom" title="Blog Feed">RSS</a>
                    </li>
                </ul>
            </footer>
        </div>

        <script src="{{ mix('js/main.js', 'assets/build') }}"></script>

        @stack('scripts')
    </body>
</html>
