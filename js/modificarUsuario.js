document.addEventListener("DOMContentLoaded", () => {
    const updateButton = document.getElementById("updateButton");
    const confirmationModal = document.getElementById("confirmationModal");
    const confirmationMessage = document.getElementById("confirmationMessage");
    const confirmYes = document.getElementById("confirmYes");
    const confirmNo = document.getElementById("confirmNo");
    const updateForm = document.getElementById("updateForm");
    const addProfileButton = document.getElementById("addProfileButton");
    const newProfileInput = document.getElementById("newProfile");
    const profileSelect = document.getElementById("datperfil");
    const feedbackMessage = document.querySelector(".mensaje-feedback");


    updateButton.addEventListener("click", () => {
        const username = document.getElementById("datusername").value.trim();
        const password = document.getElementById("datpassword").value.trim();
        const perfil = profileSelect.value;

        if (!username || !password || !perfil) {
            mostrarFeedback("Por favor, completa todos los campos.", "error");
            return;
        }

        confirmationMessage.textContent = `¿Estás seguro de que quieres modificar al usuario "${username}"?`;
        confirmationModal.style.display = "flex";
    });


    confirmYes.addEventListener("click", () => {
        confirmationModal.style.display = "none";
        updateForm.submit();
    });


    confirmNo.addEventListener("click", () => {
        confirmationModal.style.display = "none";
    });


    window.addEventListener("click", (event) => {
        if (event.target === confirmationModal) {
            confirmationModal.style.display = "none";
        }
    });


    addProfileButton.addEventListener("click", async () => {
        const newProfile = newProfileInput.value.trim();
        if (newProfile) {
            try {

                const response = await fetch("controladorModificarUsuario.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded",
                    },
                    body: `action=addProfile&newProfile=${encodeURIComponent(newProfile)}`,
                });

                const result = await response.text();
                if (response.ok && result === "success") {
                    const option = document.createElement("option");
                    option.value = newProfile.toLowerCase();
                    option.textContent = newProfile;
                    profileSelect.appendChild(option);
                    newProfileInput.value = "";
                    mostrarFeedback(`Perfil "${newProfile}" añadido exitosamente.`, "success");
                } else {
                    mostrarFeedback("Error al añadir perfil. Intenta de nuevo.", "error");
                }
            } catch (error) {
                mostrarFeedback("Error al conectar con el servidor.", "error");
            }
        } else {
            mostrarFeedback("Introduce un perfil válido.", "error");
        }
    });


    function mostrarFeedback(mensaje, tipo) {
        feedbackMessage.textContent = mensaje;
        feedbackMessage.className = `mensaje-feedback ${tipo}`;
        feedbackMessage.style.display = "block";
        setTimeout(() => {
            feedbackMessage.style.display = "none";
        }, 3000);
    }
});
