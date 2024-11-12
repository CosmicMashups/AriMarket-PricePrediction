const searchInput = document.getElementById("search-input");
const suggestionsList = document.getElementById("search-suggestions");

const suggestions = [
    "asdasdasd",
    "asdasdasd meaning",
    "asdasdasd game"
];

searchInput.addEventListener("input", function() {
    const searchTerm = searchInput.value.toLowerCase();

    if (searchTerm.length > 0) {
        suggestionsList.innerHTML = "";
        suggestions.forEach(suggestion => {
            if (suggestion.toLowerCase().startsWith(searchTerm)) {
                const listItem = document.createElement("li");
                listItem.textContent = suggestion;
                suggestionsList.appendChild(listItem);
            }
        });
        suggestionsList.style.display = "block";
    } else {
        suggestionsList.innerHTML = "";
        suggestionsList.style.display = "none";
    }
});

suggestionsList.addEventListener("click", function(event) {
    searchInput.value = event.target.textContent;
    suggestionsList.style.display = "none";
});
