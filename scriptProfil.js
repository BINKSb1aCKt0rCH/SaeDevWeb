// Fonction pour la modification du profil
/*
function modifProfil() {
    document.querySelector("#modifProfil").addEventListener("click", function () {
        document.querySelector(".popup:last-child").classList.add("active");
    });

    document.querySelector(".popup:last-child .close-btn").addEventListener("click", function () {
        document.querySelector(".popup:last-child").classList.remove("active");
    });
}

// Fonction pour l'ajout d'ami
function ajoutAmi() {
    document.querySelector("#ajoutAmi").addEventListener("click", function () {
        document.querySelector(".popup:last-child").classList.add("active");
    });

    document.querySelector(".popup:last-child .close-btn").addEventListener("click", function () {
        document.querySelector(".popup:last-child").classList.remove("active");
    });
}*/
document.querySelector("#modifProfil").addEventListener("click", function () {
    document.querySelector(".popup:last-child").classList.add("active")
});

document.querySelector(".popup:last-child .close-btn").addEventListener("click", function () {
    document.querySelector(".popup:last-child").classList.remove("active");
});

document.querySelector("#ajoutAmi").addEventListener("click", function () {
    document.querySelector(".popup:last-child").classList.add("active")
});

document.querySelector(".popup:last-child .close-btn").addEventListener("click", function () {
    document.querySelector(".popup:last-child").classList.remove("active");
});

