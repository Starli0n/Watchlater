var Watchlater = Watchlater || {};

console.log('On Load');

Watchlater.Api = (function () {
    return {
        hello: hello,
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
})();

Watchlater.Ui = (function () {
    return {
        onHelloWorld: onHelloWorld
    };

    function onHelloWorld() {
        Watchlater.Api.hello('World');
    }
})();
