if (window.USER_ROL === "empleado") {
    document.querySelector(".menu-empleado")?.classList.remove("hidden");
}

if (window.USER_ROL === "admin" || window.USER_ROL === "desarrollador") {
    document.querySelector(".menu-admin")?.classList.remove("hidden");
}

if (window.USER_ROL !== "guest") {
    document.querySelector(".btn-login")?.classList.add("hidden");
}
