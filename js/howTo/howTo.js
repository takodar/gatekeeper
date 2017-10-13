var howToList = $("#howtoList");
var howToWelcomeMessage = $("#howToWelcomeMessage");
var howToDocuments = $("#howtoIframe");
var howToFAQs = $("#howToFAQs");
var howToVideos = $("#howToVideos");
var navHowToHome = $("#navHowToHome");
var navHowToList = $("#navHowToList");
var navDocuments = $("#navDocuments");
var navVideos = $("#navVideos");
var navFAQs = $("#navFAQs");
var btnHelp = $("#btnHelp");

function alterDisplay(displayDiv) {
    if (displayDiv === 'howtoList') {
        howToList.css("display", "inline");
        howToWelcomeMessage.css("display", "none");
        howToDocuments.css("display", "none");
        howToFAQs.css("display", "none");
		howToVideos.css("display", "none");
        navHowToList.addClass("active");
        navHowToHome.removeClass("active");
        navDocuments.removeClass("active");
        navFAQs.removeClass("active");
		navVideos.removeClass("active");
        btnHelp.data('help', 'howTo');
    }
    else if (displayDiv === 'howToWelcomeMessage') {
        howToWelcomeMessage.css("display", "inline");
        howToList.css("display", "none");
        howToDocuments.css("display", "none");
        howToFAQs.css("display", "none");
		howToVideos.css("display", "none");
        navHowToHome.addClass("active");
        navHowToList.removeClass("active");
        navDocuments.removeClass("active");
		navVideos.removeClass("active");
        navFAQs.removeClass("active");
        btnHelp.data('help', 'home');
    }
    else if (displayDiv === 'howtoIframe') {
        howToDocuments.css("display", "inline");
        howToList.css("display", "none");
        howToWelcomeMessage.css("display", "none");
        howToFAQs.css("display", "none");
		howToVideos.css("display", "none");
        navDocuments.addClass("active");
        navHowToList.removeClass("active");
        navHowToHome.removeClass("active");
		navVideos.removeClass("active");
        navFAQs.removeClass("active");
        btnHelp.data('help', 'documents');
    }
    else if (displayDiv === 'howToFAQs') {
        howToFAQs.css("display", "inline");
        howToDocuments.css("display", "none");
        howToList.css("display", "none");
        howToWelcomeMessage.css("display", "none");
		howToVideos.css("display", "none");
        navFAQs.addClass("active");
        navDocuments.removeClass("active");
        navHowToList.removeClass("active");
        navHowToHome.removeClass("active");
		navVideos.removeClass("active");
        btnHelp.data('help', 'FAQs');
    }    
	else if (displayDiv === 'howToVideos') {
        howToVideos.css("display", "inline");
        howToDocuments.css("display", "none");
        howToFAQs.css("display", "none");
        howToList.css("display", "none");
        howToWelcomeMessage.css("display", "none");
        navVideos.addClass("active");
        navFAQs.removeClass("active");
        navDocuments.removeClass("active");
        navHowToList.removeClass("active");
        navHowToHome.removeClass("active");
        btnHelp.data('help', 'Videos');
    }
}