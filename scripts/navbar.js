<<<<<<< HEAD
document.addEventListener('DOMContentLoaded', () => {
    const tiendaButton = document.getElementById('tienda-button');
    const tiendaMenu = document.getElementById('tienda-menu');
    const tiendaMenuButton = document.getElementById('tienda-menu-button');
    const tiendaMenuMenu = document.getElementById('tienda-menu-menu');
    const inicioButton = document.getElementById('inicio-button');
    const contactButton = document.getElementById('contactanos-button');


    if(inicioButton != null){
        inicioButton.addEventListener('click', () => {
            if (window.location.href === "index.php") {
                window.location.href = "register.php";
            } else {
                window.location.href = "index.php";
            }
        });
    }

    if(contactButton != null){
        contactButton.addEventListener('click', () => {
            if (window.location.href === "index.php" || "tienda.php" || "detalles.php") {
                window.location.href = "contact.php";
            } else {
                window.location.href = window.location.href;
            }
        });
    }


    tiendaButton.addEventListener('click', () => {
        if (tiendaMenu.style.display === "block") {
            tiendaMenu.style.display = "none";
        } else {
            tiendaMenu.style.display = "block";
        }
    });

    tiendaMenuButton.addEventListener('click', () => {
        if (tiendaMenuMenu.style.display === "block") {
            tiendaMenuMenu.style.display = "none";
        } else {
            tiendaMenuMenu.style.display = "block";
        }
    });

    tiendaMenuButton.addEventListener('mouseover', () => {
        if (tiendaMenuMenu.style.display === "block") {
            tiendaMenuMenu.style.display = "none";
        } else {
            tiendaMenuMenu.style.display = "block";
        }
    });

    // Ocultar el menú si se hace clic en cualquier otro lugar
    document.addEventListener('click', (event) => {
        if (!tiendaButton.contains(event.target) && !tiendaMenu.contains(event.target)) {
            tiendaMenu.style.display = "none";
        }
    });
    document.addEventListener('click', (event) => {
        if (!tiendaMenuButton.contains(event.target) && !tiendaMenuMenu.contains(event.target)) {
            tiendaMenuMenu.style.display = "none";
        }
    });
    document.addEventListener('mouseover', (event) => {
        if (!tiendaMenuButton.contains(event.target) && !tiendaMenuMenu.contains(event.target)) {
            tiendaMenuMenu.style.display = "none";
        }
    });
});

=======
document.addEventListener('DOMContentLoaded', () => {
    const tiendaButton = document.getElementById('tienda-button');
    const tiendaMenu = document.getElementById('tienda-menu');
    const tiendaMenuButton = document.getElementById('tienda-menu-button');
    const tiendaMenuMenu = document.getElementById('tienda-menu-menu');
    const inicioButton = document.getElementById('inicio-button');
    const contactButton = document.getElementById('contactanos-button');


    if(inicioButton != null){
        inicioButton.addEventListener('click', () => {
            if (window.location.href === "index.php") {
                window.location.href = "register.php";
            } else {
                window.location.href = "index.php";
            }
        });
    }

    if(contactButton != null){
        contactButton.addEventListener('click', () => {
            if (window.location.href === "index.php" || "tienda.php" || "detalles.php") {
                window.location.href = "contact.php";
            } else {
                window.location.href = window.location.href;
            }
        });
    }


    tiendaButton.addEventListener('click', () => {
        if (tiendaMenu.style.display === "block") {
            tiendaMenu.style.display = "none";
        } else {
            tiendaMenu.style.display = "block";
        }
    });

    tiendaMenuButton.addEventListener('click', () => {
        if (tiendaMenuMenu.style.display === "block") {
            tiendaMenuMenu.style.display = "none";
        } else {
            tiendaMenuMenu.style.display = "block";
        }
    });

    tiendaMenuButton.addEventListener('mouseover', () => {
        if (tiendaMenuMenu.style.display === "block") {
            tiendaMenuMenu.style.display = "none";
        } else {
            tiendaMenuMenu.style.display = "block";
        }
    });

    // Ocultar el menú si se hace clic en cualquier otro lugar
    document.addEventListener('click', (event) => {
        if (!tiendaButton.contains(event.target) && !tiendaMenu.contains(event.target)) {
            tiendaMenu.style.display = "none";
        }
    });
    document.addEventListener('click', (event) => {
        if (!tiendaMenuButton.contains(event.target) && !tiendaMenuMenu.contains(event.target)) {
            tiendaMenuMenu.style.display = "none";
        }
    });
    document.addEventListener('mouseover', (event) => {
        if (!tiendaMenuButton.contains(event.target) && !tiendaMenuMenu.contains(event.target)) {
            tiendaMenuMenu.style.display = "none";
        }
    });
});

>>>>>>> 3d0a4ac568ce5cfeb76d2afadfeba4bf8e8e20d5
