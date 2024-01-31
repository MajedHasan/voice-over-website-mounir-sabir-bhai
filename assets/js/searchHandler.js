document.addEventListener("DOMContentLoaded", function () {
  // Get the input element
  var searchInput = document.getElementById("searchInput");

  // Add a keydown event listener to the input element
  searchInput.addEventListener("keydown", function (event) {
    // Check if the pressed key is Enter
    if (event.key === "Enter") {
      // Enter key is pressed
      handleSearch();
    }
  });
});

// Function to handle the search
function handleSearch() {
  // Get the input value
  var searchQuery = document.getElementById("searchInput").value;

  // Add your logic here to perform the search
  window.location.href = `/search.php?keyword=${searchQuery}`;

  // Optionally, you can redirect to a search results page or trigger an AJAX request, etc.
}
