var base_url = 'localhost:1212/Codeigniter_JRK/delivery_tcdc';   
var valueOfProgressBar = 0;
var array = {};
(function($) {
            'use strict';
            window.sr = new scrollReveal({
                reset: true,
                move: '50px',
                mobile: true
            });
        })();

function progressBar(val){

if (array[val] == "undefined" || typeof array[val] == 'undefined') {
    valueOfProgressBar = valueOfProgressBar + 12;
   document.getElementById('jms').style.width = valueOfProgressBar+"%";
   $("#msg1").html("<div align=center><p style=\"text-shadow: 0 0 24px darkorange;margin: 0 0; padding: 0 0;\"><strong>Progress: </strong>"+valueOfProgressBar+" %</p></div>");
 }; 
   array[val] = "true";

}
function progressBar1(val){
    document.getElementById('jsk').style.width = val+"%" ;
    $("#msg2").html("<div align=center><p style=\"text-shadow: 0 0 24px blue;margin: 0 0; padding: 0 0;\"><strong>Progress: </strong>"+val+" %</p></div>");
}

function submitform() {

    
    var first =  document.forms["my_form"]["First_Name"].value;
    var last  =  document.forms["my_form"]["Last_Name"].value;
    var dob =  document.forms["my_form"]["DOB"].value;
    var contact =  document.forms["my_form"]["Contact"].value;
    var username =  document.forms["my_form"]["username"].value;
    var email =  document.forms["my_form"]["Email"].value;
    var password =  document.forms["my_form"]["password"].value;
  
    var valemail = validateEmail(document.forms["my_form"]["Email"]);
    var valphone = validatePhone(document.forms["my_form"]["Contact"]);

 if (first == null || first == "") {
        alert("First_Name must be filled out");
              return false; //12 25 38 50 62 74 85 100
    }
if (last == null || last == "") {
        alert("Last_Name must be filled out");
          return false;
    }
if (dob == null || dob == "") {
        dob = "1212/12/12";
        //alert("Date has been set to 12/12/1212");
    
    }
if (username == null || username == "") {
       username = "single, ready to mingle!";
    
    }
if (password == null || password == "") {
       password = "HariNivas";
     
    }
 if (contact == null || contact == "" || valphone != "") {
        alert("Phone validation: "+ valphone);
         return false;
    }

 if (email == null || email == "" || valemail != "") {
        alert("Email Validation: "+valemail);
        progressBar(85);
        bool = false;
        return false;
    }

    

var msg = "";
  $('#myModal').modal('hide');

  $('#myModal1').modal('show');

   document.getElementById("loadMe").click();

    var i=0;

    setInterval(function (){
        progressBar1(i);
        i=i+5;
        if(i==120)
        {
            $('#myModal1').modal('hide');
        }
    }, 100);

 console.log("Going to hide the modal");

 $.ajax({ url: base_url+ "/index.php/Welcome/registration",
         data: {First_Name:first,Last_Name:last,DOB:dob,Username:username,Passwordwa:password,Contact:contact,Email:email},
         type: 'post',
          success: function(output) {
                     if (output == "Successfully Registered!!") {
                           msg = "<div class=\"alert alert-success fade in\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a><strong>"+output+"!!</strong>  Welcome to Geeta Family, Vasudev-kutumbakam<br />Check! your email for our little greeting</div>";
                           }
                           else{
                            msg = "<div class=\"alert alert-danger fade in\"><a href=\"#\" class=\"close\" data-dismiss=alert\">&times;</a><strong>Error! </strong>" + output+ " Something went wrong! We have your attention </div>";
                        }
            // window.location.assign("index.php#LogIn")
                          document.forms["malogIN"]["username"].value = email;
                          $("#msg").append(msg);
                        
                    }
  
});

}

var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope) {
    $scope.Registration = "";
    $scope.Username = "Username";
    $scope.emailSent = "";
});

function trim(s)
{
  return s.replace(/^\s+|\s+$/, '');
} 

function validateEmail(fld) {
    var error="";
    var tfld = trim(fld.value);                        // value of field with whitespace trimmed off
    var emailFilter = /^[^@]+@[^@.]+\.[^@]*\w\w$/ ;
    var illegalChars= /[\(\)\<\>\,\;\:\\\"\[\]]/ ;
    
    if (fld.value == "") {
        fld.style.background = 'Yellow';
        error = "You didn't enter an email address.\n";
    } else if (!emailFilter.test(tfld)) {              //test email for illegal characters
        fld.style.background = 'Yellow';
        error = "Please enter a valid email address.\n";
    } else if (fld.value.match(illegalChars)) {
        fld.style.background = 'Yellow';
        error = "The email address contains illegal characters.\n";
    } else {
        fld.style.background = 'White';
    }
    return error;
}

function validatePhone(fld) {
    var error = "";
    var stripped = fld.value.replace(/[\(\)\.\-\ ]/g, '');     

   if (fld.value == "") {
        error = "You didn't enter a phone number.\n";
        fld.style.background = 'Yellow';
    } else if (isNaN(parseInt(stripped))) {
        error = "The phone number contains illegal characters.\n";
        fld.style.background = 'Yellow';
    } else if (!(stripped.length == 10)) {
        error = "The phone number is the wrong length. Make sure you included an area code.\n";
        fld.style.background = 'Yellow';
    } 
    return error;
}

function login(){

    var first =  document.forms["malogIN"]["username"].value;
    var last  =  document.forms["malogIN"]["password"].value
    var l = Ladda.create( document.querySelector( 'button' ) );
    var result = document.getElementsByClassName('msg');

    l.start();
    l.stop();
    l.toggle();
    l.isLoading();
    l.setProgress( 0-1 );

    $.ajax({
        url:base_url+"index.php/welcome/querie",
        data:{username:first,password:last},
        type:'post',
        dataType:'json',
        success: function(data) {
          if(data.status == 'ok')
          { 
            // setTimeout( 5000); 
            l.remove();

            $("#msg").html(data.msg);
            window.location.replace(base_url+'/index.php/Welcome/home');
          }
          if(data.status == 'failed')
          {
            $("#msg").html(data.msg);
          }
        }
    });
}

function runEffect() {
          var options = {};
       $( "#effect" ).hide("shake", options, 1000, callback);
    };
 
    // callback function to bring a hidden box back
    function callback() {
      setTimeout(function() {
        $( "#effect" ).removeAttr( "style" );
      }, 1000 );
    };
 
    // set effect from select menu value
    $( "#button" ).click(function() {
      runEffect();
    });

//    Ladda.bind( 'input[type=submit]' );

      // Bind progress buttons and simulate loading progress
      Ladda.bind( '.progress-demo button', {
        callback: function( instance ) {
          var progress = 0;
          var interval = setInterval( function() {
            progress = Math.min( progress + Math.random() * 0.1, 1 );
            instance.setProgress( progress );

            if( progress === 1 ) {
              instance.stop();
              clearInterval( interval );
            }
          }, 200 );
        }
      } );




(function($){
   $.fn.extend({
       donetyping: function(callback,timeout){
           timeout = timeout || 1e3; // 1 second default timeout
           var timeoutReference,
               doneTyping = function(el){
                   if (!timeoutReference) return;
                   timeoutReference = null;
                   callback.call(el);
               };
           return this.each(function(i,el){
               var $el = $(el);
               // Chrome Fix (Use keyup over keypress to detect backspace)
               // thank you @palerdot
               $el.is(':input') && $el.on('keyup keypress',function(e){
                   // This catches the backspace button in chrome, but also prevents
                   // the event from triggering too premptively. Without this line,
                   // using tab/shift+tab will make the focused element fire the callback.
                   if (e.type=='keyup' && e.keyCode!=8) return;
                   
                   // Check if timeout has been set. If it has, "reset" the clock and
                   // start over again.
                   if (timeoutReference) clearTimeout(timeoutReference);
                   timeoutReference = setTimeout(function(){
                       // if we made it here, our timeout has elapsed. Fire the
                       // callback
                       doneTyping(el);
                   }, timeout);
               }).on('blur',function(){
                   // If we can, fire the event since we're leaving the field
                   doneTyping(el);
               });
           });
       }
   });
})(jQuery);



        // navigator.geolocation.getCurrentPosition(function (position) {
        //     var geocoder = new google.maps.Geocoder();
        //     var latLng   = new google.maps.LatLng( 
        //         position.coords.latitude, position.coords.longitude);
        //     alert("Latitude: "+position.coords.latitude+" Longitude: "+position.coords.longitude );
        //     geocoder.geocode({
        //         'latLng': latLng
        //     }, function (results, status) {
        //         for (var i = 0; i < results[0].address_components.length; i++) {
        //             var address = results[0].address_components[i];
        //             if (address.types[0] == "postal_code") {
        //                 $('#zipcode').html(address.long_name);
        //                 $('#location').html(results[0].formatted_address);
        //                 $('#showMyLocation').hide();
        //             }
        //         }
        //     });
        // });