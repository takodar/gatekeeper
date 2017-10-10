var howToList = $("#howtoList");
var howToWelcomeMessage = $("#howToWelcomeMessage");
var howToDocuments = $("#howtoIframe");
var navHowToHome = $("#navHowToHome");
var navHowToList = $("#navHowToList");
var navDocuments = $("#navDocuments");
var btnHelp = $("#btnHelp");

function alterDisplay(displayDiv){
    if(displayDiv === 'howtoList'){
	howToList.css("display", "inline");
	howToWelcomeMessage.css("display", "none");
	howToDocuments.css("display", "none");
	navHowToList.addClass("active");
	navHowToHome.removeClass("active");
	navDocuments.removeClass("active");
	btnHelp.data('help', 'howTo');
    }
    else if(displayDiv === 'howToWelcomeMessage'){
	howToWelcomeMessage.css("display", "inline");
	howToList.css("display", "none");
	howToDocuments.css("display", "none");
	navHowToHome.addClass("active");
	navHowToList.removeClass("active");
	navDocuments.removeClass("active");
	btnHelp.data('help', 'home');
    }
    else if(displayDiv === 'howtoIframe'){
	howToDocuments.css("display", "inline");
	howToList.css("display", "none");
	howToWelcomeMessage.css("display", "none");
	navDocuments.addClass("active");
	navHowToList.removeClass("active");
	navHowToHome.removeClass("active");
	btnHelp.data('help', 'documents');
    }
}