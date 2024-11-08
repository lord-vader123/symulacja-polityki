function notLogged(event) {
    event.preventDefault();
    if (window.location.href === "http://127.0.0.1/symulacja-polityki/forms/user.php") {
        alert("Musisz się zalogować, by uzyskać dostęp do tej funkcji");
        console.log("Już tu jestem hehehhe");
        return;
    }
    if (confirm("Aby uzyskać dostęp do tej funkcji musisz być zalogowany. Przenieść do strony logowania?")) {
        window.location.href = "/symulacja-polityki/forms/user.php";
        console.log("PRZENIEŚ MNIE SŁODZIAKU");
        return;
    }
    console.log("Nie zapragnąłem zostać przeniesionym");
}