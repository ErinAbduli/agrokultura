const slider = document.querySelector(".logo-slider");

const track = document.querySelector(".logo-track");
const logos = Array.from(track.children);

for (logo of logos) {
	const clone = logo.cloneNode(false);
	track.appendChild(clone);
}
