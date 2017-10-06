	 function startHelper(){
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
	  
