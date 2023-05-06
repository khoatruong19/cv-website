
var xhttp_cer = new XMLHttpRequest();
xhttp_cer.open('GET', '../controllers/show_cer.php', true);

xhttp_cer.onload = function(){
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


function submitCerForm()
{
    const form = document.forms["cer_form"];
    const formData = new FormData(form);
    for (const pair of formData.entries()) {
        console.log(pair[0] + ': ' + pair[1]);
    }

    let start_date = form["cer_from"].value;
    let start_parts = start_date.split("-");
    let formatted_start = `${start_parts[0]}-${start_parts[1].padStart(2,'0')}-01`;

    let end_date = form["cer_to"].value;
    let end_parts = end_date.split("-");
    let formatted_end = `${end_parts[0]}-${end_parts[1].padStart(2,'0')}-01`;

    formData.set("cer_from",formatted_start);
    formData.set("cer_to",formatted_end);
    for (const pair of formData.entries()) {
        console.log(pair[0] + ': ' + pair[1]);
    }

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../controllers/add_cer.php', true);

    xhr.onload = function(){
        if(xhr.status === 200)
        {
            let space = document.getElementById("cer_space");
            space.innerHTML +=  xhr.responseText;
            console.log("return status: " + xhr.responseText);
        }
        else{
            console.error('Error: ' + xhr.status);
        }
    }
    xhr.send(formData);
}

