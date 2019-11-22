
@forelse($people as $person)

    <div class="col-xs-6 col-sm-3 col-md-3 " style="margin: 10px 0">
        <div class="list-group-item">
            <?php $url = ''; if(empty($person->gallery->url)){$url='img/person_default.png';}else{$url = 'uploads/'.$person->gallery->url;} ?>
            <img class="img-fit img-round" src="{{ url($url) }}" alt="">
            <p class="text-center" style="margin-top: 10px"><b>{{ $person->names }}</b></p>
                @if($person->office==='exco')
                    <p class="gray2 text-center" style="font-size: 11px">{{ ucfirst($person->pos) }}</p>
                @endif

                @if($person->office==='facilitator')
                    <p class="gray2 text-center" style="font-size: 11px">{{ ucfirst($person->office) }}</p>
                @endif

                @if($person->office==='trustee')
                    @if(!empty($person->pos))
                        <p class="gray2 text-center" style="font-size: 11px">{{ ucfirst($person->pos) }}</p>
                    @else
                        <p class="gray2 text-center" style="font-size: 11px">{{ ucfirst($person->office) }}</p>
                    @endif
                @endif

                @if($person->office==='volunteer')
                    <p class="gray2 text-center" style="font-size: 11px">Volunteer</p>
                @endif

        </div>
    </div>

@empty

@endforelse


@if(!empty($tag) && $tag==='trustee')
    <?php $person = \App\People::where('pos', 'president')->first() ?>
    <div class="col-xs-6 col-sm-3 col-md-3 " style="margin: 10px 0">
        <div class="list-group-item">
            <?php $url = ''; if(empty($person->gallery->url)){$url='img/person_default.png';}else{$url = 'uploads/'.$person->gallery->url;} ?>
            <img class="img-fit img-round" src="{{ url($url) }}" alt="">
            <p class="text-center" style="margin-top: 10px"><b>{{ $person['names'] }}</b></p>
            <p class="gray2 text-center" style="font-size: 11px">Trustee</p>

        </div>
    </div>
@endif
