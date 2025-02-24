/* script js qui valide mon formulaire de contact */
document.addEventListener("input", function() {
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const phone = document.getElementById("phone").value;
    const message = document.getElementById("message").value;
    const submitButton = document.getElementById("submitButton");

    // Vérifie si tous les champs sont remplis
    if (name && email && phone && message) {
        submitButton.disabled = false; // Active le bouton
    } else {
        submitButton.disabled = true; // Désactive le bouton
    }
}); 