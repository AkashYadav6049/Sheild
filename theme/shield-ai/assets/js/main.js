/**
 * Shield AI Theme — Main JavaScript
 */
(function () {
	'use strict';

	document.addEventListener('DOMContentLoaded', init);

	function init() {
		initNewsBanner();
		initHeroCarousel();
		initPlatformCarousel();
		initMobileMenu();
		initContactModal();
		initContactForms();
		initAutonomyValueForm();
	}

	function initNewsBanner() {
		var banner = document.getElementById('news-banner');
		var closeBtn = document.getElementById('news-banner-close');

		if (!banner || !closeBtn) return;

		closeBtn.addEventListener('click', function () {
			banner.classList.add('is-hidden');
		});
	}

	function initHeroCarousel() {
		var carousel = document.querySelector('.hero-carousel');
		if (!carousel) return;

		var slides = carousel.querySelectorAll('.hero-slide');
		var dots = carousel.querySelectorAll('.hero-carousel__dot');
		var current = 0;
		var autoplayTimer = null;
		var interval = 6000;

		function playActiveVideo() {
			slides.forEach(function (slide, index) {
				var video = slide.querySelector('video');
				if (!video) return;

				if (index === current) {
					video.currentTime = 0;
					video.play().catch(function () {});
				} else {
					video.pause();
				}
			});
		}

		function goTo(index) {
			slides[current].classList.remove('active');
			if (dots[current]) dots[current].classList.remove('active');

			current = (index + slides.length) % slides.length;

			slides[current].classList.add('active');
			if (dots[current]) dots[current].classList.add('active');
			playActiveVideo();
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

		slides.forEach(function (slide) {
			var prevBtn = slide.querySelector('.hero-slide__nav--prev');
			var nextBtn = slide.querySelector('.hero-slide__nav--next');

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
		});

		dots.forEach(function (dot) {
			dot.addEventListener('click', function () {
				goTo(parseInt(dot.dataset.slide, 10));
				startAutoplay();
			});
		});

		carousel.addEventListener('mouseenter', stopAutoplay);
		carousel.addEventListener('mouseleave', startAutoplay);

		playActiveVideo();
		startAutoplay();
	}

	function initPlatformCarousel() {
		var carousel = document.querySelector('.platforms-carousel');
		if (!carousel) return;

		var cards = carousel.querySelectorAll('.platform-card');
		var prevBtn = carousel.querySelector('.platforms-carousel__prev');
		var nextBtn = carousel.querySelector('.platforms-carousel__next');
		var current = 0;

		if (cards.length <= 1) return;

		function goTo(index) {
			cards[current].classList.remove('active');
			current = (index + cards.length) % cards.length;
			cards[current].classList.add('active');
		}

		if (prevBtn) {
			prevBtn.addEventListener('click', function () {
				goTo(current - 1);
			});
		}

		if (nextBtn) {
			nextBtn.addEventListener('click', function () {
				goTo(current + 1);
			});
		}
	}

	function initMobileMenu() {
		var toggle = document.querySelector('.menu-toggle');
		var menu = document.querySelector('.nav-menu');

		if (!toggle || !menu) return;

		toggle.addEventListener('click', function () {
			var isOpen = menu.classList.toggle('active');
			toggle.setAttribute('aria-expanded', isOpen);
		});

		document.addEventListener('click', function (e) {
			if (!toggle.contains(e.target) && !menu.contains(e.target)) {
				menu.classList.remove('active');
				toggle.setAttribute('aria-expanded', 'false');
			}
		});
	}

	function initContactModal() {
		var modal = document.getElementById('contact-modal');
		if (!modal) return;

		var panels = modal.querySelectorAll('.contact-panel');
		var openTriggers = document.querySelectorAll('[data-open-contact]');
		var closeTriggers = modal.querySelectorAll('[data-close-modal]');
		var formTriggers = modal.querySelectorAll('[data-open-form]');
		var backButtons = modal.querySelectorAll('[data-back-to-options]');

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

	function initAutonomyValueForm() {
		var calculator = document.getElementById('autonomy-calculator');
		var form = document.getElementById('autonomy-value-form');
		if (!form || !calculator) return;

		var toggleBtns = form.querySelectorAll('.autonomy-value-form__toggle-btn');
		var facilityRadios = form.querySelectorAll('input[name="facility_type"]');
		var workflowSelect = form.querySelector('#workflow');
		var slider = form.querySelector('.autonomy-value-form__slider');
		var sliderValue = form.querySelector('.autonomy-value-form__slider-value');
		var calcInputs = form.querySelectorAll('[data-calc-input]');
		var results = {
			blendedWage: calculator.querySelector('[data-result="blended-wage"]'),
			manualCost: calculator.querySelector('[data-result="manual-cost"]'),
			robotCost: calculator.querySelector('[data-result="robot-cost"]'),
			savings: calculator.querySelector('[data-result="savings"]'),
		};

		if (!results.blendedWage || !results.manualCost || !results.robotCost || !results.savings) {
			return;
		}

		var BURDEN_MULTIPLIER = 1.35;
		var BASE_ROBOT_HOURLY = 10;
		var WEEKS_PER_YEAR = 52;

		function parseSelectValue(value) {
			return value === '' ? 0 : parseFloat(value);
		}

		function formatCurrency(value) {
			return '$' + Math.round(value).toLocaleString('en-US');
		}

		function formatCurrencyPerHour(value) {
			return '$' + value.toFixed(2).replace(/\.00$/, '') + '/hr';
		}

		function getFacilityType() {
			var checked = form.querySelector('input[name="facility_type"]:checked');
			return checked ? checked.value : 'warehousing';
		}

		function updateWorkflowOptions() {
			if (!workflowSelect) return;

			var facilityType = getFacilityType();
			var groups = workflowSelect.querySelectorAll('optgroup');
			var currentValue = workflowSelect.value;
			var hasValidOption = false;

			groups.forEach(function (group) {
				var isMatch = group.dataset.facility === facilityType;
				group.hidden = !isMatch;

				Array.prototype.forEach.call(group.children, function (option) {
					if (option.value === currentValue && isMatch) {
						hasValidOption = true;
					}
				});
			});

			if (!hasValidOption) {
				workflowSelect.value = '';
			}
		}

		function getRobotHourlyRate(facilityType, facilitySize) {
			var rate = BASE_ROBOT_HOURLY;

			if (facilityType === 'manufacturing') {
				rate += 1.5;
			}

			if (facilitySize >= 875000) {
				rate -= 0.5;
			} else if (facilitySize >= 625000) {
				rate -= 0.25;
			}

			return Math.max(rate, 8);
		}

		function calculateROI() {
			var hourlyWage = parseFloat(form.querySelector('#hourly_wage').value) || 0;
			var workersPerShift = parseInt(form.querySelector('#workers_per_shift').value, 10) || 0;
			var numShifts = parseSelectValue(form.querySelector('#num_shifts').value);
			var hoursPerShift = parseSelectValue(form.querySelector('#hours_per_shift').value);
			var operatingDays = parseSelectValue(form.querySelector('#operating_days').value);
			var operatingTeams = parseSelectValue(form.querySelector('#operating_teams').value);
			var facilitySize = parseSelectValue(form.querySelector('#facility_size').value);
			var workflow = form.querySelector('#workflow').value;
			var facilityType = getFacilityType();

			var isComplete =
				hourlyWage > 0 &&
				workersPerShift > 0 &&
				numShifts > 0 &&
				hoursPerShift > 0 &&
				operatingDays > 0 &&
				operatingTeams > 0 &&
				facilitySize > 0 &&
				workflow !== '';

			if (!isComplete) {
				results.blendedWage.textContent = '$0/hr';
				results.manualCost.textContent = '$0';
				results.robotCost.textContent = '$0/hr';
				results.savings.textContent = '$0';
				return;
			}

			var blendedWage = hourlyWage * BURDEN_MULTIPLIER;
			var annualHoursPerWorker = hoursPerShift * numShifts * operatingDays * WEEKS_PER_YEAR;
			var totalWorkers = workersPerShift * operatingTeams;
			var annualManualCost = blendedWage * annualHoursPerWorker * totalWorkers;
			var threeYearManualCost = annualManualCost * 3;

			var robotHourlyRate = getRobotHourlyRate(facilityType, facilitySize);
			var annualRobotCost = robotHourlyRate * annualHoursPerWorker * totalWorkers;
			var threeYearRobotCost = annualRobotCost * 3;
			var threeYearSavings = Math.max(threeYearManualCost - threeYearRobotCost, 0);

			results.blendedWage.textContent = formatCurrencyPerHour(blendedWage);
			results.manualCost.textContent = formatCurrency(threeYearManualCost);
			results.robotCost.textContent = formatCurrencyPerHour(robotHourlyRate);
			results.savings.textContent = formatCurrency(threeYearSavings);
		}

		toggleBtns.forEach(function (btn) {
			btn.addEventListener('click', function () {
				toggleBtns.forEach(function (item) {
					item.classList.remove('is-active');
				});
				btn.classList.add('is-active');
				updateWorkflowOptions();
				calculateROI();
			});
		});

		facilityRadios.forEach(function (radio) {
			radio.addEventListener('change', function () {
				updateWorkflowOptions();
				calculateROI();
			});
		});

		calcInputs.forEach(function (input) {
			input.addEventListener('input', calculateROI);
			input.addEventListener('change', calculateROI);
		});

		if (slider && sliderValue) {
			function updateSlider() {
				var min = parseInt(slider.min, 10);
				var max = parseInt(slider.max, 10);
				var value = parseInt(slider.value, 10);
				var percent = ((value - min) / (max - min)) * 100;

				slider.style.background =
					'linear-gradient(to right, #8bc34a 0%, #8bc34a ' +
					percent +
					'%, #e5e7eb ' +
					percent +
					'%, #e5e7eb 100%)';
				sliderValue.textContent = value;
				slider.setAttribute('aria-valuenow', value);
				calculateROI();
			}

			slider.addEventListener('input', updateSlider);
			updateSlider();
		}

		updateWorkflowOptions();
		calculateROI();
	}

	function initContactForms() {
		var forms = document.querySelectorAll('.contact-form');

		forms.forEach(function (form) {
			form.addEventListener('submit', function (e) {
				e.preventDefault();

				var messageEl = form.querySelector('.form-message');
				var submitBtn = form.querySelector('[type="submit"]');
				var formData = new FormData(form);

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
