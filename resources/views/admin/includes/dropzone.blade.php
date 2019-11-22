<div>
    <div class="panel panel-default">
    <div class="panel-heading">
        <h4>Drag and drop files here <small>maximum size/file (100mb) </small></h4>
    </div>
    <div class="panel-body">
        <form action="{{ route('upload') }}" enctype="multipart/form-data" class="dropzone mydzone" id="my-dropzone">
            {{ csrf_field() }}
            {{ method_field('POST') }}
        </form>
    </div>

</div>
</div>