
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


function submitEduForm()
{
    const form = document.forms["edu_form"];
    const formData = new FormData(form);
    for (const pair of formData.entries()) {
        console.log(pair[0] + ': ' + pair[1]);
    }

    let start_date = form["edu_from"].value;
    let start_parts = start_date.split("-");
    let formatted_start = `${start_parts[0]}-${start_parts[1].padStart(2,'0')}-01`;

    let end_date = form["edu_to"].value;
    let end_parts = end_date.split("-");
    let formatted_end = `${end_parts[0]}-${end_parts[1].padStart(2,'0')}-01`;

    formData.set("edu_from",formatted_start);
    formData.set("edu_to",formatted_end);
    for (const pair of formData.entries()) {
        console.log(pair[0] + ': ' + pair[1]);
    }

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../controllers/add_edu.php', true);

    xhr.onload = function(){
        if(xhr.status === 200)
        {
            let space = document.getElementById("edu_space");
            space.innerHTML +=  xhr.responseText;
            console.log("return status: " + xhr.responseText);
        }
        else{
            console.error('Error: ' + xhr.status);
        }
    }
    xhr.send(formData);
}

