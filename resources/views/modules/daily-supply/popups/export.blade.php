<div class="modal fade" id="export-table" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-400px">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="fw-bold">Export Customers</h2>
                <div id="kt_customers_export_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                    <i class="ki-outline ki-cross fs-1"></i>
                </div>
            </div>
            <div class="modal-body scroll-y mx-5 mx-xl-5 my-5">
                <form id="kt_customers_export_form" class="form" action="#">
                    <div class="fv-row mb-10">
                        <label class="fs-5 fw-semibold form-label mb-5">Select Export Format:</label>
                        <select data-control="select2" data-placeholder="Select a format" data-hide-search="true" name="format" class="form-select form-select-solid">
                            <option value="excell">Excel</option>
                            <option value="pdf">PDF</option>
                            <option value="cvs">CVS</option>
                            <option value="zip">ZIP</option>
                        </select>
                    </div>
                    <div class="fv-row mb-10">
                        <label class="fs-5 fw-semibold form-label mb-5">Select Date Range:</label>
                        <input class="form-control form-control-solid" placeholder="Pick a date" name="date" />
                    </div>
                    <div class="text-center">
                        <button type="reset" id="kt_customers_export_cancel" class="btn btn-light me-3">Discard</button>
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