function clearForm() {
	    document.contactForm.txtName.value = "";
	    document.contactForm.txtPhone.value = "";
	    document.contactForm.txtEmail.value = "";
	    document.contactForm.txtMsg.value = "";
}

function validateAndSubmit() {
    var theForm = document.contactForm;

    if (theForm.txtName.value == "") {
       alert("Please enter your Name!");
       theForm.txtName.setFocus();
    }
    else if (theForm.txtEmail.value == "") {
       alert("Please enter an email address for us to email you back at!");
       theForm.txtName.setFocus();
    }
    else {
       theForm.submit();
    }
}