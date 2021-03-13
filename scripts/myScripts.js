/*
This javascript holds all the validation
for the order form
 */

let form = document.getElementById("sushi");
form.onsubmit = validate;


function validate() {
    let isValid = true;

    clearErrors();

    nameRequirements();
    emailRequirements();
    phoneRequirements();

    rollOrder();
    adultOrder();

    // form is valid to submit
    return isValid;
}

//make error messaged invisible
function clearErrors() {
    let errors = document.getElementsByClassName("text-danger");
    for(let i=0; i<errors.length; i++) {
        errors[i].classList.add("d-none");
    }
}

//Are there any empty fields?
function checkEmpties(check, error) {
    if(check == "") {
        fillError(error, "Field Required.")
    }
}

//function to fill the error message and set isValid to false
function fillError(errorText, warning) {
    let response = document.getElementById(errorText);
    response.textContent = warning;
    response.classList.remove("d-none");
    isValid = false;
}


// First and Last name required
function nameRequirements() {
    let first = document.getElementById("fname").value;
    let last = document.getElementById("lname").value;

    //get the value of the first name
    checkEmpties(first, "errfname");

    //get the value of the last name
    checkEmpties(last, "errlname");
}

//Email address must contain '@' and '.'
function emailRequirements() {
    let email = document.getElementById("email").value;
    if(!email.includes("@") && !email.includes(".")){
        fillError("erremail", "Please enter a valid email.")
    }
}

function phoneRequirements() {
    let phone = document.getElementById("phone").value;
    if(phone.length !== 10) {
        fillError("errPhone", "Please enter the number in format 1234567890.")
    }
}

// MEAL ORDER VALIDATION //

//Make sre the minimum requirements are met
function rollOrder() {
    let drink = document.getElementById("drink").value;
    let mRoll = document.getElementById("froll").value;
    let sRoll = document.getElementById("sroll").value;
    if(mRoll === "none" || sRoll === "none" || drink==="none") {
       fillError("incomplete", "Order Incomplete")
    }
}

//If the option of adult meal is chosen, validate
function adultOrder() {
    let terms = document.getElementById("terms").checked;
    if(terms) {
       // alcoholOrder();
        dobRequirements();
    }

}

function alcoholOrder() {
    let alcohol = document.getElementById("alcohol");
    if (!alcohol) {
        fillError("erralc","Please choose an alcohol.")
    }
}

//Date of birth
function dobRequirements() {
    let birthdate = document.getElementById("birthday").value;

    // First check for the pattern
        if (/^\d{1,2}\/\d{1,2}\/\d{4}$/.test(birthdate)) {
            let userAge = getAge(birthdate);
            if (userAge < 21) {
                fillError("errAge", "You must be 21 to purchase an adult meal.")
            }
        } else {
            fillError( "errAge", "Please use format 00/00/0000");
        }
}

function getAge(dateString) {
    let today = new Date();
    let birthDate = new Date(dateString);
    let age = today.getFullYear() - birthDate.getFullYear();
    let m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    return age;
}

