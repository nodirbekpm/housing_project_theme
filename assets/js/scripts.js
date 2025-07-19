$(document).ready(function () {
	// hamburger
	$(".hamburger_menu").on("click", function (e) {
		e.preventDefault();
		$(".mobile_menus").toggleClass("active");
		$("body").toggleClass("active");
	});
	const searchInput = document.getElementById("search_input");

	searchInput.addEventListener("input", function () {
		const query = this.value.toLowerCase();
		const sections = document.querySelectorAll(".documents_section");

		sections.forEach((section) => {
			const documents = section.querySelectorAll(".document_item");
			let hasVisibleDocs = false;

			documents.forEach((doc) => {
				const title = doc.getAttribute("data-title").toLowerCase();
				if (title.includes(query)) {
					doc.style.display = "flex";
					hasVisibleDocs = true;
				} else {
					doc.style.display = "none";
				}
			});

			const sectionTitle = section.querySelector(".section_title");
			if (hasVisibleDocs) {
				sectionTitle.style.display = "block";
			} else {
				sectionTitle.style.display = "none";
			}
		});
	});

	let swiperInstance = null;

	function initMobileSwiper() {
		const container = document.querySelector(".news_block");
		const wrapper = container.querySelector(".swiper-wrapper");
		const pagination = container.querySelector(".swiper-pagination");

		// Avvalgi dynamic swiper-slide'larni tozalaymiz
		if (swiperInstance) {
			swiperInstance.destroy(true, true);
			swiperInstance = null;
		}

		const existingSlides = wrapper.querySelectorAll(".swiper-slide");
		if (existingSlides.length > 0) {
			existingSlides.forEach((slide) => {
				const item = slide.firstElementChild;
				if (item?.classList.contains("news_item")) {
					wrapper.appendChild(item);
				}
				slide.remove();
			});
		}

		if (window.innerWidth < 768) {
			// Har bir .news_item ni o‘rab yangi .swiper-slide yaratamiz
			const items = wrapper.querySelectorAll(".news_item");
			items.forEach((item) => {
				const slide = document.createElement("div");
				slide.classList.add("swiper-slide");
				item.parentNode.insertBefore(slide, item);
				slide.appendChild(item);
			});

			swiperInstance = new Swiper(".news_block", {
				slidesPerView: 1.1,
				spaceBetween: 16,
				loop: true,
				autoplay: {
					delay: 3000,
					disableOnInteraction: false,
				},
				pagination: {
					el: ".swiper-pagination",
					clickable: true,
				},
			});
		}
	}

	window.addEventListener("load", initMobileSwiper);
	window.addEventListener("resize", initMobileSwiper);

	document.querySelectorAll(".documents_list").forEach((list) => {
		new Swiper(list, {
			slidesPerView: "auto",
			spaceBetween: 13,
			freeMode: true,
			loop: true,
		});
	});
});
