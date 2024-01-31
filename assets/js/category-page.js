window.addEventListener("load", function () {
  getData({ limit: 5 });
});

const categoryContainer = document.getElementById("category-container");

function getData(requestData) {
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      const responseData = JSON.parse(xhr.responseText);
      console.log(responseData);
      displayUserInfo(responseData);
    }
  };

  xhr.open("POST", "./ajax/category.php", true);
  xhr.setRequestHeader("Content-type", "application/json");
  xhr.send(JSON.stringify(requestData));
}

function displayUserInfo(responseData) {
  if (responseData && !("error" in responseData)) {
    if (responseData.length > 0) {
      // Accumulate the HTML content
      let htmlContent = "";

      responseData?.map(
        (category) =>
          (htmlContent += `
            <a href="/offer.php?category_id=${category.id}" class="border-[7px] rounded-lg shadow-xl py-4 px-6">
                <img src="${category.media_url}" alt="${category.meta_name}" class="rounded-t" />
                <p class="text-center py-2 px-3 bg-slate-200 rounded-b font-semibold">${category.meta_name}</p>
            </a>
        `)
      );

      // Set the accumulated HTML content
      categoryContainer.innerHTML = htmlContent;
    }
  } else {
    categoryContainer.innerHTML =
      "<p class='text-center text-xl font-bold text-red-600'>Error retrieving user information</p>";
  }
}
