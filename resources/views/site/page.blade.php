<!doctype html>
<html lang="en">
<head>
    <title> {{ $item->title }}</title>
    @vite('resources/css/app.css') 

</head>
<body>
    <x-menu/>
    <header>
        <ul>
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <li>
                    <a
                        rel="alternate"
                        hreflang="{{ $localeCode }}"
                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                    >
                        {{ strtoupper($localeCode) }}
                    </a>
                </li>
            @endforeach
        </ul>
    </header> 

    {{-- <div class="text-center mt-24">

        <br />
        <h1 class="text-5xl">
            
            {{ $item->title }}
        </h1>
        <br />
        <p class="text-xl">
            {{ $item->description }}

        </p>
    </div> --}}


    <div class="mx-auto max-w-2xl">
        {!! $item->renderBlocks() !!}
    </div>
</body>
</html>
