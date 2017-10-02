function loadBookmark(targetHref)
{
//    "use strict";
    var
        RemoteWindow,
        BookmarkId,
//        ServerURL = 'https://localhost:8443/',
		ServerURL = 'https://gatekeeperpro.us/',
        // TargetHref = 'http://fake.com',
       TargetHref = targetHref,
        DeviceId,
        DragBox,
        Target,
        TargetWindow,
        FrameCount,
        Frames,
        Debug,
        MaxArea,
        FontStyle,
        FontStyleSmall,
        FontStyleInput,
        FontStyleLink,
        FontStyleToolbarLink,
        RevealStyle,
        RevealStyle2,
        MessageStyle,
        FieldPopData,
        FieldFoundData,
        FieldFoundStyle,
        FieldPopStyle,
        BoxPosition = [0, 0],
        PrevPasswd,
        PrevPasswdPop,
        ScrollPosition,
        PrevUser,
        PrevUserPop,
        AutoFill = true,
        SessionToken = '',
        AccountName = '',
        AccountType = 1,
        AccountPassword = '',
        AccountUser= '',
        AccountId = '',
        AccessMode = 3,
        VendorOnly = '0',
        VendorAccessOnly = false,
        SessionId,
        PasswdFields = [],
        UserFields = [],
        BoxPositionX = ['right', '0px'],
        ScrollX,
        ScrollY,
        UserPopulated = false,
        UserUnpopulated = false,
        PasswordPopulated = false,
        PasswordUnpopulated = false,
        AvPassCode = '',
        AvPin = '',
        AvPassword,
        AvOldPassword,
        AuthEntryToken = '',
        UseAuthEntry = false,
        LogiKeyOnly = false,
        pinContent,
        changePasswordContent,
        infoContents,
        ParentDiv,
        Mode = 'login', // change, create
        MultiCreate = false,
        PasswordInput = false,
        UserInput = false,
        LastCheckedItem,
        Accounts,
        Initialized,
        InputField,
        InputValue,
        CalledGetSiteInfo = false,
        JsonPayLoad = {},
        AccountInfo = {},
        IsMulitLogin = false,
        SiteInfo,
        PasswordCnt = 0,
        FoundBothFields = false,
        FormXpath, UserInputXpath, PasswordInputXpath, SubmitInputXpath, SubmitInputId;

    function removeChildrenFromNode(node, toRemove) {
        if(node === null || node === undefined || toRemove === null || toRemove === undefined)
        {
            return;
        }

        var len = node.childNodes.length;

        for(var i = 0; i < len; i++)
        {
            if(node.childNodes[i] === toRemove)
                node.removeChild(node.childNodes[i]);
        }
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

    function av_get_host_name() {
        var a = Target.createElement('a');
        a.href = TargetHref;
        console.log("TargetHref: " +a.hostname);
        return a.hostname;
    }

    function changeToText() {
        this.type = "text";
    }

    function changeToPassword() {
        this.type = "password";
    }

    function get_account_list() {
        var cb_div, item, i, listContent = new Gk_CreateEl('div'), form = new Gk_CreateEl('form'), checkBox, label, checkBoxes = new Gk_CreateEl('div'), separator = new Gk_CreateEl('hr'), load = new Gk_CreateEl('button');

        listContent.setAttributes([['id', 'tabpage_1']]);
        listContent.getEl().className = 'tabpage';
        listContent.setStyle([
            ['margin', '0'],
            ['padding', '8px'],
            ['width', 'auto'],
            ['color', ' #ffffff'],
            ['borderRadius', '0 0 10px 10px'],
            FontStyle
        ]);

        form.setAttributes([
            ['autocomplete', 'off']
        ]);
        form.setStyle([
            ['margin', '0'],
            ['padding', '0']
        ]);

        checkBoxes.setAttributes([['id', 'checkbox_div']]);
        checkBoxes.setStyle([
            ['padding', '8px 5px 8px 8px'],
            FontStyle
        ]);
        checkBoxes.setMethods([['change', change]]);

        for(i=0; i < Accounts.length; i++)
        {
            checkBox = new Gk_CreateEl('input');
            checkBox.setAttributes([
                ['id', i],
                ['type', 'checkbox'],
                ['value', Accounts[i].accountId],
                ['name', Accounts[i].accountName]]);
            checkBox.setStyle([['minHeight', '10px'],
                ['margin', '0']]);
            label = new Gk_CreateEl('label');
            label.setStyle([['font', '13px Trebuchet MS, Helvetica,sans-serif'],
                ['paddingLeft', '10px'], ['display', 'inline']]);
            label.addChildren([Target.createTextNode(Accounts[i].accountName)]);
            cb_div = new Gk_CreateEl('div');
            cb_div.addChildren([checkBox.getEl(), label.getEl()]);
            checkBoxes.addChildren([cb_div.getEl()]);
        }

        separator.setStyle([
            ['margin', '8px 0 8px 0'],
            ['width', '100%'],
            ['borderColor', '#CEDCE3'],
            ['backgroundColor', '#CEDCE3']
        ]);

        load.setStyle([['margin', '0 0 0 33%']]);
        load.setMethods([['click', av_get_selected_acct]]);
        load.addChildren([Target.createTextNode('Load')]);

        av_attach_method(TargetWindow, 'unload', av_close);

        form.addChildren([checkBoxes.getEl()]);
        listContent.addChildren([Target.createTextNode('Select Account'), form.getEl(), separator.getEl(), load.getEl()]);
        return listContent.getEl();
    }

    function av_get_selected_acct() {
        if (LastCheckedItem === undefined) {
            return false;
        }

        AccountId = LastCheckedItem.value;
        AccountName = LastCheckedItem.name;
        AccountType  = Accounts[LastCheckedItem.id].accountType;
        VendorOnly = Accounts[LastCheckedItem.id].vendorOnly;
        if (Accounts[LastCheckedItem.id].siteInfo === undefined || Accounts[LastCheckedItem.id].siteInfo === '') {
            av_locate_fields(false);
        }
        else {
            if(!av_locate_fields2(Accounts[LastCheckedItem.id].siteInfo))
                av_locate_fields(true);
        }
        Mode = 'login';
        av_dialog("tabHeader_1");
//        parent(av_login_dialog());
    }

    function change(e)
    {
        var originalElement = e.srcElement || e.originalTarget;
        if(LastCheckedItem === undefined)
            LastCheckedItem = originalElement;
        else
        {
            LastCheckedItem.checked = false;
            LastCheckedItem = originalElement;
        }
    }

    function av_site_info_check(siteInfo)
    {
        if(siteInfo == undefined)
            return false;

        siteInfo = JSON.parse(siteInfo);
        if(siteInfo.userInputXpath != undefined) {
            useElement = xPathGetElement(siteInfo.userInputXpath);
            if(useElement === null) {
                RemoteWindow.testCallback("useElement is null");
                return false;
            }

            useElement.style.background = FieldFoundStyle;
            UserInputXpath = siteInfo.userInputXpath;
        }
        else
            return false;

        if(siteInfo.passwordInputXpath != undefined) {
            passwordElement = xPathGetElement(siteInfo.passwordInputXpath);
            if(passwordElement === null) {
                alert("passwordElement is null");
                return false;
            }
            passwordElement.style.background = FieldFoundStyle;
            PasswordInputXpath = siteInfo.passwordInputXpath;
        }
        else
            return false;

        return true;
    }

    function av_manage_field_bg()
    {
        var field;

        if(PasswdFields.length > 2) {
            Mode = 'login-change';
        } else {
            for (i = 0; i < PasswdFields.length; i = i + 1) {
                field = PasswdFields[i][0];
                field.oldBackground = field.style.background;
                field.style.background = FieldFoundStyle;
            }

            for (i = 0; i < UserFields.length; i = i + 1) {
                field = UserFields[i][0];
                field.oldBackground = field.style.background;
                field.style.background = FieldFoundStyle;
            }
        }
    }

    function av_locate_fields(showPassword) {
        var CurrentPosition = av_get_scroll_position(),
            ScreenSize = av_get_window_size(),
            PasswdFieldRelocate = (ScrollPosition) ? false : true,
            UserFieldRelocate = (ScrollPosition) ? false : true,
            PasswdFieldBlocked = false,
            RunAgain = false,
            UserFieldBlocked = false,
            ParentForm,
            i,
            j,
            k,
            PasswdField,
            PasswdFieldParent,
            Visible,
            PasswdFieldType,
            PasswdFieldPosition,
            fieldName,
            fieldId,
            UserField,
            l,
            UserFieldType,
            UserFieldPosition;
        ScrollX = (ScrollPosition) ? CurrentPosition[0] - ScrollPosition[0] : CurrentPosition[0];
        ScrollY = (ScrollPosition) ? CurrentPosition[1] - ScrollPosition[1] : CurrentPosition[1];

        for (i = 0; i < Frames.length; i = i + 1) {
            for (j = 0; j < Frames[i].forms.length; j = j + 1) {
                for (k = 0; k < Frames[i].forms[j].elements.length; k = k + 1) {
                    if (Frames[i].forms[j].elements[k].type === 'password' ||
                        Frames[i].forms[j].elements[k].type === 'email' ||
                        Frames[i].forms[j].elements[k].type === 'text') {
                        if (Frames[i].forms[j].elements[k].type === 'password') {
                            PasswdField = Frames[i].forms[j].elements[k];
                            Visible = (!(PasswdField.style.display.toLowerCase() === 'none' || PasswdField.style.visibility.toLowerCase() === 'hidden'));
                            if (Visible) {
                                PasswdFieldParent = PasswdField.parentNode;
                                while (Visible && PasswdFieldParent && PasswdFieldParent.nodeName.toLowerCase() !== 'html' && PasswdFieldParent.nodeName.toLowerCase() !== ' #document') {
                                    if (av_get_computed_style(PasswdFieldParent, 'display').toLowerCase() === 'none' || av_get_computed_style(PasswdFieldParent, 'visibility').toLowerCase() === 'hidden') {
                                        Visible = false;
                                    } else {
                                        PasswdFieldParent = PasswdFieldParent.parentNode;
                                    }
                                }
                            }
                            if (Visible) {
                                PasswdFieldType = 0;
                                PasswdFieldPosition = (PasswdFieldBlocked) ? false : av_get_object_position(PasswdField);
                                if (PasswdField.value !== '') {
                                    AccountPassword = PasswdField.value;
                                    PasswdFieldType = 1;
                                }
                                // just for testing?
                                if(showPassword) {
                                    PasswdField.addEventListener("mouseover", changeToText);
                                    PasswdField.addEventListener("mouseout", changeToPassword);
                                }
                                ParentForm = Frames[i].forms[j];
                                PasswdFields.push([PasswdField, PasswdFieldType]);
//                                PasswdField.oldBackground = PasswdField.style.background;
//                                PasswdField.style.background = FieldFoundStyle;
                                PasswdFieldBlocked = (PasswdFieldRelocate && (PasswdFieldBlocked || (ScreenSize[0] - PasswdFieldPosition[0] + ScrollX - 150 < 225 && ScrollY < PasswdFieldPosition[1] + 50))) ? true : false;
                                av_detach_method(PasswdField, 'keydown', av_pop_password);
                                av_detach_method(PasswdField, 'change', av_pop_password);
                                av_detach_method(PasswdField, 'dblclick', av_set_password_field);
                            }
                        } else {
                            UserField = Frames[i].forms[j].elements[k];
                            fieldName = UserField.name.toLowerCase();
                            fieldId = UserField.id.toLowerCase();
                            if (fieldName.indexOf('name') !== -1 || fieldId.indexOf('name') !== -1
                                || fieldName.indexOf('user') !== -1 || fieldId.indexOf('user') !== -1
                                || fieldName.indexOf('email') !== -1 || fieldId.indexOf('email') !== -1
                                || fieldName.indexOf('id') !== -1 || fieldId.indexOf('id') !== -1
                                || fieldName.indexOf('login') !== -1 || fieldId.indexOf('login') !== -1) {
                                UserFieldType = 0;
                                UserFieldPosition = (UserFieldBlocked) ? false : av_get_object_position(UserField);
                                if (UserField.value !== '') {
                                    AccountUser = UserField.value;
                                    UserFieldType = 1;
                                }
                                UserFields.push([UserField, UserFieldType]);
//                                UserField.style.background = FieldFoundStyle;
                                UserFieldBlocked = (UserFieldRelocate && (UserFieldBlocked || (ScreenSize[0] - UserFieldPosition[0] + ScrollX - 150 < 225 && ScrollY < UserFieldPosition[1] + 50))) ? true : false;
                                av_detach_method(UserField, 'keydown', av_pop_user);
                                av_detach_method(UserField, 'change', av_pop_user);
                                av_detach_method(UserField, 'dblclick', av_set_user_field);
                            }
                        }
                    }
                }
            }
            BoxPositionX = (PasswdFieldBlocked || BoxPosition[0] === 'left') ? ['left', '0px'] : ['right', (BoxPosition[0] - ScrollX) + 'px'];
        }
        av_manage_field_bg();
    }

    function isVisible(el) {
        var elParent, visible = (!(el.style.display.toLowerCase() === 'none' || el.style.visibility.toLowerCase() === 'hidden'));
        if (visible) {
            elParent = el.parentNode;
            while (visible && elParent && elParent.nodeName.toLowerCase() !== 'html' && elParent.nodeName.toLowerCase() !== ' #document') {
                if (av_get_computed_style(elParent, 'display').toLowerCase() === 'none' || av_get_computed_style(elParent, 'visibility').toLowerCase() === 'hidden') {
                    return false;
                } else {
                    elParent = elParent.parentNode;
                }
            }
        }
        else
            return false;

        return true;
    }

    function hasPasswordInput()
    {
        var nodesArray = [].slice.call(Target.querySelectorAll("input[type='password']"));
        for (var j=0; j < nodesArray.length; j++) {
            return isVisible(nodesArray[j]);
        }

        var inputs = Target.getElementsByTagName("input");
        for (var i=0; i<inputs.length; i++) {
            if (inputs[i].type.toLowerCase() === "password") {
                return true;
            }
        }
        return false;
    }

    function passwordInputCount()
    {
        var count = 0,nodesArray = [].slice.call(Target.querySelectorAll("input[type='password']"));
        for (var j=0; j < nodesArray.length; j++) {
            if(isVisible(nodesArray[j]))
                count++;
        }

        if(count > 0)
            return count;

        var inputs = Target.getElementsByTagName("input");
        for (var i=0; i<inputs.length; i++) {
            if (inputs[i].type.toLowerCase() === "password") {
                count++;
            }
        }
        return count;
    }

    function passwordInputs()
    {
        var count = 0,nodesArray = [].slice.call(Target.querySelectorAll("input[type='password']"));
        for (var j=0; j < nodesArray.length; j++) {
            if(isVisible(nodesArray[j])) {
                if (nodesArray[j].value !== '')
                    PasswdFields.push([nodesArray[j], 1]);
                else
                    PasswdFields.push([nodesArray[j], 0]);
            }
        }

        if(count > 0)
            return count;

        var inputs = Target.getElementsByTagName("input");
        for (var i=0; i<inputs.length; i++) {
            if (inputs[i].type.toLowerCase() === "password") {
                if (inputs[i].value !== '')
                    PasswdFields.push([inputs[i], 1]);
                else
                    PasswdFields.push([inputs[i], 0]);
            }
        }
        return count;
    }

    function attachDblClick(inputType)
    {
        if (Target.querySelectorAll)
        {
            var nodesArray = [].slice.call(Target.querySelectorAll("input[type='" +inputType +"']"));
            for (var j=0; j < nodesArray.length; j++) {
                nodesArray[j].style.background = FieldFoundStyle;
                if(inputType == 'password')
                    av_attach_method(nodesArray[j], 'dblclick', av_set_field_multi_pw);
                else
                    av_attach_method(nodesArray[j], 'dblclick', av_set_field);
            }
        }

        var inputs = Target.getElementsByTagName("input");
        for (var i=0; i<inputs.length; i++) {
            if (inputs[i].type.toLowerCase() === inputType) {
                inputs[i].style.background = FieldFoundStyle;
                if(inputType == 'password')
                    av_attach_method(inputs[i], 'dblclick', av_set_field_multi_pw);
                else
                    av_attach_method(inputs[i], 'dblclick', av_set_field);
            }
        }
    }

    function av_locate_fields2(siteInfo) {
        var CurrentPosition = av_get_scroll_position(),
            ScreenSize = av_get_window_size(),
            PasswdFieldRelocate = (ScrollPosition) ? false : true,
            UserFieldRelocate = (ScrollPosition) ? false : true,
            PasswdFieldBlocked = false,
            UserFieldBlocked = false,
            PasswdField,
            PasswdFieldParent,
            Visible,
            PasswdFieldType,
            PasswdFieldPosition,
            fieldName,
            fieldId,
            UserField,
            l,
            UserFieldType,
            UserFieldPosition,
            passwordInput,
            userInput,
            retValue = false;
        if (siteInfo === undefined || siteInfo === '') {
            av_locate_fields(false);
            return false;
        }
        ScrollX = (ScrollPosition) ? CurrentPosition[0] - ScrollPosition[0] : CurrentPosition[0];
        ScrollY = (ScrollPosition) ? CurrentPosition[1] - ScrollPosition[1] : CurrentPosition[1];

        try {
            if(siteInfo.passwordInputId)
                passwordInput = Target.getElementById(siteInfo.passwordInputId);
            else
                passwordInput = Target.getElementsByName(siteInfo.passwordInputName);
            if (passwordInput.type === 'password' || passwordInput.type === 'text') {
                PasswdField = passwordInput;
                Visible = (!(PasswdField.style.display.toLowerCase() === 'none' || PasswdField.style.visibility.toLowerCase() === 'hidden'));
                if (Visible) {
                    PasswdFieldParent = PasswdField.parentNode;
                    while (Visible && PasswdFieldParent && PasswdFieldParent.nodeName.toLowerCase() !== 'html' && PasswdFieldParent.nodeName.toLowerCase() !== ' #document') {
                        if (av_get_computed_style(PasswdFieldParent, 'display').toLowerCase() === 'none' || av_get_computed_style(PasswdFieldParent, 'visibility').toLowerCase() === 'hidden') {
                            Visible = false;
                        } else {
                            PasswdFieldParent = PasswdFieldParent.parentNode;
                        }
                    }
                }
                if (Visible) {
                    PasswdFieldType = 0;
                    PasswdFieldPosition = (PasswdFieldBlocked) ? false : av_get_object_position(PasswdField);
                    //                console.log("Found password field");
                    retValue = true;
                    if (PasswdField.value !== '') {
                        AccountPassword = PasswdField.value;
                        PasswdFieldType = 1;
                    }
                    // just for testing?
//                    PasswdField.addEventListener("mouseover", changeToText);
//                    PasswdField.addEventListener("mouseout", changeToPassword);
                    PasswdFields.push([PasswdField, PasswdFieldType]);
//                    PasswdField.style.background = FieldFoundStyle;
                    PasswdFieldBlocked = (PasswdFieldRelocate && (PasswdFieldBlocked || (ScreenSize[0] - PasswdFieldPosition[0] + ScrollX - 150 < 225 && ScrollY < PasswdFieldPosition[1] + 50))) ? true : false;
                    av_detach_method(PasswdField, 'keydown', av_pop_password);
                    av_detach_method(PasswdField, 'change', av_pop_password);
                    av_detach_method(PasswdField, 'dblclick', av_set_password_field);
                }
            }

            if(siteInfo.userInputId)
                userInput = Target.getElementById(siteInfo.userInputId);
            else
                userInput = Target.getElementsByName(siteInfo.userInputName);
            if (userInput !== undefined) {
                UserField = userInput;
                fieldName = UserField.name.toLowerCase();
                fieldId = UserField.id.toLowerCase();

                //            console.log("Found user field");
                UserFieldType = 0;
                UserFieldPosition = (UserFieldBlocked) ? false : av_get_object_position(UserField);
                if (UserField.value !== '') {
                    AccountUser = UserField.value;
                    UserFieldType = 1;
                }
                UserFields.push([UserField, UserFieldType]);
                UserFieldBlocked = (UserFieldRelocate && (UserFieldBlocked || (ScreenSize[0] - UserFieldPosition[0] + ScrollX - 150 < 225 && ScrollY < UserFieldPosition[1] + 50))) ? true : false;
                av_detach_method(UserField, 'keydown', av_pop_user);
                av_detach_method(UserField, 'change', av_pop_user);
                av_detach_method(UserField, 'dblclick', av_set_user_field);
            }

            BoxPositionX = (PasswdFieldBlocked || BoxPosition[0] === 'left') ? ['left', '0px'] : ['right', (BoxPosition[0] - ScrollX) + 'px'];
        }
        catch(err)
        {
            return false;
        }
        av_manage_field_bg();
        return retValue;
    }

    function av_mang_user_password(autofill) {
        var i,
            PasswordPopulated = 0,
            PasswordUnpopulated = 0,
            PasswdTarget,
            UserTarget;
        for (i = 0; i < PasswdFields.length; i = i + 1) {
            PasswdTarget = PasswdFields[i][0];
            if (PasswdFields[i][1] === 2 || (PasswdFields[i][1] === 0 && PrevPasswd) || !(autofill)) {
                av_attach_method(PasswdTarget, 'dblclick', av_set_password_field);
                PasswordUnpopulated = PasswordUnpopulated + 1;
            } else {
                PasswdTarget.style.background = FieldPopStyle;
                PasswdTarget.value = AccountPassword;
                PasswdTarget.focus();
                av_attach_method(PasswdTarget, 'keydown', av_pop_password);
                av_attach_method(PasswdTarget, 'change', av_pop_password);
                PasswordPopulated = PasswordPopulated + 1;
            }
        }
        PrevPasswdPop = (PasswordPopulated) ? AccountPassword : PrevPasswd;
        PrevPasswd = AccountPassword;

        for (i = 0; i < UserFields.length; i = i + 1) {
            UserTarget = UserFields[i][0];
            if (UserFields[i][1] === 2 || (UserFields[i][1] === 0 && PrevUser) || !(autofill)) {
                av_attach_method(UserTarget, 'dblclick', av_set_user_field);
                UserUnpopulated = UserUnpopulated + 1;
            } else {
                UserTarget.style.background = FieldPopStyle;
                UserTarget.value = AccountUser;
                av_attach_method(UserTarget, 'keydown', av_pop_user);
                av_attach_method(UserTarget, 'change', av_pop_user);
                UserPopulated = UserPopulated + 1;
            }
        }
        PrevUserPop = (UserPopulated) ? AccountUser : PrevUser;
        PrevUser = AccountUser;
    }

    function av_grab_password(e) {
        PasswordInput = true;

        if (e.type !== undefined) {
            if(e.type == 'blur') {
                AccountPassword = e.currentTarget.value;
            }
        }
    }

    function av_grab_user(e) {
        UserInput = true;

        if (e.type !== undefined) {
            if(e.type == 'blur') {
                AccountUser = e.currentTarget.value;
            }
        }
    }

    function av_attach_listner() {
        var i,
            PasswordPopulated = 0,
            PasswordUnpopulated = 0,
            PasswdTarget,
            UserTarget;
        for (i = 0; i < PasswdFields.length; i = i + 1) {
            PasswdTarget = PasswdFields[i][0];
            av_attach_method(PasswdTarget, 'blur', av_grab_password);
            if(PasswdTarget.value !== '')
                PasswordInput = true;
        }

        for (i = 0; i < UserFields.length; i = i + 1) {
            UserTarget = UserFields[i][0];
            av_attach_method(UserTarget, 'blur', av_grab_user);
            if(UserTarget.value !== '')
                UserInput = true;
        }
    }

    function av_detach_listner() {
        var i,
            PasswordPopulated = 0,
            PasswordUnpopulated = 0,
            PasswdTarget,
            UserTarget;
        for (i = 0; i < PasswdFields.length; i = i + 1) {
            PasswdTarget = PasswdFields[i][0];
            av_detach_method(PasswdTarget, 'blur', av_grab_password);
        }

        for (i = 0; i < UserFields.length; i = i + 1) {
            UserTarget = UserFields[i][0];
            av_detach_method(UserTarget, 'blur', av_grab_user);
        }
    }

    function av_info_dialog() {
        var GeneratedStyle = (PasswordPopulated) ? FieldPopStyle : ' #fff',
            PopulateTextStyle = (PasswordUnpopulated) ? 'block' : 'none',
            PassMask = '************************',
            Content;

        if (infoContents !== undefined) {
            infoContents.getEl().querySelector("#av_user_div").innerHTML = AccountUser;
            infoContents.getEl().querySelector("#av_password_input").innerHTML = AccountPassword;
            infoContents.getEl().querySelector("#av_acct_name_div").innerHTML = AccountName;
            return infoContents.getEl();
        }

        if (UserFields[0][0] !== undefined) {
            UserFields[0][0].focus();
        }

        var doubleClick = new Gk_CreateEl('div'), doubleClick2 = new Gk_CreateEl('div'), userInput = new Gk_CreateEl('input'), passwordMask = new Gk_CreateEl('input'), passwordInput = new Gk_CreateEl('input'), showHidePassword = new Gk_CreateEl('a'), accountNameInput = new Gk_CreateEl('input');

        infoContents = new Gk_CreateEl('div');
        infoContents.getEl().className = 'tabpage';
        infoContents.setAttributes([['id', 'tabpage_1']]);
        infoContents.setStyle([
            ['margin', '0'],
            ['padding', '8px 5px 8px 8px'],
            ['width', 'auto'],
            ['color', ' #ffffff'],
            FontStyle
        ]);

        doubleClick.setStyle([
            ['display', 'block'],
            ['margin', '3px 0 0 0'],
            ['color', ' #666'],
            FontStyleSmall
        ]);
        doubleClick.addChildren([Target.createTextNode('Double-click to populate')]);
        doubleClick2.setStyle([
            ['display', 'block'],
            ['margin', '3px 0 0 0'],
            ['color', ' #666'],
            FontStyleSmall
        ]);
        doubleClick2.addChildren([Target.createTextNode('Double-click to populate')]);

        userInput.setAttributes([['id', 'av_user_div'], ['type', 'text'], ['value', AccountUser]]);
        userInput.setStyle(RevealStyle2.concat(
            [
                ['background', GeneratedStyle],
                ['borderColor', ' #666'],
                FontStyle]
        ));

        passwordMask.setAttributes([
            ['id', 'av_password_mask'],
            ['value', PassMask.substring(0, AccountPassword.length)],
            ['type', 'text']
        ]);
        passwordMask.setStyle(RevealStyle2.concat([
            ['background', ' #fff'],
            ['borderColor', ' #666'],
            ['padding', '5px']
        ]));

        passwordInput.setAttributes([
            ['id', 'av_password_input'],
            ['value', AccountPassword],
            ['type', 'text']
        ]);
        passwordInput.setStyle(RevealStyle2.concat([
            ['display', 'none'],
            ['background', ' #fff'],
            ['borderColor', ' #666']
        ]));

        showHidePassword.setAttributes([['href', ' #']]);
        showHidePassword.setStyle(FontStyleLink.concat([['margin', '0 0 8px 0']]));
        showHidePassword.setMethods([['click', av_reveal_pass]]);
        showHidePassword.addChildren([Target.createTextNode('show/hide')]);

        accountNameInput.setAttributes([
            ['id', 'av_acct_name_div'],
            ['value', AccountName],
            ['type', 'text']
        ]);
        accountNameInput.setStyle(RevealStyle2.concat([
            ['background', ' #fff'],
            ['borderColor', ' #666']
        ]));

        infoContents.addChildren([Target.createTextNode('User'),
            Target.createElement('br'), doubleClick.getEl(), userInput.getEl(),
            Target.createTextNode('Password'), doubleClick2.getEl(), passwordMask.getEl(), passwordInput.getEl(), showHidePassword.getEl(),
            Target.createElement('br'), Target.createTextNode('Account Name'), accountNameInput.getEl()
        ]);
        return infoContents.getEl();
    }

    function av_load_report_site() {
        stripPassBoxChild(ParentDiv);
        parent(av_report_site_dialog());
    }

    function av_report_site_dialog() {
        var separator = new Gk_CreateEl('hr'), submit = new Gk_CreateEl('button'),
            reportSiteContent = new Gk_CreateEl('div'), reportInput = new Gk_CreateEl('input');

        reportInput.setAttributes([
            ['id', 'av_report_input'],
            ['type', 'text']
        ]);
        reportInput.setStyle(RevealStyle2.concat([
            ['background', ' #fff'],
            ['borderColor', ' #666'],
            ['height', '250px']
        ]));

        separator.setStyle([
            ['margin', '8px 0 8px 0'],
            ['width', '100%'],
            ['borderColor', '#CEDCE3'],
            ['backgroundColor', '#CEDCE3']
        ]);

        submit.setAttributes([['id', 'av_submit_form']]);
        submit.setStyle([['margin', '0 0 0 33%']]);
        submit.setMethods([['click', av_report_site]]);
        submit.addChildren([Target.createTextNode('Submit')]);
        reportSiteContent.addChildren([reportInput.getEl(), separator.getEl(), submit.getEl()]);

        return reportSiteContent.getEl();
    }

    function av_multi(tabpage) {
        var str, submit = new Gk_CreateEl('button'), separator = new Gk_CreateEl('hr'), passwordCheckBox = new Gk_CreateEl('div'),
            passwordCheckBoxInput = new Gk_CreateEl('input'), qOneCheckBox = new Gk_CreateEl('div'), qOneCheckBoxInput = new Gk_CreateEl('input'), qOneInput = new Gk_CreateEl('input'),
            qTwoCheckBox = new Gk_CreateEl('div'), qTwoCheckBoxInput = new Gk_CreateEl('input'), qTwoInput = new Gk_CreateEl('input'),
            qThreeCheckBox = new Gk_CreateEl('div'), qThreeCheckBoxInput = new Gk_CreateEl('input'), qThreeInput = new Gk_CreateEl('input'),
            userCheckBox = new Gk_CreateEl('div'), userCheckBoxInput = new Gk_CreateEl('input'), content = new Gk_CreateEl('div');

        content.getEl().className = 'tabpage';
        content.setAttributes([['id', tabpage]]);
        content.setStyle([
            ['margin', '3px'],
            ['padding', '8px'],
            ['width', 'auto'],
            ['color', ' #ffffff'],
            ['borderRadius', '0px 0px 10px 10px'],
            FontStyle
        ]);

        if(AccountInfo !== undefined && AccountInfo.name !== undefined && AccountInfo.name !== '')
        {
            content.addChildren([Target.createTextNode('User: ' +AccountInfo.name), Target.createElement('br')]);
        }
        else
        {
            userCheckBox.setStyle([['margin', '8px 5px 0px 0px']]);
            userCheckBoxInput.setAttributes([
                ['id', 'av_m_user_cb'],
                ['value', 'false'],
                ['type', 'checkbox']
            ]);
            userCheckBoxInput.setStyle([
                ['width', '30px'],
                ['font', '14px monospace']
            ]);
            userCheckBoxInput.setMethods([['click', av_multi_listen]]);
            userCheckBox.addChildren([userCheckBoxInput.getEl(), Target.createTextNode('User')]);
            content.addChildren([userCheckBox.getEl()]);
        }

        if(AccountInfo !== undefined && AccountInfo.questionOne !== undefined && AccountInfo.questionOne !== '')
        {
            str = AccountInfo.questionOne;
            if(str.length > 20)
                str = str.substring(0,20) + " ...";
            content.addChildren([Target.createTextNode(str), Target.createElement('br')]);
        } else {
            qOneCheckBox.setStyle([['margin', '8px 5px 0px 0px']]);
            qOneCheckBoxInput.setAttributes([
                ['id', 'av_m_q_one_cb'],
                ['value', 'false'],
                ['type', 'checkbox']
            ]);
            qOneCheckBoxInput.setStyle([
                ['width', '30px'],
                ['font', '14px monospace']
            ]);
            qOneCheckBoxInput.setMethods([['click', av_multi_listen]]);
            qOneInput.setAttributes([['id', 'av_m_q_one_input'],
                ['value', ''],
                ['type', 'text']
            ]);
            qOneInput.setStyle(RevealStyle2.concat([
                ['background', ' #fff'],
                ['borderColor', ' #666'],
                ['display', 'none']
            ]));
            qOneCheckBox.addChildren([qOneCheckBoxInput.getEl(), Target.createTextNode('Question'), qOneInput.getEl()]);
            content.addChildren([qOneCheckBox.getEl()]);
        }

        if(AccountInfo !== undefined && AccountInfo.questionTwo !== undefined && AccountInfo.questionTwo != '')
        {
            str = AccountInfo.questionTwo;
            if(str.length > 20)
                str = str.substring(0,20) + " ...";
            content.addChildren([Target.createTextNode(str), Target.createElement('br')]);
        } else {
            qTwoCheckBox.setStyle([['margin', '8px 5px 0px 0px']]);
            qTwoCheckBoxInput.setAttributes([
                ['id', 'av_m_q_two_cb'],
                ['value', 'false'],
                ['type', 'checkbox']
            ]);
            qTwoCheckBoxInput.setStyle([
                ['width', '30px'],
                ['font', '14px monospace']
            ]);
            qTwoCheckBoxInput.setMethods([['click', av_multi_listen]]);
            qTwoInput.setAttributes([['id', 'av_m_q_two_input'],
                ['value', ''],
                ['type', 'text']
            ]);
            qTwoInput.setStyle(RevealStyle2.concat([
                ['background', ' #fff'],
                ['borderColor', ' #666'],
                ['display', 'none']
            ]));
            qTwoCheckBox.addChildren([qTwoCheckBoxInput.getEl(), Target.createTextNode('Question'), qTwoInput.getEl()]);
            content.addChildren([qTwoCheckBox.getEl()]);
        }

        if(AccountInfo !== undefined && AccountInfo.questionThree !== undefined && AccountInfo.questionThree != '')
        {
            str = AccountInfo.questionThree;
            if(str.length > 20)
                str = str.substring(0,20) + " ...";
            content.addChildren([Target.createTextNode(str), Target.createElement('br')]);
        } else {
            qThreeCheckBox.setStyle([['margin', '8px 5px 0px 0px']]);
            qThreeCheckBoxInput.setAttributes([
                ['id', 'av_m_q_three_cb'],
                ['value', 'false'],
                ['type', 'checkbox']
            ]);
            qThreeCheckBoxInput.setStyle([
                ['width', '30px'],
                ['font', '14px monospace']
            ]);
            qThreeCheckBoxInput.setMethods([['click', av_multi_listen]]);
            qThreeInput.setAttributes([['id', 'av_m_q_three_input'],
                ['value', ''],
                ['type', 'text']
            ]);
            qThreeInput.setStyle(RevealStyle2.concat([
                ['background', ' #fff'],
                ['borderColor', ' #666'],
                ['display', 'none']
            ]));
            qThreeCheckBox.addChildren([qThreeCheckBoxInput.getEl(), Target.createTextNode('Question'), qThreeInput.getEl()]);
            content.addChildren([qThreeCheckBox.getEl()]);
        }

        if(AccountInfo !== undefined)
        {
            passwordCheckBox.setStyle([['margin', '8px 5px 0 0px']]);
            passwordCheckBoxInput.setAttributes([
                ['id', 'av_m_password'],
                ['value', 'false'],
                ['type', 'checkbox']
            ]);
            passwordCheckBoxInput.setStyle([
                ['width', '30px'],
                ['font', '14px monospace']
            ]);
            passwordCheckBoxInput.setMethods([['click', av_multi_listen]]);
            passwordCheckBox.addChildren([passwordCheckBoxInput.getEl(), Target.createTextNode('Password')]);
            content.addChildren([passwordCheckBox.getEl()]);
        }

        separator.setStyle([
            ['margin', '8px 0 8px 0'],
            ['width', '100%'],
            ['borderColor', '#CEDCE3'],
            ['backgroundColor', '#CEDCE3']
        ]);

        submit.setAttributes([['id', 'av_submit_form']]);
        submit.setStyle([['margin', '0 0 0 33%']]);
        submit.setMethods([['click', av_find_multi_info]]);
        submit.addChildren([Target.createTextNode('Submit')]);
        content.addChildren([separator.getEl(), submit.getEl()]);

        av_attach_method(TargetWindow, 'unload', av_close);
        return content.getEl();
    }

    function av_multi_log_in() {
        var str, submit = new Gk_CreateEl('button'), passwordCheckBox = new Gk_CreateEl('div'),
            passwordCheckBoxInput = new Gk_CreateEl('input'), qOneCheckBox = new Gk_CreateEl('div'), qOneCheckBoxInput = new Gk_CreateEl('input'),
            qTwoCheckBox = new Gk_CreateEl('div'), qTwoCheckBoxInput = new Gk_CreateEl('input'),
            qThreeCheckBox = new Gk_CreateEl('div'), qThreeCheckBoxInput = new Gk_CreateEl('input'),
            userCheckBox = new Gk_CreateEl('div'), userCheckBoxInput = new Gk_CreateEl('input'), content = new Gk_CreateEl('div');

        content.getEl().className = 'tabpage';
        content.setAttributes([['id', 'tabpage_1']]);
        content.setStyle([
            ['margin', '3px'],
            ['padding', '8px'],
            ['width', 'auto'],
            ['color', ' #ffffff'],
            ['borderRadius', '0px 0px 10px 10px'],
            FontStyle
        ]);

        if(AccountInfo.name !== null)
        {
            userCheckBox.setStyle([['margin', '8px 5px 0px 0px']]);
            userCheckBoxInput.setAttributes([
                ['id', 'av_m_user_cb'],
                ['value', 'false'],
                ['type', 'checkbox'],
                ['data', AccountInfo.name]
            ]);
            userCheckBoxInput.setStyle([
                ['width', '30px'],
                ['font', '14px monospace']
            ]);
            userCheckBoxInput.setMethods([['click', av_multi_field_sync]]);
            userCheckBox.addChildren([userCheckBoxInput.getEl(), Target.createTextNode('User: ' +AccountInfo.name)]);
            content.addChildren([userCheckBox.getEl()]);
        }

        if(AccountInfo.questionOne !== null && AccountInfo.questionOne !== '')
        {
            str = AccountInfo.questionOne;
            if(str.length > 20)
                str = str.substring(0,20) + " ...";

            qOneCheckBox.setStyle([['margin', '8px 5px 0px 0px']]);
            qOneCheckBoxInput.setAttributes([
                ['id', 'av_m_q_one_cb'],
                ['value', 'false'],
                ['type', 'checkbox'],
                ['data', AccountInfo.answerOne]
            ]);
            qOneCheckBoxInput.setStyle([
                ['width', '30px'],
                ['font', '14px monospace']
            ]);
            qOneCheckBoxInput.setMethods([['click', av_multi_field_sync]]);

            qOneCheckBox.addChildren([qOneCheckBoxInput.getEl(), Target.createTextNode(str)]);
            content.addChildren([qOneCheckBox.getEl()]);
        }

        if(AccountInfo.questionTwo !== null && AccountInfo.questionTwo !== '')
        {
            str = AccountInfo.questionTwo;
            if(str.length > 20)
                str = str.substring(0,20) + " ...";

            qTwoCheckBox.setStyle([['margin', '8px 5px 0px 0px']]);
            qTwoCheckBoxInput.setAttributes([
                ['id', 'av_m_q_two_cb'],
                ['value', 'false'],
                ['type', 'checkbox'],
                ['data', AccountInfo.answerTwo]
            ]);
            qTwoCheckBoxInput.setStyle([
                ['width', '30px'],
                ['font', '14px monospace']
            ]);
            qTwoCheckBoxInput.setMethods([['click', av_multi_field_sync]]);

            qTwoCheckBox.addChildren([qTwoCheckBoxInput.getEl(), Target.createTextNode(str)]);
            content.addChildren([qTwoCheckBox.getEl()]);
        }

        if(AccountInfo.questionThree !== null && AccountInfo.questionThree !== '')
        {
            str = AccountInfo.questionThree;
            if(str.length > 20)
                str = str.substring(0,20) + " ...";

            qThreeCheckBox.setStyle([['margin', '8px 5px 0px 0px']]);
            qThreeCheckBoxInput.setAttributes([
                ['id', 'av_m_q_three_cb'],
                ['value', 'false'],
                ['type', 'checkbox'],
                ['data', AccountInfo.answerThree]
            ]);
            qThreeCheckBoxInput.setStyle([
                ['width', '30px'],
                ['font', '14px monospace']
            ]);
            qThreeCheckBoxInput.setMethods([['click', av_multi_field_sync]]);

            qThreeCheckBox.addChildren([qThreeCheckBoxInput.getEl(), Target.createTextNode(str)]);
            content.addChildren([qThreeCheckBox.getEl()]);
        }

        passwordCheckBox.setStyle([['margin', '8px 5px 0 0px']]);
        passwordCheckBoxInput.setAttributes([
            ['id', 'av_m_password_cb'],
            ['value', 'false'],
            ['type', 'checkbox'],
            ['data', AccountInfo.password]
        ]);
        passwordCheckBoxInput.setStyle([
            ['width', '30px'],
            ['font', '14px monospace']
        ]);
        passwordCheckBoxInput.setMethods([['click', av_multi_field_sync]]);
        passwordCheckBox.addChildren([passwordCheckBoxInput.getEl(), Target.createTextNode('Password')]);
        content.addChildren([passwordCheckBox.getEl()]);

        av_attach_method(TargetWindow, 'unload', av_close);
        return content.getEl();
    }

    function av_login_dialog() {
        var submit = new Gk_CreateEl('button'), separator = new Gk_CreateEl('hr'), checkBox = new Gk_CreateEl('div'), checkBoxInput = new Gk_CreateEl('input'), accountNameInput = new Gk_CreateEl('input'), accountPasswordInput = new Gk_CreateEl('input'), passwordInput = new Gk_CreateEl('input'), password = new Gk_CreateEl('div'), pin = new Gk_CreateEl('div'), pinInput = new Gk_CreateEl('input'), passcode = new Gk_CreateEl('div'), passcodeInput = new Gk_CreateEl('input'),content = new Gk_CreateEl('div');

        if(Mode === 'change-inline') {
            accountPasswordInput.setAttributes([['id', 'av_account_password'],
                ['value', AccountPassword],
                ['type', 'password']]);
            accountPasswordInput.setStyle(RevealStyle2.concat([
                ['background', ' #fff'],
                ['borderColor', ' #666'],
                ['margin', '0 0 8px 0']
            ]));
            passwordInputs();
            for (i = 0; i < PasswdFields.length; i = i + 1) {
                field = PasswdFields[i][0];
                field.oldBackground = field.style.background;
                field.style.background = FieldFoundStyle;
                av_attach_method(field, 'dblclick', av_update_acct_password_field);
            }
            accountPasswordInput.setMethods([['click', eat_mouse_click],['mouseover', changeToText],['mouseout', changeToPassword]]);
        }

        if(VendorOnly != 0 || VendorAccessOnly == true)
            AccessMode = 3;

        if(AccessMode == 3 || AccessMode == 1) {
            password.setAttributes([['id', 'av_user_pass_div']]);
            password.setStyle([['margin', '0 0 8px 0']]);
            passwordInput.setAttributes([['id', 'av_av_password'],
                ['value', ''],
                ['type', 'password']]);
            passwordInput.setStyle(RevealStyle2.concat([
                ['background', ' #fff'],
                ['borderColor', ' #666']
            ]));
            passwordInput.setMethods([['click', eat_mouse_click]]);
        }

        if(AccessMode == 3 || AccessMode == 2) {
            passcode.setAttributes([['id', 'av_passcode_div']]);
//            if(VendorOnly != 0 || VendorAccessOnly == true)
//                passcode.setStyle([['display', 'block'], ['margin', '0 0 8px 0']]);
//            else
//                passcode.setStyle([['display', 'none'], ['margin', '0 0 8px 0']]);
            passcodeInput.setAttributes([
                ['id', 'av_passcode'],
                ['value', AvPassCode],
                ['type', 'text']
            ]);
            passcodeInput.setStyle(RevealStyle2.concat([
                ['background', ' #fff'],
                ['borderColor', ' #666']
            ]));
            passcodeInput.setMethods(['click', eat_mouse_click]);
            passcode.addChildren([Target.createTextNode('PassCode'), passcodeInput.getEl()]);
        }

        if(AccessMode == 3) {
            pin.setAttributes([['id', 'av_pin_div']]);
            if(VendorOnly == 0)
                pin.setStyle([['display', 'block'], ['margin', '0 0 8px 0']]);
            else
                pin.setStyle([['display', 'none'], ['margin', '0 0 8px 0']]);
            pinInput.setAttributes([
                ['id', 'av_pin'],
                ['value', AvPin],
                ['type', 'password']
            ]);
            pinInput.setStyle(RevealStyle2.concat([
                ['background', ' #fff'],
                ['borderColor', ' #666']
            ]));
            pinInput.setMethods(['click', eat_mouse_click]);
            pin.addChildren([Target.createTextNode('Pin'), pinInput.getEl()]);
        }

        content.getEl().className = 'tabpage';
        content.setAttributes([['id', 'tabpage_1']]);
        content.setStyle([
            ['margin', '3px'],
            ['padding', '8px'],
            ['width', 'auto'],
            ['color', ' #ffffff'],
            ['borderRadius', '0px 0px 10px 10px'],
            FontStyle
        ]);

        if(Mode === 'change-inline')
            password.addChildren([passcode.getEl(),Target.createTextNode('Account Password'),Target.createElement('br'),accountPasswordInput.getEl(),Target.createElement('br'),Target.createTextNode('Password'),Target.createElement('br'),passwordInput.getEl(),pin.getEl()]);
        else {
            if(AccessMode == 3)
                password.addChildren([passcode.getEl(),Target.createTextNode('Password'),Target.createElement('br'),passwordInput.getEl(), pin.getEl()]);
            else if(AccessMode == 2)
                password.addChildren([passcode.getEl()]);
            else if(AccessMode == 1)
                password.addChildren([Target.createTextNode('Password'),Target.createElement('br'),passwordInput.getEl()]);
        }

        accountNameInput.setAttributes([['id', 'av_account_name'],
            ['value', ((AccountName !== undefined) ? AccountName : '')],
            ['type', 'text']
        ]);
        accountNameInput.setStyle(RevealStyle2.concat([
            ['background', ' #fff'],
            ['borderColor', ' #666']
        ]));
        accountNameInput.setMethods(['click', eat_mouse_click]);

        separator.setStyle([
            ['margin', '8px 0 8px 0'],
            ['width', '100%'],
            ['borderColor', '#CEDCE3'],
            ['backgroundColor', '#CEDCE3']
        ]);

        checkBoxInput.setStyle([
            ['width', '30px'],
            ['font', '14px monospace']
        ]);

        if(Mode === 'login' || Mode === 'change' || Mode === 'login-change') {
            checkBox.setStyle([['margin', '8px 5px 0px 33%']]);
            checkBox.setAttributes([['id', 'av_verify_div']]);
            checkBoxInput.setAttributes([
                ['id', 'av_verify_account'],
                ['value', 'false'],
                ['type', 'checkbox']
            ]);
            checkBoxInput.setMethods([['click', av_verify_listen]]);
            checkBox.addChildren([Target.createTextNode('Verify'), checkBoxInput.getEl()]);
        }
        else
        {
            checkBox.setStyle([['margin', '8px 5px 0 18%']]);
            checkBox.setAttributes([['id', 'av_logikey_div']]);
            checkBoxInput.setAttributes([
                ['id', 'av_logikey_only'],
                ['value', 'false'],
                ['type', 'checkbox']
            ]);
            checkBoxInput.setMethods([['click', av_use_2fa_listen]]);
            checkBox.addChildren([Target.createTextNode('Multi-Factor Only'), checkBoxInput.getEl()]);
        }
        submit.getEl().className = 'av_button';
        if(Mode === 'login'  || Mode === 'change'  || Mode === 'login-change') {
            submit.setAttributes([['id', 'av_submit_form']]);
            submit.setStyle([['margin', '0 0 0 33%']]);
            submit.setMethods([['click', av_find_account]]);
            submit.addChildren([Target.createTextNode('Submit')]);
        } else if(Mode === 'change-inline') {
            submit.setAttributes([['id', 'av_submit_form']]);
            submit.setStyle([['margin', '0 0 0 33%']]);
            submit.setMethods([['click', av_update_password]]);
            submit.addChildren([Target.createTextNode('Change')]);
        } else {
            submit.setAttributes([['id', 'av_create_form']]);
            submit.setStyle([['margin', '0 0 0 33%']]);
            submit.setMethods([['click', av_create_account]]);
            submit.addChildren([Target.createTextNode('Create')]);
        }
        content.addChildren([password.getEl()]);
        if(Mode === 'create' || VendorOnly != 0 || VendorAccessOnly == true) {
            content.addChildren([passcode.getEl()]);
        }
        content.addChildren([Target.createTextNode('Account Name'), accountNameInput.getEl(), checkBox.getEl(), separator.getEl(), submit.getEl()]);

//        av_attach_method(TargetWindow, 'unload', av_close);
        return content.getEl();
    }

    function av_help(tabpage) {
        var helpContent = new Gk_CreateEl('div'), ul = new Gk_CreateEl('ul'),li1 = new Gk_CreateEl('li'),li2 = new Gk_CreateEl('li'),li3 = new Gk_CreateEl('li'),li4 = new Gk_CreateEl('li');;
        helpContent.getEl().className = 'tabpage';
        helpContent.setAttributes([['id', tabpage]]);

        li1.addChildren([Target.createTextNode('Login - This tab is used to log in to access your account information.')]);
        li2.addChildren([Target.createTextNode('Create - This tab is used to create a new account in GateKeeper.')]);
        li3.addChildren([Target.createTextNode('Multi - This tab used used for logging in or the creation of a Site that has a Multiple page log in.')]);
        li4.addChildren([Target.createTextNode('Change - This tab is used to change a password to an existing account.')]);
        ul.addChildren([li1.getEl(),li2.getEl(),li3.getEl(),li4.getEl()]);
        ul.setStyle([['padding', '10px !important']]);

        helpContent.setStyle([['margin', '15px']]);
        helpContent.addChildren([ul.getEl()]);
        return helpContent.getEl();
    }

    function av_pin_dialog() {
        if (pinContent !== undefined) {
            return pinContent.getEl();
        }

        var form = new Gk_CreateEl('form'), pinSeedInput = new Gk_CreateEl('input'), separator = new Gk_CreateEl('hr'), submit = new Gk_CreateEl('button');
        pinContent = new Gk_CreateEl('div');
        pinContent.getEl().className = 'tabpage_1';
        pinContent.setAttributes([['id', 'av_account_pin_div']]);
        pinContent.setStyle([
            ['margin', '0'],
            ['padding', '8px'],
            ['width', 'auto'],
            ['color', ' #ffffff'],
            ['borderRadius', '0 0 10px 10px'],
            FontStyle
        ]);

        form.setAttributes([['autocomplete', 'off']]);
        form.setStyle([
            ['margin', '0'],
            ['padding', '0']
        ]);

        pinSeedInput.setAttributes([
            ['id', 'av_av_pin'],
            ['type', 'password'],
            ['value', '']
        ]);
        pinSeedInput.setStyle(RevealStyle2.concat([
            ['background', ' #fff'],
            ['borderColor', ' #666']
        ]));
        separator.setStyle([
            ['margin', '8px 0 8px 0'],
            ['width', '100%'],
            ['borderColor', '#CEDCE3'],
            ['backgroundColor', '#CEDCE3']
        ]);

        submit.setAttributes([
            ['id', 'av_submit_form'],
            ['type', 'button']]);
        submit.setStyle([['margin', '0 0 0 33%']]);
        submit.addChildren([Target.createTextNode('Submit')]);
        submit.setMethods([['click', av_get_pin]]);

        form.addChildren([Target.createTextNode('Pin/Seed'), Target.createElement('br'), pinSeedInput.getEl(), separator.getEl(), submit.getEl()]);
        pinContent.addChildren([form.getEl()]);

        return pinContent.getEl();
    }

    function av_change_password(tabpage) {
        if (changePasswordContent !== undefined) {
            return changePasswordContent.getEl();
        }
        av_locate_fields(true);
        for (i = 0; i < PasswdFields.length; i = i + 1) {
            field = PasswdFields[i][0];
            field.oldBackground = field.style.background;
            field.style.background = FieldFoundStyle;
            av_attach_method(PasswdFields[i][0], 'dblclick', av_update_password_field);
        }

        var password = new Gk_CreateEl('button'), update = new Gk_CreateEl('button'), newPasswordInput = new Gk_CreateEl('input'), separator = new Gk_CreateEl('hr');
        changePasswordContent = new Gk_CreateEl('div');

        changePasswordContent.getEl().className = 'tabpage';
        changePasswordContent.setAttributes([['id', tabpage]]);
        changePasswordContent.setStyle([
            ['margin', '0'],
            ['padding', '8px'],
            ['width', 'auto'],
            ['color', ' #ffffff'],
            ['borderRadius', '0 0 10px 10px'],
            FontStyle
        ]);

        newPasswordInput.setAttributes([['id', 'av_new_password_input'],
            ['type', 'password']
        ]);
        newPasswordInput.setStyle(RevealStyle2.concat([
            ['background', ' #fff'],
            ['borderColor', ' #666']
        ]));
        newPasswordInput.setMethods([['mouseover', changeToText],['mouseout', changeToPassword],['blur', av_grab_password]]);

        password.setAttributes([
            ['type', 'button']]);
        password.setStyle([['margin', '5px 0 0 33%'], ['width', '110px; !important']]);
        password.addChildren([Target.createTextNode('Get')]);
        password.setMethods([['click', av_gen_password]]);

        separator.setStyle([
            ['margin', '8px 0 8px 0'],
            ['width', '100%'],
            ['borderColor', '#CEDCE3'],
            ['backgroundColor', '#CEDCE3']
        ]);

        update.setAttributes([
            ['type', 'button']]);
        update.setStyle([['margin', '5px 0 0 33%']]);
        update.addChildren([Target.createTextNode('Update')]);
        update.setMethods([['click', av_update_password]]);

        changePasswordContent.addChildren([Target.createTextNode('New Password'), Target.createElement('br'), newPasswordInput.getEl(), password.getEl(), separator.getEl(), update.getEl()]);

        return changePasswordContent.getEl();
    }

    function av_dialog(tab) {
        stripPassBoxChild(ParentDiv);
        parent(av_tabs_layout());
        init_tabs(tab);
    }

    function av_tabs_layout() {
        var wrapperDiv = new Gk_CreateEl('div'),tabContainerDiv = new Gk_CreateEl('div'),tabsDiv = new Gk_CreateEl('div'),tabsContentDiv = new Gk_CreateEl('div'),
            ul = new Gk_CreateEl('ul'),li1 = new Gk_CreateEl('li'),li2 = new Gk_CreateEl('li'),li3 = new Gk_CreateEl('li'),li4 = new Gk_CreateEl('li');

        tabsContentDiv.setAttributes([['id', 'tabscontent']]);
        tabsContentDiv.setStyle([
            ['borderRadius', '0px 0px 10px 10px']
        ]);
        li1.setAttributes([['id', 'tabHeader_1']]);
        li2.setAttributes([['id', 'tabHeader_2']]);
        if((/^login/).test(Mode)) {
            li1.addChildren([Target.createTextNode('Login')]);
            li2.addChildren([Target.createTextNode('Help')]);
            ul.addChildren([li1.getEl(),li2.getEl()]);
            tabsContentDiv.addChildren([av_login_dialog(),av_help('tabpage_2')]);

            if(Mode == 'login-multi') {
                Mode = 'multi';
            } else if(Mode == 'login-change'){
                Mode = 'change';
            }
        } else if((/^multi/).test(Mode)) {
            li1.addChildren([Target.createTextNode('Multi')]);
            tabsContentDiv.addChildren([av_multi_log_in(),av_help('tabpage_2')]);
            li2.addChildren([Target.createTextNode('Help')]);
            ul.addChildren([li1.getEl(),li2.getEl()]);
        } else if((/^create/).test(Mode)) {
            if(Mode == 'create-rollup') {
                li1.addChildren([Target.createTextNode('Create')]);
                li2.addChildren([Target.createTextNode('Help')]);
//                av_multi_set_mode(1);
                tabsContentDiv.addChildren([av_multi('tabpage_1'),av_help('tabpage_2')]);
                ul.addChildren([li1.getEl(),li2.getEl()]);
            } else if(Mode == 'create-multi') {
                li1.addChildren([Target.createTextNode('Create')]);
                li2.addChildren([Target.createTextNode('Help')]);
                tabsContentDiv.addChildren([av_login_dialog(),av_help('tabpage_2')]);
                ul.addChildren([li1.getEl(),li2.getEl()]);
            } else {
                li1.addChildren([Target.createTextNode('Create')]);
                li2.addChildren([Target.createTextNode('Multi')]);
                li3.setAttributes([['id', 'tabHeader_3']]);
                li3.addChildren([Target.createTextNode('Help')]);
                tabsContentDiv.addChildren([av_login_dialog(),av_multi('tabpage_2'),av_help('tabpage_3')]);
                ul.addChildren([li1.getEl(),li2.getEl(),li3.getEl()]);
            }
        } else if((/^change/).test(Mode)) {
            if(Mode == 'change-inline') {
                li1.addChildren([Target.createTextNode('Change')]);
                li2.addChildren([Target.createTextNode('Help')]);
                tabsContentDiv.addChildren([av_login_dialog(), av_help('tabpage_2')]);
                ul.addChildren([li1.getEl(),li2.getEl()]);
            } else {
                li1.addChildren([Target.createTextNode('Change')]);
                li2.addChildren([Target.createTextNode('Help')]);
                tabsContentDiv.addChildren([av_change_password('tabpage_1'), av_help('tabpage_2')]);
                ul.addChildren([li1.getEl(),li2.getEl()]);
            }
        } else if((/^pin/).test(Mode)) {
            li1.addChildren([Target.createTextNode('Pin')]);
            tabsContentDiv.addChildren([av_pin_dialog(),av_help('tabpage_2')]);
            li2.addChildren([Target.createTextNode('Help')]);
            ul.addChildren([li1.getEl(),li2.getEl()]);
        } else if(Mode == 'verify') {
            li1.addChildren([Target.createTextNode('Verify')]);
            tabsContentDiv.addChildren([av_info_dialog(),av_help('tabpage_2')]);
            li2.addChildren([Target.createTextNode('Help')]);
            ul.addChildren([li1.getEl(),li2.getEl()]);
        } else if(Mode == 'accounts') {
            li1.addChildren([Target.createTextNode('Accounts')]);
            tabsContentDiv.addChildren([get_account_list(),av_help('tabpage_2')]);
            li2.addChildren([Target.createTextNode('Help')]);
            ul.addChildren([li1.getEl(),li2.getEl()]);
        }

        tabsDiv.setAttributes([['id', 'tabs']]);
        tabsDiv.addChildren([ul.getEl()]);

        tabContainerDiv.setAttributes([['id', 'tabContainer']]);
        tabContainerDiv.setStyle([
            ['borderRadius', '0px 0px 10px 10px'],
            ['margin', '0'],
            ['padding', '14px 0px 0px'],
            ['backgroundColor', '#CEDCE3'],
            ['font', '12px tahoma']
        ]);
        tabContainerDiv.addChildren([tabsDiv.getEl(), tabsContentDiv.getEl()]);

//        wrapperDiv.setAttributes([['id', 'wrapper']]);
//        wrapperDiv.setStyle([['borderRadius', '0 0 20px 20px']]);
//        wrapperDiv.addChildren([tabContainerDiv.getEl()]);

        return tabContainerDiv.getEl();
    }

    function parent(content) {
        var child;
//        console.log("ParentDiv: " + ((ParentDiv === undefined) ? 'undefined' : 'defined'));

        if (ParentDiv === undefined) {
            var passBox = new Gk_CreateEl('div'), logo = new Gk_CreateEl('img');
            passBox.getEl().className = 'cleanslate';
            passBox.setAttributes([['id', 'av_pass_box']]);
            passBox.setStyle([
                ['zIndex', '99999'],
                ['position', 'absolute'],
                ['top', '0px'],
//                ['top', (BoxPosition[1] + ScrollY) + 'px'],
                BoxPositionX,
                ['width', '300px'],
                ['margin', '10px'],
                ['padding', '0'],
                ['background', '#CEDCE3'],
                ['borderStyle', 'solid'],
//                ['borderColor', '#00ff00'],
                ['borderColor', '#CEDCE3 '],
                ['borderWidth', '12px'],
                ['borderRadius', '15px'],
                ['boxShadow', '1px 1px 5px 10px #1879D1'],
                ['opacity', '0.95'],
                ['filter', 'alpha(opacity=95)'],
                ['visibility', 'visible']
            ]);

            ParentDiv = passBox.getEl();
            var passBoxBorder = new Gk_CreateEl('div');
            passBoxBorder.setAttributes([['id', 'av_pass_box_header']]);
            passBoxBorder.setStyle([
//                ['background', '-moz-linear-gradient(top, #0C91EC 0%, #257AB6 100%'],
//                ['background', '-webkit-gradient(linear, left top, left bottom, color-stop(0%,#0C91EC), color-stop(100%,#257AB6))'],
                ['borderRadius', '10px 10px 0px 0px'],
                ['margin', '0'],
                ['padding', '7px 5px 5px 7px'],
                ['width', 'auto'],
                ['background', '#1C6393'],
                ['color', ' #ffffff'],
                FontStyle,
                ['fontWeight', 'bold'],
                ['cursor', 'move']
            ]);

            var closeLink = new Gk_CreateEl('a');
            closeLink.setAttributes([['href', ' #']]);
            closeLink.setStyle(FontStyleToolbarLink.concat([['position', 'absolute'], ['right', '10px']]));
            closeLink.setMethods([['click', av_close]]);
            closeLink.addChildren([Target.createTextNode('close')]);
            var reportLink = new Gk_CreateEl('a');
            reportLink.setMethods([['click', av_load_report_site]]);
            reportLink.setStyle(FontStyleToolbarLink.concat([['position', 'absolute'], ['right', '50px']]));
            reportLink.addChildren([Target.createTextNode('report')]);

            logo.setAttributes([
                ['src', 'https://trssolutions.net/img/gatekeeper-logo-grn-122x25.png']
            ]);

            passBoxBorder.setMethods([['mousedown', av_drag_start]]);
            passBoxBorder.addChildren([logo.getEl(), reportLink.getEl(), closeLink.getEl()]);

            var passBoxChild = new Gk_CreateEl('div');
            passBoxChild.setAttributes([['id', 'av_pass_box_child']]);
            passBoxChild.setStyle([
                ['margin', '0'],
                ['padding', '0'],
//                ['borderStyle', 'solid'],
//                ['borderColor', ' #ccc'],
//                ['borderWidth', '1px'],
                ['borderRadius', '0 0 10px 10px'],
                ['textAlign', 'left'],
                ['background', '#1879D1']
            ]);
            passBoxChild.addChildren([passBoxBorder.getEl(), (content === undefined) ? [] : content]);
            passBox.addChildren([passBoxBorder.getEl(),passBoxChild.getEl()]);
            Target.body.appendChild(ParentDiv);
        } else {
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

    function av_close(e) {
        if (Target.getElementById('av_pass_box')) {
            ScrollPosition = av_get_scroll_position();
            BoxPosition = [0, parseInt(Target.getElementById('av_pass_box').style.top, 0)];
            BoxPosition[0] = (Target.getElementById('av_pass_box').style.right) ? parseInt(Target.getElementById('av_pass_box').style.right, 0) : 'left';
            Target.body.removeChild(Target.getElementById('av_pass_box'));
        }

        stripPassBoxChild(ParentDiv);
        if (e !== undefined) {
            e.preventDefault();
        }

        if (PasswdFields !== 'undefined') {
            for (i = 0; i < (PasswdFields.length); i = i + 1) {
                av_detach_method(PasswdFields[i][0], 'dblclick', av_set_password_field);
                PasswdFields[i][0].style.background = PasswdFields[i][0].oldBackground;
                PasswdFields[i][0].removeEventListener("mouseover", changeToText, false);
                PasswdFields[i][0].removeEventListener("mouseout", changeToPassword, false);
            }
        }
        PasswdFields = [];
        if (UserFields !== 'undefined') {
            for (i = 0; i < (UserFields.length); i = i + 1) {
                av_detach_method(UserFields[i][0], 'dblclick', av_set_user_field);
                UserFields[i][0].style.background = UserFields[i][0].oldBackground;
            }
        }
        UserFields = [];
        CalledGetSiteInfo = false;
    }

    function av_pass_box_close() {
        var i;
        if (Target.getElementById('av_pass_box')) {
            stripPassBoxChild(ParentDiv);
            ScrollPosition = av_get_scroll_position();
            BoxPosition = [0, parseInt(Target.getElementById('av_pass_box').style.top, 0)];
            BoxPosition[0] = (Target.getElementById('av_pass_box').style.right) ? parseInt(Target.getElementById('av_pass_box').style.right, 0) : 'left';
            Target.getElementById('av_pass_box').style.visibility = "hidden";
        }
        if (PasswdFields !== 'undefined') {
            for (i = 0; i < (PasswdFields.length); i = i + 1) {
                av_detach_method(PasswdFields[i][0], 'dblclick', av_set_password_field);
            }
        }
        if (UserFields !== 'undefined') {
            for (i = 0; i < (UserFields.length); i = i + 1) {
                av_detach_method(UserFields[i][0], 'dblclick', av_set_user_field);
            }
        }
    }

    function av_find_account(e) {
        if(AccessMode == 3 || AccessMode == 1)
            AvPassword = Target.getElementById('av_av_password').value;
        else
            AvPassword = 'none';
        var passcodeEl = Target.getElementById('av_passcode');
        if(passcodeEl != null)
            AvPassCode = Target.getElementById('av_passcode').value;
        AccountName = Target.getElementById('av_account_name').value;
        if(AccessMode == 3)
            AvPin = Target.getElementById('av_pin').value;
        else
            AvPin = 'none';

        av_get_account(AvPassword, AvPassCode, AvPin, AccountName);
        e.stopPropagation();
        return false;
    }

    function av_get_pin() {
        var request,
            ret,
            done = 4,
            ok = 200,
            pin;
        if(AvPin != '') {
            pin = AvPin;
        } else {
            pin = Target.getElementById('av_av_pin').value;
            if (pin === undefined || pin === '') {
                alert("Pin/Seed Required");
                return false;
            }
            else
                Target.getElementById('av_av_pin').value = '';
        }
        if (AvPassword === undefined || AvPassword === '') {
            alert("Missing Password");
            return false;
        }
        if (AccountName === undefined || AccountName === '') {
            alert("Missing Account Name");
            return false;
        }

        var token = 'none';
        if (UseAuthEntry) {
            token = AuthEntryToken;
        }
        request = createCORSRequest("GET", ServerURL +"bm/password/" + BookmarkId + "/" +
            pin + "/" + AccountId + "/" + SessionId + "/" + token);
        request.withCredentials = "true";
        request.onreadystatechange = function () {
            if (request.readyState === done && request.status === ok) {
                if (request.responseText) {
                    ret = JSON.parse(request.responseText);
                    if (ret.status !== undefined && ret.status !== 'ok') {
                        alert(ret.status);
                    } else {
                        AccountPassword = (ret.password === undefined) ? '' : ret.password;
                        av_mang_user_password(AutoFill);
                        if (!AutoFill) {
                            Mode = 'verify';
                            av_dialog("tabHeader_1");
//                            parent(av_info_dialog());
                        } else {
                            av_close();
                        }
                    }
                }
            }
        };
        request.send();

        return true;
    }

    function av_get_password() {
        var request,
            ret,
            done = 4,
            ok = 200;

        var sessionToken = 'none'
        if(Target.cookie.indexOf('sessionToken') != -1) {
            sessionToken = getCookie('sessionToken');
            eraseCookie('sessionToken');
//            Target.cookie="sessionToken=none";
        }
        request = createCORSRequest("GET", ServerURL +"bm/password/multi/" + BookmarkId + "/" +
            AccountId + "/" + AccountName + "/" + sessionToken + "/" + IsMulitLogin);
        request.withCredentials = "true";
        request.onreadystatechange = function () {
            if (request.readyState === done && request.status === ok) {
                if (request.responseText) {
                    ret = JSON.parse(request.responseText);
                    if (ret.status !== undefined && ret.status !== 'ok') {
                        alert(ret.status);
                    } else {
                        InputValue = ret.password;
                    }
                }
            }
        };
        request.send();

        return true;
    }

    function av_update_password() {
        var request, pin, passCode, password,
            ret,
            done = 4,
            ok = 200;

        if(AccountPassword == undefined)
            AccountPassword = 'none';

        passCode = Target.getElementById('av_passcode').value;
        if (passCode === undefined || passCode === '')
            passCode = 'none';

        pin = Target.getElementById('av_pin').value;
        if (pin === undefined || pin === '')
            pin = 'none';

        password = Target.getElementById('av_av_password').value;
        if (password === undefined || password === '') {
            alert("Missing GateKeeper Password.");
            return false;
        }

        request = createCORSRequest("POST", ServerURL +"update/" + BookmarkId +'/' +pin +'/' +passCode);
        request.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        request.setRequestHeader('Accept', 'application/json');
        request.onreadystatechange = function () {
            if (request.readyState === done && request.status === ok) {
                if (request.responseText) {
                    ret = JSON.parse(request.responseText);
                    if (ret.status !== undefined && ret.status !== 'ok') {
                        alert(ret.status);
                    } else {
                        av_detach_listner();
                        av_close();
                    }
                }
            }
        };

        JsonPayLoad.password = password;
        JsonPayLoad.accountId = AccountId;
        JsonPayLoad.type = AccountType;
        JsonPayLoad.accountPassword = Target.getElementById('av_account_password').value;

        request.send(JSON.stringify(JsonPayLoad));

        return true;
    }

    function av_create_account() {
        var request,
            ret;
        JsonPayLoad = {};
        request = createCORSRequest("POST", ServerURL +"bm/newaccount/" + BookmarkId);
        request.withCredentials = "true";
        request.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        request.setRequestHeader('Accept', 'application/json');
        request.onreadystatechange = function () {
            var done = 4, ok = 200;
            if (request.readyState === done && request.status === ok) {
                if (request.responseText) {
                    ret = JSON.parse(request.responseText);
//                    console.log("Return Status: " +ret.status);
                    SessionId = (ret.sessionId === undefined) ? '' : ret.sessionId;
                    if (ret.status !== undefined && ret.status === 'ok') {
                        av_detach_listner();
                        av_close();
//                        console.log("Created Account");
                    } else if (ret.status !== undefined && ret.status !== 'ok') {
                        alert(ret.status);
                    } else {
                        alert("lost at this point");
                    }
                }
            }
        };

        AvPassCode = Target.getElementById('av_passcode').value;
        if (AvPassCode === undefined || AvPassCode === '') {
            JsonPayLoad.passCode = 'none';
        } else {
            JsonPayLoad.passCode = AvPassCode;
        }

        AvPassword = Target.getElementById('av_av_password').value;
        if (AvPassword === undefined || AvPassword === '') {
            alert("Missing GateKeeper Password.");
            return false;
        } else {
            JsonPayLoad.password = AvPassword;
        }
        if (AccountUser === undefined || AccountUser === '') {
            if(MultiCreate !== true) {
                alert("Missing Account User.");
                return false;
            }
        } else {
            JsonPayLoad.accountUser = AccountUser;
        }
        if (AccountPassword === undefined || AccountPassword === '') {
            if(MultiCreate !== true) {
                alert("Missing Account Password.");
                return false;
            }
        } else {
            JsonPayLoad.accountPassword = AccountPassword;
        }
        if (AccountName === undefined || AccountName === '') {
            AccountName = Target.getElementById('av_account_name').value;
            if (AccountName === undefined) {
                alert("Missing Account Name.");
                return false;
            } else {
                JsonPayLoad.accountName = AccountName;
            }
        } else {
            JsonPayLoad.accountName = AccountName;
        }

        JsonPayLoad.url = TargetHref;
        request.send(JSON.stringify(JsonPayLoad));

        return true;
    }

    function createCORSRequest(method, url) {
        var xhr = request = new XMLHttpRequest();
        if ("withCredentials" in xhr) {
            xhr.open(method, url, true);
        } else if (typeof XDomainRequest != "undefined") {
            xhr = new XDomainRequest();
            xhr.open(method, url);
        } else {
            alert("Option Not Available: Cross Domain calls not supported!")
        }
        return xhr;
    }

    function av_multi_set_mode(mode) {
        var request,
            ret;

        var token = 'none';
        request = createCORSRequest("POST", ServerURL +"multi/mode/" + BookmarkId + "/" + mode);
        request.withCredentials = "true";
        request.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        request.setRequestHeader('Accept', 'application/json');
        request.onreadystatechange = function () {
            var done = 4, ok = 200;
            if (request.readyState === done && request.status === ok) {
                if (request.responseText) {
                    ret = JSON.parse(request.responseText);
//                    console.log("Return Status: " +ret.status);
                    if (ret.status !== undefined && ret.status !== 'ok') {
                        alert(ret.status);
                    }
                }
            }
        };
        request.send();
        PasswdFields.splice(0, 1);
        return true;
    }

    function av_multi_rollup(type) {
        var request,
            ret,
            isPassword = (type == 'password');

        var token = 'none';
        if(LogiKeyOnly == true)
            token = AuthEntryToken;
        request = createCORSRequest("POST", ServerURL +"multi/" + type);
        request.withCredentials = "true";
        request.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        request.setRequestHeader('Accept', 'application/json');
        request.onreadystatechange = function () {
            var done = 4, ok = 200;
            if (request.readyState === done && request.status === ok) {
                if (request.responseText) {
                    ret = JSON.parse(request.responseText);
//                    console.log("Return Status: " +ret.status);
                    SessionId = (ret.sessionId === undefined) ? '' : ret.sessionId;
                    if (ret.status !== undefined && ret.status === 'ok') {
//                        console.log("Created Account");
                        if(isPassword === true) {
                            stripPassBoxChild(ParentDiv);
                            Mode = 'create-multi';
                            MultiCreate = true;
                            av_dialog("tabHeader_1");
//                            parent(av_login_dialog());
                        } else {
                            av_detach_listner();
                            av_close();
                        }
                    } else if (ret.status !== undefined && ret.status !== 'ok') {
                        alert(ret.status);
                    } else {
                        alert("lost at this point");
                    }
                }
            }
        };
        JsonPayLoad.bookmarkId = BookmarkId;
        request.send(JSON.stringify(JsonPayLoad));
        if(PasswdFields.length > 0)
            PasswdFields.splice(0, 1);
        return true;
    }

    function av_get_account(password, passCode, pin, accountName) {
        var date = new Date,
            request,
            ret,
            Custom,
            mode = 'none',
            deviceId = 'generic';
        if (pin === undefined || pin === '') {
            pin = 'none';
        }
        if (passCode === undefined || passCode === '') {
            passCode = 'none';
        }
        if (password === undefined || password === '') {
            return false;
        }
        if (accountName === undefined || accountName === '') {
            return false;
        }

        if(DeviceId !== undefined)
            deviceId = DeviceId;

        if(IsMulitLogin)
            mode = 'multi';
        else if(PasswordCnt > 1 && FoundBothFields == false)
            mode = 'change';
        else if(FoundBothFields)
            mode = 'basic';
        else if(PasswdFields.length > 0 && PasswdFields[0][1] == 1)
            mode = 'change';

        var sessionToken = 'none';
        if(Target.cookie.indexOf('sessionToken')  != -1) {
            sessionToken = getCookie('sessionToken');
            eraseCookie('sessionToken');
//            Target.cookie="sessionToken=none";
        }

        if(AccessMode == 3) {
        request = createCORSRequest("GET", ServerURL +"bm/account/" + deviceId + "/" + BookmarkId + "/" + password
            + "/" + pin + "/" + AccountId + "/" + passCode + "/" + mode + "/" + sessionToken);
        } else if (AccessMode == 2) {
            request = createCORSRequest("GET", ServerURL +"bm/account/pc/" + deviceId + "/" + BookmarkId + "/" +
                AccountId + "/" + passCode + "/" + mode + "/" + sessionToken);
        } else if (AccessMode == 1) {
            request = createCORSRequest("GET", ServerURL +"bm/account/pw/" + deviceId + "/" + BookmarkId + "/" + password
                + "/" + AccountId + "/" + mode + "/" + sessionToken);
        }

        request.withCredentials = "true";
        request.onreadystatechange = function () {
            var done = 4, ok = 200;
            if (request.readyState === done && request.status === ok) {
                if (request.responseText) {
                    ret = JSON.parse(request.responseText);
                    if(ret.formXpath !== undefined)
                        FormXpath = ret.formXpath;
                    if(ret.userInputXpath !== undefined)
                        UserInputXpath = ret.userInputXpath;
                    if(ret.passwordInputXpath !== undefined)
                        PasswordInputXpath = ret.passwordInputXpath;
                    if(ret.submitInputXpath !== undefined)
                        SubmitInputXpath = ret.submitInputXpath;
                    if(ret.submitInputId !== undefined)
                        SubmitInputId = ret.submitInputId;
                    if(ret.name !== undefined)
                        AccountName = ret.name;
                    if (ret.password !== undefined)
                        AccountPassword =  ret.password;
                    if (ret.user !== undefined)
                        AccountUser = ret.user;
                    if (ret.accountId !== undefined)
                        AccountId =  ret.accountId;
                    if (ret.sessionId !== undefined)
                        SessionId = ret.sessionId;
                    if (ret.sessionToken != undefined)
                        createCookie('sessionToken', ret.sessionToken, 30);
//                        Target.cookie="sessionToken=" +ret.sessionToken;
                    if(ret.status != 'ok') {
                        alert(ret.status);
                        return false;
                    }
                    if(AccountType == 4 && ret.status == 'ok' && ret.accountInfo !== undefined) {
                        if(ret.accountInfo)
                            AccountInfo = JSON.parse(ret.accountInfo);
                        Mode = 'multi';
                        av_dialog("tabHeader_1");
//                        parent(av_multi_log_in(JSON.parse(ret.accountInfo)));
                        return false;
                    } else if(AccountType == 4 && ret.status == 'ok') {
                        if(PasswordCnt > 1 && Mode == 'login-change') {
                            Mode = 'change';
                            av_dialog("tabHeader_1");
                            return false;
                        }
                    }
                    if (ret.custom !== undefined && ret.custom == 'true') {
                        SessionId = ret.sessionId;
                        stripPassBoxChild(ParentDiv);
                        Mode = 'pin';
                        av_dialog("tabHeader_1");
//                        parent(av_pin_dialog());
                        return false;
                    }
                    if (ret.status !== undefined && ret.status === 'no match') {
                        alert(decodeURIComponent("No Match for URL: " + av_get_host_name(TargetHref)));
                    } else if (ret.status !== undefined) {
                        if (ret.status !== 'ok') {
                            alert(decodeURIComponent(ret.status));
                        } else {
                            if (ParentDiv !== undefined)
                                av_pass_box_close();
//                                stripPassBoxChild(ParentDiv);
//                            Target.getElementById('av_pass_box').style.visibility = "hidden";
                            if (AccountPassword === '' && pin == 'none') {
                                SessionId = ret.sessionId;
                                Mode = 'pin';
                                av_dialog("tabHeader_1");
//                                parent(av_pin_dialog());
                                return false;
                            } else if (AccountPassword === '' && pin != 'none') {
                                av_get_pin();
                                return false;
                            } else if (AccountPassword === '')
                                    alert("Wrong Credentials.");
                                else {
                                    if(Mode == 'login-change' && PasswordCnt < 2) {
                                        Mode = 'change-inline';
                                        av_dialog("tabHeader_1");
    //                                    parent(av_change_password());
                                    } else if(Mode == 'login-change' && PasswordCnt > 1) {
                                        Mode = 'change';
                                        av_dialog("tabHeader_1");
    //                                    parent(av_change_password());
                                    } else {
                                        if(AutoFill)
                                            login();
                                        else if (!AutoFill) {
                                            Mode = 'verify';
                                            av_dialog("tabHeader_1");
    //                                        parent(av_info_dialog());
                                        } else {
                                            av_mang_user_password(AutoFill);
                                        }
                                    }
                                }
                            }
                    }
                }
            } else if(request.readyState === done && request.status !== ok) {
                debugger;
                alert("There is a problem");
//                console.log(request.responseText);
            }
        };
        request.send();

        return true;
    }

    function av_gen_password() {
        var request,
            ret,
            parentElem;

        request = new XMLHttpRequest();
        request = createCORSRequest("GET", ServerURL +"multi/password/" + BookmarkId);
        request.withCredentials = "true";
        request.onreadystatechange = function () {
            var done = 4, ok = 200;
            if (request.readyState === done && request.status === ok) {
                if (request.responseText) {
                    ret = JSON.parse(request.responseText);
                    if (ret.status !== 'ok') {
                        alert(ret.status);
                    }
                    else {
                        if(ret.password == '')
                            alert('No Password returned from server');
                        AccountPassword = ret.password;
                        Target.getElementById('av_new_password_input').value = AccountPassword;
                    }
                }
            }
        };
        request.send(JSON.stringify({"url":TargetHref}));

        return true;
    }

    function av_report_site() {

        var request,
            ret,
            parentElem;

        request = new XMLHttpRequest();
        request = createCORSRequest("POST", ServerURL +"reportsite/" + BookmarkId + "/" +TargetHref);
        request.withCredentials = "true";
        request.onreadystatechange = function () {
            var done = 4, ok = 200;
            if (request.readyState === done && request.status === ok) {
                if (request.responseText) {
                    ret = JSON.parse(request.responseText);
                    if (ret.status !== 'ok') {
                        alert(ret.status);
                    }
                    else
                        av_close();
                }
            }
        };
        request.send();

        return true;
    }

    function av_get_site_info(frame, bookmarkId, remoteWindow) {
        BookmarkId = bookmarkId;
        RemoteWindow = remoteWindow;
        init(frame);
        if ( Target.getElementById('av_pass_box') !== null && Target.getElementById('av_pass_box').style.visibility === 'visible')
            return false;
        if(CalledGetSiteInfo === true)
            return;
        else
            CalledGetSiteInfo = true;

        var date = new Date,
            request,
            ret,
            siteInfo = '',
            parentElem,
            accountInfo,
            retMode;

        var sessionToken = 'none'
        if(Target.cookie.indexOf('sessionToken')  != -1) {
            sessionToken = getCookie('sessionToken');
            eraseCookie(sessionToken);
//            Target.cookie="sessionToken=none";
        }
        try {
        request = createCORSRequest("GET", ServerURL +"siteinfo/" + BookmarkId + "/" + av_get_host_name() + "/" +sessionToken);
        request.withCredentials = "true";
        request.onreadystatechange = function () {

            var done = 4, ok = 200;
            if (request.readyState === done && request.status === ok) {
                if (request.responseText) {
                    ret = JSON.parse(request.responseText);

                    if(ret.status == undefined) {
                        alert("Missing return status");
                        return false;
                    }

                    if (ret.status === 'no match') {
                        siteInfo = (ret.siteInfo !== undefined)? JSON.parse(ret.siteInfo): '' ;
                        if (siteInfo === '') {
                            if(!hasPasswordInput()) {
                                Mode = 'create-rollup';
                                av_dialog("tabHeader_1");
                                return false;
                            } else
                                av_locate_fields(false);
                        } else {
                            if(siteInfo.isMultiPage == true) {
                                Mode = 'create-rollup';
                                av_dialog("tabHeader_1");
                                return false;
                            } else {
                                av_locate_fields(false);
                                if(UserFields.length > 0 && PasswdFields.length == 0) {
                                    if(!av_locate_fields2(siteInfo))
                                        av_locate_fields(true);
                                }
                            }
                        }
                        if(UserFields.length > 0 && PasswdFields.length == 0)
                        {
//                            parent(av_multi_create_dialog());
                            Mode = 'create-multi';
                            av_dialog("tabHeader_2");
                        }
                        else
                        {
                            Mode = 'create';
                            av_attach_listner();
                            av_dialog("tabHeader_1");
//                            parent(av_login_dialog());
                        }
                    } else if (ret.status == 'ok') {
                        AccessMode = ret.bookmarkAccess;
                        if(ret.accounts != undefined && ret.accounts.length > 0)
                            retMode = ret.accounts[0].mode;
                        if(retMode == undefined && ret.mode != undefined)
                            retMode = ret.mode;
                        if(retMode == undefined && ret.accountInfo != undefined)
                            retMode = accountInfo.mode;
                        if(retMode == '1') {
                            AccountInfo = JSON.parse(ret.accountInfo);
                            Mode = 'create-rollup';
                            av_dialog("tabHeader_1");
    //                        parent(av_multi(JSON.parse(ret.accountInfo)));
                        } else if (retMode == '2') {
                            AccountName = ret.accounts[0].accountName;
                            AccountId  = ret.accounts[0].accountId;
                            AccountType  = ret.accounts[0].accountType;
                            VendorOnly = ret.accounts[0].vendorOnly;
                            SessionToken = ret.accounts[0].sessionToken;
                            if(ret.accounts[0].siteInfo != undefined)
                                SiteInfo = JSON.parse(ret.accounts[0].siteInfo);
//                            Target.cookie="sessionToken=" +SessionToken;
                            createCookie('sessionToken', SessionToken, 30);
                            if(ret.accounts[0].accountInfo != undefined) {
                                AccountInfo = JSON.parse(ret.accounts[0].accountInfo);
                                Mode = 'multi';
                                IsMulitLogin = true;
                            } else {
                                Mode = 'login';
                                IsMulitLogin = true;
                            }
                            av_dialog("tabHeader_1");
    //                        parent(av_multi_log_in(JSON.parse(ret.accountInfo)));
                        } else {
                            if (retMode == '0') {
                                if(ret.accounts.length == 1) {
                                    AccountName = ret.accounts[0].accountName;
                                    AccountType = ret.accounts[0].accountType;
                                    AccountId  = ret.accounts[0].accountId;
                                    VendorOnly = ret.accounts[0].vendorOnly;
                                    VendorAccessOnly = ret.accounts[0].vendorAccessOnly;
    //                                    console.log("VendorOnly -> " +VendorOnly);
                                    FoundBothFields = av_site_info_check(ret.accounts[0].siteInfo);
                                    if(FoundBothFields === false)
                                    {
                                        RemoteWindow.BookmarkCtrl.setMode(1);
                                        return false;
                                    }
                                    PasswordCnt = passwordInputCount();
                                    if(FoundBothFields) {
                                        Mode = "login";
                                        av_dialog("tabHeader_1");
                                    } else if(PasswordCnt > 1) {
//                                        Mode = "login-change";
                                        Mode = "change-inline";
                                        av_dialog("tabHeader_1");
                                        return;
                                    } else {
                                        if(ret.accounts[0].siteInfo !== undefined) {
                                            if (ret.accounts[0].siteInfo.length > 2) {
                                                siteInfo = JSON.parse(ret.accounts[0].siteInfo);
                                                //                                            console.log("siteInfo: " + siteInfo);
                                            }
                                            if (siteInfo === undefined || siteInfo === '') {
                                                if(AccountType != 4)
                                                    av_locate_fields(true);
                                                else if(AccountType == 4 && hasPasswordInput() == false) {
                                                    Mode = 'login-multi';
                                                    IsMulitLogin = true;
                                                }
                                            }
                                            else {
                                                if(AccountType == 4) {
                                                    if(siteInfo.type != undefined && siteInfo.type == 'multi') {
                                                        Mode = 'login-multi';
                                                        IsMulitLogin = true;
                                                    } else {
                                                        Mode = 'login';
                                                    }
                                                } else if(!av_locate_fields2(siteInfo))
                                                    av_locate_fields(false);
                                            }
                                        }
                                        if(PasswdFields.length > 0 && PasswdFields[0][1] == 1) {
                                            Mode = "change-inline";
                                            av_locate_fields(false);
                                        }
                                        else {
                                            Mode = "login";
                                            av_locate_fields(true);
                                        }
                                        av_dialog("tabHeader_1");
                                    }
                                } else {
                                    Accounts = ret.accounts;
                                    Mode = 'accounts';
                                    av_dialog("tabHeader_1");
                                }
                            } else {
                                alert("Error: No account found");
                            }
                        }
                    }
                }
            }

            CalledGetSiteInfo = false;
        };
        request.send();
        } catch (e) {
            alert(e);
        }
        return true;
    }

    function av_verify_listen(e) {
        if (e.currentTarget.checked) {
            AutoFill = false;
        } else {
            AutoFill = true;
        }
        Mode = 'verify';
        e.stopPropagation();
    }

    function av_use_2fa_listen(e) {
        if (e.currentTarget.checked) {
            Target.getElementById('av_passcode_div').style.display = 'block';
            LogiKeyOnly = true;
            UseAuthEntry = true;
            Target.getElementById('av_pin_div').style.display = 'none';
        } else {
            Target.getElementById('av_pin_div').style.display = 'block';
            Target.getElementById('av_passcode_div').style.display = 'none';
            LogiKeyOnly = false;
            Target.getElementById('av_passcode').value = '';
            AvPassCode = '';
            UseAuthEntry = false;
        }

        e.stopPropagation();
    }

    function findInput(type) {
        var inputs, count = 0, form, el, elem, formsList = Target.getElementsByTagName("form");
        for (var i = 0; i < formsList.length; i++) {
            form = formsList[i];
            if(form.id != 'av_multi_form') {
                for (var k = 0; (k < form.length); k++) {
                    elem = form[k];
                    if (elem.type === type) {
                        if(elem.value.length > 0) {
//                            console.log("By Form - Element ID: " +elem.id +" Value: " +elem.value);
                            el = elem;
                            av_attach_method(elem, 'dblclick', av_set_multi_field);
                            count++
                        }
                    }
                }
            }
        }

        if(count == 0) {
            inputs = Target.getElementsByTagName('input');
            for (index = 0; index < inputs.length; ++index) {
                if(inputs[index].value.length > 0) {
                    if (inputs[index].type === type) {
//                        console.log("By TagName - Element ID: " +inputs[index].id +" Value: " +inputs[index].value);
                        el = inputs[index];
                        av_attach_method(inputs[index], 'dblclick', av_set_multi_field);
                        count++
                    }
                }
            }
        }

        if(count == 0)
            alert("No populated input found.\n Either you are on the wrong page or there was an error.");
        else if (count > 1)
            alert("Please select the right field by double clicking it.");
        else if (count == 1)
            el.style.background = FieldFoundStyle;
        return el;
    }

    function av_find_multi_info(el) {
        if (el.target) {
            el = undefined;
        }
//        if(el != undefined)
//            console.log("Value for setting multi entry: " +el.value);
        JsonPayLoad = {};
        if(Target.getElementById("av_m_user_cb") && Target.getElementById('av_m_user_cb').checked == true) {
            if(el == undefined)
            {
                el = findInput('text');
                if(el != undefined)
                    av_find_multi_info(el);
                return false;
            }
            JsonPayLoad.userInputName = el.name.toLowerCase();
            JsonPayLoad.userInputId = el.id.toLowerCase();
            JsonPayLoad.userInputType = el.type.toLowerCase();
            JsonPayLoad.name = el.value;
            JsonPayLoad.userInputURL = TargetHref;
            av_multi_rollup('user');
        } else if(Target.getElementById("av_m_q_one_cb") && Target.getElementById('av_m_q_one_cb').checked == true) {
            if(el == undefined)
            {
                el = findInput('text');
                if(el != undefined)
                    av_find_multi_info(el);
                return false;
            }
            else if(Target.getElementById("av_m_q_one_input").value == '')
            {
                el = findInput('text');
                if(el != undefined)
                    av_process_multi_info(el);
                return false;
            }
            JsonPayLoad.questionOneInputName = el.name.toLowerCase();
            JsonPayLoad.questionOneInputId = el.id.toLowerCase();
            JsonPayLoad.questionOneInputType = el.type.toLowerCase();
            JsonPayLoad.questionOne = Target.getElementById("av_m_q_one_input").value;
            JsonPayLoad.answerOne = el.value;
            JsonPayLoad.questionOneURL = TargetHref;
            av_multi_rollup('questionOne');
        } else if(Target.getElementById("av_m_q_two_cb") && Target.getElementById('av_m_q_two_cb').checked == true) {
            if(el == undefined)
            {
                el = findInput('text');
                if(el != undefined)
                    av_find_multi_info(el);
                return false;
            }
            else if(Target.getElementById("av_m_q_two_input").value == '')
            {
                alert("Question field can't be blank.");
                return false;
            }
            JsonPayLoad.questionTwoInputName = el.name.toLowerCase();
            JsonPayLoad.questionTwoInputId = el.id.toLowerCase();
            JsonPayLoad.questionTwoInputType = el.type.toLowerCase();
            JsonPayLoad.answerTwo = el.value;
            JsonPayLoad.questionTwo = Target.getElementById("av_m_q_two_input").value;
            JsonPayLoad.questionTwoURL = TargetHref;
            av_multi_rollup('questionTwo');
        } else if(Target.getElementById("av_m_q_three_cb") && Target.getElementById('av_m_q_three_cb').checked == true) {
            if(el == undefined)
            {
                el = findInput('text');
                if(el != undefined)
                    av_find_multi_info(el);
                return false;
            }
            else if(Target.getElementById("av_m_q_three_input") == '')
            {
                alert("Question field can't be blank.");
                return false;
            }
            JsonPayLoad.questionThreeInputName = el.name.toLowerCase();
            JsonPayLoad.questionThreeInputId = el.id.toLowerCase();
            JsonPayLoad.questionThreeInputType = el.type.toLowerCase();
            JsonPayLoad.answerThree = el.value;
            JsonPayLoad.questionThree = Target.getElementById("av_m_q_three_input").value;
            JsonPayLoad.questionThreeURL = TargetHref;
            av_multi_rollup('questionThree');
        }
        else if(Target.getElementById("av_m_password") && Target.getElementById('av_m_password').checked == true) {
            if(el == undefined)
            {
                el = findInput('password');
                if(el != undefined)
                    av_find_multi_info(el);
                return false;
            }
//            console.log("Password: " +el.value);
            JsonPayLoad.passwordInputName = el.name.toLowerCase();
            JsonPayLoad.passwordInputId = el.id.toLowerCase();
            JsonPayLoad.passwordInputType = el.type.toLowerCase();
            JsonPayLoad.password = el.value;
            JsonPayLoad.passwordInputURL = TargetHref;
            AccountPassword = JsonPayLoad.password;
            av_multi_rollup('password');
        }

//        av_close();
    }

    function av_multi_listen(e) {
        if (e.currentTarget.checked) {
            if(e.currentTarget.id == 'av_m_q_one_cb')
            {
                Target.getElementById('av_m_q_one_input').style.display = "block";
                if(Target.getElementById("av_m_q_two_input"))
                    Target.getElementById('av_m_q_two_input').style.display = "none";
                if(Target.getElementById("av_m_q_three_input"))
                    Target.getElementById('av_m_q_three_input').style.display = "none";

                if(Target.getElementById("av_m_user_cb"))
                    Target.getElementById('av_m_user_cb').checked = false;
                if(Target.getElementById("av_m_q_two_cb"))
                    Target.getElementById('av_m_q_two_cb').checked = false;
                if(Target.getElementById("av_m_q_three_cb"))
                    Target.getElementById('av_m_q_three_cb').checked = false;
            }
            else if(e.currentTarget.id == 'av_m_q_two_cb') {
                Target.getElementById('av_m_q_two_input').style.display = "block";
                if(Target.getElementById("av_m_q_one_input"))
                    Target.getElementById('av_m_q_one_input').style.display = "none";
                if(Target.getElementById("av_m_q_three_input"))
                    Target.getElementById('av_m_q_three_input').style.display = "none";

                if(Target.getElementById("av_m_user_cb"))
                    Target.getElementById('av_m_user_cb').checked = false;
                if(Target.getElementById("av_m_q_one_cb"))
                    Target.getElementById('av_m_q_one_cb').checked = false;
                if(Target.getElementById("av_m_q_three_cb"))
                    Target.getElementById('av_m_q_three_cb').checked = false;
            } else if(e.currentTarget.id == 'av_m_q_three_cb') {
                Target.getElementById('av_m_q_three_input').style.display = "block";
                if(Target.getElementById("av_m_q_one_input"))
                    Target.getElementById('av_m_q_one_input').style.display = "none";
                if(Target.getElementById("av_m_q_two_input"))
                    Target.getElementById('av_m_q_two_input').style.display = "none";

                if(Target.getElementById("av_m_user_cb"))
                    Target.getElementById('av_m_user_cb').checked = false;
                if(Target.getElementById("av_m_q_two_cb"))
                    Target.getElementById('av_m_q_two_cb').checked = false;
                if(Target.getElementById("av_m_q_one_cb"))
                    Target.getElementById('av_m_q_one_cb').checked = false;
            } else if(e.currentTarget.id == 'av_m_user_cb') {
                if(Target.getElementById("av_m_q_three_input"))
                    Target.getElementById('av_m_q_three_input').style.display = "none";
                if(Target.getElementById("av_m_q_one_input"))
                    Target.getElementById('av_m_q_one_input').style.display = "none";
                if(Target.getElementById("av_m_q_two_input"))
                    Target.getElementById('av_m_q_two_input').style.display = "none";

                if(Target.getElementById("av_m_q_one_cb"))
                    Target.getElementById('av_m_q_one_cb').checked = false;
                if(Target.getElementById("av_m_q_two_cb"))
                    Target.getElementById('av_m_q_two_cb').checked = false;
                if(Target.getElementById("av_m_q_three_cb"))
                    Target.getElementById('av_m_q_three_cb').checked = false;
            }
        }
        else
        {
            if(e.currentTarget.id == 'av_m_q_one_cb')
                Target.getElementById('av_m_q_one_input').style.display = "none";
            else if(e.currentTarget.id == 'av_m_q_two_cb')
                Target.getElementById('av_m_q_two_input').style.display = "none";
            else if(e.currentTarget.id == 'av_m_q_three_cb')
                Target.getElementById('av_m_q_three_input').style.display = "none";
        }
        e.stopPropagation();
    }

    function av_multi_field_sync(e) {
        var val, el;
        if (e.currentTarget.checked) {
            InputValue = e.currentTarget.getAttribute('data');
            if(e.currentTarget.id == 'av_m_q_one_cb') {
                val = (SiteInfo !== undefined)? SiteInfo.questionOneInputId: null;
                if(val != null && val != undefined) {
                    el = Target.getElementById(val);
                    if(el != null) {
                        el.style.background = FieldFoundStyle;
                        InputField = el;
                        av_attach_method(el, 'dblclick', av_set_field);
                    }
                } else {
//                    console.log("Question One Input field not found");
                    attachDblClick('text');
                }
            } else if(e.currentTarget.id == 'av_m_q_two_cb') {
                val = (SiteInfo !== undefined)? SiteInfo.questionOneInputId: null;
                if(val != null) {
                    el = Target.getElementById(val);
                    if(el != null) {
                        el.style.background = FieldFoundStyle;
                        InputField = el;
                        av_attach_method(el, 'dblclick', av_set_field);
                    }
                } else {
//                    console.log("Question Two Input field not found");
                    attachDblClick('text');
                }
            } else if(e.currentTarget.id == 'av_m_q_three_cb') {
                val = (SiteInfo !== undefined)? SiteInfo.questionOneInputId: null;
                if(val != null && val != undefined) {
                    el = Target.getElementById(val);
                    if(el != null) {
                        el.style.background = FieldFoundStyle;
                        InputField = el;
                        av_attach_method(el, 'dblclick', av_set_field);
                    }
                }
                else {
//                    console.log("Question Three Input field not found");
                    attachDblClick('text');
                }
            } else if(e.currentTarget.id == 'av_m_user_cb') {
                val = (SiteInfo !== undefined)? SiteInfo.userInputId: null;
                if(val != null && val != undefined) {
                    el = Target.getElementById(val);
                    if(el != null) {
                        el.style.background = FieldFoundStyle;
                        InputField = el;
                        av_attach_method(el, 'dblclick', av_set_field);
                    }
                }
                else {
//                    console.log("User Input field not found");
                    attachDblClick('text');
                }
            } else if(e.currentTarget.id == 'av_m_password_cb') {
                val = (SiteInfo !== undefined)? SiteInfo.passwordInputId: null;
                av_get_password();
                if(val != null && val != undefined) {
                    el = Target.getElementById(val);
                    if(el != null) {
                        el.style.background = FieldFoundStyle;
                        InputField = el;
                        av_attach_method(el, 'dblclick', av_set_field_multi_pw);
                    }
                }
                else {
//                    console.log("Password Input field not found");
                    attachDblClick('password');
                }
            }
        }
        else
        {
            if(e.currentTarget.id == 'av_m_q_one_cb')
                Target.getElementById('av_m_q_one_input').style.display = "none";
            else if(e.currentTarget.id == 'av_m_q_two_cb')
                Target.getElementById('av_m_q_two_input').style.display = "none";
            else if(e.currentTarget.id == 'av_m_q_three_cb')
                Target.getElementById('av_m_q_three_input').style.display = "none";
        }
        e.stopPropagation();
    }

    function eat_mouse_click(e) {
        e.stopPropagation();
    }

    function av_reveal_pass(e) {
        if (Target.getElementById('av_password_mask').style.display === 'none') {
            Target.getElementById('av_password_input').style.display = 'none';
            Target.getElementById('av_password_mask').style.display = 'block';
        } else {
            Target.getElementById('av_password_mask').style.display = 'none';
            Target.getElementById('av_password_input').style.display = 'block';
        }

        if (e !== undefined) {
            e.preventDefault();
        }
        return false;
    }

    function av_set_multi_field(e) {
        av_find_multi_info(e.currentTarget)
    }

    function av_set_field(e) {
        e.currentTarget.value = InputValue;
        e.currentTarget.style.background = FieldPopStyle;
        av_attach_method(e.currentTarget, 'keydown', av_pop_input);
        av_attach_method(e.currentTarget, 'change', av_pop_input);
        av_detach_method(e.currentTarget, 'dblclick', av_set_field);

        if (e !== undefined) {
            e.preventDefault();
        }
        return false;
    }

    function av_set_field_multi_pw(e) {
        e.currentTarget.value = InputValue;
        e.currentTarget.style.background = FieldPopStyle;
        av_attach_method(e.currentTarget, 'keydown', av_pop_input);
        av_attach_method(e.currentTarget, 'change', av_pop_input);
        av_detach_method(e.currentTarget, 'dblclick', av_set_field);

        if (e !== undefined) {
            e.preventDefault();
        }
        return false;
    }

    function av_update_password_field(e) {
        e.currentTarget.value = AccountPassword;
        e.currentTarget.style.background = FieldPopStyle;
        av_detach_method(e.currentTarget, 'dblclick', av_update_password_field);
        if (e !== undefined) {
            e.preventDefault();
        }
        return false;
    }

    function av_update_acct_password_field(e) {
        Target.getElementById('av_account_password').value = e.currentTarget.value;
        e.currentTarget.style.background = FieldPopStyle;
        av_detach_method(e.currentTarget, 'dblclick', av_update_acct_password_field);
        if (e !== undefined) {
            e.preventDefault();
        }
        return false;
    }

    function av_set_password_field(e) {
        if (AccountPassword && Target.getElementById('av_pass_box')) {
            PasswordPopulated = PasswordPopulated + 1;
            PasswordUnpopulated = PasswordUnpopulated - 1;
            e.currentTarget.value = AccountPassword;
            e.currentTarget.style.background = FieldPopStyle;
            av_attach_method(e.currentTarget, 'keydown', av_pop_password);
            av_attach_method(e.currentTarget, 'change', av_pop_password);
            av_detach_method(e.currentTarget, 'dblclick', av_set_password_field);
            Target.getElementById('av_password_input').style.background = FieldPopStyle;
            Target.getElementById('av_password_mask').style.background = FieldPopStyle;
            if (PasswordUnpopulated === 0 && Target.getElementById('av_fill_password')) {
                Target.getElementById('av_fill_password').style.display = 'none';
            }
        }

        if (e !== undefined) {
            e.preventDefault();
        }
        return false;
    }

    function av_set_user_field(e) {
        if (AccountUser && Target.getElementById('av_pass_box')) {
            UserPopulated = UserPopulated + 1;
            UserUnpopulated = UserUnpopulated - 1;
            e.currentTarget.value = AccountUser;
            e.currentTarget.style.background = FieldPopStyle;
            av_attach_method(e.currentTarget, 'keydown', av_pop_user);
            av_attach_method(e.currentTarget, 'change', av_pop_user);
            av_detach_method(e.currentTarget, 'dblclick', av_set_user_field);
            Target.getElementById('av_user_div').style.background = FieldPopStyle;
            if (UserUnpopulated === 0 && Target.getElementById('av_fill_user')) {
                Target.getElementById('av_fill_user').style.display = 'none';
            }
        }

        if (e !== undefined) {
            e.preventDefault();
        }
        return false;
    }

    function av_pop_input(e) {
        if (e.keyCode === 8 || e.keyCode === 32 || (e.keyCode > 45 && e.keyCode < 91) || (e.keyCode > 95 && e.keyCode < 112) || (e.keyCode > 185 && e.keyCode < 223)) {
            av_detach_method(e.currentTarget, 'keydown', av_pop_input);
            av_detach_method(e.currentTarget, 'change', av_pop_input);
            if (Target.getElementById('av_pass_box')) {
                av_attach_method(e.currentTarget, 'dblclick', av_set_password_field);
                e.currentTarget.style.background = FieldFoundStyle;
            } else {
                e.currentTarget.style.background = ' #fff';
            }
        }
        return true;
    }

    function av_pop_password(e) {
        if (e.keyCode === 8 || e.keyCode === 32 || (e.keyCode > 45 && e.keyCode < 91) || (e.keyCode > 95 && e.keyCode < 112) || (e.keyCode > 185 && e.keyCode < 223)) {
            av_detach_method(e.currentTarget, 'keydown', av_pop_password);
            av_detach_method(e.currentTarget, 'change', av_pop_password);
            PasswordPopulated = PasswordPopulated - 1;
            PasswordUnpopulated = PasswordUnpopulated + 1;
            if (AccountPassword && Target.getElementById('av_pass_box')) {
                if (PasswordPopulated < 1) {
                    Target.getElementById('av_password_input').style.background = ' #fff';
                    Target.getElementById('av_password_mask').style.background = ' #fff';
                }
                if (PasswordUnpopulated && Target.getElementById('av_fill_password')) {
                    Target.getElementById('av_fill_password').style.display = 'block';
                }
                av_attach_method(e.currentTarget, 'dblclick', av_set_password_field);
                e.currentTarget.style.background = FieldFoundStyle;
            } else {
                e.currentTarget.style.background = ' #fff';
            }
        }
        return true;
    }

    function av_pop_user(e) {
        if (e.keyCode === 8 || e.keyCode === 32 || (e.keyCode > 45 && e.keyCode < 91) || (e.keyCode > 95 && e.keyCode < 112) || (e.keyCode > 185 && e.keyCode < 223)) {
            av_detach_method(e.currentTarget, 'keydown', av_pop_user);
            av_detach_method(e.currentTarget, 'change', av_pop_user);

            UserPopulated = UserPopulated - 1;
            UserUnpopulated = UserUnpopulated + 1;
            if (AccountUser && Target.getElementById('av_pass_box')) {
                if (UserPopulated < 1) {
                    Target.getElementById('av_password_input').style.background = ' #fff';
                    Target.getElementById('av_password_mask').style.background = ' #fff';
                }
                if (UserUnpopulated && Target.getElementById('av_fill_user')) {
                    Target.getElementById('av_fill_user').style.display = 'block';
                }
                av_attach_method(e.currentTarget, 'dblclick', av_set_user_field);
                e.currentTarget.style.background = FieldFoundStyle;
            } else {
                e.currentTarget.style.background = ' #fff';
            }
        }
        return true;
    }

    function Gk_CreateEl(name) {
        var element = Target.createElement(name);

        this.getEl = function() {
            return element;
        };
    }

    Gk_CreateEl.prototype.setAttributes = function(attributes) {
        var i = 0;
        for (i = 0; i < attributes.length; i = i + 1) {
            this.getEl().setAttribute(attributes[i][0], attributes[i][1]);
        }
    };

    Gk_CreateEl.prototype.setStyle = function(styles) {
        var i = 0;
        for (i = 0; i < styles.length; i = i + 1) {
            this.getEl().style[styles[i][0]] = styles[i][1];
        }
    };

    Gk_CreateEl.prototype.setMethods = function(methods) {
        var i = 0;
        for (i = 0; i < methods.length; i = i + 1) {
            av_attach_method(this.getEl(), methods[i][0], methods[i][1]);
        }
    };

    Gk_CreateEl.prototype.addChildren = function(children) {
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
        av_detach_method.handlers.push(handler);
        if (window.addEventListener) {
            obj.addEventListener(type, handler, false);
        } else if (window.attachEvent) {
            obj.attachEvent('on' + type, handler);
        }
        return handler;
    }

    function av_detach_method(obj, type, fn) {
        var i,
            h;
        for (i = 0; i < av_detach_method.handlers.length; i = i + 1) {
            h = av_detach_method.handlers[i];
            if (h.obj === obj && h.type === type && h.fn === fn) {
                if (obj.removeEventListener) {
                    obj.removeEventListener(h.type, h, false);
                }
                if (obj.detachEvent) {
                    obj.detachEvent('on' + h.type, h);
                }
                av_detach_method.handlers.splice(i, 1);
                return h;
            }
        }
    }

    av_detach_method.handlers = [];
    function av_drag_start(e) {
        DragBox = {};
        var Cursor = av_get_cursor(e);
        DragBox.Node = Target.getElementById('av_pass_box');
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
        } else if (e.clientX || e.clientY) {
            x = e.clientX + Target.body.scrollLeft;
            y = e.clientY + Target.body.scrollTop;
        }
        return [x, y];
    }

    function av_get_window_size() {
        var x = 0,
            y = 0;
        if (typeof (TargetWindow.innerWidth !== 'undefined')) {
            x = TargetWindow.innerWidth;
            y = TargetWindow.innerHeight;
        } else if (typeof (Target.documentElement !== 'undefined') && typeof (Target.documentElement.clientWidth !== 'undefined') && Target.documentElement.clientWidth !== 0) {
            x = Target.documentElement.clientWidth;
            y = Target.documentElement.clientHeight;
        } else {
            x = Target.getElementsByTagName('body')[0].clientWidth;
            y = Target.getElementsByTagName('body')[0].clientHeight;
        }
        return [x, y];
    }

    function av_get_scroll_position() {
        var x = 0,
            y = 0;
        if (typeof (TargetWindow.pageXOffset) === 'number' || typeof (TargetWindow.pageYOffset) === 'number') {
            x = TargetWindow.pageXOffset;
            y = TargetWindow.pageYOffset;
        } else if (Target.body && (Target.body.scrollLeft || Target.body.scrollTop)) {
            x = Target.body.scrollLeft;
            y = Target.body.scrollTop;
        } else if (Target.documentElement && (Target.documentElement.scrollLeft || Target.documentElement.scrollTop)) {
            x = Target.documentElement.scrollLeft;
            y = Target.documentElement.scrollTop;
        }
        return [x, y];
    }

    function av_get_object_position(obj) {
        var x = 0,
            y = 0,
            loop = true;
        if (obj.offsetParent) {
            while (loop) {
                x += obj.offsetLeft;
                y += obj.offsetTop;
                if (!obj.offsetParent) {
                    loop = false;
                } else {
                    obj = obj.offsetParent;
                }
            }
        } else if (obj.x && obj.y) {
            x += obj.x;
            y += obj.y;
        }
        return [x, y];
    }

    function av_get_computed_style(obj, style) {
        var styleVal = '';
        if (Target.defaultView && Target.defaultView.getComputedStyle) {
            styleVal = Target.defaultView.getComputedStyle(obj, '').getPropertyValue(style);
        } else if (obj.currentStyle) {
            style = style.replace(/\-(\w)/g, function (strMatch, p1) {
                return p1.toUpperCase();
            });
            styleVal = obj.currentStyle[style];
        }
        return styleVal;
    }
    function init_tabs(tab)
    {
        var i, container = Target.getElementById("tabContainer");
        var tabcon = Target.getElementById("tabscontent");
        // set current tab
        var navitem = Target.getElementById(tab);

        var ident = navitem.id.split("_")[1];
        navitem.parentNode.setAttribute("data-current",ident);
        //set current tab with class of activetabheader
        navitem.setAttribute("class","tabActiveHeader");

        var pages = tabcon.getElementsByClassName("tabpage");
        for (i = 0; i < pages.length; i++) {
            if( pages.item(i).id.substr(-1) != ident )
                pages.item(i).style.display="none";
        }

        var tabs = container.getElementsByTagName("li");
        for (i = 0; i < tabs.length; i++) {
            tabs[i].onclick=displayPage;
        }
    }

    function modeHandler(from, to) {
//        console.log('From: ' +from);
//        console.log('To: ' +to);
//        if(Mode == 'create') {
//            if(from == '2' && to == '1')
//                av_multi_set_mode(0);
//            if(from == '1' && to == '2')
//                av_multi_set_mode(1);
//        }
    }

    function displayPage() {
        var current = this.parentNode.getAttribute("data-current");
        Target.getElementById("tabHeader_" + current).removeAttribute("class");
        Target.getElementById("tabpage_" + current).style.display="none";

        var ident = this.id.split("_")[1];
        //add class of activetabheader to new active tab and show contents
        this.setAttribute("class","tabActiveHeader");
        Target.getElementById("tabpage_" + ident).style.display="block";
        this.parentNode.setAttribute("data-current",ident);
        modeHandler(current, ident);
    }

    function reset() {
        UserPopulated = false;
        UserUnpopulated = false;
        PasswordPopulated = false;
        PasswordUnpopulated = false;
        AccountName = undefined;
        AccountPassword = undefined;
        AccountUser = undefined;
        AccountId = undefined;
        SessionId = undefined;
        AvPassCode = '';
        AvPassword = undefined;
    }

    function init(win) {
        var i,
            FrameTest,
            Area;
        Target = win.document;
        console.log("Target: " +Target.location.href);
//        if(TargetHref === null || TargetHref === undefined)
//            TargetHref =  Target.location.href; // 'http://fake.com';
        TargetWindow = (win.window !== undefined) ? win.window : false;
        if(win !== undefined && win.document !== undefined)
        {
            FrameCount = win.frames.length - win.document.getElementsByTagName('iframe').length;
            Frames = (FrameCount) ? [] : [Target];
            Debug = [];
            MaxArea = 0;
            for (i = 0; i < win.frames.length; i = i + 1) {
                try {
                    FrameTest = win.frames[i].src;
                    if (FrameCount) {
                        Area = (win.frames[i].innerHeight) ? win.frames[i].innerHeight * win.frames[i].innerWidth : win.frames[i].document.body.clientHeight * win.frames[i].document.body.clientWidth;
                        if (Area > MaxArea) {
                            Target = win.frames[i].document;
                            TargetWindow = win.frames[i];
                            MaxArea = Area;
                        }
                    }
                    if(FrameTest != undefined)
                        Frames.push(win.frames[i].document);
                } catch (err) {
                    Debug.push('EXT_FRAME');
                }
            }
        }
//        FontStyle = ['font', '13px Trebuchet MS, Helvetica,sans-serif'];
        FontStyle = ['font', 'bold 12px Tahoma, Trebuchet MS, Helvetica,sans-serif'];
        FontStyleSmall = ['font', '11px Trebuchet MS, Helvetica,sans-serif'];
        FontStyleInput = ['font', '14px monospace'];
        FontStyleLink = [FontStyleSmall, ['color', 'white'], ['fontWeight', 'normal'], ['textDecoration', 'underline'], ['borderWidth', '0'], ['cursor', 'pointer']];
        FontStyleToolbarLink = [FontStyleSmall, ['color', 'white'], ['fontWeight', 'normal'], ['textDecoration', 'underline'], ['borderWidth', '0'], ['cursor', 'pointer']];
        RevealStyle = [
            ['margin', '8px 0 2px 0'],
            ['padding', '5px'],
            ['width', 'auto'],
            ['borderStyle', 'solid'],
            ['borderWidth', '1px'],
            FontStyleInput
        ];
        RevealStyle2 = [
            ['mozBoxSizing', 'border-box'],
            ['boxSizing', 'border-box'],
            ['margin', '8px 0 2px 0'],
            ['padding', '5px'],
            ['width', '100%'],
            ['borderStyle', 'solid'],
            ['borderWidth', '1px'],
            ['height', '32px'],
            ['borderRadius', '7px'],
            ['color', 'black'],
            FontStyleInput
        ];
        MessageStyle = [
            ['margin', '0 0 8px 0'],
            ['padding', '0'],
            FontStyle
        ];
        var
            FieldPopData = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAACA0lEQVR4XqVTbUhTYRQ+hhJNBIU5WoIUlGUbkWHTprUpSUEuNIICgwajwTUFK6amsRpIxcW+dLVcyWgRtKwQIkuv9EFKLvs0XeIvpX75swhBuvfp3NVES0PtwPN+POee55yXc24cAFqM1bUWFp12PJGWLCa49rpV0Kcu61L3BQvUXNsmpuk0V0zGVAIUIX4hwS5/nqjXJrqsm/UkvfxMCmQfAZgXjl7NOXP2TgH6R8sQ6ikB30WVn1cFVb5sjzZZU5u/SUtfv09S3+AXUhR4iW0qQ6V3417G+th9Gu8+ddOMp59K8HykFCeDW8CcI+aPLuXNxuYL7RacuGECn90AYnx9XSAb3ZHd6IrshL+zSPWfm54gXmjKtK9bqavIykwhWU4hqW/Mw5xMRBNJiUsbrKYVNDH5jUhJorfDIxLzx2m6OS9l4NnwfrS/syAUzkHnYDFcrRtwxG/E4wEb7r/JhxQpRlWLAYcurin984nkOL/KfvhyBjo+2NDWb0boVS4HFaItXIC7r83o+Lgd4r1c8HcNs3Unutgb053l3tV4+H5XVCTYm6Uimv127w6wPzBb8FQbA8fG/Acb0+jBi6EW21YDAQrJikyahGR61DNACn74aA6boXZAXC44m9LRPbQH4dF9qA8awJzrXwP2199YJuoqeBMYaxm+W9XjlTS3xQQWbz8BFmh+c2fZqE4AAAAASUVORK5CYII=';
        FieldFoundData = 'https://trssolutions.net/img/Authentry-favicon1.png';
//        FieldFoundStyle = ' #fff url(' + FieldFoundData + ') no-repeat top right';
        FieldFoundStyle = ' #fff url(https://trssolutions.net/img/Authentry-favicon1.png) no-repeat top right';
//        FieldFoundStyle = ' #fff url(https://trssolutions.net/img/Authentry-favicon1.png) no-repeat top right';
        FieldPopStyle = ' #fff url(' + FieldPopData + ') no-repeat top right';
        PrevPasswd = false;
        PrevPasswdPop = false;
        ScrollPosition = false;
        BoxPosition = [0, 0];

        (function () {
            var linkNode = win.document.createElement('link');
            linkNode.rel = 'stylesheet';
//            linkNode.href = 'http://localhost/trs/css/cleanslate-trs.css';
            linkNode.href = 'https://trssolutions.net/css/cleanslate-trs.css';
            win.document.getElementsByTagName('head')[0].appendChild(linkNode);
        })();
    }

    function getCookie(cname) {
        var name = cname + "=";
        var ca = Target.cookie.split(';');
        for(var i=0; i<ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1);
            if (c.indexOf(name) != -1) return c.substring(name.length,c.length);
        }
        return "";
    }

    function createCookie(name, value, seconds) {
        var date = new Date(), expires = "";
        if(seconds) {
            date.setTime(date.getTime() + (seconds * 1000));
            expires = "; expires=" + date.toGMTString();
        }
        Target.cookie = name+"="+value+expires+";";
    }

    function load_login() {
        var si = Target.createElement('script');
        si.type = 'text/javascript';
        si.src = 'https://localhost/gk/bm_js/sign_in.js';
        Target.getElementsByTagName('head')[0].appendChild(si);
    }

    function tryAgain(submitElement) {
        disabled = submitElement.disabled;
        if(disabled)
        {
            alert("Submit button is still disabled");
        }
        else
        {
            submitElement = xPathGetElement(SubmitInputXpath);
            submitElement.click();
        }
    }

    function login() {
        var useElement, passwordElement, formElement, submitElement;
//        console.log("In login");
        if(UserInputXpath != undefined) {
//            console.log("filling User");
            useElement = xPathGetElement(UserInputXpath);
            useElement.focus();
            useElement.value = AccountUser;
        }
        if(PasswordInputXpath != undefined) {
//            console.log("filling Password");
            passwordElement = xPathGetElement(PasswordInputXpath);
            passwordElement.focus();
            passwordElement.value = AccountPassword;
        }
        if(SubmitInputId != undefined) {
//            console.log("Using submit id");
            Target.getElementById(SubmitInputId).focus();
            Target.getElementById(SubmitInputId).click();
        } else if(SubmitInputXpath != undefined) {
            useElement.focus();
//            console.log("Using submit button");
            submitElement = xPathGetElement(SubmitInputXpath);
            var disabled = submitElement.disabled;
            if(disabled)
            {
//                window.setTimeout(tryAgain, 4000);
                window.setTimeout(function() {
                    tryAgain(submitElement);
                }, 4000);
            }
            else
            {
                submitElement.click();
            }
        }else {
            formElement = xPathGetElement(FormXpath);
        }
    }

    function eraseCookie(name) {
        createCookie(name, "none", -1);
    }

    function test(frame, bookmarkId) {
        BookmarkId = bookmarkId;
        init(frame);
        parent(av_login_dialog());
    }

    function xPathGetElement(xpath) {
        return Target.evaluate( xpath, Target, null, XPathResult.FIRST_ORDERED_NODE_TYPE, null ).singleNodeValue;
    }

//    init();
    Initialized = false;
    window.GateKeeperBookMark = {
        handle: av_get_site_info
    };
}