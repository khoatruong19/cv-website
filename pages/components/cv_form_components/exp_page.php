<div class="cv_page_container position-relative" id="exp_page">
    <h2 class="text-uppercase text-dark pb-3 pt-3 text-bold">your experience</h2>
    <hr style="border-top: 2px solid black;">

    <h3 class="row g-3 flex-row text-dark text-uppercase p-3 d-block  overflow-auto" style="height:72vh" id="exp_space">

    </h3>

<!-- Modal -->
    <div class="modal fade" id="exp_form_modal" tabindex="-1" data-mdb-backdrop="static" data-mdb-keyboard="false" aria-labelledby="exp_form_label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title text-uppercase" id="exp_form_label">Experience</h5>
            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <div class="container" id="experience_form">
                <form class="row g-4 justify-content-between" name="exp_form">
                    <div class="col-md-6">
                        <label for="exp_jobTitle" class="form-label">Job Title</label>
                        <input type="text" class="form-control border-input " name="exp_job" required>
                    </div>
                    <div class="col-md-6">
                        <label for="exp_company" class="form-label">Company</label>
                        <input type="text" class="form-control border-input shadow" name="exp_company" required>
                    </div>
                    <!-- </div> -->
                    <div class="col-md-3">
                        <label for="exp_from" class="form-label">From</label>
                        <input type="month" class="form-control border-input shadow" name="exp_from" required>
                    </div>
                    <div class="col-md-3">
                        <label for="exp_to" class="form-label">To</label>
                        <input type="month" class="form-control border-input shadow"  name="exp_to" required>
                    </div>
                    <div class="col-md-6">
                        <label for="exp_location" class="form-label">Company Location</label>
                        <input type="text" class="form-control border-input shadow" name="exp_location" required>
                    </div>
                    <div class="col-12">
                        <label for="exp_des" class="form-label">Description</label>
                        <textarea type="text" class="form-control border-input shadow" style="height: 15vh"  name="exp_des"></textarea>
                    </div>
                </form>
            </div>

        </div>
        <div class="modal-footer d-flex justify-content-between">
            <div class="ps-2">
                <button type="button" class="btn btn-danger" data-mdb-dismiss="modal" onclick="deleteExpForm()">Delete</button>
            </div>
            <div class="">
                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-mdb-dismiss="modal" onclick="submitExpForm()">Submit</button>
            </div>
        </div>
        </div>
    </div>
    </div>

    <div class="position-absolute bottom-0 w-100 row d-flex justify-content-between mb-4 d-block" style="height:15vh">
        <hr style="border-top: 2px solid black;">
        <div class="col-4 col-md-12 d-block">
            <button type="button" class="cus_button btn btn-primary d-flex justify-content-between align-items-center text-center" data-mdb-toggle="modal" data-mdb-target="#exp_form_modal">
                <i class="bi bi-plus-circle fa-2x"></i>
                <p class="mb-0 ms-2">Add Experience</p>
            </button>
        </div>
        <div class="col-4 col-md-12 d-flex flex-row-reverse">
            <a href="#item-3" type="submit" class="cus_next btn btn-primary rounded-3 d-block border-input text-dark shadow" style="background-color: rgb(214, 225, 242);">Next</a>
        </div>
    </div>
    <script>

    </script>
    <script src="../js/cv_form_js/ExpForm.js"></script>
</div>