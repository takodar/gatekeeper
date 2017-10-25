$("#btnHelp").click(function(){
    var intro = introJs();
    intro.setOptions(
        {

            skipLabel: 'Exit',
            steps: [
                {
                    intro: "Welcome to the download page.",
                    position: 'top'
                }
            ]
        });
    intro.start();
});
