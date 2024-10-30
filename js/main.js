var servicesSwiper = new Swiper(".services-swiper", {
  slidesPerView: 3,
  breakpoints: {
    639: {},
  },
  navigation: {
    nextEl: ".services__row .services-swiper__arrow-next",
    prevEl: ".services__row .services-swiper__arrow-prev",
  },
});
var works__swiper1 = new Swiper(".item-works__swiper1", {
  slidesPerView: 1,
  spaceBetween: 20,
  breakpoints: {
    639: {},
  },
  navigation: {
    nextEl: ".item-works__swiper1 .item-works__swiper-arrow-next",
    prevEl: ".item-works__swiper1 .item-works__swiper-arrow-prev",
  },
  pagination: {
    el: ".item-works__swiper1 .item-works__swiper-pagination",
  },
});
var works__swiper2 = new Swiper(".item-works__swiper2", {
  slidesPerView: 1,
  spaceBetween: 20,
  breakpoints: {
    639: {},
  },
  navigation: {
    nextEl: ".item-works__swiper2 .item-works__swiper-arrow-next",
    prevEl: ".item-works__swiper2 .item-works__swiper-arrow-prev",
  },
  pagination: {
    el: ".item-works__swiper2 .item-works__swiper-pagination",
  },
});
var works__swiper3 = new Swiper(".item-works__swiper3", {
  slidesPerView: 1,
  spaceBetween: 20,
  breakpoints: {
    639: {},
  },
  navigation: {
    nextEl: ".item-works__swiper3 .item-works__swiper-arrow-next",
    prevEl: ".item-works__swiper3 .item-works__swiper-arrow-prev",
  },
  pagination: {
    el: ".item-works__swiper3 .item-works__swiper-pagination",
  },
});
var works__swiper4 = new Swiper(".item-works__swiper4", {
  slidesPerView: 1,
  spaceBetween: 20,
  breakpoints: {
    639: {},
  },
  navigation: {
    nextEl: ".item-works__swiper4 .item-works__swiper-arrow-next",
    prevEl: ".item-works__swiper4 .item-works__swiper-arrow-prev",
  },
  pagination: {
    el: ".item-works__swiper4 .item-works__swiper-pagination",
  },
});
var getfreeswiperdesk = new Swiper(".get-free-swiper-desk", {
  slidesPerView: 1,
  spaceBetween: 0,
  centeredSlides: true,
  breakpoints: {
    769: {
      slidesPerView: 4,
      centeredSlides: false,
    },
  },
});
var getfreeswipermob = new Swiper(".get-free-swiper-mob", {
  slidesPerView: 2,
  spaceBetween: 0,
});
var teamswiper = new Swiper(".team-swiper", {
  slidesPerView: 1.2,
  breakpoints: {
    501: {
      slidesPerView: 2.5,
    },
    769: {
      slidesPerView: 5,
    },
  },
});

if ($(window).width() < 769) {
  getfreeswiperdesk.slideTo(1);
}

$(window).resize(function () {
  if ($(window).width() < 769) {
    getfreeswiperdesk.slideTo(1);
  }
});

$(document).ready(function () {
  $(".faqs__question").on("click", function () {
    $(this).next().slideToggle();
    $(this).toggleClass("active");
  });
  $(".open-discuss-popup").on("click", function () {
    $(".popup-discuss").addClass("show");
  });
  $(".popup-discuss__close").on("click", function () {
    $(".popup-discuss").removeClass("show");
  });
  $(".open-thankyou-popup").on("click", function () {});
  $(".popup-thankyou__close").on("click", function () {
    $(".popup-thankyou").removeClass("show");
  });
  $(".click-up").click(function (event) {
    event.preventDefault();
    $("html, body").animate(
      {
        scrollTop: 0,
      },
      800
    );
  });
  $(".overlay").on("click", function () {
    var overlay = $(this);
    var video = overlay.siblings("#player-container").find("video")[0];

    overlay.fadeOut();

    video.play();
  });
  $('[type="tel"]').inputmask("+7 (999) 999 99 99");
});

$(document).ready(function () {
  $("#introForm").on("submit", function (e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "send_mail.php",
      data: $(this).serialize(),
      success: function (response) {
        $(".popup-thankyou").addClass("show");
      },
      error: function () {
        alert("Ошибка отправки формы.");
      },
    });
  });
  $("#aboutForm").on("submit", function (e) {
    e.preventDefault();

    $.ajax({
      type: "POST",
      url: "send_mail_about.php",
      data: $(this).serialize(),
      success: function (response) {
        $(".popup-thankyou").addClass("show");
      },
      error: function () {
        alert("Ошибка отправки формы.");
      },
    });
  });
  $("#sendForm").on("submit", function (e) {
    e.preventDefault();

    $.ajax({
      type: "POST",
      url: "send_mail_call.php",
      data: $(this).serialize(),
      success: function (response) {
        $(".popup-thankyou").addClass("show");
      },
      error: function () {
        alert("Ошибка отправки формы.");
      },
    });
  });
  $("#discussForm").on("submit", function (e) {
    e.preventDefault();

    $.ajax({
      type: "POST",
      url: "send_mail_discuss.php",
      data: $(this).serialize(),
      success: function (response) {
        $(".popup-thankyou").addClass("show");
      },
      error: function () {
        alert("Ошибка отправки формы.");
      },
    });
  });
});
