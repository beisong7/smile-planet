@if(count($calender) > 0)
    <div class="row">
        <div class="col-md-12">

            <h3 class="t-color"><b> C A L E N D E R  </b> </h3>

            <hr>
            <div>
                <table id="mtable" class="table table-hover table-striped">

                    <thead class="">
                    <tr>
                        <th title="" class="purple3">Theme</th>
                        <th title="" class="purple3"> Date </th>
                        <th class="purple3">Action</th>
                    </tr>

                    </thead>
                    <tbody>
                    @forelse($calender as $table)
                        <tr>
                            <td>
                                {{ $table->theme }}
                            </td>

                            <td>
                                {{ date('F d, Y ', strtotime($table->date))}}
                            </td>

                            <td>
                                <a href="{{ route('calender.front',$table->id  ) }}" class="btn btn-xs btn-info btn-xs">Preview</a>
                            </td>
                        </tr>
                    @empty


                    @endforelse

                    </tbody>
                </table>
                <br>
                <a href="{{ route('calender.front.all') }}" class="btn btn-dark btn-xs">view more</a>
            </div>
        </div>
    </div>
@endif
