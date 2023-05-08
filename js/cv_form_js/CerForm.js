
var xhttp_cer = new XMLHttpRequest();
xhttp_cer.open('GET', '../controllers/show_cer.php', true);

xhttp_cer.onreadystatechange = function(){
    if(xhttp_cer.status === 200)
    {
        let space = document.getElementById("cer_space");
        space.innerHTML =  xhttp_cer.responseText;
    }
    else{
        console.error('Error: ' + xhttp_cer.status);
    }
}
xhttp_cer.send();


function deleteCerForm()
{
    console.log("delete cer form");
    const form = document.forms["cer_form"];
    const cer_form_id = form["cer_name"].getAttribute("id");
    var url = `../controllers/add_cer.php?delete_id=${cer_form_id}`;
    console.log("cer form id:", cer_form_id);

    let deleteReq = new XMLHttpRequest();
    deleteReq.open('GET',url, true);
    deleteReq.send();
    deleteReq.onload = function(){
        if(deleteReq.status === 200)
        {
            var loadfull = new XMLHttpRequest();
            loadfull.open('GET', '../controllers/show_cer.php', true);

            loadfull.onload = function(){
                if(loadfull.status === 200)
                {
                    let space = document.getElementById("cer_space");
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

function submitCerForm()
{
    const form = document.forms["cer_form"];
    const formData = new FormData(form);
    for (const pair of formData.entries()) {
        console.log(pair[0] + ': ' + pair[1]);
    }
    let cer_form_id = form["cer_name"].getAttribute("id");
    formData.append('id',cer_form_id);
    let start_date = form["cer_from"].value;
    let start_parts = start_date.split("-");
    let formatted_start = `${start_parts[0]}-${start_parts[1].padStart(2,'0')}-01`;

    let end_date = form["cer_to"].value;
    let end_parts = end_date.split("-");
    let formatted_end = `${end_parts[0]}-${end_parts[1].padStart(2,'0')}-01`;

    formData.set("cer_from",formatted_start);
    formData.set("cer_to",formatted_end);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../controllers/add_cer.php', true);

    xhr.onload = function(){
        if(xhr.status === 200)
        {
            var loadfull = new XMLHttpRequest();
            loadfull.open('GET', '../controllers/show_cer.php', true);

            loadfull.onload = function(){
                if(loadfull.status === 200)
                {
                    let space = document.getElementById("cer_space");
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

function updateCer(id)
{
    console.log("update form")
    console.log(id);
    const myForm = document.forms["cer_form"];

    var xhr = new XMLHttpRequest();
    let url = `../controllers/add_cer.php?id=${id}`;
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
            myForm["cer_name"].setAttribute("id", arrRes[0]);
            myForm["cer_name"].setAttribute("value",arrRes[1]);
            myForm["cer_organization"].setAttribute("value",arrRes[2]);
            myForm["cer_from"].setAttribute("value",arrRes[3]);
            myForm["cer_to"].setAttribute("value",arrRes[4]);
            myForm["cer_url"].setAttribute("value",arrRes[5]);
            myForm["cer_des"].value = arrRes[6];
        }
        else{
            console.log("error in GEt")
        }
    }
}