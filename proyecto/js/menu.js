const botones = document.querySelectorAll(".menu-btn");
const paneles = document.querySelectorAll(".panel");

botones.forEach(btn => {
    btn.addEventListener("click", () => {
        const target = btn.dataset.target;

        paneles.forEach(p => {
            if (p.id === target) {
                p.classList.toggle("activo");
            } else {
                p.classList.remove("activo");
            }
        });
    });
});