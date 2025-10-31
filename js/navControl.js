const menu = document.getElementById("menu");
const openMenu = document.getElementById("openMenu");
const closeMenu = document.getElementById("closeMenu");


    openMenu.addEventListener("click", () => {
        menu.classList.add("active");
    });



    closeMenu.addEventListener("click", () => {
        menu.classList.remove("active");
    });