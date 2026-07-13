import "./bootstrap";
import "~resources/scss/app.scss";
import "~icons/bootstrap-icons.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**"]);

// FORM CONTROLS
document.addEventListener("DOMContentLoaded", () => {
    // CONTENT TYPE EVENT-LISTENER
    const contentTypeSelect = document.getElementById("content-type");
    const endYearWrapper = document.getElementById("end-year-wrapper");
    const endYearInput = document.getElementById("content-end-year");
    const lengthInput = document.getElementById("content-length");
    const productionInput = document.getElementById("content-production");

    if (contentTypeSelect) {
        const handleTypeChange = () => {
            const selectedType = contentTypeSelect.value;

            if (selectedType === "movie") {
                endYearWrapper.classList.add("d-none");
                endYearInput.value = "";
                lengthInput.placeholder = "e.g., 2h 15min";
                productionInput.placeholder = "Insert Director";
            } else if (selectedType === "show") {
                endYearWrapper.classList.remove("d-none");
                lengthInput.placeholder = "e.g., 5 Seasons (24 eps)";
                productionInput.placeholder = "Insert Network";
            } else if (selectedType === "anime") {
                endYearWrapper.classList.remove("d-none");
                lengthInput.placeholder = "e.g., 2 Seasons (24 eps)";
                productionInput.placeholder = "Insert Production Studio";
            } else {
                endYearWrapper.classList.add("d-none");
                lengthInput.placeholder = "Select type first...";
                productionInput.placeholder = "Select type first...";
            }
        };

        handleTypeChange();
        contentTypeSelect.addEventListener("change", handleTypeChange);
    }

    // PERFORMERS FILTER
    const performersFilter = document.getElementById("performers-filter");
    const performersList = document.getElementById("performers-list");

    if (performersFilter && performersList) {
        const performerItems =
            performersList.querySelectorAll(".performer-item");
        const noResultsMessage = document.getElementById(
            "no-performers-message",
        );

        performersFilter.addEventListener("input", () => {
            const search = performersFilter.value.toLowerCase().trim();
            let results = false;

            performerItems.forEach((item) => {
                const name = item
                    .querySelector("label")
                    .textContent.toLowerCase();

                if (search === "") {
                    item.style.display = "";
                    results = true;
                } else {
                    const matches = name.includes(search);
                    item.style.display = matches ? "" : "none";
                    if (matches) results = true;
                }
            });

            if (!results && search !== "")
                noResultsMessage.classList.remove("d-none");
            else noResultsMessage.classList.add("d-none");
        });
    }

    // CONTENT FILTER
    const contentsFilter = document.getElementById("contents-filter");
    const contentsList = document.getElementById("contents-list");

    if (contentsFilter && contentsList) {
        const contentItems = contentsList.querySelectorAll(".content-item");
        const noResultsMessage = document.getElementById("no-contents-message");

        contentsFilter.addEventListener("input", () => {
            const search = contentsFilter.value.toLowerCase().trim();
            let hasResults = false;

            contentItems.forEach((item) => {
                const labelText = item
                    .querySelector("label")
                    .textContent.toLowerCase();

                if (search === "") {
                    item.style.display = "";
                    hasResults = true;
                } else {
                    const matches = labelText.includes(search);
                    item.style.display = matches ? "" : "none";
                    if (matches) hasResults = true;
                }
            });

            if (!hasResults && search !== "")
                noResultsMessage.classList.remove("d-none");
            else noResultsMessage.classList.add("d-none");
        });
    }

    // ANTI SPAM-SUBMIT
    const forms = document.querySelectorAll("form");
    forms.forEach((form) => {
        form.addEventListener("submit", (e) => {
            const submitBtn = form.querySelector("button[type='submit']");
            if (submitBtn) submitBtn.disabled = true;
        });
    });
});
