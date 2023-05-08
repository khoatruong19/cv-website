document.getElementById("first_name").value = getSavedValue("first_name");
document.getElementById("last_name").value = getSavedValue("last_name");
console.log(document.getElementById("last_name"));
document.getElementById("det_mail").value = getSavedValue("det_mail");
document.getElementById("det_phone").value = getSavedValue("det_phone");
document.getElementById("det_address").value = getSavedValue("det_address");
document.getElementById("det_jobTitle").value = getSavedValue("det_jobTitle");
document.getElementById("det_level").value = getSavedValue("det_level");
document.getElementById("det_skills").value = getSavedValue("det_skills");
document.getElementById("det_bio").value = getSavedValue("det_bio");

function saveValue(e){
    var id = e.id;  
    var val = e.value; 
    localStorage.setItem(id, val);
}

function getSavedValue(v){
    if (!localStorage.getItem(v)) {
        return "";
    }
    return localStorage.getItem(v);
}