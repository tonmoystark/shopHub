document.addEventListener("DOMContentLoaded", () => {

    document.querySelectorAll(".delete-form").forEach((form) => {

        form.addEventListener("submit", function (e) {

            e.preventDefault();

            Swal.fire({
                title: "Are you sure?",
                text: "This category will be deleted.",
                icon: "warning",

                showCancelButton: true,

                confirmButtonColor: "#dc2626",
                cancelButtonColor: "#6b7280",

                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "Cancel",

                reverseButtons: true,

            }).then((result) => {

                if (result.isConfirmed) {
                    form.submit();
                }

            });

        });

    });

});