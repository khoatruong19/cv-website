handleSubmitFilter = function(){
    const form_data = new FormData();
    const formEle = document.getElementsByClassName("form-control");
    for(let count = 0; count < formEle.length; count++){
        if(formEle[count].name){
            formData.append(formEle[count].name, formEle[count].value)
        } 
    }
}