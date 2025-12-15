const qtyInput = document.getElementById("qty");
const increaseBtn = document.getElementById("increase");
const decreaseBtn = document.getElementById("decrease");

increaseBtn.addEventListener("click", () => {
	if (Number(qtyInput.value) < Number(qtyInput.max)) {
		qtyInput.value++;
	}
});

decreaseBtn.addEventListener("click", () => {
	if (Number(qtyInput.value) > Number(qtyInput.min)) {
		qtyInput.value--;
	}
});
