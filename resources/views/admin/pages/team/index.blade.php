<?php $active['people'] = 'imactive';
    $pagename = '<b>Persons</b>';



?>

@extends('admin.layouts.admin')

@section('content')

    @include('includes.error')

    <div class="">
        <h3 class="title"><b>Persons</b></h3>

        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="{{ route('people.create') }}" class="btn btn-default btn-xs">New Person</a>
            </div>
            <div class="panel-body" style="">
                <table id="mtable" class="table table-hover table-striped table-bordered">

                    <thead class="">
                    <tr>
                        <th>#</th>
                        <th style="min-width: 150px"><i class="fa fa-user-circle"></i> Names</th>
                        <th style="min-width: 150px"><i class="fa fa-suitcase"></i> Office</th>
                        <th style="min-width: 120px"><i class="fa fa-phone"></i> Tel</th>
                        <th style="min-width: 120px"><i class="fa fa-image"></i> Image</th>
                        <th style="min-width: 200px"><i class="fa fa-envelope"></i> Email</th>
                        <th>Action</th>
                    </tr>

                    </thead>
                    <tbody>
                    @forelse($people as $person)
                        <tr>

                            <td>
                                <input class="program_id" type="checkbox" value="{{ $person->id }}">
                            </td>

                            <td>
                                <b>{{ $person->names }}</b>
                            </td>

                            <td>{{ ucfirst($person->office) }}</td>
                            <td>
                                {{ $person->telephone }}
                            </td>

                            <td style="width: 110px" title="{{ucfirst( $person->names )}}'s image">
                                <div class="" style="width: 100%;margin: 0 auto;">
                                    @if(empty($person->gallery->url))
                                        <img src="{{ url('img/person_default.png')}}" alt="" class="img-fit">
                                    @else
                                        <img src="{{ url('uploads/'.$person->gallery->url) }}" alt="" class="img-fit">
                                    @endif

                                </div>
                            </td>

                            <td>
                                {{ $person->email }}
                            </td>



                            <td>

                                <a href="{{ route('people.show',$person->id ) }}" class="btn btn-xs btn-info" style="margin: 10px">Edit</a>

                                <form action="{{ route('people.destroy', $person->id) }}" method="post" style="display: inline;">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <input name="id" value="{{ $person->id }}" type="text" class="hidden">
                                    <button class="btn btn-xs btn-danger btn-xs" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                No Person Available at the moment  available at the moment.
                            </td>
                        </tr>

                    @endforelse

                    </tbody>
                </table>
            </div>
        </div>

        <br>

        {{ $people->links() }}

    </div>



@endsection


