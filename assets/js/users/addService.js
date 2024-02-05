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
const voiceInput = document.getElementById("voiceInput");

let categories = [
  { id: 1, name: "Audio" },
  { id: 2, name: "TV" },
  { id: 3, name: "EBook" },
  { id: 4, name: "Social Media" },
];
let selectedCategories = [];

let languages = [
  { id: 1, name: "Arabic" },
  { id: 2, name: "Franch" },
];
let selectedLangauges = [];

let voices = [];

window.addEventListener("load", categoryAndLangaugeInputes);

function categoryAndLangaugeInputes() {
  categoriesInput.innerHTML = `${categories.map(
    (category) => `<option value="${category.id}">${category.name}</option>`
  )}`;
  languageInput.innerHTML = `${languages.map(
    (language) => `<option value="${language.id}">${language.name}</option>`
  )}`;
}

if (addServiceForm !== undefined) {
  addServiceForm.addEventListener("submit", function (e) {
    e.preventDefault();

    hasError = false; // Reset hasError for each form submission

    const uid = validate(e.target.uid);
    const name = validate(e.target.name);
    const email = validate(e.target.email);
    const number = validate(e.target.number);
    const price = validate(e.target.price);

    const values = {
      uid,
      name,
      email,
      number,
      price,
      selectedCategories,
      selectedLangauges,
      voices,
    };

    console.log(values);

    if (!hasError) {
      fetch("./ajax/users/addService.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(values),
      })
        .then((response) => response.json())
        .then((data) => {
          // Handle the response from the server
          console.log(data);
        })
        .catch((error) => {
          console.error("Error:", error);
        });
    }
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
  if (!categories.length > 0) {
    alert("You can't add more categories");
    return null;
  }

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

  const category = categories.find(
    (category) => category.id == categoriesInput.value
  );
  selectedCategories.push(category);

  const filteredCategories = categories.filter(
    (category) => category.id != categoriesInput.value
  );
  categories = filteredCategories;
  categoryAndLangaugeInputes();

  const span = createTextElement("span", category.name);

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
    const stCategory = selectedCategories.find((ct) => ct.id == category.id);
    categories.push(stCategory);
    categoryAndLangaugeInputes();
    categoriesContainer.removeChild(newCategoryDiv);
  });

  appendElements(newCategoryDiv, [span, closeButton]);
  categoriesContainer.appendChild(newCategoryDiv);
}

function addLanguage() {
  if (!languages.length > 0) {
    alert("You can't add more languages");
    return null;
  }

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

  const language = languages.find(
    (language) => language.id == languageInput.value
  );
  selectedLangauges.push(language);

  const filteredLanguages = languages.filter(
    (language) => language.id != languageInput.value
  );
  languages = filteredLanguages;
  categoryAndLangaugeInputes();

  const span = createTextElement("span", language.name);

  // Ensure that a file is selected
  if (voiceInput.files.length > 0) {
    const selectedFile = voiceInput.files[0];

    // Get the file extension
    const fileExtension = selectedFile.name.split(".").pop().toLowerCase();

    // Check if the file extension is valid (you can add more extensions if needed)
    if (["mp3", "wav", "ogg"].includes(fileExtension)) {
      // Create a URL for the uploaded file
      const audioURL = URL.createObjectURL(selectedFile);

      // Push the URL to the voices array
      voices.push({ url: audioURL, extension: fileExtension });
    } else {
      alert("Invalid file format. Please upload a valid audio file.");
    }
  } else {
    alert("Please select an audio file.");
  }

  const audio = createAudioElement(voices[0].url);

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
    const stLangauge = selectedLangauges.find((lg) => lg.id == language.id);
    languages.push(stLangauge);
    categoryAndLangaugeInputes();
    const filterVoices = voices.filter((voice) => voiceInput.value != voice);
    voices = filterVoices;
    console.log(voices);
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
