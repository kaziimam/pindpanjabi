// Import the functions you need from the SDKs you need
import { initializeApp } from "https://www.gstatic.com/firebasejs/9.6.6/firebase-app.js";
import { getAuth, signInWithPhoneNumber,RecaptchaVerifier } from "https://www.gstatic.com/firebasejs/9.6.6/firebase-auth.js";

(function ($) {
	"use strict";
  
   //firebase sdk configs
  const firebaseConfig = {
        apiKey: "AIzaSyCB8irN28adMMwxBy4YLs-UrGmoRVB4fJY",
        authDomain: "pind-dc243.firebaseapp.com",
        databaseURL: "https://fir-web-b823f.firebaseio.com",
        projectId: "pind-dc243",
        storageBucket: "pind-dc243.appspot.com",
        messagingSenderId: "1099108244099",
        appId: "1:1099108244099:web:53053097a62c506f95d9b6",
	      measurementId: "G-H6NQ40ELKT"
    };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const auth = getAuth();

  //captcha verifier to prevent fraud clicks
  $('body').append('<input type="hidden" value="1" id="arabinda_secret_recaptcha" />');
  window.recaptchaVerifier = new RecaptchaVerifier('arabinda_secret_recaptcha', {
    'size': 'invisible',
    'callback': (response) => {

    }
    }, auth);
   auth.signOut();

  const appVerifier = window.recaptchaVerifier;

  //constants and variables
  var loginModalBody = $(".modal-login .modal-body");
  var loginFormContainer = $('.login-form__input-wrapper');
  var loginMobileInputContainer = $(".input-container-mobile-no");
  var loginOTPInputContainer = $(".input-container-otp");
  var loginUserInfoInputContainer = null;
  
  var loginFormSubmitButton = $("#loginFormSubmitButton");
  let next_state = 'login';
  
  //login button click
  $('.login-button').on('click',function(){
    modalDisplayState(next_state);
    $('#loginModal').modal({
        keyboard: false,
        backdrop: 'static',
    });
  });

  //submit button click
  loginFormSubmitButton.on("click", function () {
    loginFormSteps(next_state);
  });

  //modal display state controller
  //prevent from being start from beginning
  function modalDisplayState(state){
        switch(state){
            case 'login':
            showLoginSate();
            break;
        case 'verify-otp':
            showVerifyOtpState();
            break;
        case 'sign-up':
            showUserInfoState();
            break;
        default:
            return false;
        }
  }

  //state controller
  function loginFormSteps(state){
    switch(state){
        case 'login':
            verifyLoginForm();
            break;
        case 'verify-otp':
            verifyOtpForm();
            break;
        case 'sign-up':
            verifySignUpForm();
            break;
        case 'resend':
            resendOtp();
            break;
        default:
            return false;
    }
  };

  //store data
  let data = {};

  //login state controller
  const showLoginSate = () =>{
    hideUserInfoState();
    hideVerifyOtpState();
  }

  //validate login form
  const verifyLoginForm =()=>{
      var phone_number_field = $('input[name="phone_number"]');
      const phone_number = phone_number_field.val();
      let has_error = false;
      if(!phone_number){
          has_error = true;
          showModalErrors('Enter phone number.',loginMobileInputContainer)
        }else if(!/^\d{10}$/.test(phone_number)){
            has_error = true;
            showModalErrors(phone_number+ ' is not valid number',loginMobileInputContainer);
        }
        if(!has_error){
            hideModalErrors(loginMobileInputContainer);
            data.phone_number = phone_number;
            sendOtp(phone_number);
        }
        return true;
    }
    
    //send otp
    const sendOtp =(phone_number)=>{
        var resendCounter = getResendTimeFromServer(phone_number);
        //show time
        if(!resendCounter.expired){
            if(resendTimerInterval){
                clearInterval(resendTimerInterval);
            }
            countDownTimer(resendCounter.time);
            showVerifyOtpState();
            return;
        }
        phone_number = '+91'+phone_number;
        signInWithPhoneNumber(auth, phone_number, appVerifier)
            .then((confirmationResult) => {
            window.confirmationResult = confirmationResult;
            showVerifyOtpState();
        }).catch((error) => {
            console.warn(error);
        });
    }

    //resend otp
    const resendOtp = () => {
        sendOtp(data.phone_number);
    }

    //get time for a specific phone number
    const getResendTimeFromServer = (phone_number) =>{
        var time = new Date().getTime();
        return {expired:true,time:time};
    }

    //show otp state
    const showVerifyOtpState = ()=>{
        loginMobileInputContainer.addClass("input-container-mobile-no--hide");
        loginOTPInputContainer.addClass("input-container-otp--active");
        loginFormSubmitButton.text('Verify OTP');
        next_state = 'verify-otp';
    }
    //hide otp state
    const hideVerifyOtpState = ()=>{
        loginMobileInputContainer.removeClass("input-container-mobile-no--hide");
        loginOTPInputContainer.removeClass("input-container-otp--active");
        loginFormSubmitButton.text('Login');
        next_state = 'login';
    }

    //otp form validations
    const verifyOtpForm =()=>{
        var otp_field = $('input[name="otp"]');
        const otp = otp_field.val();
        var has_error = false;
        if(otp.length < 6){
            showModalErrors('Enter valid otp',loginOTPInputContainer);
            has_error = true;
        }
        if(!has_error){
            verifyOtp(otp);
        }
    }

    //otp verification
    const verifyOtp = (code) =>{
        confirmationResult.confirm(code).then((resp)=>{
            validateUserFromDatabase(data.phone_number);             
        }).catch((error)=>{
            showModalErrors('Enter valid otp',loginOTPInputContainer);
        });
    }

    //counter
    var resendTimerInterval = null;
    const countDownTimer = (time)=>{
    var countDownDate = new Date(time).getTime();
    resendTimerInterval = setInterval(function() {
    var now = new Date().getTime();
    var distance = countDownDate - now;
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    var html = '';
        if(days > 0){
            html += days + "d ";
        }
        if(hours > 0){
            html +=  hours + "h ";
        }
        if(minutes > 0){
            html += minutes + "m ";
        }
        if(seconds > 0){
            html += seconds + "s ";
        }
        //put html into element
        if (distance < 0) {
            clearInterval(resendTimerInterval);
        }
        }, 1000);
    }

    const validateUserFromDatabase = (phone_number)=>{
        //create your function to validate from database
        console.log('validate user from database');
        var url = global_config.base_url+ "home/check_user_number/";
        var redirect_url = global_config.base_url+ "home/check_user_number/";
        $.post(url,{
                number: phone_number,
                redirect_url: redirect_url
            },(response)=>{
                var dataResult = JSON.parse(response);
                    if (dataResult.statusCode == 200) {
                       console.log('user logged in');
                       loginModalClose();
                       window.location.href =  global_config.base_url+'home/userLoginCheck';
                    }else if(dataResult.statusCode == 201){
                         showUserInfoState();
                    }
            });
    }

    const flashMessage = (title, message, theme)=>{
        $(window).bind('load', function(e){
        e.preventDefault();
        var btn = $(this),
        theme = theme;
                            
        $.jAlert({
        'title': title,
        'content': message,
        'theme': theme,
        'closeOnClick': true,
        'backgroundColor': 'white',
        'btns': [
            {'text':'OK', 'theme':theme}
            ]
        });
        });
    }

    //show create account form
    const showUserInfoState = ()=>{
        loginFormContainer.append(signUpHtml());
        loginModalBody.addClass("modal-body--containing-last-step");
        loginOTPInputContainer.addClass("input-container-otp--hide");
        loginUserInfoInputContainer = $(".input-container-user-info");
        loginUserInfoInputContainer.addClass("input-container-user-info--active");
        loginFormSubmitButton.text('Save');
        next_state = 'sign-up';
    }
    
    //hide create account form
    const hideUserInfoState = ()=>{
        loginModalBody.removeClass("modal-body--containing-last-step");
        loginOTPInputContainer.removeClass("input-container-otp--hide");
        if(loginUserInfoInputContainer){
            loginUserInfoInputContainer.remove();
        }
        loginFormSubmitButton.text('Verify OTP');
        next_state = 'verify-otp';
    }

    //verify sign up form
    const verifySignUpForm =()=>{
        const full_name = $('input[name="full_name"]');
        const email = $('input[name="email"]');
        var has_error = false;
        if(!full_name.val()){
            has_error = true;
            showModalErrors('Enter full name',loginUserInfoInputContainer);
        }
        if(!email.val()){
            has_error = true;
        showModalErrors('Email ID is required.',loginUserInfoInputContainer);
        }
        if(!has_error){
            data.full_name = full_name.val();
            data.email = email.val();
            storeUser();
        }
    }

    const storeUser = ()=>{
        //console.log(data);
        var url = global_config.base_url+'home/create_user';
        $.post(url,{data:data},(response)=>{
                console.log(response, "user Stored");
                loginModalClose();
        });
    }

    //login modal close
    const loginModalClose = ()=>{
        $("#loginModal").modal('hide');
    }
    
 //helper functions
 //show modal error of a container
 function showModalErrors(text='',container=''){
     container.children(".error-text").addClass("error-text--active").text(text);
     loginModalBody.addClass("modal-body--containing-error-text");
    }
    
  //hide modal error of a container
  function hideModalErrors(container=''){
    container.children(".error-text").removeClass("error-text--active").text('');
    loginModalBody.removeClass("modal-body--containing-error-text");

  }
  //signup html
  const signUpHtml = ()=>{
        return ('<div class="input-container input-container-user-info mb-4 bg--white">'
                  +'<label for="full name" class="text--heading">Your Name*</label>'
                  +'<input type="text" name="full_name" class="login-form__input-user-full-name w-100 py-2 px-3 bg--white border-radius--custom border-custom-1 outline--none text--heading mb-4" id="loginUserFullName" required />'

                  +'<label for="email" class="text--heading">Your Email*</label>'
                  +'<input type="email" name="email" class="login-form__input-user-email w-100 py-2 px-3 bg--white border-radius--custom border-custom-1 outline--none text--heading" id="loginUserEmail" required />'

                  +'<span class="error-text text--darkRed text--xs mt-3">Enter a valid phone number</span>'
                +'</div>');
  }


  $(document).on('click','.make_default_address',function(e){
      $('#addressDeleteModal').modal({
          keyboard:false,
          backdrop:'static'
      });

      const id = $(this).attr('data-id');
      //$('.address-delete-button').attr('data-id',id);

      $(".address-delete-button").on("click", function(){
         window.location.href =  global_config.base_url+'/home/setDefaultAddress/'+id;
      });
  });

})(jQuery);