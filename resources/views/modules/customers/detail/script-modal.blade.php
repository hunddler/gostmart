<script>
    function getafat(id) {
            $('#customer_id_fat').val(id);
        }

        $(document).ready(function() {
            $('#kt_customers_export_form_fat').on('submit', function(e) {
                e.preventDefault();

                var formData = new FormData(this);

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.error) {
                            toastr.error(response.error);
                        } else {
                            toastr.success(response.success);
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        }

                    },
                    error: function(response) {
                        if (response.responseJSON.errors) {
                            var errors = response.responseJSON.errors;
                            var errorMsg = '';
                            for (var error in errors) {
                                errorMsg += errors[error][0] + '<br>';
                            }
                            toastr.error(errorMsg);
                        } else {
                            toastr.error(response.responseJSON.error);
                        }



                    }
                });
            });

        });

        function getwaste(id) {
            $('#customer_id_waste').val(id);
        }

        $(document).ready(function() {
            $('#kt_customers_export_form_waste').on('submit', function(e) {
                e.preventDefault();

                var formData = new FormData(this);

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.error) {
                            toastr.error(response.error);
                        } else {
                            toastr.success(response.success);
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        }

                    },
                    error: function(response) {
                        if (response.responseJSON.errors) {
                            var errors = response.responseJSON.errors;
                            var errorMsg = '';
                            for (var error in errors) {
                                errorMsg += errors[error][0] + '<br>';
                            }
                            toastr.error(errorMsg);
                        } else {
                            toastr.error(response.responseJSON.error);
                        }



                    }
                });
            });

        });
</script>

<div class="modal fade" id="cash-in" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-400px">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="fw-bold">Cash In</h2>
                <div id="kt_customers_export_close" data-bs-dismiss="modal"
                    class="btn btn-icon btn-sm btn-active-icon-primary">
                    <i class="ki-outline ki-cross fs-1"></i>
                </div>
            </div>
            <div class="modal-body scroll-y mx-5 mx-xl-5 my-5">
                <form id="kt_customers_export_form_checkin" method="POST" class="form"
                    action="{{ url('admin/addcheckin') }}">
                    @csrf
                    <input type="hidden" name="customer_id" id="customer_id_check_in" value="">
                    <div class="fv-row mb-5">
                        <label class="fs-5 fw-semibold form-label mb-5">Amount</label>
                        <input type="number" min="0" required class="form-control form-control-solid"
                            name="amount" />
                    </div>
                    <div class="fv-row mb-5">
                        <label class="fs-5 fw-semibold form-label mb-5">Description</label>
                        <textarea required class="form-control form-control-solid" name="detail" rows="2" cols="2"></textarea>
                    </div>

                    <div class="text-center">
                        <button type="reset" data-bs-dismiss="modal" id="kt_customers_export_cancel"
                            class="btn btn-light me-3">Discard</button>
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


<div class="modal fade" id="cash-out" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-400px">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="fw-bold">Cash Out</h2>
                <div id="kt_customers_export_close" data-bs-dismiss="modal"
                    class="btn btn-icon btn-sm btn-active-icon-primary">
                    <i class="ki-outline ki-cross fs-1"></i>
                </div>
            </div>
            <div class="modal-body scroll-y mx-5 mx-xl-5 my-5">
                <form id="kt_customers_export_form_cashout" method="POST" class="form"
                    action="{{ url('admin/addcashout') }}">
                    @csrf
                    <input type="hidden" name="customer_id" id="customer_id_cash_out" value="">
                    <div class="fv-row mb-5">
                        <label class="fs-5 fw-semibold form-label mb-5">Amount</label>
                        <input type="number" min="0" required class="form-control form-control-solid"
                            name="amount" />
                    </div>
                    <div class="fv-row mb-5">
                        <label class="fs-5 fw-semibold form-label mb-5">Description</label>
                        <textarea required class="form-control form-control-solid" name="detail" rows="2" cols="2"></textarea>
                    </div>

                    <div class="text-center">
                        <button type="reset" data-bs-dismiss="modal" id="kt_customers_export_cancel"
                            class="btn btn-light me-3">Discard</button>
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

<div class="modal fade" id="kt_modal_fat" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-400px">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="fw-bold">Record Fat</h2>
                <div id="kt_customers_export_close" data-bs-dismiss="modal" class="btn btn-icon btn-sm btn-active-icon-primary">
                    <i class="ki-outline ki-cross fs-1"></i>
                </div>
            </div>
            <div class="modal-body scroll-y mx-5 mx-xl-5 my-5">
                <form id="kt_customers_export_form_fat" method="POST" class="form" action="{{url('admin/addfat')}}">
                  @csrf
                  <input type="hidden" name="customer_id" id="customer_id_fat" value="">
                    <div class="fv-row mb-5">
                        <label class="fs-5 fw-semibold form-label mb-5">Fat rate/kg (PKR)</label>
                        <input type="number" min="0" required class="form-control form-control-solid" name="fat_waste_rate" />
                    </div>
                    <div class="fv-row mb-5">
                        <label class="fs-5 fw-semibold form-label mb-5">Enter Fat supply (Kgs)</label>
                        <input type="number" min="0" class="form-control form-control-solid" name="fat_waste_kg" />
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


<div class="modal fade" id="kt_modal_waste" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-400px">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="fw-bold">Record Waste</h2>
                <div id="kt_customers_export_close" data-bs-dismiss="modal" class="btn btn-icon btn-sm btn-active-icon-primary">
                    <i class="ki-outline ki-cross fs-1"></i>
                </div>
            </div>
            <div class="modal-body scroll-y mx-5 mx-xl-5 my-5">
                <form id="kt_customers_export_form_waste" method="POST" class="form" action="{{url('admin/addwaste')}}">
                  @csrf
                  <input type="hidden" name="customer_id" id="customer_id_waste" value="">
                    <div class="fv-row mb-5">
                        <label class="fs-5 fw-semibold form-label mb-5">Waste rate/kg (PKR)</label>
                        <input type="number" min="0" required class="form-control form-control-solid" name="fat_waste_rate" />
                    </div>
                    <div class="fv-row mb-5">
                        <label class="fs-5 fw-semibold form-label mb-5">Enter Waste supply (Kgs)</label>
                        <input type="number" min="0" class="form-control form-control-solid" name="fat_waste_kg" />
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
