<div class="modal" tabindex="-1" role="dialog" id="photo-modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Gallery System Library</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <div class="col-md-9">
                <div class="thumbnails row">
                
                <?php foreach($photos as $photo): ?>
                <div class="col-xs-2">
                    <a role="checkbox" aria-checked="false" tabindex="0" id="" href="#" class="thumbnail">
                        <img class="img-responsive img-rounded modal_image" src="<?php echo $photo->picture_path(); ?>" data="<?php echo $photo->id; ?>">
                    </a>
                    <div class="photo-id hidden"></div>
                </div>

                <?php endforeach ?>

                </div>
            </div><!--col-md-9 -->

            <div class="col-md-3">
                <div id="modal_sidebar"></div>
            </div>

        </div><!--Modal Body-->
      <div class="modal-footer">
        <button id="set_user_image" type="button" class="btn btn-primary" disabled="true" data-dismiss="modal">Apply Selection</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

