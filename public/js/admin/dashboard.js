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

var Menubar = document.querySelector('.Menubar');
window.addEventListener('scroll', function() {
    if (window.pageYOffset > 350) {
        Menubar.classList += ' fixMenubar';
    } else {
        Menubar.classList = 'Menubar';
    }

});