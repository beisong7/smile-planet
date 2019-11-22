<div id="myModal" class="modal  fade" role="dialog">

    <div class="modal-dialog modal-lg">

        <!-- Modal content -->
        <div class=" modal-content" id="postmodal">

            <div class="modal-header stheme">
                <button id="modal-closure" type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title"><i class="fa fa-picture-o"></i> <b> Select From Gallery</b><span ></span></h5>
            </div>
            <div class="modal-body">
                <span class="tar_title"> Banner for : <b class="target"></b></span>
                <br>
                <button class="btn btn-sm btn-info save_banner">Save Banner</button>
                <button class="btn btn-sm btn-info save_slider">Save Slides</button>
                <button class="btn btn-sm btn-info save_evtimg">Select</button>
                <button class="btn btn-sm btn-info save_partner">Select</button>
                <button class="btn btn-sm btn-danger discard" data-dismiss="modal">Discard</button>
                <div class=" unseen field_in">
                    {{ csrf_field() }}
                    <input type="text" class="form-control btitle" placeholder="Banner Title" required>

                </div>
                <button class="btn btn-sm btn-info save_evtimg">Select</button>
                <hr style="margin-top: 7px">
                <div class="full-width scr_load row maxh">
                    <div class="img_loading">
                        <img class="img-fit" src="{{ url('img/dribbble.gif') }}" alt="">
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-info btn-circle pull-left getMoreImg">more</button>
                <span class="pull-left emsg"></span>
                <button class="btn btn-sm btn-info save_banner">Save Banner</button>
                <button class="btn btn-sm btn-info save_slider">Save Slides</button>
                <button class="btn btn-sm btn-info save_evtimg">Select</button>
                <button class="btn btn-sm btn-info save_partner">Select</button>
                <button class="btn btn-sm btn-danger discard" data-dismiss="modal">Discard</button>
            </div>
        </div>

    </div>
</div>