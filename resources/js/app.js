import "./bootstrap";
import "~resources/scss/app.scss";
import "~icons/bootstrap-icons.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**"]);

// FORM CONTROL
document.addEventListener("DOMContentLoaded", () => {
    // CONTENT TYPE EVENT-LISTENER
    const contentTypeSelect = document.getElementById("content-type");
    const endYearWrapper = document.getElementById("end-year-wrapper");
    const endYearInput = document.getElementById("content-end-year");
    const lengthInput = document.getElementById("content-length");
    const productionInput = document.getElementById("content-production");

    if (!contentTypeSelect) return;

    const handleTypeChange = () => {
        const selectedType = contentTypeSelect.value;

        if (selectedType === "movie") {
            // movie
            endYearWrapper.classList.add("d-none");
            endYearInput.value = "";
            lengthInput.placeholder = "e.g., 2h 15min";
            productionInput.placeholder = "Insert Director";
        } else if (selectedType === "show") {
            //show
            endYearWrapper.classList.remove("d-none");
            lengthInput.placeholder = "e.g., 5 Seasons (24 eps)";
            productionInput.placeholder = "Insert Network";
            // anime
        } else if (selectedType === "anime") {
            endYearWrapper.classList.remove("d-none");
            lengthInput.placeholder = "e.g., 2 Seasons (24 eps)";
            productionInput.placeholder = "Insert Production Studio";
        } else {
            // no type selected
            endYearWrapper.classList.add("d-none");
            lengthInput.placeholder = "Select type first...";
            productionInput.placeholder = "Select type first...";
        }
    };

    handleTypeChange();

    contentTypeSelect.addEventListener("change", handleTypeChange);

    // ANTI SPAM-SUBMIT
    const forms = document.querySelectorAll("form");

    forms.forEach((form) => {
        form.addEventListener("submit", (e) => {
            const submitBtn = form.querySelector("button[type='submit']");

            if (submitBtn) submitBtn.disabled = true;
        });
    });
});
