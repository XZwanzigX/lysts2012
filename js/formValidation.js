function validateTextFields() {
    var validationErrors = "";
    var weightRegex = /\d{3}/;
    var phoneRegex = /\(\d{3}\) \d{3}-\d{4}/;
    var joustSinceRegex = /\d{4}/;
    var emailRegex = /\S@\S/;
    var heightRegex = /\d{1}\'\d{2}\"/;

    var elements = document.getElementById('theForm').elements;

    for (var i = 0; i < elements.length; ++i) {
        var e = elements[i];
        if (e.id == 'weight' && !e.value.match(weightRegex)) {
            validationErrors = validationErrors + "Please enter a valid value for Weight.\n";
        } else if (e.id == 'phone' && !e.value.match(phoneRegex)) {
            validationErrors += "Please enter a valid Phone number\n";
        } else if (e.id == 'joustingSince' && !e.value.match(joustSinceRegex)) {
            validationErrors += "Please enter a 4 digit year when you started jousting\n";
        } else if (e.id == 'email' && !e.value.match(emailRegex)) {
            validationErrors += "Please enter a valid email so that we can get in touch with you!\n";
        } else if (e.id == 'height' && !e.value.match(heightRegex)) {
            validationErrors += "Please enter your height in the form X\'X\"\n";
        } else if ((e.id != 'softKitPic' && e.id != 'armsPic' && e.id !='closeUpPic' && e.id != 'armourPic') && !e.value.match(/\S/)) {
            validationErrors += "Please enter a value for " + e.name + "\n";
        }

    }

    return validationErrors;
}

function validateFiles() {
    var validationErrors = '';
    var fileRegEx = /([^\s]+\.(jpg|jpeg|png|gif)$)/;

    var elements = document.getElementById('theForm').elements;

    for(var i = 0; i < elements.length; ++i) {
        if(elements[i].id.match(/armourPic|softKitPic|closeUpPic|armsPic/) && !elements[i].value.match(fileRegEx)) {
            validationErrors += 'Please upload an image for '+ elements[i].name + "\n";
        }
    }

    return validationErrors;
}

function ensureEventIsSelected() {
    var saa = document.getElementById('saa').checked;
    var melee = document.getElementById('melee').checked;
    var joust = document.getElementById('joust').checked;

    if (!saa && !melee && !joust) {
        return 'You must select at least one event to compete in!\n';
    }
    return '';
}

function validateForm() {
    var validationErrors = "";

    validationErrors += validateTextFields()
                        + ensureEventIsSelected()
                        + validateFiles();

    if (validationErrors != "") {
        alert(validationErrors);
        return false;
    }

    return true;
}