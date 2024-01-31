const offerContainer = document.getElementById("offer-container");

function getData(requestData) {
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      const responseData = JSON.parse(xhr.responseText);
      console.log(responseData);
      displayUserInfo(responseData);
    }
  };

  xhr.open("POST", "./ajax/offer.php", true);
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
            <div class="flex flex-col items-center">
              <img src="${
                data?.profile_pic
                  ? data?.profile_pic
                  : "./assets/img/dummy-profile-pic.jpeg"
              }" alt="" class="border-4 rounded-full max-w-24 w-full">
              <p class="text-xl font-bold text-slate-500">${data.name}</p>
            </div>
            <div class="flex items-center gap-5"> 
              <div class="rounded border border-[#711b76] p-1 px-2 text-sm">
                <p class="border-b border-b-[#711b76] italic text-xs">Languages</p>
                ${data?.meta?.language?.map((lg) => `<p>-- ${lg}</p>`).join("")}
              </div>
              <div class="rounded border border-[#711b76] p-1 px-2 text-sm">
                <p class="border-b border-b-[#711b76] italic text-xs">Categories</p>
                ${data?.meta?.category
                  ?.map((ctg) => `<p>-- ${ctg}</p>`)
                  .join("")}
              </div>
            </div>
            <div class="flex flex-col gap-1 items-center">
              <audio src="./${data.url}" class="" controls></audio>
              <p class="text-lg">Start From <span class="text-2xl font-semibold italic text-yellow-600">$${
                data.price
              }</span> dh</p>
            </div>
            <div>
              <a href="./checkout.php?service_id=${
                data.id
              }" class="py-2 px-8 rounded text-slate-50 bg-[#711b76] text-lg">Choose Me</a>
            </div>
          </div>
        `;
      });

      // Set the accumulated HTML content
      offerContainer.innerHTML = htmlContent;
    }
  } else {
    offerContainer.innerHTML =
      "<p class='text-center text-xl font-bold text-red-600'>Error retrieving user information</p>";
  }
}

window.addEventListener("load", function () {
  getData({ limit: 5 });
});
