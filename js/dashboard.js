document.addEventListener('DOMContentLoaded', function() {  
    const menuToggle = document.getElementById('menuToggle');  
    const menu = document.getElementById('menu');  


    menuToggle.addEventListener('click', function() {  
        menu.classList.toggle('hidden');   
    });  


    document.querySelectorAll('.menu-item a').forEach(function(link) {  
        link.addEventListener('click', function() {  
            document.querySelectorAll('.menu-item a').forEach(function(link) {  
                link.classList.remove('active');  
            });  
 
            this.classList.add('active');  
        });  
    });  
});