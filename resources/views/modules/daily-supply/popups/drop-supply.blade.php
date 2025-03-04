<div class="modal fade" id="drop-supply" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-400px">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="fw-bold">Chicken Supply</h2>
                <div id="kt_customers_export_close" data-bs-dismiss="modal" class="btn btn-icon btn-sm btn-active-icon-primary">
                    <i class="ki-outline ki-cross fs-1"></i>
                </div>
            </div>
            <div class="modal-body scroll-y mx-5 mx-xl-5 my-5">
                <form id="kt_customers_export_form_supply" method="POST" class="form" action="{{url('admin/adddropsupply')}}">
                  @csrf
                  <input type="hidden" name="customer_id" id="customer_id" value="">
                    <div class="fv-row mb-5">
                        <label class="fs-5 fw-semibold form-label mb-5">Enter chicken supply (Kgs)</label>
                        <input type="number" min="0" required class="form-control form-control-solid" name="chicken_supply" />
                    </div>
                    <div class="fv-row mb-5">
                        <label class="fs-5 fw-semibold form-label mb-5">Discount/Kg (RS.)</label>
                        <input type="number" min="0" class="form-control form-control-solid" name="discount_per_kg" />
                    </div>
                    <div class="text-center">
                        <button type="reset" data-bs-dismiss="modal" id="kt_customers_export_cancel" class="btn btn-light me-3">Discard</button>
                        <button type="submit" id="kt_customers_export_submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="edit-drop-supply" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-400px">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="fw-bold">Chicken Supply</h2>
                <div id="kt_customers_export_close" data-bs-dismiss="modal" class="btn btn-icon btn-sm btn-active-icon-primary">
                    <i class="ki-outline ki-cross fs-1"></i>
                </div>
            </div>
            <div class="modal-body scroll-y mx-5 mx-xl-5 my-5">
                <form id="kt_customers_export_form_supply_edit" method="POST" class="form" action="{{url('admin/updatedropsupply')}}">
                  @csrf
                  <input type="hidden" name="customer_edit_id" id="customer_edit_id" value="">
                    <div class="fv-row mb-5">
                        <label class="fs-5 fw-semibold form-label mb-5">Enter chicken supply (Kgs)</label>
                        <input type="number" id="chicken_supply" min="0"  class="form-control form-control-solid" name="chicken_supply" />
                    </div>
                    <div class="fv-row mb-5">
                        <label class="fs-5 fw-semibold form-label mb-5">Discount/Kg (RS.)</label>
                        <input type="number" id="discount_per_kg" min="0" class="form-control form-control-solid" name="discount_per_kg" />
                    </div>
                    <div class="text-center">
                        <button type="reset" data-bs-dismiss="modal" id="kt_customers_export_cancel" class="btn btn-light me-3">Discard</button>
                        <button type="submit" id="kt_customers_export_submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="drop-supply-customer" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-400px">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="fw-bold">Chicken Supply</h2>
                <div id="kt_customers_export_close" data-bs-dismiss="modal" class="btn btn-icon btn-sm btn-active-icon-primary">
                    <i class="ki-outline ki-cross fs-1"></i>
                </div>
            </div>
            <div class="modal-body scroll-y mx-5 mx-xl-5 my-5">
                <form id="kt_customers_export_form_supply_customer" method="POST" class="form" action="{{url('admin/adddropsupplyedit')}}">
                  @csrf
                  <input type="hidden" name="id" id="edit_id" value="">
                    <div class="fv-row mb-5">
                        <label class="fs-5 fw-semibold form-label mb-5">Enter chicken supply (Kgs)</label>
                        <input type="number" min="0" required class="form-control form-control-solid" name="chicken_supply" />
                    </div>
                    <div class="fv-row mb-5">
                        <label class="fs-5 fw-semibold form-label mb-5">Discount/Kg (RS.)</label>
                        <input type="number" min="0" class="form-control form-control-solid" name="discount_per_kg" />
                    </div>
                    <div class="text-center">
                        <button type="reset" data-bs-dismiss="modal" id="kt_customers_export_cancel" class="btn btn-light me-3">Discard</button>
                        <button type="submit" id="kt_customers_export_submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
