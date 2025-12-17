const modal = document.getElementById("reviewModal");
const openBtn = document.getElementById("leave-review");
const closeBtn = document.getElementById("closeReview");
const form = document.getElementById("reviewForm");

openBtn.addEventListener("click", () => {
	modal.style.display = "flex";
	document.body.style.overflow = "hidden";
});

closeBtn.addEventListener("click", closeModal);

modal.addEventListener("click", (e) => {
	if (e.target === modal) closeModal();
});

function closeModal() {
	modal.style.display = "none";
	document.body.style.overflow = "";
}

form.addEventListener("submit", async (e) => {
	e.preventDefault();
	form.reset();
	closeModal();
});
