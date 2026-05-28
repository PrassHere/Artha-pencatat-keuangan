document.addEventListener("DOMContentLoaded", () => {

    // ======================
    // OPEN MODAL
    // ======================

    const openButtons = document.querySelectorAll("[data-modal-target]");

    openButtons.forEach(button => {

        button.addEventListener("click", () => {

            const target = button.dataset.modalTarget;

            const modal = document.getElementById(target);

            if(modal){

                modal.classList.add("active");

            }

        });

    });


    // ======================
    // CLOSE MODAL
    // ======================

    const closeButtons = document.querySelectorAll("[data-close-modal]");

    closeButtons.forEach(button => {

        button.addEventListener("click", () => {

            const modal = button.closest(".modal-overlay");

            modal.classList.remove("active");

        });

    });


    // ======================
    // OVERLAY CLICK
    // ======================

    const modals = document.querySelectorAll(".modal-overlay");

    modals.forEach(modal => {

        modal.addEventListener("click", () => {

            modal.classList.remove("active");

        });

    });


    // ======================
    // STOP PROPAGATION
    // ======================

    const modalBoxes = document.querySelectorAll(".modal-box");

    modalBoxes.forEach(box => {

        box.addEventListener("click", (e) => {

            e.stopPropagation();

        });

    });


    // ======================
    // TYPE BUTTON
    // ======================

    const typeSelectors = document.querySelectorAll(".type-selector");

    typeSelectors.forEach(selector => {

        const buttons = selector.querySelectorAll(".type-btn");

        buttons.forEach(button => {

            button.addEventListener("click", () => {

                buttons.forEach(btn => {
                    btn.classList.remove("active");
                });

                button.classList.add("active");

            });

        });

    });

});