<div class="cv_page_container position-relative" id="cer_page">
    <h2 class="text-uppercase text-dark pb-3 pt-3 text-bold">your certificate</h2>
    <hr style="border-top: 2px solid black;">

    <h3 class="row g-3 flex-row text-uppercase text-dark p-3 overflow-auto d-block" style="height:72vh" id="cer_space">

    </h3>
<!-- Modal -->
    <div class="modal fade" id="cer_form_modal" tabindex="-1" data-mdb-backdrop="static" data-mdb-keyboard="false" aria-labelledby="cer_form_label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title text-uppercase" id="cer_form_label">Certificate</h5>
            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <div class="container" id="certificate_form">
                <form class="row g-4 justify-content-between" name="cer_form">
                    <!-- <div class="justify-content-between"> -->
                    <div class="col-md-6">
                        <label for="cer_name" class="form-label">Certificate Name</label>
                        <input type="text" class="form-control border-input " name="cer_name">
                    </div>
                    <div class="col-md-6">
                        <label for="cer_organization" class="form-label">Issuing Organization</label>
                        <input type="text" class="form-control border-input shadow" name="cer_organization">
                    </div>
                    <!-- </div> -->
                    <div class="col-md-3">
                        <label for="cer_from" class="form-label">From</label>
                        <input type="month" class="form-control border-input shadow" name="cer_from">
                    </div>
                    <div class="col-md-3">
                        <label for="cer_to" class="form-label">To</label>
                        <input type="month" class="form-control border-input shadow"  name="cer_to">
                    </div>
                    <div class="col-md-6">
                        <label for="cer_url" class="form-label">Credential URL</label>
                        <input type="text" class="form-control border-input shadow" name="cer_url">
                    </div>
                    <div class="col-12">
                        <label for="cer_des" class="form-label">Description</label>
                        <textarea type="text" class="form-control border-input shadow" style="height: 15vh"  name="cer_des"></textarea>
                    </div>
                </form>
            </div>

        </div>
        <div class="modal-footer d-flex justify-content-between">
            <div class="ps-2">
                <button type="button" class="btn btn-danger" data-mdb-dismiss="modal" onclick="deleteCerForm()">Delete</button>
            </div>
            <div class="">
                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-mdb-dismiss="modal" onclick="submitCerForm()">Submit</button>
            </div>
        </div>

        </div>
    </div>
    </div>

    <div class="position-absolute bottom-0 w-100 row d-flex justify-content-between mb-4 d-block " style="height:15vh">
        <hr style="border-top: 2px solid black;">
        <div class="col-4 col-md-12 d-block">
            <button type="button" id="cer_addform" class="cus_button btn btn-primary d-flex justify-content-between align-items-center text-center" data-mdb-toggle="modal" data-mdb-target="#cer_form_modal">
                <i class="bi bi-plus-circle fa-2x"></i>
                <p class="mb-0 ms-2">Add Certificate</p>
            </button>
        </div>
        <div class="col-4 col-md-12 d-flex flex-row-reverse ">
            <a href="#item-0" type="submit" class="cus_next btn btn-primary rounded-3 d-block border-input text-dark shadow" style="background-color: rgb(214, 225, 242);">Scroll To Top</a>
        </div>
    </div>
        <script>

        </script>
    <script src="../js/cv_form_js/CerForm.js"></script>
</div>

