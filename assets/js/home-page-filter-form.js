const filterForm = document.getElementById("filter-form");
const filterResults = document.getElementById("filter-results");

filterForm.addEventListener("submit", function (e) {
  e.preventDefault();

  const category = e.target.category.value;
  const language = e.target.language.value;

  if (category === "" || language === "") {
    Toastify({
      text: "Please select a category and language",
      duration: 3000,
      newWindow: true,
      close: true,
      gravity: "top", // `top` or `bottom`
      position: "right", // `left`, `center` or `right`
      stopOnFocus: true, // Prevents dismissing of toast on hover
      style: {
        background: "linear-gradient(to right, #711b76, #df98e8)",
      },
      onClick: function () {}, // Callback after click
    }).showToast();
  } else {
    const requestData = { category, language, limit: 5 };
    console.log(requestData);
    getData(requestData);
  }
});

function getData(requestData) {
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      const responseData = JSON.parse(xhr.responseText);
      console.log(responseData);
      displayUserInfo(responseData);
    }
  };

  xhr.open("POST", "./ajax/services.php", true);
  xhr.setRequestHeader("Content-type", "application/json");
  xhr.send(JSON.stringify(requestData));
}

function displayUserInfo(responseData) {
  if (responseData && !("error" in responseData)) {
    if (responseData.length > 0) {
      // Accumulate the HTML content
      let htmlContent = "";

      responseData.map((data) => {
        htmlContent += `
          <div class="rounded lg:py-6 py-8 lg:px-10 px-5 shadow-lg bg-violet-100 flex xl:flex-row flex-col items-center justify-between gap-7">
            <div class="flex flex-col items-center flex-1">
              <img src="${
                data?.profile_pic
                  ? data?.profile_pic
                  : "./assets/img/dummy-profile-pic.jpeg"
              }" alt="" class="border-4 rounded-full max-w-24 w-full">
              <p class="text-xl font-bold text-slate-500 text-center">${
                data.name
              }</p>
            </div>
            <div class="flex md:flex-row flex-col items-center gap-5 flex-3"> 
              <div class="rounded border border-[#711b76] p-1 px-2 text-sm flex-1">
                <p class="border-b border-b-[#711b76] italic text-xs">Categories</p>
                ${data?.meta?.category
                  ?.map((ctg) => `<p>-- ${ctg.meta_name}</p>`)
                  .join("")}
              </div>
              <div class="rounded border border-[#711b76] p-1 px-2 text-sm flex-4">
              <p class="border-b border-b-[#711b76] italic text-xs">Languages</p>
                  ${data?.meta?.language
                    ?.map(
                      (lg) => `
                      <div class="flex md:flex-row flex-col items-center gap-2 my-2">
                        <p>-- ${lg.meta_name}</p>
                        <audio src="./${lg.url}" class="" controls></audio>
                      </div>
                    `
                    )
                    .join("")}
              </div>
            </div>
            <div class="flex flex-col gap-1 items-center flex-1">
              <p class="text-lg text-center">Start From <span class="text-2xl font-semibold italic text-yellow-600 block">$${
                data.price
              }</span> <span class="text-2xl">DH</span> </p>
            </div>
            <div class="flex-1">
              <a href="./checkout.php?service_id=${
                data.id
              }" class="py-2 px-8 rounded text-slate-50 bg-[#711b76] text-lg block text-center">Choose Me</a>
            </div>
          </div>
        `;
      });

      // Set the accumulated HTML content
      filterResults.innerHTML = htmlContent;
    } else {
      filterResults.innerHTML =
        "<p class='text-center text-xl font-bold text-red-600'>No result found!</p>";
    }
  } else {
    filterResults.innerHTML =
      "<p class='text-center text-xl font-bold text-red-600'>Error retrieving user information</p>";
  }
}

window.addEventListener("load", function () {
  getData({ category: "", language: "", limit: 5 });
});
