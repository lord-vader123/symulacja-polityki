function notLogged(event) {
    event.preventDefault();
    if (confirm("Aby uzyskać dostęp do tej funkcji musisz być zalogowany. Przenieść do strony logowania?")) {
        window.location.href = "/symulacja-polityki/forms/user.php";
        console.log("PRZENIEŚ MNIE SŁODZIAKU");
        return;
    }
    console.log("Nie zapragnąłem zostać przeniesionym");