@extends('v2.layout.appv2')

@section('content')
    <!-- Home -->
    <div class="col-md-8 col-md-offset-2 container mb-5 " style="margin-top: 200px">

        <h1 class="t-color"><b> F A Q </b></h1>

        <div class="row">
            <div class="col-sm-12">
                <div class="accordions">
                    <?php $faq1 = true; ?>
                    @foreach($faqs as $faq)

                        <div class="accordion_container">
                            <div class="accordion d-flex flex-row align-items-center {{ $faq1?'active':'' }}"><div>{{ $faq->qst }}</div></div>
                            <?php $faq1 = false; ?>
                            <div class="accordion_panel">
                                <div>
                                    <p class="p-3">
                                        {!! $faq->ans !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <br>
    </div>

@endsection
