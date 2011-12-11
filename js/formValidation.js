function validateTextFields() {
    var validationErrors = "";
    var weightRegex = /\d{3}/;
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
        } else if (validateItem && (e.name != 'softKitPic'
                                    && e.name != 'armsPic'
                                    && e.name !='closeUpPic'
                                    && e.name != 'armourPic'
                                    && e.name != 'themeMusic'
                                    && e.name !='haulingHorses'
                                    && e.name != 'ijlMember'
                                    && e.name != 'song'
                                    && e.name != 'artist'
                                    && e.name != 'startTime'
                                    && e.name != 'endTime'
                                    && e.name != 'favDrink'
                                    && e.name != 'returningCompetitor') && !e.value.match(/\S/)) {
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

function themeMusicDataProvided() {
   return document.getElementsByName('song')[0].value != ""
          && document.getElementsByName('artist')[0].value != ""
          && document.getElementsByName('startTime')[0].value != ""
          && document.getElementsByName('endTime')[0].value != "";
}

function validateTimes() {
    var validationErrors = '';
    if (document.getElementsByName('themeMusic')[0].value != "") {return validationErrors;}
    var timeSig = /\d*:\d{2}/;
    var startTime = document.getElementsByName('startTime')[0].value;
    var endTime = document.getElementsByName('endTime')[0].value;

    if (startTime != "" && !startTime.match(timeSig)) {
        validationErrors += 'Please enter valid value for start time MM:SS\n';
    }

    if (endTime != "" && !endTime.match(timeSig)) {
        validationErrors += 'Please enter valid value for end time MM:SS\n';
    }
    return validationErrors
}

function validateFiles() {
    var validationErrors = '';
    var fileRegEx = /(\.(jpg|jpeg|png|gif)$)/i;
    var mp3Regex = /(\.mp3$)/i;

    var elements = document.getElementById('theForm').elements;
    var useLastYearInfo = document.getElementsByName('returningCompetitor')[0].checked;

    for(var i = 0; i < elements.length; ++i) {
        var validateItem = useLastYearInfo ? (elements[i].value  != '') : true;

        if(validateItem && elements[i].name.match(/armourPic|softKitPic|closeUpPic|armsPic/) && !elements[i].value.match(fileRegEx)) {
            validationErrors += 'Please upload an image for '+ elements[i].id + "\n";
        } else if (elements[i].name == 'themeMusic' && (!elements[i].value.match(mp3Regex) && !themeMusicDataProvided())) {
            validationErrors += 'Please either upload an mp3 for ' + elements[i].id + " or provide Song, artist, start and stop time\n";
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

function ensureHaulingAndStallsAgree(){
    var isHauling = document.getElementsByName('haulingHorses')[0].value == 1;
    var stalls = document.getElementsByName('stalls')[0].value;

    if (isHauling && stalls == 0) {
        return 'Please select how many stalls you will need for the horses you are bringing in.\n';
    } else {
        return '';
    }
}

function ensureHaulingIsAnswered(){
    var haulingAnswered = document.getElementsByName('haulingHorses')[0].value != "";

    if (!haulingAnswered) {
        return 'Please indicate whether you will be hauling in horses to the tournament.\n'
    } else {
        return '';
    }
}

function ensureIjlMemberIsAnswered() {
    var ijlMemberAnswered = document.getElementsByName('ijlMember')[0].value != "";

    if (!ijlMemberAnswered) {
        return 'Please indicate whether you are a IJL member.\n';
    } else {
        return '';
    }
}

function validateForm() {
    var validationErrors = "";

    if (!document.getElementsByName('terms')[0].checked) {
        validationErrors += 'You must agree to the rules before your application can be submitted.';
        alert(validationErrors);
        return false;
    }

    validationErrors += validateTextFields()
                        + validatePhoneNumber()
                        + ensureEventIsSelected()
                        + ensureHaulingAndStallsAgree()
                        + ensureHaulingIsAnswered()
                        + ensureIjlMemberIsAnswered()
                        + validateTimes()
                        + validateFiles();

    if (validationErrors != "") {
        alert(validationErrors);
        return false;
    }

    return true;
}