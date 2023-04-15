function validateForm(e) {
    e.preventDefault();
    var name = document.forms["loginForm"]["name"].value;
    var password = document.forms["loginForm"]["password"].value;

    if (!name.match(/^[a-zA-Z][a-zA-Z0-9]{7,}$/)) {
        alert("Username should contain at least 8 characters and must start with a letter.");
        return false;
    }

    if (!password.match(/^[a-zA-Z0-9]{8,}$/)) {
        alert("Password should contain at least 8 characters.");
        return false;
    }
    console.log("hello")
    return true;
}
