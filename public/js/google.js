/*
 * Created By Dedi Fardiyanto
 * Copyright (c) 2020, Inc - All Rights Reserved
 * @Filename google.js
 * @LastModified 24/04/2020, 00:47
 */

//var base_uri = "https://api.palembang-kito.com/api/v1/fcm/subscribe";
var base_uri = window.location.origin + "/reports/lists/subscribe/fcm";
// Your web app's Firebase configuration
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

// Add the public key generated from the console here.
//messaging.usePublicVapidKey("BKagOny0KF_2pCJQ3m....moL0ewzQ8rZu");
messaging.usePublicVapidKey("BN38uSlpgytEwXRcU_RnZNrbyHxDQxVZeEJ_cwnXifVHnd7z9bEL6Sln4arH7ZYuSRzjJ_VohtjkMNM4MCg3V9c");

// [START refresh_token]
// Callback fired if Instance ID token is updated.
messaging.onTokenRefresh(() => {
    messaging.getToken().then((refreshedToken) => {
        console.log('Token refreshed.');
        // Indicate that the new Instance ID token has not yet been sent to the
        // app server.
        setTokenSentToServer(false);
        // Send Instance ID token to app server.
        sendTokenToServer(refreshedToken);
        // ...
        resetUI();
    }).catch((err) => {
        console.log('Unable to retrieve refreshed token ', err);
    });
});
// [END refresh_token]

// [START receive_message]
// Handle incoming messages. Called when:
// - a message is received while the app has focus
// - the user clicks on an app notification created by a service worker
//   `messaging.setBackgroundMessageHandler` handler.
messaging.onMessage((payload) => {
    //console.log('Message received. ', payload);
    // [START_EXCLUDE]
    // Update the UI to include the received message.
    //appendMessages(payload);
    showNotif(payload);
    // [END_EXCLUDE]
});
// [END receive_message]


// req approval allowed notif
/** deprecated
Notification.requestPermission().then((permission) => {
    if (permission === 'granted') {
        console.log('Notification permission granted.');
        // TODO(developer): Retrieve an Instance ID token for use with FCM.
        // ...
    } else {
        console.log('Unable to get permission to notify.');
    }
});
 */

// permission get message
function requestPermission() {
    console.log('Requesting permission...');
    // [START request_permission]
    // messaging.requestPermission().then((permission) => {
    //     if (permission === 'granted') {
    //         console.log('Notification permission granted.');
    //         // TODO(developer): Retrieve an Instance ID token for use with FCM.
    //         // [START_EXCLUDE]
    //         // In many cases once an app has been granted notification permission,
    //         // it should update its UI reflecting this.
    //         resetUI();
    //         // [END_EXCLUDE]
    //     } else {
    //         console.log('Unable to get permission to notify.');
    //     }
    // });
    // [END request_permission]

    // [START request_permission]
    Notification.requestPermission().then((permission) => {
        if (permission === 'granted') {
            console.log('Notification permission granted.');
            // TODO(developer): Retrieve an Instance ID token for use with FCM.
            // ...
            $('#notifyMe').css('color', 'green');
            //notifAllowed('permission');
            resetUI();
        } else {
            $('#notifyMe').css('color', 'red');
            //notifAllowed('not_allowed');
            //console.log('Unable to get permission to notify.');
        }
    });
    // [END request_permission]
}
// messaging.requestPermission()
//     .then(function(){
//         console.log('have permission');
//         return messaging.getToken();
//     })
//     .then(function(token) {
//         console.log(token);
//     })
//     .catch(function(err){
//         console.log('Error ocurred', err);
//     })

// Send the Instance ID token your application server, so that it can:
// - send messages back to this app
// - subscribe/unsubscribe the token from topics
function sendTokenToServer(currentToken) {
    if (!isTokenSentToServer()) {
        console.log('Sending token to server...');
        // TODO(developer): Send the current token to your server.
        setTokenSentToServer(true);
    } else {
        console.log('Token already sent to server so won\'t send it again ' +
            'unless it changes');
    }

}

function isTokenSentToServer() {
    return window.localStorage.getItem('sentToServer') === '1';
}

function setTokenSentToServer(sent) {
    window.localStorage.setItem('sentToServer', sent ? '1' : '0');
}

function resetUI() {
    // [START get_token]
    // Get Instance ID token. Initially this makes a network call, once retrieved
    // subsequent calls to getToken will return from cache.
    messaging.getToken().then((currentToken) => {
        if (getCurrentToken() == currentToken) {
            messaging.deleteToken(currentToken).then(() => {
                console.log('Token deleted.');
                setTokenSentToServer(false);
                // [START_EXCLUDE]
                // Once token is deleted update UI.
                resetUI();
                // [END_EXCLUDE]
            }).catch((err) => {
                console.log('Unable to delete token. ', err);
            });
        } else if (currentToken) {
            // console.log(currentToken);
            sendTokenToServer(currentToken);
            setNewToken(currentToken);
        } else {
            // Show permission request.
            console.log('No Instance ID token available. Request permission to generate one.');
            // Show permission UI.
            setTokenSentToServer(false);
        }
    }).catch((err) => {
        console.log('An error occurred while retrieving token. ', err);
        setTokenSentToServer(false);
    });
    // [END get_token]
}

function appendMessages(payload) {
    console.log('show notif ',payload);
}

function setNewToken(token_new) {
    window.localStorage.setItem('token_fcm', token_new);
    registerSubcribe(token_new);
}

function getCurrentToken() {
    return window.localStorage.getItem('token_fcm');
}

function registerSubcribe(token_new) {
    var form = new FormData();
    form.append("topic", "new-report"); // newReport
    form.append("token", token_new);

    var settings = {
        "url": base_uri,
        "method": "POST",
        "timeout": 0,
        "data": {
            topic: "new-report",
            token: token_new
        },
        "dataType": 'json'
    };

    $.ajax(settings).done(function (response) {
        console.log('token subcribe ',response);
    }).error(function (err) {
        console.log('subscribe token error ',err)
    });
}

resetUI();
requestPermission();
$('#notifyMe').on('click', function (e) {
    // function to actually ask the permissions
    function handlePermission(permission) {
        // Whatever the user answers, we make sure Chrome stores the information
        if(!('permission' in Notification)) {
            Notification.permission = permission;
        }

        // set the button to shown or hidden, depending on what the user answers
        if(Notification.permission === 'denied' || Notification.permission === 'default') {
            $('#notifyMe').css('color', 'red');
            notifAllowed('not_allowed');
        } else {
            $('#notifyMe').css('color', 'green');
            resetUI();
            notifAllowed('permission');
        }
    }

    // Let's check if the browser supports notifications
    if (!('Notification' in window)) {
        console.log("This browser does not support notifications.");
    } else {
        if(checkNotificationPromise()) {
            Notification.requestPermission()
                .then((permission) => {
                    handlePermission(permission);
                })
        } else {
            Notification.requestPermission(function(permission) {
                handlePermission(permission);
            });
        }
    }
})

function checkNotificationPromise() {
    try {
        Notification.requestPermission().then();
    } catch(e) {
        return false;
    }

    return true;
}
