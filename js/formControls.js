function clearForm() {
    var elements = document.getElementById('theForm').elements;

    for(var i = 0; i < elements.length; ++i) {
        if (elements[i].type == "checkbox") {
            elements[i].checked = false;
        } else if (elements[i].type != "submit" && elements[i].type != "reset") {
            elements[i].value = ""
        } else if (elements[i].type == "select") {
            elements[i].selectedIndex = 0;
        }
    }
}

function alreadyHaveInfo() {
    var alreadyHave = 'Please use 2011\'s info.';
    var competitorBox = document.getElementsByName('returningCompetitor')[0];
    var elements = document.getElementById('theForm').elements;

    if (!competitorBox.checked) {
        alreadyHave = "";
    }

    for (var i = 0; i < elements.length; ++i) {
        var name = elements[i].name;

        if(name == 'address' || name == 'city' || name== 'state' || name == 'zip' || name== 'country'
            || name == 'phone' || name == 'bio' || name =='height' || name == 'weight'
            || name == 'joustingSince' || name == 'occupation' || name == 'motto') {
            elements[i].value = alreadyHave;
        }
    }
}
