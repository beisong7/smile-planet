<div id="galleryModal" class="modal  fade" role="dialog">

    <div class="modal-dialog modal-lg">

        <!-- Modal content -->
        <div class=" modal-content" id="postmodal">

            <div class="modal-header stheme">
                <button id="modal-closure" type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title"><i class="fa fa-picture-o"></i> <b> Select From Gallery</b><span ></span></h5>
            </div>
            <div class="modal-body">

                <button class="btn btn-sm btn-info save_imgs">Select</button>
                <hr style="margin-top: 7px">
                <div class="full-width scr_load row" style="max-height: 65vh; overflow: auto">
                    <div class="img_loading">
                        <img class="img-fit" src="{{ url('img/dribbble.gif') }}" alt="">
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-info btn-circle pull-left getMoreImg">more</button>
                <button class="btn btn-sm btn-info save_imgs">Select</button>
                <button class="btn btn-sm btn-danger discard" data-dismiss="modal">Discard</button>
            </div>
        </div>

    </div>
</div>