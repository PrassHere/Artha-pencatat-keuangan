document.addEventListener("DOMContentLoaded", function () {
    const trigger = document.getElementById("profileTrigger");
    const dropdown = document.getElementById("profileDropdown");

    if (trigger && dropdown) {
        // Klik area profil untuk memunculkan atau menyembunyikan jendela
        trigger.addEventListener("click", function (event) {
            event.stopPropagation(); // Menahan agar tidak langsung memicu fungsi dokumen di bawah
            dropdown.classList.toggle("show");
        });

        // Jika user klik di area mana saja selain jendela profil, otomatis tutup
        // ini hasil nonton pak sandika galih wkwk
        document.addEventListener("click", function (event) {
            if (!trigger.contains(event.target)) {
                dropdown.classList.remove("show");
            }
        });
    }
});
