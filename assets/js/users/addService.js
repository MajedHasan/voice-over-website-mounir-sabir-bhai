let hasError = false; // Declare the hasError variable

const addServiceForm = document.getElementById("addServiceForm");
// Inside the addServiceForm event listener
document
  .getElementById("addCategoryButton")
  .addEventListener("click", addCategory);
document
  .getElementById("addLanguageButton")
  .addEventListener("click", addLanguage);

const categoriesInput = document.getElementById("categoriesInput");
const languageInput = document.getElementById("languageInput");

let categories = [
  { id: 1, name: "Audio" },
  { id: 2, name: "TV" },
  { id: 3, name: "EBook" },
  { id: 4, name: "Social Media" },
];
let languages = [
  { id: 1, name: "Arabic" },
  { id: 2, name: "Franch" },
];
let voices = [];

window.addEventListener("load", function () {
  categoriesInput.innerHTML = `${categories.map(
    (category) => `<option value="${category.id}">${category.name}</option>`
  )}`;
  languageInput.innerHTML = `${languages.map(
    (language) => `<option value="${language.id}">${language.name}</option>`
  )}`;
});

if (addServiceForm !== undefined) {
  addServiceForm.addEventListener("submit", function (e) {
    e.preventDefault();

    hasError = false; // Reset hasError for each form submission

    const name = validate(e.target.name);
    const email = validate(e.target.email);
    const number = validate(e.target.number);
    const price = validate(e.target.price);

    const values = {
      name,
      email,
      number,
      price,
      categories,
      languages,
      voices,
    };

    console.log(values);
  });
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

function addCategory() {
  const categoriesContainer = document.getElementById("categories");
  const newCategoryDiv = createInputElement("div", [
    "bg-slate-200",
    "rounded-full",
    "py-1",
    "px-3",
    "flex",
    "items-center",
    "gap-1",
    "shadow-lg",
  ]);

  const span = createTextElement("span", "New Category");

  const closeButton = createButtonElement(
    "button",
    [
      "bg-red-500",
      "rounded-full",
      "flex",
      "items-center",
      "justify-center",
      "w-4",
      "h-4",
      "text-slate-50",
      "text-xs",
    ],
    "X"
  );
  closeButton.addEventListener("click", function () {
    categoriesContainer.removeChild(newCategoryDiv);
  });

  appendElements(newCategoryDiv, [span, closeButton]);
  categoriesContainer.appendChild(newCategoryDiv);
}

function addLanguage() {
  const languageContainer = document.getElementById("language");
  const newLanguageDiv = createInputElement("div", [
    "bg-slate-200",
    "rounded-full",
    "py-1",
    "px-3",
    "flex",
    "items-center",
    "justify-between",
    "gap-1",
    "shadow-lg",
  ]);

  const span = createTextElement("span", "New Language");

  const audio = createAudioElement("./assets/voices/demo/demo-1.mp3");

  const closeButton = createButtonElement(
    "button",
    [
      "bg-red-500",
      "rounded-full",
      "flex",
      "items-center",
      "justify-center",
      "w-4",
      "h-4",
      "text-slate-50",
      "text-xs",
    ],
    "X"
  );
  closeButton.addEventListener("click", function () {
    languageContainer.removeChild(newLanguageDiv);
  });

  appendElements(newLanguageDiv, [span, audio, closeButton]);
  languageContainer.appendChild(newLanguageDiv);
}

function createInputElement(type, classes) {
  const element = document.createElement(type);
  element.className = classes.join(" ");
  return element;
}

function createTextElement(type, text) {
  const element = document.createElement(type);
  element.innerText = text;
  return element;
}

function createButtonElement(type, classes, text) {
  const button = document.createElement(type);
  button.className = classes.join(" ");
  button.innerText = text;
  return button;
}

function createAudioElement(src) {
  const audio = document.createElement("audio");
  audio.src = src;
  audio.controls = true;
  return audio;
}

function appendElements(parent, elements) {
  elements.forEach((element) => {
    parent.appendChild(element);
  });
}
