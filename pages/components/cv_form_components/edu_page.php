<div class="cv_page_container position-relative" id="edu_page">
    <h2 class="text-uppercase text-dark pb-3 pt-3 text-bold">your education</h2>
    <hr style="border-top: 2px solid black;">

    <h3 class="row g-3 flex-row text-uppercase text-dark p-3 overflow-auto" id="edu_space">
        <div class="row">
            <div class="col-1">
                <i class="far fa-circle-check fa-2x" style="color: rgb(76, 160, 230)"></i>
            </div>
            <div class="col-9">
                <h5 class="mt-0 mb-1">HCMUT</h5>
                <p class="text-secondary fw-light custom_fs"> Sep 2018 - Jan 2020</p>
            </div>
            <hr style="border-top: 1px solid rgb(233,231,231);">
        </div>
    </h3>

<!-- Modal -->
    <div class="modal fade" id="edu_form_modal" tabindex="-1" data-mdb-backdrop="static" data-mdb-keyboard="false" aria-labelledby="edu_form_label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title text-uppercase" id="edu_form_label">Education</h5>
            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <div class="container" id="education_form">
                <form class="row g-4 justify-content-between" name="edu_form">
                    <!-- <div class="justify-content-between"> -->
                    <div class="col-md-6">
                        <label for="edu_deparment" class="form-label">Department</label>
                        <input type="text" class="form-control border-input " name="edu_department">
                    </div>
                    <div class="col-md-6">
                        <label for="edu_falcuty" class="form-label">Faculty</label>
                        <input type="text" class="form-control border-input shadow" name="edu_faculty">
                    </div>
                    <!-- </div> -->
                    <div class="col-md-3">
                        <label for="edu_from" class="form-label">From</label>
                        <input type="month" class="form-control border-input shadow" name="edu_from">
                    </div>
                    <div class="col-md-3">
                        <label for="edu_to" class="form-label">To</label>
                        <input type="month" class="form-control border-input shadow"  name="edu_to">
                    </div>
                    <div class="col-md-6">
                        <label for="edu_location" class="form-label">Department Location</label>
                        <input type="text" class="form-control border-input shadow" name="edu_location">
                    </div>
                    <div class="col-12">
                        <label for="edu_des" class="form-label">Description</label>
                        <textarea type="text" class="form-control border-input shadow" style="height: 15vh"  name="edu_des"></textarea>
                    </div>
                </form>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary mr-3" data-mdb-dismiss="modal" onclick="submitEduForm()">Submit</button>
        </div>
        </div>
    </div>
    </div>

    <div class="position-absolute bottom-0 w-100 row d-flex justify-content-between mb-4 d-block " style="height:15vh">
        <hr style="border-top: 2px solid black;">
        <div class="col-4 col-md-12 d-block ">
            <button type="button" class="cus_button btn btn-primary d-flex justify-content-between align-items-center text-center" data-mdb-toggle="modal" data-mdb-target="#edu_form_modal">
                <i class="bi bi-plus-circle fa-2x"></i>
                <p class="mb-0 ms-2">Add Education</p>
            </button>
        </div>
        <div class="col-4 col-md-12 d-flex flex-row-reverse">
            <button type="submit" class="cus_next btn btn-primary rounded-3 d-block border-input text-dark shadow" style="background-color: rgb(214, 225, 242);">Next</button>
        </div>
    </div>
    <script src="../js/cv_form_js/EduForm.js"></script>
</div>