<div class="modal fade" id="receive-amount" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-400px">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="fw-bold">Receive Amount</h2>
                <div id="kt_customers_export_close" data-bs-dismiss="modal" class="btn btn-icon btn-sm btn-active-icon-primary">
                    <i class="ki-outline ki-cross fs-1"></i>
                </div>
            </div>
            <div class="modal-body scroll-y mx-5 mx-xl-5 my-5">
                <form id="kt_customers_export_form_amount" method="POST" class="form" action="{{url('admin/receiveamount')}}">
                    @csrf
                    <input type="hidden" id="customer_id_amount" name="customer_id">
                    <div class="fv-row mb-5">
                        <label class="fs-5 fw-semibold form-label mb-5">Enter amount you received</label>
                        <input type="number" min="0" class="form-control form-control-solid" required name="amount" /><br>
                        <p>Amount to be received <span id="supply-value">400</span>KGs X <b id="current-rate">[current Rate]</b>: Rs. <span id="total-amount">0</span></p>
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

<div class="modal fade" id="receive-amount-edit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-400px">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="fw-bold">Receive Amount</h2>
                <div id="kt_customers_export_close" data-bs-dismiss="modal" class="btn btn-icon btn-sm btn-active-icon-primary">
                    <i class="ki-outline ki-cross fs-1"></i>
                </div>
            </div>
            <div class="modal-body scroll-y mx-5 mx-xl-5 my-5">
                <form id="kt_customers_export_form_amount_edit" method="POST" class="form" action="{{url('admin/receiveamountedit')}}">
                    @csrf
                    <input type="hidden" id="supply_id" name="supply_id">
                    <div class="fv-row mb-5">
                        <label class="fs-5 fw-semibold form-label mb-5">Enter amount you received</label>
                        <input type="number" min="0" class="form-control form-control-solid" required name="amount" /><br>
                        <p>Amount to be received <span id="supply-value-edit">400</span>KGs X <b id="current-rate-edit"></b>: Rs. <span id="total-amount-edit">0</span></p>
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
