document.addEventListener('DOMContentLoaded', function () {

    eventListener();

    darkMode()
});

function darkMode() {

    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');
    // console.log(prefiereDarkMode.matches)

    if(prefiereDarkMode.matches) {
        document.body.classList.add('dark_mode');
    }else {
        document.body.classList.remove('dark_mode');
    }

    prefiereDarkMode.addEventListener('change', function() {
        if(prefiereDarkMode.matches) {
            document.body.classList.add('dark_mode');
        }else {
            document.body.classList.remove('dark_mode');
        }
    })

    const botonDarkMode = document.querySelector('.dark_mode_boton');
    
    botonDarkMode.addEventListener('click', function() {
        // document.body.classList.toggle('dark_mode');
        if (document.body.classList.contains('dark_mode')) {
            document.body.classList.remove('dark_mode');
        }else {
            document.body.classList.add('dark_mode');
        }
    });
}

function eventListener() {
    const mobileMenu = document.querySelector ('.mobile_menu');

    mobileMenu.addEventListener('click', navegacionResponsive);
}

function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion');

    if (navegacion.classList.contains('mostrar')) {
        navegacion.classList.remove('mostrar');
    }else {
        navegacion.classList.add('mostrar');
    }

    // navegacion.classList.toggle('mostrar') hace lo mismo que arriba con menos linea
}


