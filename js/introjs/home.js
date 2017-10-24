$("#btnHelp").click(function(){
        var intro = introJs();
        intro.setOptions(
            {

                skipLabel: 'Exit',
                steps: [
                    {
                        intro: "instructions for HOMEPAGE",
                        position: 'top'
                    }
                ]
            });
        intro.start();
});
