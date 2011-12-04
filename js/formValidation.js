function validateTextFields() {
    var validationErrors = "";
    var weightRegex = /\d{3}/;
    var phoneRegex = /\(\d{3}\) \d{3}-\d{4}/;
    var joustSinceRegex = /\d{4}/;
    var emailRegex = /\S@\S/;
    var heightRegex = /\d{1}\'\d+\"/;

    var elements = document.getElementById('theForm').elements;
    var useLastYearInfo = document.getElementsByName('returningCompetitor')[0].checked;

    for (var i = 0; i < elements.length; ++i) {
        var e = elements[i];
        var validateItem = useLastYearInfo ? (e.value != 'Please use 2011\'s info.') : true;

        if (validateItem && e.name == 'weight' && !e.value.match(weightRegex) ) {
            validationErrors = validationErrors + "Please enter a valid value for Weight.\n";
        } else if (validateItem && e.name == 'joustingSince' && !e.value.match(joustSinceRegex)) {
            validationErrors += "Please enter a 4 digit year when you started jousting\n";
        } else if (e.name == 'email' && !e.value.match(emailRegex)) {
            validationErrors += "Please enter a valid email so that we can get in touch with you!\n";
        } else if (validateItem && e.name == 'height' && !e.value.match(heightRegex)) {
            validationErrors += "Please enter your height in the form X\'X\"\n";
        } else if (validateItem && (e.name != 'softKitPic' && e.name != 'armsPic' && e.name !='closeUpPic' && e.name != 'armourPic') && !e.value.match(/\S/)) {
            validationErrors += "Please enter a value for " + e.id + "\n";
        }

    }

    return validationErrors;
}

function validatePhoneNumber() {
    try {
        var useLastYearInfo = document.getElementsByName('returningCompetitor')[0].checked;
        var phone = document.getElementsByName('phone')[0];
        var validatePhone = useLastYearInfo ? phone.value != 'Please use 2011\'s info.' : true;

        if(!validatePhone) { return ''; }

        var PNF = i18n.phonenumbers.PhoneNumberFormat;
        var phoneNumber = phone.value;
        var regionCode = document.getElementsByName('country')[0].value;

        var phoneUtil = i18n.phonenumbers.PhoneNumberUtil.getInstance();
        var number = phoneUtil.parseAndKeepRawInput(phoneNumber, regionCode);
        var isValid = phoneUtil.isValidNumberForRegion(number, regionCode);

        if (isValid) {
            phone.value = phoneUtil.format(number, PNF.INTERNATIONAL);
        }

        return isValid ? '' : "Please enter a valid phone number for " + regionCode;
    } catch (e){
        return 'Please enter a valid phone number.\n';
    }
}

function validateFiles() {
    var validationErrors = '';
    var fileRegEx = /([^\s]+\.(jpg|jpeg|png|gif)$)/;

    var elements = document.getElementById('theForm').elements;
    var useLastYearInfo = document.getElementsByName('returningCompetitor')[0].checked;

    for(var i = 0; i < elements.length; ++i) {
        var validateItem = useLastYearInfo ? (elements[i].value  != '') : true;

        if(validateItem && elements[i].name.match(/armourPic|softKitPic|closeUpPic|armsPic/) && !elements[i].value.match(fileRegEx)) {
            validationErrors += 'Please upload an image for '+ elements[i].id + "\n";
        }
    }

    return validationErrors;
}

function ensureEventIsSelected() {
    var saa = document.getElementsByName('saa')[0].checked;
    var melee = document.getElementsByName('melee')[0].checked;
    var joust = document.getElementsByName('joust')[0].checked;

    if (!saa && !melee && !joust) {
        return 'You must select at least one event to compete in!\n';
    }
    return '';
}

function validateForm() {
    var validationErrors = "";

    validationErrors += validateTextFields()
                        + validatePhoneNumber()
                        + ensureEventIsSelected()
                        + validateFiles();

    if (validationErrors != "") {
        alert(validationErrors);
        return false;
    }

    return true;
}