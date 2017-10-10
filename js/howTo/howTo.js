/**
 * Created by takodaregister on 10/9/17.
 */
function alterDisplay(displayDiv){
    if(displayDiv === 'howtoList'){
    document.getElementById('howtoList').style.display = 'inline';
    document.getElementById('navHowToList').classList.add('active');
    document.getElementById('howToWelcomeMessage').style.display = 'none';
        document.getElementById('howtoIframe').style.display = 'none';
    }
    else if(displayDiv === 'howToWelcomeMessage'){
        document.getElementById('howToWelcomeMessage').style.display = 'inline';
        document.getElementById('howtoList').style.display = 'none';
        document.getElementById('howtoIframe').style.display = 'none';
    }
    else if(displayDiv === 'howtoIframe'){
        document.getElementById('howtoIframe').style.display = 'inline';
        document.getElementById('howtoList').style.display = 'none';
        document.getElementById('howToWelcomeMessage').style.display = 'none';
    }
}