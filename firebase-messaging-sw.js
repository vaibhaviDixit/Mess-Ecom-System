importScripts('https://www.gstatic.com/firebasejs/8.2.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.2.0/firebase-messaging.js');

var firebaseConfig = {
	apiKey: "AIzaSyBsfGjxjrIluPquGXlLdOeHWi4lLewkxeM",
    authDomain: "otp-authentication-58f6d.firebaseapp.com",
    projectId: "otp-authentication-58f6d",
    storageBucket: "otp-authentication-58f6d.appspot.com",
    messagingSenderId: "942589487415",
    appId: "1:942589487415:web:593e2465359f63bb0092b2",
    measurementId: "G-4VES7Z49KF"
};

firebase.initializeApp(firebaseConfig);
const messaging=firebase.messaging();

messaging.setBackgroundMessageHandler(function (payload) {
    console.log(payload);
    const notification=JSON.parse(payload);
    const notificationOption={
        body:notification.body,
        icon:notification.icon
    };
    return self.registration.showNotification(payload.notification.title,notificationOption);
});