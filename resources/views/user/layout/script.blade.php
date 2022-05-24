<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="{{asset('js/app.js')}}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.16.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.16.1/firebase-messaging.js"></script>
<script>
    const firebaseConfig = {
        apiKey: "AIzaSyBUns1e3HP2upPDJJlB5P0RTrzIshIJXAc",
        authDomain: "codenteq-d84d9.firebaseapp.com",
        projectId: "codenteq-d84d9",
        storageBucket: "codenteq-d84d9.appspot.com",
        messagingSenderId: "325466526937",
        appId: "1:325466526937:web:ae87a4b499ae76ddc61ac8"
    };

    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);

    const messaging = firebase.messaging();
    messaging.requestPermission()
        .then(function () {
            console.log('Notification permission granted.');
            return messaging.getToken()
        })
        .then(function (token) {
            axios.post('{{route('user.token')}}', {
                'userId': {{auth()->id()}},
                'token': token
            })
        })
        .catch(function (err) {
            console.log('Unable to get permission to notify.', err);
        });
</script>
<script src="https://cdn.jsdelivr.net/npm/vanilla-masker@1.1.1/build/vanilla-masker.min.js"></script>
<script>
    VMasker(document.getElementsByName('phone')).maskPattern("(999) 999-9999");
    localStorage.setItem('auth',{{auth()->id()}});
</script>
