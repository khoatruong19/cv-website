const searchJobTitleEle = document.querySelector("#job-title-input") 

const handleSearchJobTitle = () => {
    console.log(searchJobTitleEle.value);
}

const positionInputEle = document.querySelector("#position-input") 
const levelInputEle = document.querySelector("#level-input") 
const experienceInputEle = document.querySelector("#experience-input") 
const skillsInputEle = document.querySelector("#skills-input") 
const locationInputEle = document.querySelector("#location-input") 


const handleSubmitFilter = () => {
    const formEle = document.getElementsByClassName("form-data")
    let formData = new FormData()
    for(let count = 0; count < formEle.length; count++){
        if(formEle[count].name){
            formData.append(formEle[count].name, formEle[count].value)
        } 
    }
    document.getElementById('submit').disabled = true;
    const ajax_request = new XMLHttpRequest();

    ajax_request.open("POST", "find-employee", true)

    ajax_request.send(formData)  

    ajax_request.onreadystatechange = function (){
        if(ajax_request.readyState == 4 && ajax_request.status == 200){
            document.getElementById('submit').disabled = false;
            console.log("Send")
        }
    }
    return false;
}