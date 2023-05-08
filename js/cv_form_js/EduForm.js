
var xhttp_edu = new XMLHttpRequest();
xhttp_edu.open('GET', '../controllers/show_edu.php', true);

xhttp_edu.onload = function(){
    if(xhttp_edu.status === 200)
    {
        let space = document.getElementById("edu_space");
        space.innerHTML =  xhttp_edu.responseText;
    }
    else{
        console.error('Error: ' + xhttp_edu.status);
    }
}
xhttp_edu.send();

function deleteEduForm()
{
    const form = document.forms["edu_form"];
    const edu_form_id = form["edu_department"].getAttribute("id");
    var url = `../controllers/add_edu.php?delete_id=${edu_form_id}`;

    let deleteReq = new XMLHttpRequest();
    deleteReq.open('GET',url, true);
    deleteReq.send();
    deleteReq.onload = function(){
        if(deleteReq.status === 200)
        {
            var loadfull = new XMLHttpRequest();
            loadfull.open('GET', '../controllers/show_edu.php', true);

            loadfull.onload = function(){
                if(loadfull.status === 200)
                {
                    let space = document.getElementById("edu_space");
                    space.innerHTML =  loadfull.responseText;
                }
                else{
                    console.error('Error: ' + loadfull.status);
                }
            }
            loadfull.send();
        }
        else{
            console.error('Error: ' + deleteReq.status);
        }
    }

}

function submitEduForm()
{
    const form = document.forms["edu_form"];
    const formData = new FormData(form);
    for (const pair of formData.entries()) {
        console.log(pair[0] + ': ' + pair[1]);
    }
    let cer_form_id = form["edu_department"].getAttribute("id");
    formData.append('id',cer_form_id);

    let start_date = form["edu_from"].value;
    let start_parts = start_date.split("-");
    let formatted_start = `${start_parts[0]}-${start_parts[1].padStart(2,'0')}-01`;

    let end_date = form["edu_to"].value;
    let end_parts = end_date.split("-");
    let formatted_end = `${end_parts[0]}-${end_parts[1].padStart(2,'0')}-01`;

    formData.set("edu_from",formatted_start);
    formData.set("edu_to",formatted_end);
    console.log("POST to Show Edu:")
    for (const pair of formData.entries()) {
        console.log(pair[0] + ': ' + pair[1]);
    }

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../controllers/add_edu.php', true);

    xhr.onload = function(){
        if(xhr.status === 200)
        {
            console.log("submit")
            var loadfull = new XMLHttpRequest();
            loadfull.open('GET', '../controllers/show_edu.php', true);

            loadfull.onload = function(){
                if(loadfull.status === 200)
                {
                    let space = document.getElementById("edu_space");
                    space.innerHTML =  loadfull.responseText;
                }
                else{
                    console.error('Error: ' + loadfull.status);
                }
            }
            loadfull.send();
        }
        else{
            console.error('Error: ' + xhr.status);
        }
    }
    xhr.send(formData);
}

function updateEdu(id)
{
    console.log("update form")
    console.log(id);
    const myForm = document.forms["edu_form"];

    var xhr = new XMLHttpRequest();
    let url = `../controllers/add_edu.php?id=${id}`;
    xhr.open("GET",url, true);
    xhr.send();

    xhr.onload = function(){
        if(xhr.status === 200)
        {
            console.log("update function")
            var arrRes = xhr.responseText.split('?');
            arrRes[3] = arrRes[3].slice(0, 7);
            arrRes[4] = arrRes[4].slice(0, 7);
            console.log(arrRes);
            myForm["edu_department"].setAttribute("id", arrRes[0]);
            myForm["edu_department"].setAttribute("value",arrRes[1]);
            myForm["edu_faculty"].setAttribute("value",arrRes[2]);
            myForm["edu_from"].setAttribute("value",arrRes[3]);
            myForm["edu_to"].setAttribute("value",arrRes[4]);
            myForm["edu_location"].setAttribute("value",arrRes[5]);
            myForm["edu_des"].value = arrRes[6];
        }
        else{
            console.log("error in GEt")
        }
    }
}