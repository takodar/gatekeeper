(function()
{
    if (window.jQuery) {
        console.log("jQuery exists");
        if($ == undefined)
            $ = jQuery;
    } else {
        var jq = document.createElement('script'); jq.type = 'text/javascript';
        jq.src = '//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.js';
        document.getElementsByTagName('head')[0].appendChild(jq);
    }

    window.signIn = function signIn(formId, formAction, submitInputType, submitInputId) {
        if(submitInputId != undefined && submitInputId != '') {
            console.log("Using submitInputId: " +submitInputId);
            $("#"+"submitInputId").click();
        } else if(formId != undefined && formId != '') {
            console.log("Using formId: " +formId);
            $("#"+"formId").submit();
        } else if(submitInputType != undefined && submitInputType == 'button') {
            console.log("Using submitInputType: " +submitInputType);
            $( ":submit" ).click();
        } else {

        }
    };
})();