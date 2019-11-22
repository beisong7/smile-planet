@if(!empty($ming))
    <div class="row">

        <div class="col-md-12">
            <a href="{{ $ming->target }}" target="_blank">
                <img class="img-fit landscape" src="{{ url('uploads/'.$ming->l_img) }}" alt="image">
                <img class="img-fit portrait" src="{{ url('uploads/'.$ming->p_img) }}" alt="image">
            </a>
        </div>
    </div>
@endif