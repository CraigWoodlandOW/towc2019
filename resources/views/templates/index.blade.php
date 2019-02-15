@extends('layouts.base')

@section('sub-content')
<div class="row no-gutters upper-holder">
    <div class="col large-fish">
        <img src="/images/large-fish.svg" alt="this is an image of a large fish"/>
    </div>
    <div class="col-md-4 offset-md-4 large-logo-holder my-5 text-center align-self-center">
        <iframe width="100%" height="500px" src="https://www.youtube.com/embed/uyb0wW0ln_g?autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loop autoplay></iframe>
        <img src="/images/transparent-logo.svg" alt="Outstanding web large logo"/>
    </div>
</div>
<div class="row no-gutters mb-5">
    <div class="col-md-6 offset-md-3 text-center">
        @absence([ 'row1-section2', '<h1><strong>OUTSTANDING</strong>….it’s who we are!</h1>
        <p>We are an award-winning web design agency based in the heart of the Bedfordshire countryside.
        Our passion for solving problems is what drives us and we know that when it comes to promoting
        a brand, product or service in the digital marketplace, nothing but outstanding will do.</p>
        <a href="#" class="read-more">Read More</a> ' ])
        @render([ 'row1-section2' ])
    </div>
</div>
<div class="row no-gutters blur-row my-5">
    <div class="col-md-12 blur-image-holder">
        <img src="/images/large-lizard.jpg" alt="what we do"/>
    </div>
    <div class="col-md-7 copy-box align-self-center px-3 px-md-5 py-md-5">
        <p>We understand that all our clients are at different stages in their business timelines and will have differing needs and wants from their Digital Agency. There’s a whole wealth of digital marketing and web design options which we can use to grow and develop your brand effectively. But while some agencies are a little vague on the services they provide, we are of the opinion that a good business decision is an informed one.</p>

        <p>Our products are completely bespoke so it only makes sense that our services are tailor-made too.</p>

        <p>Please click the icons below to explore our list of no-nonsense service packages which can be implemented singularly (as Core or Bolt On), in bundles or as one, overarching solution for your business.</p>
    </div>
    <div class="col-md-5 blur-box lizard-blur">
        <div class="row no-gutters h-100">
            <div class="col-md-12 align-self-center justify-content-center text-center">
                <h2>What We do</h2>
                <a href="#" class="read-more text-center">Read More</a>
            </div>
        </div>
    </div>
</div>
<div class="row no-gutters blur-row my-5">
    <div class="col-md-12 blur-image-holder">
        <img src="/images/large-parrot.jpg" alt="what we do"/>
    </div>
    <div class="col-md-5 blur-box parrot-blur">
        <div class="row no-gutters h-100">
            <div class="col-md-12 align-self-center justify-content-center text-center">
                <h2>Our Work</h2>
                <a href="#" class="read-more text-center">Read More</a>
            </div>
        </div>
    </div>
    <div class="col-md-7 copy-box align-self-center px-3 px-md-5 py-md-5">
        <p>Our work spans a wide variety of industries with all our clients seeking a way to digitally stand out within them. Every project we create is completely bespoke from start to finish, with every single aspect built from the ground up. But that’s enough about what we do – take a look at the outcome for yourself! </p>
    </div>
    
</div>
<div class="row no-gutters blur-row my-5">
    <div class="col-md-12 blur-image-holder">
        <img src="/images/large-leopord.jpg" alt="what we do"/>
    </div>
    <div class="col-md-7 copy-box align-self-center px-3 px-md-5 py-md-5">
    
    </div>
    <div class="col-md-5 blur-box leopord-blur">
        <div class="row no-gutters h-100">
            <div class="col-md-12 align-self-center justify-content-center text-center">
                <h2>Meet the team</h2>
                <a href="#" class="read-more text-center">Read More</a>
            </div>
        </div>
    </div>
</div>
<div class="row no-gutters blur-row my-5">
    <div class="col-md-12 blur-image-holder">
        <img src="/images/large-zebra.jpg" alt="what we do"/>
    </div>
    <div class="col-md-5 blur-box zebra-blur">
        <div class="row no-gutters h-100">
            <div class="col-md-12 align-self-center justify-content-center text-center">
                <h2>Knowledge</h2>
                <a href="#" class="read-more text-center">Read More</a>
            </div>
        </div>
    </div>
    <div class="col-md-7 copy-box align-self-center px-3 px-md-5 py-md-5">
        <p>When you work with us, you don't just get a pretty website, you get years of expertise too! It would be selfish if we kept it all to ourselves, so be sure to check out our blog for emerging news, watch our videos for some insight or help yourself to our handy downloads. All jam-packed with outstanding knowledge you won't want to miss!</p>
    </div>
    
</div>
<div class="row no-gutters blur-row my-5">
    <div class="col-md-12 blur-image-holder">
        <img src="/images/large-custom-software.jpg" alt="what we do"/>
    </div>
    <div class="col-md-7 copy-box align-self-center px-3 px-md-5 py-md-5">
    
    </div>
    <div class="col-md-5 blur-box fish-blur">
        <div class="row no-gutters h-100">
            <div class="col-md-12 align-self-center justify-content-center text-center">
                <h2>Blog</h2>
                <a href="#" class="read-more text-center">Read More</a>
            </div>
        </div>
    </div>
</div>
<div class="row no-gutters blur-row my-5">
    <div class="col-md-12 blur-image-holder">
        <img src="/images/large-penguin.jpg" alt="what we do"/>
    </div>
    <div class="col-md-5 blur-box penguin-blur">
        <div class="row no-gutters h-100">
            <div class="col-md-12 align-self-center justify-content-center text-center">
                <h2>Contact Us</h2>
                <a href="#" class="read-more text-center">Read More</a>
            </div>
        </div>
    </div>
    <div class="col-md-7 copy-box align-self-center px-3 px-md-5 py-md-5">
        <p>Time is money. We get that. Don’t worry about knowing what you need from the get-go, we’re here to help. </p>

        <p>You can fast-track the whole process by completing our simple contact form with a few key details and a member of our team will be in touch within the same working day.</p>
    </div>
    
</div>
@endsection
