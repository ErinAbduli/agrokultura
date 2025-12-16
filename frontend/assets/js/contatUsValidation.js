const form = document.querySelector(".contact-form");
const nameInput = document.querySelector("#name");
const emailInput = document.querySelector("#email");
const telInput = document.querySelector("#phone");
const messageInput = document.querySelector("#message");
const contactReasonInput = document.querySelector("#contact-option");
const nameErrorMsg = document.querySelector("#nameErrorMsg");
const emailErrorMsg = document.querySelector("#emailErrorMsg");
const messageErrorMsg = document.querySelector("#messageErrorMsg");
const telErrorMsg = document.querySelector("#telErrorMsg");
const contactReasonErrorMsg = document.querySelector("#contactReasonErrorMsg");

const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
const telPattern = /^\+?\d{7,15}$/;

let liveValidate = false;

const validateName = () => {
	const name = nameInput.value.trim();
	if (name === "" || name.length < 3) {
		nameInput.style.border = "2px solid red";
		nameErrorMsg.textContent = "Ju lutem shkruani emrin dhe mbiemrin tuaj";
		return false;
	}
	nameInput.style.border = "";
	nameErrorMsg.textContent = "";
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

const validateTel = () => {
	const tel = telInput.value.trim();
	if (!telPattern.test(tel)) {
		telInput.style.border = "2px solid red";
		telErrorMsg.textContent = "Ju lutem shkruani nje numer telefoni valid";
		return false;
	}
	telInput.style.border = "";
	telErrorMsg.textContent = "";
	return true;
};

const validateMessage = () => {
	const message = messageInput.value.trim();
	if (message === "" || message.length < 20) {
		messageInput.style.border = "2px solid red";
		messageErrorMsg.textContent =
			"Ju lutem shkruani nje mesazh te vlefshem (te pakten 20 karaktere)";
		return false;
	}
	messageInput.style.border = "";
	messageErrorMsg.textContent = "";
	return true;
};

const validateContactReason = () => {
	const reason = contactReasonInput.value;
	if (reason === "") {
		contactReasonInput.style.border = "2px solid red";
		contactReasonErrorMsg.textContent =
			"Ju lutem zgjidhni nje arsye kontakti";
		return false;
	}
	contactReasonInput.style.border = "";
	contactReasonErrorMsg.textContent = "";
	return true;
};

nameInput.addEventListener("input", () => {
	if (liveValidate) validateName();
});
emailInput.addEventListener("input", () => {
	if (liveValidate) validateEmail();
});
telInput.addEventListener("input", () => {
	if (liveValidate) validateTel();
});
messageInput.addEventListener("input", () => {
	if (liveValidate) validateMessage();
});
contactReasonInput.addEventListener("input", () => {
	if (liveValidate) validateContactReason();
});

form.addEventListener("submit", (e) => {
	e.preventDefault();
	liveValidate = true;
	const isNameValid = validateName();
	const isEmailValid = validateEmail();
	const isTelValid = validateTel();
	const isMessageValid = validateMessage();
	const isContactReasonValid = validateContactReason();
	if (
		isNameValid &&
		isEmailValid &&
		isTelValid &&
		isMessageValid &&
		isContactReasonValid
	) {
		form.submit();
	}
});
