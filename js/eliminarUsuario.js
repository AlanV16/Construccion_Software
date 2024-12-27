document.addEventListener("DOMContentLoaded", () => {
    const deleteButton = document.getElementById("deleteButton");
    const deleteForm = document.getElementById("deleteForm");
    const confirmationModal = document.getElementById("confirmationModal");
    const confirmationMessage = document.getElementById("confirmationMessage");
    const confirmYes = document.getElementById("confirmYes");
    const confirmNo = document.getElementById("confirmNo");

    deleteButton.addEventListener("click", () => {
        const username = document.getElementById("datusername").value.trim();
        if (username === "") {
            alert("Por favor, ingrese un nombre de usuario.");
            return;
        }

        confirmationMessage.textContent = `¿Seguro que deseas eliminar al usuario "${username}"?`;
        confirmationModal.style.display = "flex";
    });

    confirmYes.addEventListener("click", () => {
        confirmationModal.style.display = "none";
        deleteForm.submit();
    });

    confirmNo.addEventListener("click", () => {
        confirmationModal.style.display = "none";
    });
});

document.addEventListener("DOMContentLoaded", () => {
    const feedbackMessage = document.querySelector(".mensaje-feedback");
    if (feedbackMessage) {
        setTimeout(() => {
            feedbackMessage.style.display = "none";
        }, 3000); 
    }
});
