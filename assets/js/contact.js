const contactForm = document.getElementById("contactForm");
let hasError = false;

contactForm.addEventListener("submit", contact);

function contact(e) {
  e.preventDefault();

  // Reset hasError flag for each form submission
  hasError = false;

  const name = validate(e.target.name);
  const email = validate(e.target.email);
  const number = validate(e.target.number);
  const message = validate(e.target.message);
  const contactType = e.target.contactType.value;
  const subject = validate(e.target?.subject);
  const category = validate(e.target?.category);
  const advice = validate(e.target?.advice);

  const values = {
    name,
    email,
    number,
    message,
    subject,
    category,
    advice,
    contactType,
  };

  console.log(hasError);
  if (!hasError) {
    storeData(values);
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

function storeData(values) {
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      const responseData = JSON.parse(xhr.responseText);
      console.log(responseData);
      if (responseData?.success) {
        Toastify({
          text: `We received your message, we will be in touch with you soon!`,
          duration: 3000,
          newWindow: true,
          close: true,
          gravity: "top",
          position: "center",
          stopOnFocus: true,
          style: {
            background: "green",
          },
          onClick: function () {},
        }).showToast();
      }
    }
  };

  xhr.open("POST", "./ajax/contact.php", true);
  xhr.setRequestHeader("Content-type", "application/json");
  xhr.send(JSON.stringify(values));
}
