export function loadCardContent(content) {
    let file = "";

    switch (content) {
        case "tickets":
            file = "views/home/content/tickets.php";
            break;
        case "proyectos":
            file = "views/home/content/proyectos.php";
            break;
        case "miembros":
            file = "views/home/content/miembros.php";
            break;
        default:
            file = "views/error/404.php";
            break;
    }

    fetch(file)
        .then((response) => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.text();
        })
        .then((html) => {
            const content = document.getElementById("main-card");
            if (content) {
                content.innerHTML = html;
            }
        })
        .catch((err) => {
            console.error("Error al cargar contenido:", err);
            const content = document.getElementById("main-card");
            if (content) {
                content.innerHTML = `<div class="alert alert-danger">No se pudo cargar la página <strong>${page}</strong>.</div>`;
            }
        });
}