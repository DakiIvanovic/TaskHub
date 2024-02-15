window.onload = function () {
    var formInputs = document.querySelectorAll('input');
    var updateButton = document.querySelector('button[type="submit"]');

    formInputs.forEach(function (input) {
        input.addEventListener('input', function () {
            updateButton.disabled = false;
        });
    });
};