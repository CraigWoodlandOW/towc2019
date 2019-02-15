<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @include('core::seo')

        @include('core::title')

        @minifiedcss('frontend')

        <link rel="icon" href="{{ Vanilla2\Core\Setting::get('favicon', null, '/storage/', null) }}" type="image/x-icon" />

        @stack('styles')
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
            <a class="navbar-brand" href="#">{{ config('app.name', 'Vanilla2 Base') }}</a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    @inject('menu', 'Menu')
                    {!! $menu->render([
                        'bootstrap' => true
                    ]) !!}
                </ul>
            </div>

            @if(View::exists('ecommerce::cart'))
                <div class="cart-summary">
                    @include('ecommerce::cart')
                </div>
            @endif
        </nav>

        @yield('sub-content')

        @minifiedjs('frontend')

        <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        </script>

        @stack('scripts')

        {!! resolve('Popup')->render() !!}
    </body>
</html>
