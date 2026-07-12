import "./bootstrap";
import "~resources/scss/app.scss";
import "~icons/bootstrap-icons.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**"]);

// CONTENT TYPE EVENT-LISTENER
document.addEventListener("DOMContentLoaded", () => {
    // elements
    const contentTypeSelect = document.getElementById("content-type");
    const endYearWrapper = document.getElementById("end-year-wrapper");
    const endYearInput = document.getElementById("content-end-year");
    const lengthInput = document.getElementById("content-length");

    if (!contentTypeSelect) return;

    const handleTypeChange = () => {
        const selectedType = contentTypeSelect.value;

        if (selectedType === "movie") {
            endYearWrapper.classList.add("d-none");
            endYearInput.value = "";
            lengthInput.placeholder = "e.g., 2h 15min";
        } else if (selectedType === "show" || selectedType === "anime") {
            endYearWrapper.classList.remove("d-none");
            lengthInput.placeholder = "e.g., 5 Seasons (24 eps)";
        } else {
            // no type selected
            endYearWrapper.classList.add("d-none");
            lengthInput.placeholder = "Select type first...";
        }
    };

    handleTypeChange();

    // event-listener
    contentTypeSelect.addEventListener("change", handleTypeChange);
});
