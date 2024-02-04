const serviceContainer = document.getElementById("service-container");
// const category = document.getElementById("category").value;
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
          <div class="shadow-lg rounded py-3 px-4 bg-slate-50 border-4 border-violet-200">
            <img src="${
              data?.profile_pic
                ? data?.profile_pic
                : "./assets/img/dummy-profile-pic.jpeg"
            }" alt="" class="w-full max-h-[200px] object-cover">
            <div class="py-2">
                <h2 class="italic md:text-2xl text-xl font-semibold text-slate-500">${
                  data.name
                }</h2>
                <p class="md:text-xl text-md">Start From <span class="italic font-semibold text-yellow-500 text-3xl">$200</span> DH</p>
                <div class="flex w-full justify-between gap-3 md:flex-row flex-col mt-2">
                    <div class="flex-1">
                        <p class="text-xs text-violet-400 border-b">Category:</p>
                        ${data?.meta?.category
                          ?.map(
                            (ctg) =>
                              `<p class="italic text-sm">${ctg.meta_name}</p>`
                          )
                          .join("")}
                    </div>
                    <div class="flex-1">            
                        <div class="flex gap-1 pb-5 flex-col">
                            <p class="text-xs">Name: <span class="text-slate-500">${
                              data?.name
                            }</span></p>
                            <p class="text-xs">Email: <span class="text-slate-500">${
                              data?.email
                            }</span></p>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-between gap-1">
                    <p class="text-xs italic border-b border-violet-500">Languages:</p>
                    <p class="text-xs italic border-b border-violet-500">Voices:</p>
                </div>
                <div>
                    ${data?.meta?.language
                      ?.map(
                        (lg) => `
                      <div class="flex flex-col items-center gap-2 my-2 bg-violet-500 px-4 pb-4 rounded-3xl">
                        <p class="text-slate-50">${lg.meta_name}</p>
                        <audio src="./${lg.url}" class="w-full" controls></audio>
                      </div>
                    `
                      )
                      .join("")}
                </div>
            </div>
        </div>
        `;
      });

      // Set the accumulated HTML content
      serviceContainer.innerHTML = serviceContainer.innerHTML + htmlContent;

      pagination(responseData?.total, requestData);
    } else {
      serviceContainer.innerHTML =
        serviceContainer.innerHTML +
        "<p class='text-center text-xl font-bold text-red-600'>No Offer Found!</p>";
    }
  } else {
    serviceContainer.innerHTML =
      serviceContainer.innerHTML +
      "<p class='text-center text-xl font-bold text-red-600'>Error retrieving user information</p>";
  }
}

window.addEventListener("load", function () {
  getData({
    skip: (page - 1) * limit,
    limit: limit,
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
