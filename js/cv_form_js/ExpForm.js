var xhttp_exp = new XMLHttpRequest();
xhttp_exp.open('GET', '../controllers/show_exp.php', true);

xhttp_exp.onload = function(){
    if(xhttp_exp.status === 200)
    {
        let space = document.getElementById("exp_space");
        space.innerHTML =  xhttp_exp.responseText;
    }
    else{
        console.error('Error: ' + xhttp_exp.status);
    }
}
xhttp_exp.send();

function deleteExpForm()
{
    console.log("delete EXP")
    const form = document.forms["exp_form"];
    console.log("form", form);
    const exp_form_id = form["exp_job"].getAttribute("id");
    console.log(exp_form_id);
    var url = `../controllers/add_exp.php?delete_id=${exp_form_id}`;
    console.log(url);
    let deleteReq = new XMLHttpRequest();
    deleteReq.open('GET',url, true);
    deleteReq.send();
    deleteReq.onload = function(){
        if(deleteReq.status === 200)
        {
            console.log("done delete EXP");
            var loadfull = new XMLHttpRequest();
            loadfull.open('GET', '../controllers/show_exp.php', true);

            loadfull.onload = function(){
                if(loadfull.status === 200)
                {
                    let space = document.getElementById("exp_space");
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

function submitExpForm()
{
    const form = document.forms["exp_form"];
    const formData = new FormData(form);
    for (const pair of formData.entries()) {
        console.log(pair[0] + ': ' + pair[1]);
    }
    console.log(form["exp_from"].value);

    let cer_form_id = form["exp_job"].getAttribute("id");
    formData.append('id',cer_form_id);

    let start_date = form["exp_from"].value;
    let start_parts = start_date.split("-");
    let formatted_start = `${start_parts[0]}-${start_parts[1].padStart(2,'0')}-01`;

    let end_date = form["exp_to"].value;
    let end_parts = end_date.split("-");
    let formatted_end = `${end_parts[0]}-${end_parts[1].padStart(2,'0')}-01`;

    formData.set("exp_from",formatted_start);
    formData.set("exp_to",formatted_end);
    for (const pair of formData.entries()) {
        console.log(pair[0] + ': ' + pair[1]);
    }

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../controllers/add_exp.php', true);

    xhr.onload = function(){
        if(xhr.status === 200)
        {
            var loadfull = new XMLHttpRequest();
            loadfull.open('GET', '../controllers/show_exp.php', true);

            loadfull.onload = function(){
                if(loadfull.status === 200)
                {
                    let space = document.getElementById("exp_space");
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

function updateExp(id)
{
    console.log("update form")
    console.log(id);
    const myForm = document.forms["exp_form"];

    var xhr = new XMLHttpRequest();
    let url = `../controllers/add_exp.php?id=${id}`;
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
            myForm["exp_job"].setAttribute("id", arrRes[0]);
            myForm["exp_job"].setAttribute("value",arrRes[1]);
            myForm["exp_company"].setAttribute("value",arrRes[2]);
            myForm["exp_from"].setAttribute("value",arrRes[3]);
            myForm["exp_to"].setAttribute("value",arrRes[4]);
            myForm["exp_location"].setAttribute("value",arrRes[5]);
            myForm["exp_des"].value = arrRes[6];
        }
        else{
            console.log("error in GEt")
        }
    }
}