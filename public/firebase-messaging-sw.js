/*
 * Created By Dedi Fardiyanto
 * Copyright (c) 2020, Inc - All Rights Reserved
 * @Filename firebase-messaging-sw.js
 * @LastModified 24/04/2020, 14:04
 */

importScripts('https://www.gstatic.com/firebasejs/7.14.1/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.14.1/firebase-messaging.js');

var firebaseConfig = {
    apiKey: "AIzaSyC7i9zJVxN-omyzbDw7gkQw7U_vo7B1oUU",
    authDomain: "palembang-kito-66362.firebaseapp.com",
    databaseURL: "https://palembang-kito-66362.firebaseio.com",
    projectId: "palembang-kito-66362",
    storageBucket: "palembang-kito-66362.appspot.com",
    messagingSenderId: "895671213241",
    appId: "1:895671213241:web:1eb7a2fe0c13cb2d4d0f68",
    measurementId: "G-MPN5VXBW5R"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);
//firebase.analytics();

// Retrieve Firebase Messaging object.
const messaging = firebase.messaging();

// If you would like to customize notifications that are received in the
// background (Web app is closed or not in browser focus) then you should
// implement this optional method.
// [START background_handler]
messaging.setBackgroundMessageHandler(function(payload) {
    let data = JSON.parse(payload.data.data);

    console.log('[firebase-messaging-sw.js] Received background message ', data.message);
    // Customize notification here
    let notificationTitle = data.title;
    let notifBody = data.message + ', ' + data.timestamp;
    let notifIcon = '/img_palembang_kito.jpeg';
    let notifLink = 'https://dashboard.palembang-kito.com/reports/category';
    const notificationOptions = {
        body: notifBody, //data.message + '(' + data.timestamp + ')',
        icon: notifIcon,
        data: notifLink
    };

    // when click notif
    self.addEventListener('notificationclick', function(event) {
        console.log('notif click ya ... ',event.notification.data);
        event.notification.close();
        event.waitUntil(self.clients.openWindow(event.notification.data));
    });

    return self.registration.showNotification(notificationTitle,
        notificationOptions);
});
// [END background_handler]

// push

