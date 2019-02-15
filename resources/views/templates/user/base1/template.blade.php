@extends('layouts.' . (!is_null($page->extended_layout) ? $page->extended_layout : 'base'))

@section('sub-content')
    <div class="container">
        <div class="row my-4">
            <div class="col-md-12">
                <h4>
                    Base Template 1 - @page([ 'title' ])
                </h4>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row my-4">
            <div class="col-md-4">
                @absence([ 'template1-area1', '<p><b>Area 1 Default</b></p>' ])

                @render([ 'template1-area1' ])
            </div>

            <div class="col-md-4">
                @absence([ 'template1-area2', '<p><b>Area 2 Default</b></p>' ])

                @render([ 'template1-area2' ])
            </div>

            <div class="col-md-4">
                @absence([ 'template1-area3', '<p><b>Area 3 Default</b></p>' ])

                @render([ 'template1-area3' ])
            </div>
        </div>
    </div>
@endsection
