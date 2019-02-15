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
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-md-12 header">
                    <div class="row no-gutters p-3 px-5">
                        <div class="col-md-4 small-logo-holder">
                            <a href="{{ url('/')}}">
                                <img src="/images/logo.svg" alt="Lifeplus Formula official logo"/>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <div class="burger">
                                <div id="nav-icon1">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
            <div class="row no-gutters main-nav">
                <div class="col-md-10 offset-md-1 align-self-center">
                    <h1>Navs go here</h1>
                </div>
            </div>
        
            

            
        
        @yield('sub-content')
        </div>    

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
