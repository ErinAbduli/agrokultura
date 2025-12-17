const form = document.getElementById("searchForm");
const searchBar = document.getElementById("search-bar");
const errorMsg = document.getElementById("errorMsg");

let liveValidate = false;

const validateSearch = (e) => {
	const query = searchBar.value.trim();
	if (query.length < 3) {
		e.preventDefault();
		errorMsg.textContent =
			"Kërkimi duhet të përmbajë të paktën 3 karaktere.";
		errorMsg.style.color = "red";
		return false;
	}
	errorMsg.textContent = "";
	return true;
};

searchBar.addEventListener("input", (e) => {
	if (liveValidate) validateSearch(e);
});

form.addEventListener("submit", (e) => {
	liveValidate = true;
	if (validateSearch(e)) {
		form.submit();
	}
});
