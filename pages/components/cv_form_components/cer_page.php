<div class="cv_page_container position-relative" id="cer_page">
    <h2 class="text-uppercase text-dark pb-3 pt-3 text-bold">your certificate</h2>
    <hr style="border-top: 2px solid black;">

    <h3 class="row g-3 flex-row text-uppercase text-dark p-3 overflow-auto" id="cer_space">
        <div class="row">
            <div class="col-1">
                <i class="far fa-circle-check fa-2x" style="color: rgb(76, 160, 230)"></i>
            </div>
            <div class="col-9">
                <h5 class="mt-0 mb-1">Certified Information System Security Professional</h5>
                <p class="text-secondary fw-light custom_fs"> Sep 2018 - Jan 2020</p>
            </div>
            <hr style="border-top: 1px solid rgb(233,231,231);">
        </div>

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
                <form class="row g-4 justify-content-between" action="">
                    <!-- <div class="justify-content-between"> -->
                    <div class="col-md-6">
                        <label for="cer_name" class="form-label">Certificate Name</label>
                        <input type="text" class="form-control border-input " id="jobTitle">
                    </div>
                    <div class="col-md-6">
                        <label for="cer_organization" class="form-label">Issuing Organization</label>
                        <input type="password" class="form-control border-input shadow" id="cer_company">
                    </div>
                    <!-- </div> -->
                    <div class="col-md-3">
                        <label for="cer_from" class="form-label">From</label>
                        <input type="text" class="form-control border-input shadow" id="cer_from">
                    </div>
                    <div class="col-md-3">
                        <label for="cer_to" class="form-label">To</label>
                        <input type="text" class="form-control border-input shadow"  id="cer_to">
                    </div>
                    <div class="col-md-6">
                        <label for="cer_url" class="form-label">Credential URL</label>
                        <input type="text" class="form-control border-input shadow" id="cer_location">
                    </div>
                    <div class="col-12">
                        <label for="cer_des" class="form-label">Description</label>
                        <textarea type="text" class="form-control border-input shadow" style="height: 15vh"  id="cer_des"></textarea>
                    </div>
                </form>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary mr-3">Submit</button>
        </div>
        </div>
    </div>
    </div>

    <div class="position-absolute bottom-0 w-100 row d-flex justify-content-between mb-4 d-block " style="height:15vh">
        <hr style="border-top: 2px solid black;">
        <div class="col-4 col-md-12 d-block">
            <button type="button" class="cus_button btn btn-primary d-flex justify-content-between align-items-center text-center" data-mdb-toggle="modal" data-mdb-target="#cer_form_modal">
                <i class="bi bi-plus-circle fa-2x"></i>
                <p class="mb-0 ms-2">Add Certificate</p>
            </button>
        </div>
        <div class="col-4 col-md-12 d-flex flex-row-reverse ">
            <button type="submit" class="cus_next btn btn-primary rounded-3 d-block border-input text-dark shadow" style="background-color: rgb(214, 225, 242);">Next</button>
        </div>
    </div>
</div>