const paymentContent = document.getElementById("paymentContent");
const serviceId = document.getElementById("service_id").value;
const price = document.getElementById("price");
const serviceContainer = document.getElementById("serviceContainer");
const checkoutForm = document.getElementById("checkoutForm");

hasError = false;

function showContent(paymentType) {
  // Hide all content divs

  const CODBtn = document.getElementById("COD-btn");
  const CardBtn = document.getElementById("Card-btn");

  let paymentContentInner = "";

  if (paymentType === "cod") {
    CardBtn.classList.remove("bg-[#711b76]", "text-slate-50");
    CODBtn.classList.add("bg-[#711b76]", "text-slate-50");

    CODBtn.children.cod.setAttribute("checked", "checked");
    CardBtn.children.card.removeAttribute("checked");

    paymentContentInner = `
        <div>
            <label class="text-sm">Please send the money to our bank and add the info below</label>
            <textarea name="cod_content" class="w-full rounded" rows="4"></textarea>
        </div>
      `;
  } else {
    CODBtn.classList.remove("bg-[#711b76]", "text-slate-50");
    CardBtn.classList.add("bg-[#711b76]", "text-slate-50");

    CardBtn.children.card.setAttribute("checked", "checked");
    CODBtn.children.cod.removeAttribute("checked");

    paymentContentInner = `
        <div class="grid lg:grid-cols-2 grid-cols-1 gap-3">
            <div class="flex flex-col gap-1">
                <label class="text-sm">Card Name</label>
                <input type="text" name="card_name" class="w-full py-2 pl-2 rounded"/>
            </div>
            <div class="flex flex-col gap-1">
                <label class="text-sm">Card Number</label>
                <input type="number" name="card_number" class="w-full py-2 pl-2 rounded"/>
            </div>
            <div class="flex flex-col gap-1">
                <label class="text-sm">CVC</label>
                <input type="number" name="card_cvc" class="w-full py-2 pl-2 rounded"/>
            </div>
        </div>
      `;
  }
  // Show the content div based on the selected payment type
  paymentContent.innerHTML = paymentContentInner;
}

window.addEventListener("load", function () {
  paymentContent.innerHTML = `
        <div>
            <label class="text-sm">Please send the money to our bank and add the info below</label>
            <textarea name="cod_content" class="w-full rounded" rows="4"></textarea>
        </div>
      `;
  getData({ service_id: serviceId });
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

  xhr.open("POST", "./ajax/service.php", true);
  xhr.setRequestHeader("Content-type", "application/json");
  xhr.send(JSON.stringify(requestData));
}

function displayUserInfo(responseData) {
  if (responseData && !("error" in responseData)) {
    if (responseData.length > 0) {
      price.value = responseData[0].price;

      // Accumulate the HTML content
      let htmlContent = "";

      responseData.map((data) => {
        htmlContent += `
            <h2 class="text-center text-2xl font-semibold">Service</h2>
          <div class="rounded lg:py-6 py-8 lg:px-10 px-5 shadow-lg bg-violet-100 flex flex-col items-center justify-between gap-7">
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
              <p class="text-lg text-center">Start From <span class="text-5xl font-bold italic text-yellow-600 block">$${
                data.price
              }</span> <span class="text-2xl">DH</span> </p>
            </div>
          </div>
        `;
      });

      // Set the accumulated HTML content
      serviceContainer.innerHTML = htmlContent;
    } else {
      serviceContainer.innerHTML =
        "<p class='text-center text-xl font-bold text-red-600'>No result found!</p>";
    }
  } else {
    serviceContainer.innerHTML =
      "<p class='text-center text-xl font-bold text-red-600'>Error retrieving service information</p>";
  }
}

checkoutForm.addEventListener("submit", checkout);

function checkout(e) {
  e.preventDefault();
  hasError = false;

  const uid = validate(e.target.uid);
  const service_id = validate(e.target.service_id);
  const price = validate(e.target.price);
  const name = validate(e.target.name);
  const email = validate(e.target.email);
  const whatsapp = validate(e.target.whatsapp);
  const language = validate(e.target.language);
  const textForRecording = validate(e.target.textForRecording);
  const payment_type = e.target.payment_type.value;
  const values = {
    uid,
    service_id,
    price,
    name,
    email,
    whatsapp,
    language,
    textForRecording,
    payment_type,
  };

  if (payment_type === "COD") {
    const cod_content = validate(e.target.cod_content);

    if (!hasError) {
      submitOrder({ ...values, cod_content });
    }
  } else if (payment_type === "Card") {
    const card_name = validate(e.target.card_name);
    const card_number = validate(e.target.card_number);
    const card_cvc = validate(e.target.card_cvc);

    if (!hasError) {
      submitOrder({ ...values, card_name, card_number, card_cvc });
    }
  }
}

function validate(field) {
  if (field !== undefined && field.value.trim() !== "") {
    // Clear any previous styles
    field.style.border = "";
    return field.value.trim();
  } else if (field !== undefined) {
    // Set a border color for invalid fields
    field.style.border = "2px solid red";
    Toastify({
      text: `Please add ${field.name} `,
      duration: 3000,
      newWindow: true,
      close: true,
      gravity: "top",
      position: "right",
      stopOnFocus: true,
      style: {
        background: "linear-gradient(to right, #711b76, #df98e8)",
      },
      onClick: function () {},
    }).showToast();
    hasError = true;
    return null;
  } else {
    return null;
  }
}

function submitOrder(values) {
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      const responseData = JSON.parse(xhr.responseText);
      console.log(responseData);
      if (responseData.success) {
        Toastify({
          text: `Your Order has been Received`,
          duration: 3000,
          newWindow: true,
          close: true,
          gravity: "top",
          position: "right",
          stopOnFocus: true,
          style: {
            background: "green",
          },
          onClick: function () {},
        }).showToast();
      } else {
        Toastify({
          text: `Something went wrong to receive your order`,
          duration: 3000,
          newWindow: true,
          close: true,
          gravity: "top",
          position: "right",
          stopOnFocus: true,
          style: {
            background: "red",
          },
          onClick: function () {},
        }).showToast();
      }
    }
  };

  xhr.open("POST", "./ajax/checkout.php", true);
  xhr.setRequestHeader("Content-type", "application/json");
  xhr.send(JSON.stringify(values));
}
