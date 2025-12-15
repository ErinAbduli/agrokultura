document.querySelectorAll(".qty-control").forEach((control) => {
	const input = control.querySelector(".qty");
	const inc = control.querySelector(".increase");
	const dec = control.querySelector(".decrease");

	inc.addEventListener("click", () => {
		input.value = Math.min(Number(input.value) + 1, Number(input.max));
	});

	dec.addEventListener("click", () => {
		input.value = Math.max(Number(input.value) - 1, Number(input.min));
	});
});
