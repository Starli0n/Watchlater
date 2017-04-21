var Watchlater = Watchlater || {};

console.log('On Load');

Watchlater.Api = (function () {
    return {
        hello: hello,
        token: token,
        restrictedArea: restrictedArea
    };

    function hello(data) {
        axios.get('api/hello/' + data)
            .then(function (response) {
                console.log(response.data);
            })
            .catch(function (error) {
                console.log(error);
            });
    }

    function token(data) {
        axios.post('api/token', {
                username: 'Starli0n',
                applications: ['Watchlater']
            })
            .then(function (response) {
                console.log(response.data);
                Watchlater.Ui.setToken(response.data.token);
            })
            .catch(function (error) {
                console.log(error);
            });
    }

    function restrictedArea(token) {
        axios.get('api/admin/ping', {
                headers: {'Authorization': 'Bearer ' + token}
            })
            .then(function (response) {
                console.log(response.data);
                Watchlater.Ui.setRestrictedArea(response.data.message);
            })
            .catch(function (error) {
                console.log(error);
                Watchlater.Ui.setRestrictedArea('Unauthorized');
            });
    }
})();

Watchlater.Ui = (function () {
    return {
        onHelloWorld: onHelloWorld,
        onToken: onToken,
        onRestrictedArea: onRestrictedArea,
        setToken: setToken,
        setRestrictedArea: setRestrictedArea
    };

    function onHelloWorld() {
        Watchlater.Api.hello('World');
    }

    function onToken() {
        Watchlater.Api.token();
    }

    function onRestrictedArea() {
        Watchlater.Api.restrictedArea(document.getElementById('iToken').value);
    }

    function setToken(token) {
        document.getElementById('iToken').value = token;
    }

    function setRestrictedArea(data) {
        document.getElementById('iRestrictedArea').innerText = data;
    }
})();
