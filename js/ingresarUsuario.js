document.addEventListener("DOMContentLoaded", () => {  
    const form = document.getElementById("form-usuario");  
    const modal = document.getElementById("myModal");  
    const closeModal = document.getElementById("closeModal");  

    form.querySelectorAll("input").forEach((input) => {  
        input.addEventListener("input", (e) => {  
            const target = e.target;  
            if (target.value.trim() === "") {  
                target.style.borderColor = "red";  
                target.style.backgroundColor = "#ffe5e5";  
            } else {  
                target.style.borderColor = "#b9b096";  
                target.style.backgroundColor = "#f9f9f9";  
            }  
        });  
    });  

    form.addEventListener("submit", (e) => {  
        e.preventDefault();  

        const formData = new FormData(form);

        modal.style.display = "block";   
        form.reset();  

        setTimeout(() => {  
            modal.style.display = "none"; 
            
            formData.forEach((value, key) => {
                const input = form.querySelector(`[name="${key}"]`);
                if (input) {
                    input.value = value;
                }
            });

            form.submit();  
        }, 3000); 
    });  

    closeModal.addEventListener("click", () => {  
        modal.style.display = "none";  
    });  
});
