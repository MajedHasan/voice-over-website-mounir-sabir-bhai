const offerContainer = document.getElementById("offer-container");
const category = document.getElementById("category").value;
const page = parseInt(document.getElementById("page").value);
const paginationContainer = document.getElementById("pagination");

const limit = 5;

function getData(requestData) {
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      const responseData = JSON.parse(xhr.responseText);
      console.log(responseData);
      displayUserInfo(responseData, requestData);
    }
  };

  xhr.open("POST", "./ajax/offer.php", true);
  xhr.setRequestHeader("Content-type", "application/json");
  xhr.send(JSON.stringify(requestData));
}

function displayUserInfo(responseData, requestData) {
  if (responseData && !("error" in responseData)) {
    if (responseData.data.length > 0) {
      // Accumulate the HTML content
      let htmlContent = "";

      responseData.data.map((data) => {
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
      offerContainer.innerHTML = htmlContent;

      pagination(responseData?.total, requestData);
    } else {
      offerContainer.innerHTML =
        "<p class='text-center text-xl font-bold text-red-600'>No Offer Found!</p>";
    }
  } else {
    offerContainer.innerHTML =
      "<p class='text-center text-xl font-bold text-red-600'>Error retrieving user information</p>";
  }
}

window.addEventListener("load", function () {
  getData({
    skip: (page - 1) * limit,
    limit: limit,
    category: category,
    language: "Arabic",
  });
});

function pagination(total, requestData) {
  paginationContainer.innerHTML = `
            <a href="./offer.php?category=${requestData.category}&page=${
    page > 1 ? page - 1 : 1
  }" class="rounded-full w-8 h-8 bg-[#711b76] text-xs flex items-center justify-center text-slate-50">Prev</a>
            <a href="./offer.php?category=${requestData.category}&page=${
    page < Math.ceil(total / limit) ? page + 1 : Math.ceil(total / limit)
  }" class="rounded-full w-8 h-8 bg-[#711b76] text-xs flex items-center justify-center text-slate-50">Next</a>
  `;
}
