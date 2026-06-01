const confirmModal = document.getElementById("confirmModal");

const confirmTitle = document.getElementById("confirmTitle");
const confirmMessage = document.getElementById("confirmMessage");
const confirmAction = document.getElementById("confirmAction");
const confirmIcon = document.getElementById("confirmIcon");

const cancelConfirm = document.getElementById("cancelConfirm");


// DELETE
document.querySelectorAll(".open-delete-confirm")
.forEach(button => {

    button.addEventListener("click", function(e){

        e.preventDefault();

        confirmIcon.innerHTML = "🗑️";

        confirmTitle.textContent =
        "Delete Transaction";

        confirmMessage.textContent =
        "This action cannot be undone.";

        confirmAction.textContent =
        "Delete";

        confirmAction.href =
        this.href;

        confirmAction.className =
        "danger-btn";

        confirmModal.classList.add("active");

    });

});


// EDIT
document.querySelectorAll(".open-edit-confirm")
.forEach(button => {

    button.addEventListener("click", function(e){

        e.preventDefault();

        confirmIcon.innerHTML = "✏️";

        confirmTitle.textContent =
        "Edit Transaction";

        confirmMessage.textContent =
        "Do you want to edit this transaction?";

        confirmAction.textContent =
        "Edit";

        confirmAction.href =
        this.href;

        confirmAction.className =
        "edit-confirm-btn";

        confirmModal.classList.add("active");

    });

});


// CANCEL
cancelConfirm.addEventListener("click", () => {

    confirmModal.classList.remove("active");

});


// KLIK LUAR
confirmModal.addEventListener("click", () => {

    confirmModal.classList.remove("active");

});

document.querySelector(".confirm-box")
.addEventListener("click", (e) => {

    e.stopPropagation();

});