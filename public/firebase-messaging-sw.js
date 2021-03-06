// Give the service worker access to Firebase Messaging.
// Note that you can only use Firebase Messaging here.
// Other Firebase libraries are not available in the service worker.
importScripts("https://www.gstatic.com/firebasejs/7.16.1/firebase-app.js");
importScripts("https://www.gstatic.com/firebasejs/7.16.1/firebase-messaging.js",);

if (firebase.messaging.isSupported()) {
    // Initialize the Firebase app in the service worker by passing in the
    // messagingSenderId.
    firebase.initializeApp({
        apiKey: "AIzaSyBUns1e3HP2upPDJJlB5P0RTrzIshIJXAc",
        authDomain: "codenteq-d84d9.firebaseapp.com",
        projectId: "codenteq-d84d9",
        storageBucket: "codenteq-d84d9.appspot.com",
        messagingSenderId: "325466526937",
        appId: "1:325466526937:web:ae87a4b499ae76ddc61ac8"
    });

    // Retrieve an instance of Firebase Messaging so that it can handle background messages.
    const messaging = firebase.messaging();

    messaging.setBackgroundMessageHandler(function (payload) {
        console.log(
            "[firebase-messaging-sw.js] Received background message ",
            payload,
        );

        // Customize notification here
        const notificationTitle = "Background Message Title";
        const notificationOptions = {
            body: "Background Message body.",
            icon: "/itwonders-web-logo.png",
        };

        return self.registration.showNotification(
            notificationTitle,
            notificationOptions,
        );
    });
}
