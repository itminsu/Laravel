function validationForm()
{
    var validateFlag = true;
    var formObj = document.forms["form"];
    if(!formObj.terms.checked)
    {
        var errorMsg = "Must accept terms and conditions";
        formObj.terms.parentElement.lastElementChild.innerHTML = errorMsg;
        formObj.terms.parentElement.lastElementChild.style.color="red";
        validateFlag = false;

    }else {
        formObj.terms.parentElement.lastElementChild.innerHTML = "";
        formObj.terms.parentElement.lastElementChild.style.color="";

    }

    var inputArray = formObj.elements;
    for(var i=0; i<inputArray.length; i++) {
        if(inputArray[i].type == "text" || inputArray[i].type == "email") {
            if(inputArray[i].value == "") {
                inputArray[i].style.borderColor="red";
                validateFlag = false;
            }else {
                inputArray[i].style.borderColor=""
            }
        }
    }

    return validateFlag;
}

function activeFunction(id) {
    var activeItem = document.getElementById(id);
    if(activeItem != null)
    {
        activeItem.style.backgroundColor="yellow";
        activeItem.style.fontStyle = "italic";
        activeItem.parentElement.style.textDecoration="underline";
    }
}

function inactiveFunction(id) {
    var activeItem = document.getElementById(id);
    if(activeItem != null) {
        activeItem.style.backgroundColor = "";
        activeItem.style.fontStyle = "normal";
        activeItem.parentElement.style.textDecoration="";
    }
}