var Menubar = document.querySelector('.Menubar');
var nav = document.querySelector('.nav');
window.addEventListener('scroll', function () {
    if (window.pageYOffset > 350) {
        Menubar.classList += ' fixMenubar';
        nav.classList += ' fixnav';
    } 
    else {
        Menubar.classList = 'Menubar';
        nav.classList = 'nav';
    }
    
});

window.addEventListener('touchend', function(event) {
    var menuButton = document.querySelector('.button');
    var menu = document.querySelector('.Menu');
    var overlay = document.querySelector('.overlay');
    if (event.target === overlay) {
        menu.classList.toggle("activeMenu");
        menuButton.classList.toggle("change");
        overlay.classList.toggle("activeOverlay");
    }
});

var menuButton = document.querySelector('.button');

    menuButton.addEventListener('touchend', 
        function myFunction() {
        var menu = document.querySelector('.Menu');
        var overlay = document.querySelector('.overlay');
        menu.classList.toggle("activeMenu");
        overlay.classList.toggle("activeOverlay");
        this.classList.toggle("change");
       //  this.preventDefault();
    // return false;
    },false);

var events = document.querySelector('#user');
events.addEventListener('touchend',
    function () {
        // event.preventDefault();
        var angleDown = document.querySelector('.down');
        var angleRight = document.querySelector('.right');
        var subMenu = document.querySelector('.subMenu');
        angleDown.classList.toggle("activeAngleDown");
        angleRight.classList.toggle("inactiveAngleRight");
        subMenu.classList.toggle("activeSubMenu");
    }, false);
