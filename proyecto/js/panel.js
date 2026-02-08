const overlay = document.getElementById("panel-overlay");
const contenido = document.getElementById("panel-contenido");

function abrirPanel() {
    let url = "";

    switch (window.USER_ROL) {
        case "admin":
            url = "../panel/admin.php";
            break;
        case "empleado":
            url = "../panel/empleado.php";
            break;
        case "desarrollador":
            url = "../panel/dev.php";
            break;
        default:
            url = "../panel/cliente.php";
    }

    fetch(url)
        .then(res => res.text())
        .then(html => {
            contenido.innerHTML = html;
            overlay.classList.add("activo");
        });
}

function cerrarPanel() {
    overlay.classList.remove("activo");
    contenido.innerHTML = "";
}
