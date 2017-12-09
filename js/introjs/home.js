$("#btnHelp").click(function(){
        var intro = introJs();
        intro.setOptions(
            {

                skipLabel: 'Exit',
                steps: [
                    {
                        intro: "Welcome to GateKeeper Pro's interactive help guide."                    }
                ]
            });
        intro.start();
});
