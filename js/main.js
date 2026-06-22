const navbar = document.getElementById('navbar');
const logo = document.getElementById('logo');

window.addEventListener('scroll', () => {

    if (window.scrollY > 50) {

        navbar.classList.add('bg-white', 'shadow-lg');

        document.querySelectorAll('#navbar a').forEach(link => {
            link.classList.remove('text-white');
            link.classList.add('text-gray-800');
        });

    } else {

        navbar.classList.remove('bg-white', 'shadow-lg');

        document.querySelectorAll('#navbar a').forEach(link => {
            link.classList.remove('text-gray-800');
            link.classList.add('text-white');
        });
    }

});