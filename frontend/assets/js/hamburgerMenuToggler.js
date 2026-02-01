const hamburger = document.getElementById("hamburger");
const menu = document.getElementById("mobileMenu");
const dropdown = document.querySelector(".dropdown-h");
const produktetLink = document.getElementById("produktet-h");

hamburger.addEventListener("click", () => {
	menu.classList.toggle("active");
});

produktetLink.addEventListener("click", (e) => {
	e.preventDefault();
	dropdown.classList.toggle("active");
});

const subCategories = document.querySelectorAll(".dropdown-menu-h > li > a");

subCategories.forEach((category) => {
	category.addEventListener("click", (e) => {
		e.preventDefault();
		const parentLi = category.parentElement;
		const submenu = category.nextElementSibling;

		if (submenu && submenu.tagName === "UL") {
			parentLi.classList.toggle("active");
		}
	});
});
