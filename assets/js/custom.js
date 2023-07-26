jQuery(document).ready(function ($) {
  Fancybox.bind("[data-fancybox]");

  new Swiper("#testimonialsSwiper", {
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    slidesPerView: 1,
    speed: 500,
    preventClicksPropagation: false,

    breakpoints: {
      380: {
        slidesPerView: "auto",
        autoHeight: true,
      },
      // when window width is >= 840px
      820: {
        slidesPerView: "auto",
      },

      1024: {
        slidesPerView: "auto",
      },
    },
  });

  // Sticky Menu
  let windowWidth = $(window).width();
  if (windowWidth >= 0) {
    $(window).scroll(function (event) {
      stickyMenu();
    });
    stickyMenu();
  }

  function stickyMenu() {
    let scroll = $(window).scrollTop();
    if (scroll > 0) {
      if (!$("header.main-header").hasClass("sticky")) {
        $("header.main-header").addClass("sticky");
      }
    } else {
      $("header.main-header").removeClass("sticky");
    }
  }
});

document.addEventListener("DOMContentLoaded", () => {
  const logoContent = document.querySelector(".logo-wrapper").innerHTML;
  const socialMediaContent = document.querySelector(
    ".social-media-wrapper"
  ).innerHTML;

  new Mmenu("#menu", {
    offCanvas: {
      position: "right",
    },
    theme: "light",

    navbars: [
      {
        position: "top",
        content: [logoContent],
      },
      {
        position: "bottom",
        content: [socialMediaContent],
      },
    ],
  });
});
