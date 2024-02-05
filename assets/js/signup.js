const loginForm = document.getElementById("signupForm");
let hasError = false;

loginForm.addEventListener("submit", function (e) {
  e.preventDefault();

  // Reset hasError flag for each form submission
  hasError = false;

  const email = validate(e.target.email);
  const password = validate(e.target.password);
  const confirmPassword = validate(e.target.confirmPassword);
  const username = validate(e.target.username);
  const name = validate(e.target.name);

  if (password !== confirmPassword) {
    Toastify({
      text: `Password and Confirm Password Are not matched`,
      duration: 3000,
      newWindow: true,
      close: true,
      gravity: "top",
      position: "center",
      stopOnFocus: true,
      style: {
        background: "red",
      },
      onClick: function () {},
    }).showToast();

    return;
  }

  const values = {
    email,
    password,
    username,
    name,
  };

  console.log(hasError);
  if (!hasError) {
    getData(values);
  }
});

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

function getData(values) {
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      const responseData = JSON.parse(xhr.responseText);
      console.log(responseData);
      if (responseData?.success) {
        Toastify({
          text: `Sign Up Successfully!!!`,
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

        // Redirect to another PHP page with user data in URL parameters
        window.location.href = `./login.php`;
      } else if (responseData?.success == false) {
        Toastify({
          text: `${responseData.message}`,
          duration: 3000,
          newWindow: true,
          close: true,
          gravity: "top",
          position: "center",
          stopOnFocus: true,
          style: {
            background: "red",
          },
          onClick: function () {},
        }).showToast();
      } else {
        Toastify({
          text: `${responseData.error}`,
          duration: 3000,
          newWindow: true,
          close: true,
          gravity: "top",
          position: "center",
          stopOnFocus: true,
          style: {
            background: "red",
          },
          onClick: function () {},
        }).showToast();
      }
    }
  };

  xhr.open("POST", "./ajax/signup.php", true);
  xhr.setRequestHeader("Content-type", "application/json");
  xhr.send(JSON.stringify(values));
}
