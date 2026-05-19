const modal = document.getElementById("transactionModal");

const openButtons = document.querySelectorAll(".openModal");

const closeBtn = document.getElementById("closeModal");

const cancelBtn = document.getElementById("cancelModal");

const modalBox = document.querySelector(".modal-box");

const form = document.querySelector(".transaction-form");

const typeButtons = document.querySelectorAll(".type-btn");


// OPEN MODAL
openButtons.forEach(button => {

    button.addEventListener("click", () => {

        form.reset();

        modal.classList.add("active");

    });

});


// CLOSE X
closeBtn.addEventListener("click", () => {

    modal.classList.remove("active");

    form.reset();

});


// CANCEL
cancelBtn.addEventListener("click", () => {

    form.reset();

});


// KLIK OVERLAY
modal.addEventListener("click", () => {

    modal.classList.remove("active");

    form.reset();

});


// STOP CLICK DI DALAM MODAL
modalBox.addEventListener("click", (e) => {

    e.stopPropagation();

});

typeButtons.forEach(button => {

    button.addEventListener("click", () => {

        typeButtons.forEach(btn => {
            btn.classList.remove("active");
        });

        button.classList.add("active");

    });

});