<?php $active['payment'] = 'imactive';
    $pagename = '<b>Payments</b>';
?>

@extends('admin.layouts.admin')

@section('content')

    @include('includes.error')

    <div class="">
        <h3 class="title"><b>Payments</b></h3>

        <small class="gray">Showing Payments and Attempted Payments. </small>

        <br>
        <small class="gray">Pages</small>
        <br style="margin: 0;padding: 0;">
        {{ $payments->links() }}
        <br>

        <div class="panel panel-default">
            <div class="panel-heading">
                Payment

            </div>
            <div class="panel-body" style="">
                <table id="mtable" class="table table-hover table-striped table-bordered">

                    <thead class="">
                    <tr>
                        <th title="">Client Name</th>
                        <th title="">Email </th>
                        <th title="">Amount</th>
                        <th title="">Purpose</th>
                        <th title="">Status</th>
                        <th title="">REF</th>
                        <th>Action</th>
                    </tr>

                    </thead>
                    <tbody>
                    @forelse($payments as $payment)
                        <tr>
                            <td>
                                {{ $payment->client->names }}
                            </td>

                            <td>
                                {{ $payment->client->email }}
                            </td>

                            <td>
                                {{ $payment->amount }}
                            </td>
                            <td title="">
                                {{ $payment->purpose->title }}
                            </td>
                            <td title="">
                                {{ $payment->status }}
                            </td>
                            <td title="">
                                {{ $payment->reference }}
                            </td>

                            <td>

                                {{--<form action="" method="post" style="display: inline;">--}}
                                    {{--{{ csrf_field() }}--}}
                                    {{--<input name="id" value="{{ $admin->id }}" type="text" class="hidden">--}}
                                    {{--<button class="btn btn-xs btn-danger btn-xs" type="submit">Delete</button>--}}
                                {{--</form>--}}
                                <a href="{{ route('payment.show', $payment->id) }}" class="btn btn-xs btn-info btn-xs">Preview</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                No Record found!
                            </td>
                        </tr>

                    @endforelse

                    </tbody>
                </table>
            </div>
        </div>



    </div>



@endsection


