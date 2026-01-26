const select = document.querySelector("#order-products");
const selected = select.querySelector(".selected");
const selectedText = select.querySelector(".selected-text");
const options = select.querySelector(".options");
const input = select.querySelector("input");
const filterBtn = document.querySelector(".filter-btn");

const urlParams = new URLSearchParams(window.location.search);
const currentOrder = urlParams.get("order") || "default";

if (currentOrder !== "default") {
	const currentOption = options.querySelector(
		`[data-value="${currentOrder}"]`,
	);
	if (currentOption) {
		selectedText.textContent = currentOption.textContent;
		input.value = currentOrder;
	}
}

selected.addEventListener("click", () => {
	options.style.display =
		options.style.display === "block" ? "none" : "block";
});

options.addEventListener("click", (e) => {
	const li = e.target.closest("li");
	if (!li) return;

	selectedText.textContent = li.textContent;
	input.value = li.dataset.value;
	options.style.display = "none";

	const order = li.dataset.value;
	const urlParams = new URLSearchParams(window.location.search);
	const categoryId = urlParams.get("id");

	let url = `${window.location.pathname}?id=${categoryId}&order=${order}`;

	window.location.href = url;
});
