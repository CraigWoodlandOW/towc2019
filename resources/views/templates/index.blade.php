@extends('layouts.base')

@section('sub-content')
<div class="row no-gutters upper-holder">
    <div class="col large-fish">
        <img src="/images/large-fish.svg" alt="this is an image of a large fish"/>
    </div>
    <div class="col-md-4 offset-md-4 large-logo-holder my-5 text-center align-self-center">
        <img src="/images/large-logo.svg" alt="Outstanding web large logo"/>
    </div>
</div>
<div class="row no-gutters">
    <div class="col-md-6 offset-md-3 text-center">
        @absence([ 'row1-section2', '<h1><strong>OUTSTANDING</strong>….it’s who we are!</h1>
        <p>We are an award-winning web design agency based in the heart of the Bedfordshire countryside.
        Our passion for solving problems is what drives us and we know that when it comes to promoting
        a brand, product or service in the digital marketplace, nothing but outstanding will do.</p>
        <a href="#" class="read-more">Read More</a> ' ])
        @render([ 'row1-section2' ])
    </div>
</div>
<div class="row no-gutters blur-row">
    <div class="col-md-12 blur-image-holder">
        <img src="/images/large-lizard.jpg" alt="what we do"/>
    </div>
    <div class="col-md-7 copy-box">
    
    </div>
    <div class="col-md-5 blur-box">
        <div class="row no-gutters h-100">
            <div class="col-md-12 align-self-center justify-content-center text-center">
                <h2>What We do</h2>
                <a href="#" class="read-more text-center">Read More</a>
            </div>
        </div>
    </div>
</div>
@endsection
