var newSiteInfo = function () {
    var siteInfo = {};

    Object.defineProperties(siteInfo, {
        "userInputType": {
            value: "",
            writable: true
        },
        "userInputId": {
            value: "",
            writable: true
        },
        "userInputName": {
            value: "",
            writable: true
        },
        "userInputXpath": {
            value: "",
            writable: true
        },

        "passwordInputType": {
            value: "",
            writable: true
        },
        "passwordInputId": {
            value: "",
            writable: true
        },
        "passwordInputName": {
            value: "",
            writable: true
        },
        "passwordInputXpath": {
            value: "",
            writable: true
        },

        "submitInputType": {
            value: "",
            writable: true
        },
        "submitInputId": {
            value: "",
            writable: true
        },
        "submitInputName": {
            value: "",
            writable: true
        },
        "submitInputValue": {
            value: "",
            writable: true
        },
        "submitInputXpath": {
            value: "",
            writable: true
        },

        "formName": {
            value: "",
            writable: true
        },
        "formId": {
            value: "",
            writable: true
        },
        "formMethod": {
            value: "",
            writable: true
        },
        "formAction": {
            value: "",
            writable: true
        },
        "formXpath": {
            value: "",
            writable: true
        },

        "parentDivId": {
            value: "",
            writable: true
        },
        "parentDivName": {
            value: "",
            writable: true
        },

        "popupName": {
            value: "",
            writable: true
        },
        "popupUrl": {
            value: "",
            writable: true
        }
    });
    return siteInfo;
};

(function () {
    var typeContent, BoxPositionX = ['right', '0px'], DragBox, av_detach_method_handlers = [], siteInfo, foundPassword, siteInfos = [], DialogDiv, ParentDiv,
        foundFormWithPassword = false, FontStyle = ['font', '13px Trebuchet MS, Helvetica,sans-serif'],
        FontStyleInput = ['font', '14px monospace'], FrameTest, Area, formList,
        Target = (document !== undefined) ? document : false, passwordForms = [],
        TargetWindow = (window !== undefined) ? window : false, FrameCount = window.frames.length - document.getElementsByTagName('iframe').length, Frames = (FrameCount) ? [] : [Target], Debug = [], MaxArea = 0, FontStyleSmall = ['font', '11px Trebuchet MS, Helvetica,sans-serif'], FontStyleToolbarLink = [FontStyleSmall, ['color', 'black'], ['fontWeight', 'normal'], ['textDecoration', 'underline'], ['borderWidth', '0'], ['cursor', 'pointer']];

    function av_getTarger() {
        for (i = 0; i < window.frames.length; i = i + 1) {
            try {
                FrameTest = window.frames[i].src;
                if (FrameCount) {
                    Area = (window.frames[i].innerHeight) ? window.frames[i].innerHeight * window.frames[i].innerWidth : window.frames[i].document.body.clientHeight * window.frames[i].document.body.clientWidth;
                    if (Area > MaxArea) {
                        Target = window.frames[i].document;
                        TargetWindow = window.frames[i];
                        MaxArea = Area;
                    }
                }
                Frames.push(window.frames[i].document);
            } catch (err) {
                Debug.push('EXT_FRAME');
            }
        }
    }

    function av_findPasswordForms() {
        var str = '', elem;
        for (var i = 0; i < formsList.length; i++) {
            elem = formsList[i];
            console.log("Form name -> " + elem.name);
            for (var k = 0; (k < elem.length) && !foundFormWithPassword; k++) {
                if (elem[k].type === 'password') {
                    foundFormWithPassword = true;
                    passwordForms.push(elem);
                }
            }

            for (var h = 0; (h < elem.length) && !foundFormWithPassword; h++) {
                fieldName = elem[h].name.toLowerCase();
                fieldId = elem[h].id.toLowerCase();
                if (fieldName.indexOf('pass') !== -1 || fieldId.indexOf('pass') !== -1) {
                    foundFormWithPassword = true;
                    passwordForms.push(elem);
                }
            }
        }

        var passwordInputs = getPwdInputs();
        if(passwordInputs != undefined && passwordInputs.length > 0)
            foundFormWithPassword = true;
    }

    function av_buildPasswordSiteInfo() {
        var att, inputs, i,m,elem,str,str2,foundPassword = false,foundUser = false,siteInfo,foundSubmit,submitButtonCnt = 0,submitCnt = 0, passwordCnt = 0;
        for (var j = 0; j < passwordForms.length; j++) {
            foundPassword = false;
            foundSubmit = false;
            siteInfo = new newSiteInfo();
            elem = passwordForms[j];
            str += "**** Form **** " + "\n";
            str += "ID: " + elem.id + "\n";
            str += "Action: " + elem.action + "\n";
            str += "Method: " + elem.method + "\n";
            str += "\n";
            console.log(str);
            if(elem.name != undefined) {
                if(elem.name.id != undefined) {
                    siteInfo.formName = elem.name.id;
                    console.log("   Form name -> " + elem.name.id);
                } else {
                    siteInfo.formName = elem.name;
                    console.log("   Form name -> " + elem.name);
                }
            }
            siteInfo.formAction = elem.action;
            siteInfo.formId = elem.id;
            siteInfo.formMethod = elem.method;
            siteInfo.formMethodXpath = getElementTreeXPath(elem);

            inputs = elem.getElementsByTagName('input');
            for (var l = 0; l < inputs.length; l++) {
                console.log("1st - elem.type: " +inputs[l].type);
                if (inputs[l].type === 'password') {
                    str += "**** Password Input Field **** " + "\n";
                    str += "Type: " + inputs[l].type + "\n";
                    str += "Name: " + inputs[l].name + "\n";
                    str += "Value: " + inputs[l].value + "\n";
                    str += "ID: " + inputs[l].id + "\n";
                    str += "\n";
                    console.log(str);
                    siteInfo.passwordInputId = inputs[l].id;
                    siteInfo.passwordInputName = inputs[l].name;
                    siteInfo.passwordInputType = inputs[l].type;
                    siteInfo.passwordInputXpath = getElementTreeXPath(inputs[l]);
                    console.log("   Found Password Field: " +siteInfo.passwordInputType);
                    console.log("      Password Field: " +siteInfo.passwordInputXpath);
                    passwordCnt = passwordCnt + 1;
                    foundPassword = true;
                }
                else if (inputs[l].type === 'submit') {
                    str += "**** Submit Input Field **** " + "\n";
                    str += "Name: " + inputs[l].name + "\n";
                    str += "Value: " + inputs[l].value + "\n";
                    str += "ID: " + inputs[l].id + "\n";
                    
                    siteInfo.submitInputId = inputs[l].id;
                    siteInfo.submitInputName = inputs[l].name;
                    siteInfo.submitInputValue = inputs[l].value;
                    siteInfo.submitInputXpath = getElementTreeXPath(inputs[l]);
                    if(inputs[l].nodeName == 'BUTTON') {
                        str += "Type: button\n";
                        siteInfo.submitInputType = "button";
                    }
                    else {
                        str += "Type: " + inputs[l].type + "\n";
                        siteInfo.submitInputType = inputs[l].type;
                    }
                    str += "\n";
                    console.log(str);
                    foundSubmit = true;
                    submitCnt = submitCnt + 1;
                }
            }

            if (!foundPassword) {
                for (m = 0; (m < elem.length) && !foundPassword; m++) {
                    if (elem[m].type === 'text') {
                        fieldName = elem[m].name.toLowerCase();
                        fieldId = elem[m].id.toLowerCase();
                        if (fieldName.indexOf('pass') !== -1 || fieldId.indexOf('pass') !== -1) {
                            str += "**** Password Input Field **** " + "\n";
                            str += "Type: " + elem[m].type + "\n";
                            str += "Name: " + elem[m].name + "\n";
                            str += "Value: " + elem[m].value + "\n";
                            str += "ID: " + elem[m].id + "\n";
                            str += "\n";
                            siteInfo.passwordInputId = elem[m].id;
                            siteInfo.passwordInputName = elem[m].name;
                            siteInfo.passwordInputType = elem[m].type;
                            siteInfo.passwordInputXpath = getElementTreeXPath(elem[m]);
                            console.log(str);
                            foundPassword = true;
                        }
                    }
                }
            }

            if (foundPassword && !foundSubmit) {
                console.log("Submit not found: looking for images");
                for (m = 0; m < inputs.length; m++) {
                    console.log("   Image inputs.type: " +inputs[m].type);
                    if(inputs[m].name != undefined)
                        console.log("       Image input.name: " +inputs[m].name);
                    if (inputs[m].type === 'image') {
                        str += "**** Image attributes **** " + "\n";
                        for (i = 0; i < inputs[m].attributes.length; i++) {

                            att = inputs[m].attributes[i];
                            if (att.specified == true) {
                                str += "Attribute Name: " + att.name +"Attribute Value: " + att.value + "\n";
                            }
                        }
                        console.log(str);
                        if(inputs[m].name != undefined) {
                            str2 = inputs[m].name.toLowerCase();
                            if((str2.indexOf("log") > -1) || (str2.indexOf("sign")  > -1)
                                || (str2.indexOf("submit")  > -1)) {
                                siteInfo.submitInputId = inputs[m].id;
                                siteInfo.submitInputName = inputs[m].name;
                                siteInfo.submitInputValue = inputs[m].value;
                                siteInfo.submitInputXpath = getElementTreeXPath(inputs[m]);
                                foundSubmit = true;
                                submitCnt = submitCnt + 1;
                            }
                        }
                        if(inputs[m].value != undefined && foundSubmit == false) {
                            str2 = inputs[m].value.toLowerCase();
                            if((str2.indexOf("log") > -1) || (str2.indexOf("sign")  > -1)
                                || (str2.indexOf("submit")  > -1)) {
                                siteInfo.submitInputId = inputs[m].id;
                                siteInfo.submitInputName = inputs[m].name;
                                siteInfo.submitInputValue = inputs[m].value;
                                siteInfo.submitInputXpath = getElementTreeXPath(inputs[m]);
                                foundSubmit = true;
                                submitCnt = submitCnt + 1;
                            }
                        }
                        if(inputs[m].alt != undefined && foundSubmit == false) {
                            str2 = inputs[m].alt.toLowerCase();
                            if((str2.indexOf("log") > -1) || (str2.indexOf("sign")  > -1)
                                || (str2.indexOf("submit")  > -1)) {
                                siteInfo.submitInputId = inputs[m].id;
                                siteInfo.submitInputName = inputs[m].name;
                                siteInfo.submitInputValue = inputs[m].value;
                                siteInfo.submitInputXpath = getElementTreeXPath(inputs[m]);
                                foundSubmit = true;
                                submitCnt = submitCnt + 1;
                            }
                        }
                    }
                }
            }

            if (foundPassword && !foundSubmit) {
                console.log("Submit not found: looking for buttons");
                for (m = 0; m < inputs.length; m++) {
                    console.log("   Button inputs.type: " +inputs[m].type);
                    if(inputs[m].name != undefined)
                        console.log("       Button input.name: " +inputs[m].name);
                    if (inputs[m].type === 'button') {
                        str += "**** Button attributes **** " + "\n";
                        for (i = 0; i < inputs[m].attributes.length; i++) {

                            att = inputs[m].attributes[i];
                            if (att.specified == true) {
                                str += "Attribute Name: " + att.name +"Attribute Value: " + att.value + "\n";
                            }
                        }
                        console.log(str);
                        if(inputs[m].name != undefined) {
                            str2 = inputs[m].name.toLowerCase();
                            if((str2.indexOf("log") > -1) || (str2.indexOf("sign")  > -1)
                                || (str2.indexOf("submit")  > -1)) {
                                siteInfo.submitInputId = inputs[m].id;
                                siteInfo.submitInputName = inputs[m].name;
                                siteInfo.submitInputValue = inputs[m].value;
                                siteInfo.submitInputXpath = getElementTreeXPath(inputs[m]);
                                foundSubmit = true;
                                submitCnt = submitCnt + 1;
                            }
                        }
                        if(inputs[m].value != undefined && foundSubmit == false) {
                            str2 = inputs[m].value.toLowerCase();
                            if((str2.indexOf("log") > -1) || (str2.indexOf("sign")  > -1)
                                || (str2.indexOf("submit")  > -1)) {
                                siteInfo.submitInputId = inputs[m].id;
                                siteInfo.submitInputName = inputs[m].name;
                                siteInfo.submitInputValue = inputs[m].value;
                                siteInfo.submitInputXpath = getElementTreeXPath(inputs[m]);
                                foundSubmit = true;
                                submitCnt = submitCnt + 1;
                            }
                        }
                        if(inputs[m].alt != undefined && foundSubmit == false) {
                            str2 = inputs[m].alt.toLowerCase();
                            if((str2.indexOf("log") > -1) || (str2.indexOf("sign")  > -1)
                                || (str2.indexOf("submit")  > -1)) {
                                siteInfo.submitInputId = inputs[m].id;
                                siteInfo.submitInputName = inputs[m].name;
                                siteInfo.submitInputValue = inputs[m].value;
                                siteInfo.submitInputXpath = getElementTreeXPath(inputs[m]);
                                foundSubmit = true;
                                submitCnt = submitCnt + 1;
                            }
                        }
                    }
                }
            }

            if (foundPassword && !foundSubmit) {
                str = '';
                for(i = 0; i < elem.length; i++)
                {
                    if(elem[i].nodeName.toLowerCase() == 'button') {
                        console.log("   Possible Submit buttons");
                        console.log("       Node Type:" + elem[i].nodeType);
                        console.log("       Type:" + elem[i].type);
                        console.log("       Name:" + elem[i].name);
                        console.log("       Value:" + elem[i].value);
                        console.log("       Id:" + elem[i].id);
                        console.log("");
                        siteInfo.submitInputId = elem[i].id;
                        siteInfo.submitInputName = elem[i].name;
                        siteInfo.submitInputValue = elem[i].value;
                        siteInfo.submitInputXpath = getElementTreeXPath(elem[i]);
                        foundSubmit = true;
                        submitButtonCnt = submitButtonCnt + 1;
                    }
                }
                console.log(str);
            }
        }

        if (!foundPassword) {
            var passwordFields = getPwdInputs();
            if(passwordFields != undefined && passwordFields.length > 0) {
                if(passwordFields.length == 1) {
                    siteInfo = new newSiteInfo();
                    siteInfo.passwordInputId = passwordFields[0].id;
                    siteInfo.passwordInputName = passwordFields[0].name;
                    siteInfo.passwordInputType = passwordFields[0].type;
                    console.log("Looking for random Password Inputs");
                    siteInfo.passwordInputXpath = getElementTreeXPath(passwordFields[0]);
                    console.log("Found Password Field: " +siteInfo.passwordInputType);
                    console.log("      Password Field: " +siteInfo.passwordInputXpath);
                    passwordCnt = passwordCnt + 1;
                    foundPassword = true;

                    var parentDiv = upTo(passwordFields[0], 'div');
                    if(parentDiv) {
                        var children = parentDiv.getElementsByTagName("input");
                        for (m = 0; m < children.length; m++) {
                            if ( children[m].type === 'email' ||  children[m].type === 'text') {
                                fieldName = children[m].name.toLowerCase();
                                fieldId = children[m].id.toLowerCase();
                                if (fieldName.indexOf('name') !== -1 || fieldId.indexOf('name') !== -1
                                    || fieldName.indexOf('user') !== -1 || fieldId.indexOf('user') !== -1
                                    || fieldName.indexOf('email') !== -1 || fieldId.indexOf('email') !== -1
                                    || fieldName.indexOf('id') !== -1 || fieldId.indexOf('id') !== -1
                                    || fieldName.indexOf('login') !== -1 || fieldId.indexOf('login') !== -1
                                    || fieldName.indexOf('credential') !== -1) {
                                    siteInfo.userInputId = children[m].id;
                                    siteInfo.userInputName = children[m].name;
                                    siteInfo.userInputType = children[m].type;
                                    siteInfo.userInputXpath = getElementTreeXPath(children[m]);
                                    console.log("Found User Field no form: " +children[m].type);
                                    console.log("      User Field no form: " +siteInfo.userInputXpath);
                                    foundUser = true;
                                }
                            }
                            else if (children[m].type === 'submit' || children[m].type === 'button') {
                                str += "**** Submit Input Field **** " + "\n";
                                str += "Name: " + children[m].name + "\n";
                                str += "Value: " + children[m].value + "\n";
                                str += "ID: " + children[m].id + "\n";

                                siteInfo.submitInputId = children[m].id;
                                siteInfo.submitInputName = children[m].name;
                                siteInfo.submitInputValue = children[m].value;
                                siteInfo.submitInputXpath = getElementTreeXPath(children[m]);
                                if(children[m].nodeName == 'BUTTON') {
                                    str += "Type: button\n";
                                    siteInfo.submitInputType = "button";
                                }
                                else {
                                    str += "Type: " + children[m].type + "\n";
                                    siteInfo.submitInputType = children[m].type;
                                }
                                str += "\n";
                                console.log(str);
                                foundSubmit = true;
                                submitCnt = submitCnt + 1;
                                console.log("Found Submit Field no form");
                            }
                        }
                    }
                }
            }
            else
                alert('Found no Password Inputs');
        }

        if(passwordCnt > 1)
            alert("Found: " +passwordCnt +" password inputs");

        if(submitCnt > 1)
            alert("Found: " +submitCnt +" submit inputs");

        if(!foundSubmit)
            alert("No submit found");

        if (foundPassword && !foundUser) {
            if (!find_user_input(inputs, siteInfo))
                alert("Problem with finding User Input");
        }

        if(siteInfo != undefined)
            siteInfos.push(siteInfo);

        return siteInfo;
    }

    function find_user_input(theForm, siteInfo) {
        var fieldName, fieldId, foundUserCount = 0;
        for (var i = 0; i < theForm.length; i++) {
            if (theForm[i].type === 'email' || theForm[i].type === 'text') {
                fieldName = theForm[i].name.toLowerCase();
                fieldId = theForm[i].id.toLowerCase();
                if (fieldName.indexOf('name') !== -1 || fieldId.indexOf('name') !== -1
                    || fieldName.indexOf('user') !== -1 || fieldId.indexOf('user') !== -1
                    || fieldName.indexOf('email') !== -1 || fieldId.indexOf('email') !== -1
                    || fieldName.indexOf('id') !== -1 || fieldId.indexOf('id') !== -1
                    || fieldName.indexOf('login') !== -1 || fieldId.indexOf('login') !== -1
                    || fieldName.indexOf('credential') !== -1) {
                    siteInfo.userInputId = theForm[i].id;
                    siteInfo.userInputName = theForm[i].name;
                    siteInfo.userInputType = theForm[i].type;
                    siteInfo.userInputXpath = getElementTreeXPath(theForm[i]);
                    console.log("Found User Field: " +theForm[i].type);
                    console.log("      User Field: " +siteInfo.userInputXpath);
                    foundUserCount++;
                }
            }
        }
        if(foundUserCount > 1) {
            alert("Found: " +foundUserCount +" user inputs");
            return true;
        }
        else
            return foundUserCount === 1;
    }

    function av_update_site_info(e) {
        console.log(e.currentTarget.value);
        console.log(e.currentTarget.id);

        var num = Target.getElementById('av_submit_form').getAttribute('data-id');
        if (e.currentTarget.id == 'passwordInputId')
            siteInfos[num].passwordInputId = e.currentTarget.value;

        if (e.currentTarget.id == 'passwordInputType')
            siteInfos[num].passwordInputType = e.currentTarget.value;

        if (e.currentTarget.id == 'passwordInputName')
            siteInfos[num].passwordInputName = e.currentTarget.value;

        if (e.currentTarget.id == 'passwordInputXpath')
            siteInfos[num].passwordInputXpath = e.currentTarget.value;

        if (e.currentTarget.id == 'userInputId')
            siteInfos[num].userInputId = e.currentTarget.value;

        if (e.currentTarget.id == 'userInputType')
            siteInfos[num].userInputType = e.currentTarget.value;

        if (e.currentTarget.id == 'userInputName')
            siteInfos[num].userInputName = e.currentTarget.value;

        if (e.currentTarget.id == 'userInputXpath')
            siteInfos[num].userInputXpath = e.currentTarget.value;

        if (e.currentTarget.id == 'submitInputId')
            siteInfos[num].submitInputId = e.currentTarget.value;

        if (e.currentTarget.id == 'submitInputType')
            siteInfos[num].submitInputType = e.currentTarget.value;

        if (e.currentTarget.id == 'submitInputName')
            siteInfos[num].submitInputName = e.currentTarget.value;

        if (e.currentTarget.id == 'submitInputValue')
            siteInfos[num].submitInputValue = e.currentTarget.value;

        if (e.currentTarget.id == 'submitInputXpath')
            siteInfos[num].submitInputXpath = e.currentTarget.value;

        if (e.currentTarget.id == 'formName')
            siteInfos[num].formName = e.currentTarget.value;

        if (e.currentTarget.id == 'formId')
            siteInfos[num].formId = e.currentTarget.value;

        if (e.currentTarget.id == 'formMethod')
            siteInfos[num].formMethod = e.currentTarget.value;

        if (e.currentTarget.id == 'formAction')
            siteInfos[num].formAction = e.currentTarget.value;

        if (e.currentTarget.id == 'formXpath')
            siteInfos[num].formXpath = e.currentTarget.value;
    }

    function av_site_dialog(siteInfo, num) {
        var Content = av_make('div', [
            ['id', 'av_account_login_div']
        ], [
            ['margin', '3px'],
            ['padding', '8px'],
            ['width', 'auto'],
            ['color', ' #000'],
            ['borderRadius', '11px 11px 11px 11px'],
            FontStyle
        ], [], [av_make('form', [
            ['id', 'av_login_form']
        ], [
            ['margin', '0'],
            ['padding', '0']
        ], [
        ],
            [
                av_make('div', [
                    ['id', 'av_user_pass_div']
                ], [
                    ['height', '250px'],
                    ['overflow', 'auto']
                ], [], [
                    Target.createTextNode('Password Input - ID'),
                    av_make('input', [
                        ['id', 'passwordInputId'],
                        ['value', siteInfo.passwordInputId]
                    ], [
                        ['margin', '8px 5px 8px 0'],
                        ['width', '90%'],
                        ['padding', '5px'],
                        FontStyleInput
                    ], [['blur', av_update_site_info]], []),
                    Target.createTextNode('Password Input - Type'),
                    av_make('input', [
                        ['id', 'passwordInputType'],
                        ['value', siteInfo.passwordInputType]
                    ], [
                        ['margin', '8px 5px 8px 0'],
                        ['padding', '5px'],
                        ['width', '90%'],
                        FontStyleInput
                    ], [['blur', av_update_site_info]], []),
                    Target.createTextNode('Password Input - Name'),
                    av_make('input', [
                        ['id', 'passwordInputName'],
                        ['value', siteInfo.passwordInputName]
                    ], [
                        ['margin', '8px 5px 8px 0'],
                        ['padding', '5px'],
                        ['width', '90%'],
                        FontStyleInput
                    ], [['blur', av_update_site_info]], []),
                    Target.createTextNode('Password Input - XPath'),
                    av_make('input', [
                        ['id', 'passwordInputXpath'],
                        ['value', siteInfo.passwordInputXpath]
                    ], [
                        ['margin', '8px 5px 8px 0'],
                        ['padding', '5px'],
                        ['width', '90%'],
                        FontStyleInput
                    ], [['blur', av_update_site_info]], []),

                    Target.createTextNode('User Input - ID'),
                    av_make('input', [
                        ['id', 'userInputId'],
                        ['value', siteInfo.userInputId]
                    ], [
                        ['margin', '8px 5px 8px 0'],
                        ['width', '90%'],
                        ['padding', '5px'],
                        FontStyleInput
                    ], [['blur', av_update_site_info]], []),
                    Target.createTextNode('User Input - Type'),
                    av_make('input', [
                        ['id', 'userInputType'],
                        ['value', siteInfo.userInputType]
                    ], [
                        ['margin', '8px 5px 8px 0'],
                        ['padding', '5px'],
                        ['width', '90%'],
                        FontStyleInput
                    ], [['blur', av_update_site_info]], []),
                    Target.createTextNode('User Input - Name'),
                    av_make('input', [
                        ['id', 'userInputName'],
                        ['value', siteInfo.userInputName]
                    ], [
                        ['margin', '8px 5px 8px 0'],
                        ['padding', '5px'],
                        ['width', '90%'],
                        FontStyleInput
                    ], [['blur', av_update_site_info]], []),
                    Target.createTextNode('User Input - XPath'),
                    av_make('input', [
                        ['id', 'userInputXpath'],
                        ['value', siteInfo.userInputXpath]
                    ], [
                        ['margin', '8px 5px 8px 0'],
                        ['padding', '5px'],
                        ['width', '90%'],
                        FontStyleInput
                    ], [['blur', av_update_site_info]], []),

                    Target.createTextNode('Submit Input - ID'),
                    av_make('input', [
                        ['id', 'submitInputId'],
                        ['value', siteInfo.submitInputId]
                    ], [
                        ['margin', '8px 5px 8px 0'],
                        ['width', '90%'],
                        ['padding', '5px'],
                        FontStyleInput
                    ], [['blur', av_update_site_info]], []),
                    Target.createTextNode('Submit Input - Type'),
                    av_make('input', [
                        ['id', 'submitInputType'],
                        ['value', siteInfo.submitInputType]
                    ], [
                        ['margin', '8px 5px 8px 0'],
                        ['padding', '5px'],
                        ['width', '90%'],
                        FontStyleInput
                    ], [['blur', av_update_site_info]], []),
                    Target.createTextNode('Submit Input - Name'),
                    av_make('input', [
                        ['id', 'submitInputName'],
                        ['value', siteInfo.submitInputName]
                    ], [
                        ['margin', '8px 5px 8px 0'],
                        ['padding', '5px'],
                        ['width', '90%'],
                        FontStyleInput
                    ], [['blur', av_update_site_info]], []),
                    Target.createTextNode('Submit Input - Value'),
                    av_make('input', [
                        ['id', 'submitInputValue'],
                        ['value', siteInfo.submitInputValue]
                    ], [
                        ['margin', '8px 5px 8px 0'],
                        ['padding', '5px'],
                        ['width', '90%'],
                        FontStyleInput
                    ], [['blur', av_update_site_info]], []),
                    Target.createTextNode('Submit Input - XPath'),
                    av_make('input', [
                        ['id', 'submitInputXpath'],
                        ['value', siteInfo.submitInputXpath]
                    ], [
                        ['margin', '8px 5px 8px 0'],
                        ['padding', '5px'],
                        ['width', '90%'],
                        FontStyleInput
                    ], [['blur', av_update_site_info]], []),

                    Target.createTextNode('Form - Name'),
                    av_make('input', [
                        ['id', 'formName'],
                        ['value', siteInfo.formName]
                    ], [
                        ['margin', '8px 5px 8px 0'],
                        ['padding', '5px'],
                        ['width', '90%'],
                        FontStyleInput
                    ], [['blur', av_update_site_info]], []),
                    Target.createTextNode('Form - ID'),
                    av_make('input', [
                        ['id', 'formId'],
                        ['value', siteInfo.formId]
                    ], [
                        ['margin', '8px 5px 8px 0'],
                        ['padding', '5px'],
                        ['width', '90%'],
                        FontStyleInput
                    ], [['blur', av_update_site_info]], []),
                    Target.createTextNode('Form - Method'),
                    av_make('input', [
                        ['id', 'formMethod'],
                        ['value', siteInfo.formMethod]
                    ], [
                        ['margin', '8px 5px 8px 0'],
                        ['padding', '5px'],
                        ['width', '90%'],
                        FontStyleInput
                    ], [['blur', av_update_site_info]], []),
                    Target.createTextNode('Form - Action'),
                    av_make('input', [
                        ['id', 'formAction'],
                        ['value', siteInfo.formAction]
                    ], [
                        ['margin', '8px 5px 8px 0'],
                        ['padding', '5px'],
                        ['width', '90%'],
                        FontStyleInput
                    ], [['blur', av_update_site_info]], []),
                    Target.createTextNode('Form - XPath'),
                    av_make('input', [
                        ['id', 'formXpath'],
                        ['value', siteInfo.formXpath]
                    ], [
                        ['margin', '8px 5px 8px 0'],
                        ['padding', '5px'],
                        ['width', '90%'],
                        FontStyleInput
                    ], [['blur', av_update_site_info]], []),

                    Target.createTextNode('Parent Div - ID'),
                    av_make('input', [
                        ['id', 'parentDivId'],
                        ['value', siteInfo.parentDivId]
                    ], [
                        ['margin', '8px 5px 8px 0'],
                        ['padding', '5px'],
                        ['width', '90%'],
                        FontStyleInput
                    ], [], []),
                    Target.createTextNode('Parent Div - Name'),
                    av_make('input', [
                        ['id', 'parentDivName'],
                        ['value', siteInfo.parentDivName]
                    ], [
                        ['margin', '8px 5px 8px 0'],
                        ['padding', '5px'],
                        ['width', '90%'],
                        FontStyleInput
                    ], [
                    ], []),
                    Target.createTextNode('Parent Div - Popup'),
                    Target.createElement('br'),
                    Target.createTextNode('Name'),
                    av_make('input', [
                        ['id', 'popupName'],
                        ['value', siteInfo.popupName]
                    ], [
                        ['margin', '8px 5px 8px 0'],
                        ['padding', '5px'],
                        ['width', '90%'],
                        FontStyleInput
                    ], [
                    ], []),
                    Target.createTextNode('Parent Div - URL'),
                    av_make('input', [
                        ['id', 'popupUrl'],
                        ['value', siteInfo.popupUrl]
                    ], [
                        ['margin', '8px 5px 8px 0'],
                        ['padding', '5px'],
                        ['width', '90%'],
                        FontStyleInput
                    ], [
                    ], [])
                ]),
                av_make('div', [], [
                    ['margin', '8px 0 8px 0'],
                    ['width', '100%'],
                    ['border', ' 1px solid black'],
                    FontStyle
                ], [], []),
                av_make('input', [
                    ['id', 'av_submit_form'],
                    ['data-id', num],
                    ['type', 'button'],
                    ['value', 'Submit']

                ], [
                    ['margin', '0 0 0 33%'],
                    ['visibility', 'visible']
                ], [
                    ['click', submit]
                ], []),
                av_make('input', [
                    ['id', 'av_site_form'],
                    ['data-id', num],
                    ['type', 'button'],
                    ['value', 'Show Form']

                ], [
                    ['margin', '0 0 0 33%'],
                    ['visibility', 'visible']
                ], [
                    ['click', load_form_dialog]
                ], [])
            ])]);

        return Content;
    }

    function av_site_form(num) {
        var html = passwordForms[num].innerHTML; //.replace(/'/g,'').replace(/"/g,'')
        var textArea = av_make('textarea', [
            ['id', 'av_form_text'],
            ['cols', '100'],
            ['rows', '80']
        ], [
            ['margin', '0'],
            ['padding', '0']
        ], [],
            []);

        var Content = av_make('div', [
            ['id', 'av_show_form_div']
        ], [
            ['margin', '3px'],
            ['padding', '8px'],
            ['width', 'auto'],
            ['color', ' #000'],
            ['borderRadius', '11px 11px 11px 11px'],
            FontStyle
        ], [], [Target.createTextNode('Form Code'),
            textArea]);

        textArea.value = html;
        return Content;
    }

    function parent(content) {
        var child;
//        console.log("ParentDiv: " + ((ParentDiv === undefined) ? 'undefined' : 'defined'));

        if (ParentDiv === undefined) {
            var passBox = new Gk_CreateEl('div');
            passBox.getEl().className = 'cleanslate';
            passBox.setAttributes([
                ['id', 'av_pass_box']
            ]);
            passBox.setStyle([
                ['zIndex', '99999'],
                ['position', 'absolute'],
                ['top', '0px'],
//                ['top', (BoxPosition[1] + ScrollY) + 'px'],
                BoxPositionX,
                ['width', '220px'],
                ['margin', '10px'],
                ['padding', '0'],
                ['background', ' #fff'],
                ['borderStyle', 'solid'],
                ['borderColor', '#00ff00'],
                ['borderWidth', '8px'],
                ['borderRadius', '20px 20px 20px 20px'],
                ['boxShadow', '1px 1px 5px 10px rgba(0,0,0, 1)'],
                ['opacity', '0.95'],
                ['filter', 'alpha(opacity=95)'],
                ['visibility', 'visible']
            ]);

            ParentDiv = passBox.getEl();
            var passBoxBorder = new Gk_CreateEl('div');
            passBoxBorder.setAttributes([
                ['id', 'av_pass_box_border']
            ]);
            passBoxBorder.setStyle([
                ['borderRadius', '11px 11px 0px 0px'],
                ['margin', '0'],
                ['padding', '7px 5px 5px 7px'],
                ['width', 'auto'],
                ['background', '#0066cc'],
                ['color', ' white'],
                FontStyle,
                ['fontWeight', 'bold'],
                ['cursor', 'move']
            ]);

            var closeLink = new Gk_CreateEl('a');
            closeLink.setAttributes([
                ['href', ' #']
            ]);
            closeLink.setStyle(FontStyleToolbarLink.concat([
                ['position', 'absolute'],
                ['right', '10px']
            ]));
            closeLink.setMethods([
                ['click', av_close]
            ]);
            closeLink.addChildren([Target.createTextNode('close')]);

            passBoxBorder.setMethods([
                ['mousedown', av_drag_start]
            ]);
            passBoxBorder.addChildren([Target.createTextNode('SiteInfo'), closeLink.getEl()]);

            var passBoxChild = new Gk_CreateEl('div');
            passBoxChild.setAttributes([
                ['id', 'av_pass_box_child']
            ]);
            passBoxChild.setStyle([
                ['margin', '0'],
                ['padding', '0'],
                ['borderStyle', 'solid'],
                ['borderColor', ' #ccc'],
                ['borderWidth', '1px'],
                ['borderRadius', '0 0 11px 11px'],
                ['textAlign', 'left'],
                ['background', 'url(https://trssolutions.net/img/Authentry-ghosted-popup.png)']
            ]);
            passBoxChild.addChildren([passBoxBorder.getEl(), (content === undefined) ? [] : content]);
            passBox.addChildren([passBoxBorder.getEl(), passBoxChild.getEl()]);
            Target.body.appendChild(ParentDiv);
        }
        else {
            child = Target.body.querySelector("#av_pass_box");
            if (child === undefined || child === null) {
                Target.body.appendChild(ParentDiv);
            }
            Target.getElementById('av_pass_box_child').appendChild(content);
            Target.getElementById('av_pass_box').style.visibility = "visible";
        }
        if (Target.getElementById('av_user_div')) {
            Target.getElementById('av_user_div').focus();
        }
    }


    function dialog_parent(content, num) {
        var TmpDialogDiv, DialogDiv = Target.body.querySelector("#av_dialog_box" + "_" + num);

        if (DialogDiv === null || DialogDiv === undefined) {
            DialogDiv = av_make('div', [
                ['id', 'av_dialog_box' + "_" + num]
            ], [
                ['zIndex', '99999'],
                ['position', 'absolute'],
                ['top', '0px'],
                BoxPositionX,
                ['width', '280px'],
                ['margin', '0'],
                ['padding', '0'],
                ['background', ' #fff'],
                ['borderStyle', 'solid'],
                ['borderColor', 'lightyellow'],
                ['borderWidth', '8px'],
                ['borderRadius', '20px 20px 20px 20px'],
                ['opacity', '0.95'],
                ['filter', 'alpha(opacity=95)'],
                ['visibility', 'visible'],
                ['right', '300px']
            ], [], [
                av_make('div', [
                    ['id', 'av_dialog_box']
                ], [
                    ['borderRadius', '11px 11px 0 0'],
                    ['margin', '0'],
                    ['padding', '7px 5px 5px 7px'],
                    ['width', 'auto'],
                    ['background', 'lightblue'],
                    ['color', ' black'],
                    FontStyle,
                    ['fontWeight', 'bold'],
                    ['cursor', 'move']
                ], [
                    ['mousedown', av_drag_start]
                ], [Target.createTextNode('SiteInfo'),
                    av_make('a', [
                        ['href', ' #'],
                        ['data-id', num]
                    ], FontStyleToolbarLink.concat([
                        ['margin', '0px 0px 0px 182px']
                    ]), [
                        ['click', close_dialog]
                    ], [Target.createTextNode('close')])]),

                av_make('div', [
                    ['id', 'av_dialog_box_child']
                ], [
                    ['margin', '0'],
                    ['padding', '0'],
                    ['borderStyle', 'solid'],
                    ['borderColor', ' #ccc'],
                    ['borderWidth', '1px'],
                    ['borderRadius', '0 0 11px 11px'],
                    ['textAlign', 'left']
                ], [],

                    [((content === undefined) ? [] : content)])]);
            Target.body.appendChild(DialogDiv);
        }
        else {
            for (i = 0; i < siteInfos.length; i++) {
                TmpDialogDiv = Target.body.querySelector("#av_dialog_box" + "_" + i);
                if (TmpDialogDiv === DialogDiv) {
                    if (DialogDiv.style.display.toLowerCase() === 'none' || DialogDiv.style.visibility.toLowerCase() === 'hidden')
                        DialogDiv.style.visibility = "visible";
                    else
                        DialogDiv.style.visibility = "hidden";
                }
                else
                    TmpDialogDiv.style.visibility = "hidden";
            }
        }
    }

    function account_list(list) {
        var name, item, i, label, linkListDiv, accountDiv;

        linkListDiv = av_make('div', [], [], [], []);
        linkListDiv.style.margin = '8px';

        label = Target.createElement('label');
        label.appendChild(Target.createTextNode('Select SiteInfo'));
        label.style.display = 'block';
        label.style.padding = '0px 0px 8px';
        linkListDiv.appendChild(label);

        for (i = 0; i < list.length; i++) {
            if (list[i].submitInputValue !== '')
                name = list[i].submitInputValue;
            else if (list[i].formName !== '')
                name = list[i].formName;
            else
                name = 'form_' + i;

            item = av_make('a', [
                ['href', ' #'],
                ['data-id', i]
            ], [
                ['margin', '0 8px']
            ], [
                ['click', load_dialog]
            ], [Target.createTextNode(name)]);
            linkListDiv.appendChild(item);
            linkListDiv.appendChild(Target.createElement("br"));
        }

        parent(linkListDiv);
    }

    function type_dialog() {
        if(typeContent !== undefined)
            typeContent.getEl();

        var checkBox = new Gk_CreateEl('div'), checkBoxInput = new Gk_CreateEl('input');
        typeContent = new Gk_CreateEl('div');
        typeContent.setAttributes([
            ['id', 'av_account_login_div']
        ]);
        typeContent.setStyle([
            ['margin', '3px'],
            ['padding', '8px'],
            ['width', 'auto'],
            ['color', ' #000'],
            ['borderRadius', '11px 11px 11px 11px'],
            FontStyle
        ]);

        checkBox.setStyle([
            ['margin', '8px 5px 0 18%']
        ]);
        checkBox.setAttributes([
            ['id', 'av_logikey_div']
        ]);
        checkBoxInput.setStyle([
            ['width', '30px'],
            ['font', '14px monospace']
        ]);
        checkBoxInput.setAttributes([
            ['id', 'av_type_listen'],
            ['value', 'false'],
            ['type', 'checkbox']
        ]);
        checkBoxInput.setMethods([
            ['click', av_type_listen]
        ]);
        checkBox.addChildren([Target.createTextNode('Multi'), checkBoxInput.getEl()]);
        typeContent.addChildren([checkBox.getEl()]);

        return typeContent.getEl();
    }

    function av_type_listen(e) {
        if (e.currentTarget.checked) {
            for (var i = 0; i < formsList.length; i++) {
                siteInfo = new newSiteInfo();
                if(find_user_input(formsList[i], siteInfo))
                    siteInfos.push(siteInfo);
            }
            if(siteInfos.length > 0)
                account_list(siteInfos);
        }
        else {
        }

        e.stopPropagation();
    }

    function load_dialog() {
        var num = this.getAttribute('data-id');
        dialog_parent(av_site_dialog(siteInfos[num], num), num);
    }

    function load_form_dialog() {
        var num = this.getAttribute('data-id');
        dialog_parent(av_site_form(num), 99);
    }

    function close_dialog() {
        var num = this.getAttribute('data-id');
        Target.getElementById('av_dialog_box' + "_" + num).style.visibility = "hidden";
    }

    function close_list_dialog() {
        Target.body.removeChild(Target.getElementById('list_dialog'));
    }

    function submit() {
        var num = this.getAttribute('data-id');
        console.log("Calling Submit on item: " + num);

        var corsSupport, request, ret, done = 4, ok = 200;

        request = new XMLHttpRequest();
        if (request.withCredentials !== undefined) {
            corsSupport = true;
        }
        else {
            corsSupport = typeof XDomainRequest === "object";
        }

        request.open("POST", "https://gatekeeperpro.us/siteinfo/", true);
//        request.open("POST", "https://localhost:8443/siteinfo/", true);
        request.withCredentials = corsSupport;
        request.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        request.setRequestHeader('Accept', 'application/json');
        request.onreadystatechange = function () {
            if (request.readyState === done && request.status === ok) {
                if (request.responseText) {
                    ret = JSON.parse(request.responseText);
                    if (ret.status !== undefined && ret.status !== 'ok') {
                        alert(ret.status);
                    }
                    else {
                        alert(ret.status);
                    }
                }
            }
            else
                console.log("State: " + request.readyState + " Status: " + request.status);
        };
        var postData = {};
        postData.domain = Target.location.href;
        postData.multiPage = false;
        if(siteInfos[num].submitInputType != '')
            postData.submitInputType = siteInfos[num].submitInputType;
        if(siteInfos[num].submitInputId != '')
            postData.submitInputId = siteInfos[num].submitInputId;
        if(siteInfos[num].submitInputName != '')
            postData.submitInputName = siteInfos[num].submitInputName;
        if(siteInfos[num].submitInputValue != '')
            postData.submitInputValue = siteInfos[num].submitInputValue;
        if(siteInfos[num].submitInputXpath != '')
            postData.submitInputXpath = siteInfos[num].submitInputXpath;
        if(siteInfos[num].userInputType != '')
            postData.userInputType = siteInfos[num].userInputType;
        if(siteInfos[num].userInputId != '')
            postData.userInputId = siteInfos[num].userInputId;
        if(siteInfos[num].userInputName != '')
            postData.userInputName = siteInfos[num].userInputName;
        if(siteInfos[num].userInputXpath != '')
            postData.userInputXpath = siteInfos[num].userInputXpath;
        if(siteInfos[num].passwordInputType != '')
            postData.passwordInputType = siteInfos[num].passwordInputType;
        if(siteInfos[num].passwordInputName != '')
            postData.passwordInputName = siteInfos[num].passwordInputName;
        if(siteInfos[num].passwordInputId != '')
            postData.passwordInputId = siteInfos[num].passwordInputId;
        if(siteInfos[num].passwordInputXpath != '')
            postData.passwordInputXpath = siteInfos[num].passwordInputXpath;
        if(siteInfos[num].formName != '')
            postData.formName = siteInfos[num].formName;
        if(siteInfos[num].formId != '')
            postData.formId = siteInfos[num].formId;
        if(siteInfos[num].formMethod != '')
            postData.formMethod = siteInfos[num].formMethod;
        if(siteInfos[num].formAction != '')
            postData.formAction = siteInfos[num].formAction;
        if(siteInfos[num].formXpath != '')
            postData.formXpath = siteInfos[num].formXpath;
        if(siteInfos[num].parentDivId != '')
            postData.parentDivId = siteInfos[num].parentDivId;
        if(siteInfos[num].parentDivName != '')
            postData.parentDivName = siteInfos[num].parentDivName;
        if(siteInfos[num].popupUrl != '')
            postData.popupUrl = siteInfos[num].popupUrl;
        if(siteInfos[num].popupName != '')
            postData.popupName = siteInfos[num].popupName;

        request.send(JSON.stringify(postData));
    }

    function av_make(Name, Attributes, Styles, Methods, Children) {
        var i, Element = Target.createElement(Name);
        for (i = 0; i < Attributes.length; i = i + 1) {
            Element.setAttribute(Attributes[i][0], Attributes[i][1]);
        }
        for (i = 0; i < Styles.length; i = i + 1) {
            Element.style[Styles[i][0]] = Styles[i][1];
        }
        for (i = 0; i < Methods.length; i = i + 1) {
            av_attach_method(Element, Methods[i][0], Methods[i][1]);
        }
        for (i = 0; i < Children.length; i = i + 1) {
            Element.appendChild(Children[i]);
        }
        return Element;
    }

    function Gk_CreateEl(name) {
        var element = Target.createElement(name);

        this.getEl = function () {
            return element;
        };
    }

    Gk_CreateEl.prototype.setAttributes = function (attributes) {
        var i = 0;
        for (i = 0; i < attributes.length; i = i + 1) {
            this.getEl().setAttribute(attributes[i][0], attributes[i][1]);
        }
    };

    Gk_CreateEl.prototype.setStyle = function (styles) {
        var i = 0;
        for (i = 0; i < styles.length; i = i + 1) {
            this.getEl().style[styles[i][0]] = styles[i][1];
        }
    };

    Gk_CreateEl.prototype.setStyle2 = function (styles) {
        var i = 0, cssText = '';
        for (i = 0; i < styles.length; i = i + 1) {
            cssText = cssText + styles[i][0] + ':' + styles[i][1] + '!important;';
        }
        this.getEl().style.cssText = cssText;
    };

    Gk_CreateEl.prototype.setStyleAttr = function (styles) {
        var i = 0;
        for (i = 0; i < styles.length; i = i + 1) {
            this.getEl().setAttribute('style', styles[i][0], styles[i][1] + ' !important');
        }
    };

    Gk_CreateEl.prototype.setCssText = function (styles) {
        var i = 0;
        for (i = 0; i < styles.length; i = i + 1) {
            this.getEl().style.cssText[styles[i][0]] = styles[i][1];
        }
    };

    Gk_CreateEl.prototype.setMethods = function (methods) {
        var i = 0;
        for (i = 0; i < methods.length; i = i + 1) {
            av_attach_method(this.getEl(), methods[i][0], methods[i][1]);
        }
    };

    Gk_CreateEl.prototype.addChildren = function (children) {
        var i = 0;
        for (i = 0; i < children.length; i = i + 1) {
            this.getEl().appendChild(children[i]);
        }
    };

    function av_attach_method(obj, type, fn) {
        var handler = function (e) {
            e = e || window.event;
            if (!e.stopPropagation) {
                e.stopPropagation = function () {
                    this.cancelBubble = true;
                };
            }
            if (!e.preventDefault) {
                e.preventDefault = function () {
                    this.returnValue = false;
                };
            }
            if (!e.stopEvent) {
                e.stopEvent = function () {
                    this.stopPropagation();
                    this.preventDefault();
                };
            }
            return fn.apply(obj, [e]);
        };
        handler.obj = obj;
        handler.type = type;
        handler.fn = fn;
        av_detach_method_handlers.push(handler);
        if (window.addEventListener) {
            obj.addEventListener(type, handler, false);
        }
        else if (window.attachEvent) {
            obj.attachEvent('on' + type, handler);
        }
        return handler;
    }

    function av_detach_method(obj, type, fn) {
        var i,
            h;
        for (i = 0; i < av_detach_method_handlers.length; i = i + 1) {
            h = av_detach_method_handlers[i];
            if (h.obj === obj && h.type === type && h.fn === fn) {
                if (obj.removeEventListener) {
                    obj.removeEventListener(h.type, h, false);
                }
                if (obj.detachEvent) {
                    obj.detachEvent('on' + h.type, h);
                }
                av_detach_method_handlers.splice(i, 1);
                return h;
            }
        }
    }

    function av_drag_start(e) {
        DragBox = {};
        var Cursor = av_get_cursor(e);
        DragBox.Node = e.currentTarget.parentNode;
        if (!(DragBox.Node.style.right)) {
            DragBox.Node.style.left = 'auto';
            DragBox.Node.style.right = av_get_computed_style(DragBox.Node, 'right');
        }
        DragBox.StartX = parseInt(DragBox.Node.style.right, 10);
        DragBox.StartY = parseInt(DragBox.Node.style.top, 10);
        DragBox.CursorX = Cursor[0];
        DragBox.CursorY = Cursor[1];
        av_attach_method(Target, 'mousemove', av_drag_go);
        av_attach_method(Target, 'mouseup', av_drag_stop);
        e.preventDefault();
        e.stopPropagation();
        return false;
    }

    function av_get_computed_style(obj, style) {
        var styleVal = '';
        if (document.defaultView && document.defaultView.getComputedStyle) {
            styleVal = document.defaultView.getComputedStyle(obj, '').getPropertyValue(style);
        }
        else if (obj.currentStyle) {
            style = style.replace(/\-(\w)/g, function (strMatch, p1) {
                return p1.toUpperCase();
            });
            styleVal = obj.currentStyle[style];
        }
        return styleVal;
    }

    function av_drag_go(e) {
        var CursorMove = av_get_cursor(e);
        DragBox.Node.style.right = (DragBox.StartX + (DragBox.CursorX - CursorMove[0])) + 'px';
        DragBox.Node.style.top = (DragBox.StartY + (CursorMove[1] - DragBox.CursorY)) + 'px';
        e.preventDefault();
        return false;
    }

    function av_drag_stop(e) {
        av_detach_method(Target, 'mousemove', av_drag_go);
        av_detach_method(Target, 'mouseup', av_drag_stop);
        e.preventDefault();
        return false;
    }

    function av_get_cursor(e) {
        var x = 0,
            y = 0;
        if (e.pageX || e.pageY) {
            x = e.pageX;
            y = e.pageY;
        }
        else if (e.clientX || e.clientY) {
            x = e.clientX + document.body.scrollLeft;
            y = e.clientY + document.body.scrollTop;
        }
        return [x, y];
    }

    function stripPassBoxChild(node) {
        if(node === null || node === undefined)
        {
            return;
        }

        var len = node.children.length;
        var childLen;

        for(var i = 0; i < len; i++)
        {
            if(node.children[i].id == 'av_pass_box_child')
            {
                childLen = node.children[i].childNodes.length
                for(var k = 0; k < childLen; k++)
                {
//                    node.children[i].removeChild(node.children[i].childNodes[k]);
                    node.children[i].removeChild(node.children[i].childNodes[0]);
                }
            }
        }
    }

    function av_close(e) {
//        if (Target.getElementById('av_pass_box')) {
//            ScrollPosition = av_get_scroll_position();
//            BoxPosition = [0, parseInt(Target.getElementById('av_pass_box').style.top, 0)];
//            BoxPosition[0] = (Target.getElementById('av_pass_box').style.right) ? parseInt(Target.getElementById('av_pass_box').style.right, 0) : 'left';
//            Target.body.removeChild(Target.getElementById('av_pass_box'));
//        }

        stripPassBoxChild(ParentDiv);
        if (e !== undefined) {
            e.preventDefault();
        }
        Target.body.removeChild(ParentDiv);
    }

    /**
     * Gets an XPath for an element which describes its hierarchical location.
     */
    var getElementXPath = function(element) {
        if (element && element.id)
            return '//*[@id="' + element.id + '"]';
        else
            return getElementTreeXPath(element);
    };

    var getElementTreeXPath = function(element) {
        var paths = [];

        // Use nodeName (instead of localName) so namespace prefix is included (if any).
        for (; element && element.nodeType == 1; element = element.parentNode)  {
            var index = 0;
            // EXTRA TEST FOR ELEMENT.ID
            if (element && element.id) {
                paths.splice(0, 0, '/*[@id="' + element.id + '"]');
                break;
            }

            for (var sibling = element.previousSibling; sibling; sibling = sibling.previousSibling) {
                // Ignore document type declaration.
                if (sibling.nodeType == Node.DOCUMENT_TYPE_NODE)
                    continue;

                if (sibling.nodeName == element.nodeName)
                    ++index;
            }

            var tagName = element.nodeName.toLowerCase();
            var pathIndex = (index ? "[" + (index+1) + "]" : "");
            paths.splice(0, 0, tagName + pathIndex);
        }

        return paths.length ? "/" + paths.join("/") : null;
    };

    function getXPath( element )
    {
        var xpath = '';
        for ( ; element && element.nodeType == 1; element = element.parentNode )
        {
            var id = $(element.parentNode).children(element.tagName).index(element) + 1;
            id > 1 ? (id = '[' + id + ']') : (id = '');
            xpath = '/' + element.tagName.toLowerCase() + id + xpath;
        }
        return xpath;
    }

    function getPwdInputs()
    {
        // If querySelectorAll is supported, just use that!
        if (document.querySelectorAll)
            return document.querySelectorAll("input[type='password']");

        // If not, use Robusto's solution
        var ary = [];
        var inputs = document.getElementsByTagName("input");
        for (var i=0; i<inputs.length; i++) {
            if (inputs[i].type.toLowerCase() === "password") {
                ary.push(inputs[i]);
            }
        }
        return ary;
    }

    function upTo(el, tagName) {
        tagName = tagName.toLowerCase();

        while (el && el.parentNode) {
            el = el.parentNode;
            if (el.tagName && el.tagName.toLowerCase() == tagName) {
                return el;
            }
        }

        return null;
    }

    formsList = document.getElementsByTagName("form");
    av_findPasswordForms();
    if(foundFormWithPassword == true) {
        av_buildPasswordSiteInfo();
        account_list(siteInfos);
    }
    else {
        parent(type_dialog());
    }
})();