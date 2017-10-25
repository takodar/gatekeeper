$("#btnHelp").click(function(){
        var intro = introJs();
        intro.setOptions(
            {

                skipLabel: 'Exit',
                steps: [
                    {
                        intro: "Welcome to GateKeeper Pro's interactive help guide.",
                        position: 'top'
                    },
                    {
                        element: "#navDownloadLink",
                        intro: "Click on one of these links to navigate to the respective page.",
                        position: 'bottom'
                    },
                    {
                        element: "#footerSocialMedia",
                        intro: "Follow us on social media",
                        position: 'left'
                    }
                ]
            });
        intro.start();
});
