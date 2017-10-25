$("#btnHelp").click(function () {
    helpPage = $("#btnHelp").data('help');
    if (helpPage === 'home') {
        var intro = introJs();
        intro.setOptions(
            {

                skipLabel: 'Exit',
                steps: [
                    {
                        intro: "This is the How To Homepage",
                        position: 'top'
                    },
                    {
                        element: "#navHowTo",
                        intro: "Click one of these links to navigate to another page",
                        position: 'top'
                    },
                    {
                        element: "#pnlDocumentHeader",
                        intro: "Or click one of these headings to navigate to the page",
                        position: 'top'
                    }
                ]
            });
        intro.start();
    }
    else if (helpPage === 'howTo') {
        var intro = introJs();
        intro.setOptions(
            {

                skipLabel: 'Exit',
                steps: [
                    {
                        element: '#step1',
                        intro: "Follow along with these instructions to set up an account",
                        position: 'top'
                    },
                    {
                        element: '#step2',
                        intro: "This is the next instruction and so on and so on...",
                        position: 'top'
                    }
                ]
            });
        intro.start();
    }
    else if (helpPage === 'documents') {
        var intro = introJs();
        intro.setOptions(
            {

                skipLabel: 'Exit',
                steps: [
                    {
                        intro: "This is where you will find all of the documentation for GateKeeper Pro",
                        position: 'top'
                    }
                ]
            });
        intro.start();
    }
    else if (helpPage === 'FAQs') {
        var intro = introJs();
        intro.setOptions(
            {

                skipLabel: 'Exit',
                steps: [
                    {
                        intro: "All FAQ's for GateKeeper Pro can be found here",
                    },
                    {
                        element: "#faqFirstQuestion",
                        intro: "This is an FAQ question",
                        position: 'left'
                    },
                    {
                        element: "#faqFirstAnswer",
                        intro: "This is an FAQ answer",
                        position: 'left'
                    }
                ]
            });
        intro.start();
    }
    else if (helpPage === 'Videos') {
        var intro = introJs();
        intro.setOptions(
            {

                skipLabel: 'Exit',
                steps: [
                    {
                        intro: "VIDEOS PAGE HELP",
                        position: 'top'
                    }
                ]
            });
        intro.start();
    }
});
