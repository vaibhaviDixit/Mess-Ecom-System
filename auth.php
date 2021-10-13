<!-- testing otp using firebse -->
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

  <input type="text" name="phone" id="num">
  <div id="recaptcha-container"></div>
  <button onclick="phoneAuth()">Send</button>



<script src="firebase.js"></script>

<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase.js"></script>

<!-- <script src="https://www.gstatic.com/firebasejs/9.1.2/firebase-analytics.js"></script> -->

  <script type="text/javascript">



  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyBsfGjxjrIluPquGXlLdOeHWi4lLewkxeM",
    authDomain: "otp-authentication-58f6d.firebaseapp.com",
    projectId: "otp-authentication-58f6d",
    storageBucket: "otp-authentication-58f6d.appspot.com",
    messagingSenderId: "942589487415",
    appId: "1:942589487415:web:593e2465359f63bb0092b2",
    measurementId: "G-4VES7Z49KF"
  };

  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  // firebase.getAnalytics();

 

 document.write("hi")
 window.onload=function(){
    render();
 }

  function render(){
   
    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
    recaptchaVerifier.render();
  }

  function phoneAuth(){

    phoneNumber=document.getElementById("num").value;

    firebase.auth().signInWithPhoneNumber(phoneNumber, window.recaptchaVerifier)
    .then(function(confirmationResult){
      // SMS sent. Prompt user to type the code from the message, then sign the
      // user in with confirmationResult.confirm(code).
      window.confirmationResult = confirmationResult;
      coderesult=confirmationResult;
      console.log(coderesult);
      alert('message sent');
      // ...
    }).catch(function(error){
      // Error; SMS not sent
      // ...
      alert(error.message);
    });

  }









</script>

</body>
</html>













