<?php $active['faq'] = 'imactive';
    $pagename = '<b>FAQ</b>';



?>

@extends('admin.layouts.admin')

@section('content')

    @include('includes.error')

    <div class="">
        <h3 class="title"><b>Frequently Asked Questions</b></h3>

        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="{{ route('faq.create') }}" class="btn btn-default btn-xs">New FAQ</a>
            </div>
            <div class="panel-body" style="">
                <table id="mtable" class="table table-hover table-striped table-bordered">

                    <thead class="">
                    <tr>
                        <th>#</th>
                        <th style="min-width: 150px"><i class="fa fa-question-circle"></i> Question</th>
                        <th style="min-width: 150px"> Status</th>
                        <th style="min-width: 120px">Created</th>
                        <th>Action</th>
                    </tr>

                    </thead>
                    <tbody>
                    @forelse($faqs as $faq)
                        <tr>
                            <td>
                                <input class="program_id" type="checkbox" value="{{ $faq->unid }}">
                            </td>

                            <td>
                                <b>{{ $faq->qst }}</b>
                            </td>
                            <td>
                                {{ $faq->active?'Active':'Inactive' }}
                            </td>
                            <td>
                                {{ $faq->created_at->diffForHumans() }}
                            </td>
                            <td>

                                <a href="{{ route('faq.show',$faq->unid ) }}" class="btn btn-xs btn-info" style="margin: 10px">Edit</a>

                                @if($faq->active)
                                    <a href="{{ route('faq.disable',$faq->unid ) }}" class="btn btn-xs btn-danger" style="margin: 10px">Disable</a>
                                @else
                                    <a href="{{ route('faq.enable',$faq->unid ) }}" class="btn btn-xs btn-success" style="margin: 10px">Enable</a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">
                                No Person Available at the moment  available at the moment.
                            </td>
                        </tr>

                    @endforelse

                    </tbody>
                </table>
            </div>
        </div>

        <br>

        {{ $faqs->links() }}

    </div>



@endsection


