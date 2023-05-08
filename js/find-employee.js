<<<<<<< HEAD
var handleSubmitFilter

const cvsListEle = document.querySelector("#cvs-list")
const pagination = document.querySelector("#pagination");
const searchJobTitleEle = document.querySelector("#job-title-input")

function renderPagination(totalItems, page){
    pagination.innerHTML = "";
    for(let i = 1; i <= totalItems; i++){
        pagination.innerHTML += `<div onclick="return handleSubmitFilter(${i})" style="background:${page === i ? "#D3D1D1" : "white"}" class="h-10 w-10 hover:bg-[#D3D1D1]/70 cursor-pointer text-center shadow-xl rounded-xl grid place-content-center">${i}</div>`
    }
}

handleSubmitFilter = (page = 1, onlyJobTitle = false) => {
    const formData = new FormData()
    if(onlyJobTitle){
        formData.append("position", searchJobTitleEle.value)
    }else{
        const formEle = document.getElementsByClassName("form-data")
        for(let count = 0; count < formEle.length; count++){
            if(formEle[count].name){
                formData.append(formEle[count].name, formEle[count].value)
            }
        }
    }
    formData.append("page", page)

    if(!onlyJobTitle) document.getElementById('submit').disabled = true;
    const ajax_request = new XMLHttpRequest();

    ajax_request.open("POST", `find-employee-process`, true)

    ajax_request.send(formData)

    ajax_request.onreadystatechange = function (){
        if(ajax_request.readyState == 4 && ajax_request.status == 200){
            document.getElementById('submit').disabled = false;
            cvsListEle.innerHTML = ""
            const value = JSON.parse(this.responseText)
            value.cvs.forEach(cv => cvsListEle.innerHTML += `
            <a href='http://localhost/view-employee?id=${cv.id}'>
                <div class="px-5 py-4 h-[160px] flex items-center shadow-xl hover:shadow-2xl cursor-pointer rounded-2xl bg-white gap-4">
                    <img class="w-24 h-24 rounded-full object-cover" alt="cv-avatar" src="https://www.nicepng.com/png/detail/73-735136_one-guy-web-developer-avatar.png" />
                    <div class="flex flex-col gap-1">
                        <h3 class="text-xl font-semibold">${cv.first_name + " " + cv.last_name}</h3>
                        <p class="text-base font-medium text-gray-400">${cv.job_title}</p>
                        <p class="text-base font-medium text-gray-400">${cv.address}</p>
                    </div>
                </div>
            </a>
            `)

            if(value.total > 3) {
                const total = parseInt(value.total)
                const real = parseInt(total / 3);
                const extra = total % 3 > 0 ? 1 : 0;
                const totalPages = real + extra ;
                renderPagination(totalPages, page)
            }
            else pagination.innerHTML = "";
        }
    }
    return false;
}

handleSubmitFilter(1, true);
=======
var handleSubmitFilter

const cvsListEle = document.querySelector("#cvs-list")
const pagination = document.querySelector("#pagination");
const searchJobTitleEle = document.querySelector("#job-title-input")



function renderPagination(totalItems, page){
    pagination.innerHTML = "";
    for(let i = 1; i <= totalItems; i++){
        pagination.innerHTML += `<div onclick="return handleSubmitFilter(${i})" style="background:${page === i ? "#D3D1D1" : "white"}" class="h-10 w-10 hover:bg-[#D3D1D1]/70 cursor-pointer text-center shadow-xl rounded-xl grid place-content-center">${i}</div>`
    }
}

handleSubmitFilter = (page = 1, onlyJobTitle = false) => {
    const formData = new FormData()
    if(onlyJobTitle){
        formData.append("position", searchJobTitleEle.value)
    }else{
        const formEle = document.getElementsByClassName("form-data")
        for(let count = 0; count < formEle.length; count++){
            if(formEle[count].name){
                formData.append(formEle[count].name, formEle[count].value)
            }
        }
    }
    formData.append("page", page)

    if(!onlyJobTitle) document.getElementById('submit').disabled = true;
    const ajax_request = new XMLHttpRequest();

    ajax_request.open("POST", `find-employee-process`, true)

    ajax_request.send(formData)

    ajax_request.onreadystatechange = function (){
        if(ajax_request.readyState == 4 && ajax_request.status == 200){
            document.getElementById('submit').disabled = false;
            cvsListEle.innerHTML = ""
            const value = JSON.parse(this.responseText)
            value.cvs.forEach(cv => cvsListEle.innerHTML += `
                <div class="px-5 py-4 h-[160px] flex items-center shadow-xl hover:shadow-2xl cursor-pointer rounded-2xl bg-white gap-4">
                    <img class="w-24 h-24 rounded-full object-cover" alt="cv-avatar" src="https://www.nicepng.com/png/detail/73-735136_one-guy-web-developer-avatar.png" />
                    <div class="flex flex-col gap-1">
                        <h3 class="text-xl font-semibold">${cv.first_name + " " + cv.last_name}</h3>
                        <p class="text-base font-medium text-gray-400">${cv.job_title}</p>
                        <p class="text-base font-medium text-gray-400">${cv.address}</p>
                    </div>
                </div>
            `)

            if(value.total > 3) {
                const total = parseInt(value.total)
                const real = parseInt(total / 3);
                const extra = total % 3 > 0 ? 1 : 0;
                const totalPages = real + extra ;
                renderPagination(totalPages, page)
            }
            else pagination.innerHTML = "";
        }
    }
    return false;
}

handleSubmitFilter(1, true);
>>>>>>> main
