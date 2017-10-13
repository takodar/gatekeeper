$("#btnHelp").click(function(){ 
	helpPage = $("#btnHelp").data('help');
	if(helpPage === 'home'){
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
	}
	else if(helpPage === 'howTo'){
		        var intro = introJs();
          intro.setOptions(
		  {
			
			skipLabel: 'Exit',
            steps: [
			{
                element: '#down1',
                intro: "instructions for step 1",
				position: 'top'
              },
              {
                element: '#step1',
                intro: "instructions for step 1",
				position: 'top'
              },
              {
                element: '#step2',
                intro: "instructions for step 2..",
                position: 'top'
              },
              {
                element: '#step3',
                intro: 'instructions for step 3................',
                position: 'top'
              }
            ]
          });
          intro.start();
	}
	else if(helpPage === 'documents'){
		        var intro = introJs();
          intro.setOptions(
		  {
			
			skipLabel: 'Exit',
            steps: [
			{
                intro: "instructions DOCUMENTS PAGE",
				position: 'top'
              },
              {
                element: '#step2',
                intro: "instructions for step 2..",
                position: 'top'
              },
              {
                element: '#step3',
                intro: 'instructions for step 3................',
                position: 'top'
              }
            ]
          });
          intro.start();
	}
	else if(helpPage === 'FAQs'){
		        var intro = introJs();
          intro.setOptions(
		  {
			
			skipLabel: 'Exit',
            steps: [
			{
                element: '#down1',
                intro: "FAQS PAGE HELP",
				position: 'top'
              },
              {
                intro: "FAQ instructions for step 1",
				position: 'top'
              },
              {
                intro: "instructions for step 2..",
                position: 'top'
              },
              {
                element: '#step3',
                intro: 'instructions for step 3................',
                position: 'top'
              }
            ]
          });
          intro.start();
	}
	else if(helpPage === 'Videos'){
		        var intro = introJs();
          intro.setOptions(
		  {
			
			skipLabel: 'Exit',
            steps: [
			{
                element: '#down1',
                intro: "VIDEOS PAGE HELP",
				position: 'top'
              },
              {
                intro: "VIDEOS instructions for step 1",
				position: 'top'
              },
              {
                intro: "VIDEOS for step 2..",
                position: 'top'
              },
              {
                element: '#step3',
                intro: 'instructions for step 3................',
                position: 'top'
              }
            ]
          });
          intro.start();
	}
 });
