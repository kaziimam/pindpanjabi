<!-- <?php //echo header('');?> -->
<form>
    <input type="text" id="number" placeholder="+923********">
    <div id="recaptcha-container"></div>
    <button type="button" onclick="phoneAuth();">SendCode</button>
</form><br>
<form>
    <input type="text" id="verificationCode" placeholder="Enter verification code">
    <button type="button" onclick="codeverify();">Verify code</button>

</form>



<script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#config-web-app -->

<script>
    var firebaseConfig = {
        apiKey: "AIzaSyCB8irN28adMMwxBy4YLs-UrGmoRVB4fJY",
        authDomain: "pind-dc243.firebaseapp.com",
        // databaseURL: "https://fir-web-b823f.firebaseio.com",
        projectId: "pind-dc243",
        storageBucket: "pind-dc243.appspot.com",
        messagingSenderId: "1099108244099",
        appId: "1:1099108244099:web:53053097a62c506f95d9b6",
	// measurementId: "G-H6NQ40ELKT"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
</script>
<script src="<?php echo base_url('/assest/js/');?>NumberAuthentication.js" type="text/javascript"></script>
