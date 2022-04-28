const menus = document.querySelectorAll('.navbar-nav .nav-item a');

menus.forEach((menu) => {
    menu.addEventListener('click', () => {
        const menuLink = document.querySelector('.nav-item .active')
        menuLink.classList.remove('active');
        menu.classList.add('active');
    })
});



