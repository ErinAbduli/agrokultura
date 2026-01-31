const qtyInput = document.getElementById("qty");
const increaseBtn = document.getElementById("increase");
const decreaseBtn = document.getElementById("decrease");
const qtyBuyNowInput = document.getElementById("qty_buy_now");

increaseBtn.addEventListener("click", () => {
	if (Number(qtyInput.value) < Number(qtyInput.max)) {
		qtyInput.value++;
		qtyBuyNowInput.value = qtyInput.value;
	}
});

decreaseBtn.addEventListener("click", () => {
	if (Number(qtyInput.value) > Number(qtyInput.min)) {
		qtyInput.value--;
		qtyBuyNowInput.value = qtyInput.value;
	}
});
