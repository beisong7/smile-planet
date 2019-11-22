<br>
<div>
    <h3 class="t-color"><b>PARTNERS</b></h3>
    <hr>
    <div class="brand_bg">
        <div class="brand-slides">
            @forelse($brands as $brand)
                <div>
                    <div style="width: 100%">
                        <img title="{{ $brand->name }}" class="img_spons" src="{{ url('uploads/'.$brand->gallery->url) }}" alt="">
                    </div>
                </div>
            @empty

            @endforelse

        </div>

    </div>

    <br>
    <br>
    <div class="" style="width: 100%">
        <img src="{{ url('img/maintenance.jpg') }}" alt="" class="img-fit">
    </div>
</div>
<br>