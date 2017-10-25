$("#btnHelp").click(function(){
    var intro = introJs();
    intro.setOptions(
        {

            skipLabel: 'Exit',
            steps: [
                {
                    intro: "Welcome to the products page.",
                    position: 'top'
                }
            ]
        });
    intro.start();
});
