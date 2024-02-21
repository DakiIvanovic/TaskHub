document.addEventListener("DOMContentLoaded", function() {
    const name = document.getElementById("name");
    const email = document.getElementById("email");
    const submitButton = document.getElementById("submitButton");

    // Funkcija koja omogućava ili onemogućava dugme u zavisnosti od promena u input poljima
    function enableButtonOnInputChange() {
        submitButton.disabled = !inputFieldsHaveChanges();
    }

    // Funkcija koja proverava da li ima promena u input poljima
    function inputFieldsHaveChanges() {
        return name.value.trim() !== "" || email.value.trim() !== "";
    }

    // Dodajemo event listener za promene u input poljima
    name.addEventListener("input", enableButtonOnInputChange);
    email.addEventListener("input", enableButtonOnInputChange);
});