 
  var swiper = new Swiper(".teamSwiper", {
    slidesPerView: 3,
    spaceBetween: 30,
    loop: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      0: { slidesPerView: 1 },
      768: { slidesPerView: 2 },
      1024: { slidesPerView: 3 },
    },
  });

 var swiper = new Swiper(".servicesSwiper", {
      slidesPerView: 3,
      spaceBetween: 30,
      loop: true,
      centeredSlides: true,
      grabCursor: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints: {
        320: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        },
      },
    });
    // Define each slider with direction control
    const sliders = [
      { selector: '.slider1', reverse: false }, // top→bottom
      { selector: '.slider2', reverse: true },  // bottom→top
      { selector: '.slider3', reverse: false }, // top→bottom
      { selector: '.slider4', reverse: true }   // bottom→top
    ];

    sliders.forEach(({ selector, reverse }) => {
      new Swiper(selector, {
        direction: 'vertical',
        loop: true,
        slidesPerView: 1,
        speed: 2500,
        autoplay: {
          delay: 3000,
          disableOnInteraction: false,
          reverseDirection: reverse,
        },
        allowTouchMove: false,
      });
    });
window.addEventListener("scroll", () => {
  const steps = document.querySelectorAll(".timeline-step");
  const connectors = document.querySelectorAll(".timeline-connector");
  const windowHeight = window.innerHeight;

  steps.forEach((step, index) => {
    const rect = step.getBoundingClientRect();
    const visible = rect.top < windowHeight * 0.8;

    if (visible) {
      step.classList.add("active");

      // Animate connector below this icon
      if (connectors[index]) {
        connectors[index].querySelector("::after");
        connectors[index].style.setProperty("--fill", "1");
        connectors[index].classList.add("fill");
      }
    } else {
      step.classList.remove("active");

      if (connectors[index]) {
        connectors[index].classList.remove("fill");
      }
    }
  });
});
const services = document.querySelectorAll('.service-detail');
const headers = document.querySelectorAll('.service-header');
const section = document.querySelector('#what-we-do');
const scrollCircle = document.querySelector('#scrollCircle');

let activeIndex = 0;

// Initialize first service visible
services[0].classList.add('active');
headers[0].classList.add('active-header');

// Show scroll indicator when section in view
window.addEventListener('scroll', () => {
  const rect = section.getBoundingClientRect();
  const halfway = window.innerHeight / 2;

  if (rect.top < halfway && rect.bottom > halfway) {
    scrollCircle.classList.add('show');
  } else {
    scrollCircle.classList.remove('show');
  }
});

// Manual scroll navigation (mouse wheel)
window.addEventListener('wheel', (e) => {
  services.forEach((s) => s.classList.remove('active'));
  headers.forEach((h) => h.classList.remove('active-header'));

  if (e.deltaY > 0) {
    activeIndex = Math.min(activeIndex + 1, services.length - 1);
  } else {
    activeIndex = Math.max(activeIndex - 1, 0);
  }

  services[activeIndex].classList.add('active');
  headers[activeIndex].classList.add('active-header');
});

// Optional: allow clicking headers to open corresponding service
headers.forEach((header, index) => {
  header.addEventListener('click', () => {
    services.forEach((s) => s.classList.remove('active'));
    headers.forEach((h) => h.classList.remove('active-header'));

    activeIndex = index;
    services[index].classList.add('active');
    headers[index].classList.add('active-header');
  });
});
