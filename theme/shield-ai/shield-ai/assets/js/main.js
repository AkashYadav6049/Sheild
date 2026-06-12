/**
 * Shield AI Theme — Main JavaScript
 */
(function () {
	'use strict';

	document.addEventListener('DOMContentLoaded', init);

	function init() {
		initHeroCarousel();
		initMobileMenu();
		initContactModal();
		initContactForms();
	}

	/* ------------------------------------------------------------------
	   Hero Carousel
	   ------------------------------------------------------------------ */
	function initHeroCarousel() {
		const carousel = document.querySelector('.hero-carousel');
		if (!carousel) return;

		const slides = carousel.querySelectorAll('.hero-slide');
		const dots = carousel.querySelectorAll('.hero-carousel__dot');
		const prevBtn = carousel.querySelector('.hero-carousel__prev');
		const nextBtn = carousel.querySelector('.hero-carousel__next');

		let current = 0;
		let autoplayTimer = null;
		const interval = 6000;

		function goTo(index) {
			slides[current].classList.remove('active');
			dots[current].classList.remove('active');

			current = (index + slides.length) % slides.length;

			slides[current].classList.add('active');
			dots[current].classList.add('active');
		}

		function next() {
			goTo(current + 1);
		}

		function prev() {
			goTo(current - 1);
		}

		function startAutoplay() {
			stopAutoplay();
			autoplayTimer = setInterval(next, interval);
		}

		function stopAutoplay() {
			if (autoplayTimer) {
				clearInterval(autoplayTimer);
				autoplayTimer = null;
			}
		}

		if (prevBtn) {
			prevBtn.addEventListener('click', function () {
				prev();
				startAutoplay();
			});
		}

		if (nextBtn) {
			nextBtn.addEventListener('click', function () {
				next();
				startAutoplay();
			});
		}

		dots.forEach(function (dot) {
			dot.addEventListener('click', function () {
				goTo(parseInt(dot.dataset.slide, 10));
				startAutoplay();
			});
		});

		carousel.addEventListener('mouseenter', stopAutoplay);
		carousel.addEventListener('mouseleave', startAutoplay);

		startAutoplay();
	}

	/* ------------------------------------------------------------------
	   Mobile Menu
	   ------------------------------------------------------------------ */
	function initMobileMenu() {
		const toggle = document.querySelector('.menu-toggle');
		const menu = document.querySelector('.nav-menu');

		if (!toggle || !menu) return;

		toggle.addEventListener('click', function () {
			const isOpen = menu.classList.toggle('active');
			toggle.setAttribute('aria-expanded', isOpen);
		});

		document.addEventListener('click', function (e) {
			if (!toggle.contains(e.target) && !menu.contains(e.target)) {
				menu.classList.remove('active');
				toggle.setAttribute('aria-expanded', 'false');
			}
		});
	}

	/* ------------------------------------------------------------------
	   Contact Modal
	   ------------------------------------------------------------------ */
	function initContactModal() {
		const modal = document.getElementById('contact-modal');
		if (!modal) return;

		const panels = modal.querySelectorAll('.contact-panel');
		const openTriggers = document.querySelectorAll('[data-open-contact]');
		const closeTriggers = modal.querySelectorAll('[data-close-modal]');
		const formTriggers = modal.querySelectorAll('[data-open-form]');
		const backButtons = modal.querySelectorAll('[data-back-to-options]');

		function showPanel(panelId) {
			panels.forEach(function (panel) {
				panel.classList.toggle('active', panel.dataset.panel === panelId);
			});
		}

		function openModal(panelId) {
			modal.classList.add('active');
			modal.setAttribute('aria-hidden', 'false');
			document.body.classList.add('modal-open');
			showPanel(panelId || 'options');
		}

		function closeModal() {
			modal.classList.remove('active');
			modal.setAttribute('aria-hidden', 'true');
			document.body.classList.remove('modal-open');
			showPanel('options');
		}

		openTriggers.forEach(function (trigger) {
			trigger.addEventListener('click', function (e) {
				e.preventDefault();
				openModal(trigger.dataset.openContact);
			});
		});

		closeTriggers.forEach(function (trigger) {
			trigger.addEventListener('click', closeModal);
		});

		formTriggers.forEach(function (trigger) {
			trigger.addEventListener('click', function () {
				showPanel(trigger.dataset.openForm);
			});
		});

		backButtons.forEach(function (btn) {
			btn.addEventListener('click', function () {
				showPanel('options');
			});
		});

		document.addEventListener('keydown', function (e) {
			if (e.key === 'Escape' && modal.classList.contains('active')) {
				closeModal();
			}
		});
	}

	/* ------------------------------------------------------------------
	   Contact Forms (AJAX)
	   ------------------------------------------------------------------ */
	function initContactForms() {
		const forms = document.querySelectorAll('.contact-form');

		forms.forEach(function (form) {
			form.addEventListener('submit', function (e) {
				e.preventDefault();

				const messageEl = form.querySelector('.form-message');
				const submitBtn = form.querySelector('[type="submit"]');
				const formData = new FormData(form);

				formData.append('action', 'shield_ai_contact');
				formData.append('nonce', shieldAiData.nonce);
				formData.append('form_type', form.dataset.formType);

				submitBtn.disabled = true;
				submitBtn.textContent = 'Sending...';
				messageEl.className = 'form-message';
				messageEl.textContent = '';

				fetch(shieldAiData.ajaxUrl, {
					method: 'POST',
					body: formData,
				})
					.then(function (response) {
						return response.json();
					})
					.then(function (data) {
						if (data.success) {
							messageEl.className = 'form-message success';
							messageEl.textContent = data.data.message;
							form.reset();
						} else {
							messageEl.className = 'form-message error';
							messageEl.textContent = data.data.message || 'Something went wrong.';
						}
					})
					.catch(function () {
						messageEl.className = 'form-message error';
						messageEl.textContent = 'Network error. Please try again.';
					})
					.finally(function () {
						submitBtn.disabled = false;
						submitBtn.textContent = 'Submit';
					});
			});
		});
	}
})();
