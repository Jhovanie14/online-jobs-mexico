<template>
    <div>
      <div ref="recaptcha"></div>
    </div>
  </template>
  
  <script setup>
  import { ref, onMounted } from 'vue';
  
  const emit = defineEmits(['verified']);
  const recaptcha = ref(null);
  
  const onRecaptchaVerified = (response) => {
    emit('verified', response);
  };
  
  // Function to load the reCAPTCHA script
  const loadRecaptchaScript = () => {
    if (window.grecaptcha && window.grecaptcha.render) {
      // If grecaptcha is already available and the render function exists, initialize it immediately
      initializeRecaptcha();
    } else {
      // Otherwise, load the reCAPTCHA script dynamically
      const script = document.createElement('script');
      script.src = 'https://www.google.com/recaptcha/api.js'; 
      script.async = true;
      script.defer = true;
      script.onload = () => {
          
          // Log window.grecaptcha to check if it is loaded properly
        // Wait until grecaptcha is fully ready before initializing
        const checkGreCaptchaReady = setInterval(() => {
          if (window.grecaptcha && window.grecaptcha.render) {
            clearInterval(checkGreCaptchaReady);  // Stop checking once it is ready
            initializeRecaptcha();
          }
        }, 100);  // Check every 100ms
      };
      document.head.appendChild(script);
    }
  };
  
  // Initialize reCAPTCHA after the script is loaded and ready
  const initializeRecaptcha = () => {
    if (recaptcha.value && window.grecaptcha) {
      // Log window.grecaptcha before rendering
    //   console.log(window.grecaptcha);  
      window.grecaptcha.render(recaptcha.value, {
        sitekey: '6LcsFN0qAAAAAND1TRUSqys1rukp-c9iB_s2HmKZ',
        callback: onRecaptchaVerified,
      });
    } else {
      console.error('reCAPTCHA is not available.');
    }
  };
  
  onMounted(() => {
    loadRecaptchaScript();
  });
  </script>
  