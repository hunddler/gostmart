<div class="modal fade" id="today-rate" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-400px">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="fw-bold">Today's Rate [{{ Carbon\Carbon::now()->format('d,M y') }}]</h2>
                <div id="kt_customers_export_close" data-bs-dismiss="modal" class="btn btn-icon btn-sm btn-active-icon-primary">
                    <i class="ki-outline ki-cross fs-1"></i>
                </div>
            </div>
            <div class="modal-body scroll-y mx-5 mx-xl-5 my-5">
                <form id="kt_customers_export_form" class="form" action="#">
                    <div class="fv-row mb-5">
                        <label class="fs-5 fw-semibold form-label mb-5">Enter today's chicken Rate</label>
                        <input type="number" id="rate" required min="0" class="form-control form-control-solid" name="date" /><br>
                    </div>
                    <div class="text-center">
                        <button type="reset" data-bs-dismiss="modal" id="kt_customers_export_cancel" class="btn btn-light me-3">Discard</button>
                        <button type="button" onclick="setdailyrate();" id="kt_customers_export_submit" class="btn btn-primary">
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
