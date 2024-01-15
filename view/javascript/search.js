document.addEventListener("DOMContentLoaded", function () {
    var liveSearchInput = document.getElementById("searchInput");
    var searchResult = document.getElementById("searchResults");

    liveSearchInput.addEventListener("keyup", function () {
        var input = liveSearchInput.value;

        if (input !== "") {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../controller/search.contr.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    searchResult.innerHTML = xhr.responseText;
                    searchResult.style.display = "block";
                }
            };

            xhr.send("query=" + encodeURIComponent(input));
        } else {
            searchResult.style.display = "none";
        }
    });
});