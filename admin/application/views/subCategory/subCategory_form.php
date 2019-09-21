<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="subCategoryForm" tabindex="-1" role="dialog" aria-labelledby="modal_title" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="row justify-content-center">
          <div class="col-md-12">
          <div class="card">
          
          <article class="card-body">
          <form id="party_form">
            <input type="hidden" id="subCategory_id" value="0">
						<input type="hidden" id="isEdit" value="">

						<div class="row">
							<div class="col-md-6">
							<div class="form-group">
								<label class="col-sm-6">SubCategory Name</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="subCat_name">
								</div>
							</div>
							</div>

                            <div class="col-md-6">
							<div class="form-group">
								<label class="col-sm-6">Categoty Name</label>
								<div class="col-sm-8">
									<select class="form-control" id="cat_name">
										<?php foreach($category as $cat) { ?>
											<option value="<?php echo $cat['ID'] ?>"><?php echo $cat['NAME'] ?></option>
										<?php } ?>
										
									</select>
								</div>
							</div>
							</div>

							<div class="col-md-6">
							<div class="form-group">
								<label class="col-sm-6">Status</label>
									<div class="col-sm-8">
									<select class="form-control" id="subCat_status">
										<option value="active">Active</option>
										<option value="deactive">Deactive</option>
									</select>
								</div>
							</div>
							</div>

						</div>
                  
          </form>
          </article> <!-- card-body end .// -->
          </div> <!-- card.// -->
          </div> <!-- col.//-->

          </div> <!-- row.//-->
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btn_action" onclick="validateForm()">Save changes</button>
      </div>
    </div>
  </div>
</div>
