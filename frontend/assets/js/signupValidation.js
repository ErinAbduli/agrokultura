const form = document.querySelector(".register-form");
const fullNameInput = document.querySelector("#fullname");
const emailInput = document.querySelector("#email");
const passwordInput = document.querySelector("#password");
const confirmPasswordInput = document.querySelector("#confirm-password");
const phoneInput = document.querySelector("#phone");
const addressInput = document.querySelector("#address");
const cityInput = document.querySelector("#city");
const zipInput = document.querySelector("#zip");
const termsCheckbox = document.querySelector("#terms");

const fullnameErrorMsg = document.querySelector("#fullnameErrorMsg");
const emailErrorMsg = document.querySelector("#emailErrorMsg");
const passwordErrorMsg = document.querySelector("#passwordErrorMsg");
const confirmPasswordErrorMsg = document.querySelector(
	"#confirmPasswordErrorMsg",
);
const phoneErrorMsg = document.querySelector("#phoneErrorMsg");
const addressErrorMsg = document.querySelector("#addressErrorMsg");
const cityErrorMsg = document.querySelector("#cityErrorMsg");
const zipErrorMsg = document.querySelector("#zipErrorMsg");
const termsErrorMsg = document.querySelector("#termsErrorMsg");

const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
const passwordPattern = /^(?=.*[A-Za-z])(?=.*\d).{8,}$/;
const phonePattern = /^\+?\d{7,12}$/;
const zipPattern = /^\d{5}$/;

let liveValidate = false;

const validateFullName = () => {
	const fullname = fullNameInput.value.trim();
	if (fullname.length < 3) {
		fullNameInput.style.border = "2px solid red";
		fullnameErrorMsg.textContent =
			"Emri i plote duhet te jete te pakten 3 karaktere i gjate";
		return false;
	}
	fullNameInput.style.border = "";
	fullnameErrorMsg.textContent = "";
	return true;
};

const validateEmail = () => {
	const email = emailInput.value.trim();
	if (!emailPattern.test(email)) {
		emailInput.style.border = "2px solid red";
		emailErrorMsg.textContent = "Ju lutem shkruani nje email valid";
		return false;
	}
	emailInput.style.border = "";
	emailErrorMsg.textContent = "";
	return true;
};

const validatePassword = () => {
	const password = passwordInput.value.trim();
	if (!passwordPattern.test(password)) {
		passwordInput.style.border = "2px solid red";
		passwordErrorMsg.textContent =
			"Fjalekalimi te kete te pakten 8 karaktere, 1 shkronje & 1 numer";
		return false;
	}
	passwordInput.style.border = "";
	passwordErrorMsg.textContent = "";
	return true;
};

const validateConfirmPassword = () => {
	if (
		passwordInput.value.trim() !== confirmPasswordInput.value.trim() ||
		confirmPasswordInput.value.trim() === ""
	) {
		confirmPasswordInput.style.border = "2px solid red";
		confirmPasswordErrorMsg.textContent = "Fjalekalimet nuk perputhen";
		return false;
	}
	confirmPasswordInput.style.border = "";
	confirmPasswordErrorMsg.textContent = "";
	return true;
};

const validatePhone = () => {
	if (!phonePattern.test(phoneInput.value.trim())) {
		phoneInput.style.border = "2px solid red";
		phoneErrorMsg.textContent =
			"Ju lutem shkruani nje numer telefoni valid";
		return false;
	}
	phoneInput.style.border = "";
	phoneErrorMsg.textContent = "";
	return true;
};

const validateAddress = () => {
	if (addressInput.value.trim().length < 5) {
		addressInput.style.border = "2px solid red";
		addressErrorMsg.textContent =
			"Adresa duhet te jete te pakten 5 karaktere e gjate";
		return false;
	}
	addressInput.style.border = "";
	addressErrorMsg.textContent = "";
	return true;
};

const validateCity = () => {
	if (cityInput.value.trim().length < 2) {
		cityInput.style.border = "2px solid red";
		cityErrorMsg.textContent =
			"Qyteti duhet te jete te pakten 2 karaktere i gjate";
		return false;
	}
	cityInput.style.border = "";
	cityErrorMsg.textContent = "";
	return true;
};

const validateZip = () => {
	if (!zipPattern.test(zipInput.value.trim())) {
		zipInput.style.border = "2px solid red";
		zipErrorMsg.textContent = "Ju lutem shkruani nje kod postar valid";
		return false;
	}
	zipInput.style.border = "";
	zipErrorMsg.textContent = "";
	return true;
};

console.log("Signup validation script loaded");

const validateTerms = () => {
	if (!termsCheckbox.checked) {
		termsErrorMsg.textContent = "Ju lutem pranoni kushtet dhe politikat";
		return false;
	}
	termsErrorMsg.textContent = "";
	return true;
};

fullNameInput.addEventListener("input", () => {
	if (liveValidate) validateFullName();
});
emailInput.addEventListener("input", () => {
	if (liveValidate) validateEmail();
});
passwordInput.addEventListener("input", () => {
	if (liveValidate) validatePassword();
});
confirmPasswordInput.addEventListener("input", () => {
	if (liveValidate) validateConfirmPassword();
});
phoneInput.addEventListener("input", () => {
	if (liveValidate) validatePhone();
});
addressInput.addEventListener("input", () => {
	if (liveValidate) validateAddress();
});
cityInput.addEventListener("input", () => {
	if (liveValidate) validateCity();
});
zipInput.addEventListener("input", () => {
	if (liveValidate) validateZip();
});
termsCheckbox.addEventListener("change", () => {
	if (liveValidate) validateTerms();
});

console.log("Signup validation script loaded");

form.addEventListener("submit", (e) => {
	e.preventDefault();
	liveValidate = true;

	const allValid =
		validateFullName() &&
		validateEmail() &&
		validatePassword() &&
		validateConfirmPassword() &&
		validatePhone() &&
		validateAddress() &&
		validateCity() &&
		validateZip() &&
		validateTerms();

	console.log("All valid:", allValid);

	if (allValid) {
		form.submit();
	} else {
		console.log("Validation failed");
	}
});
