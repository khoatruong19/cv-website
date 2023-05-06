
var xhttp = new XMLHttpRequest();
xhttp.open('GET', '../controllers/show_exp.php', true);

xhttp.onload = function(){
    if(xhttp.status === 200)
    {
        let space = document.getElementById("exp_space");
        space.innerHTML =  xhttp.responseText;
        console.log("heheh")
    }
    else{
        console.log("error");
        console.error('Error: ' + xhttp.status);
    }
}
xhttp.send();


function submitExpForm()
{
    const form = document.forms["exp_form"];
    const formData = new FormData(form);
    for (const pair of formData.entries()) {
        console.log(pair[0] + ': ' + pair[1]);
    }
    console.log(form["exp_from"].value);

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
            let space = document.getElementById("exp_space");
            space.innerHTML +=  xhr.responseText;
            console.log("return status: " + xhr.responseText);
        }
        else{
            console.error('Error: ' + xhr.status);
        }
    }
    xhr.send(formData);
}

