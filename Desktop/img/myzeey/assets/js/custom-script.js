(function ($) {
  $(window).scroll(function () {
    var windscroll = $(window).scrollTop();
    // if (windscroll >= 30) {
    //   $("header").addClass("sticky");
    // } else {
    //   $("header").removeClass("sticky");
    // }
    if (windscroll >= 20) {
      $(".scroll-top").fadeIn("slow");
      $(".scroll-top").css("opacity", "1");
    } else {
      $(".scroll-top").css("opacity", "0");
      $(".scroll-top").fadeOut("slow");
    }
  });
  $(".scroll-top").click(function () {
    $("html, body").animate({ scrollTop: 0 }, 1000);
    return false;
  });

  $(".buy-now-down-arrow").on("click", function () {
    var scrolled = 0;
    scrolled = scrolled + 800;
    // alert(scrolled);
    $(".buy-now-right").animate(
      {
        scrollTop: scrolled,
      },
      1000
    );
  });

  $(".navbar-toggler").click(function () {
    // $('.resposnive-close-btn').hide();
    // $('.hamburger-menu').show();
    $("#navbarSupportedContent").slideToggle().removeClass("collapse");
    // $('.hamburger-menu').hide();
    // $('.resposnive-close-btn').show();
  });
  // faq
  var Accordion = function (el, multiple) {
    this.el = el || {};
    this.multiple = multiple || false;
    var links = this.el.find(".faq-toggle");
    links.on(
      "click",
      {
        el: this.el,
        multiple: this.multiple,
      },
      this.dropdown
    );
  };
  Accordion.prototype.dropdown = function (e) {
    var $el = e.data.el;
    ($this = $(this)), ($next = $this.next());
    if (!e.data.multiple) {
      $el.find(".faq-text").not($next).slideUp("5000", "linear").parent().removeClass("active");
    }
    $next.slideToggle("5000", "linear");
    $this.parent().toggleClass("active");
  };
  var accordion = new Accordion($(".faq-main"), false);
  $(".faq").first().addClass("active");
  $(".faq").first().find(".faq-text").slideToggle("1000", "linear");
  // end faq
  // increase value
  $("#plus-btn").click(function () {
    var amountget = parseInt($("#amount").val());
    // alert(amountget);
    if (amountget >= 0) {
      var totalamountget = amountget + 1;
      $("#amount").val(totalamountget);
    }
  });
  // end increase value
  // decrease value
  $("#minus-btn").click(function () {
    var amountget = parseInt($("#amount").val());
    if (amountget > 0) {
      var totalamountget = amountget - 1;
      $("#amount").val(totalamountget);
    }
  });
  // end decrease value
  // tab
  $(".tab ul.tabs").addClass("active").find("> li:eq(0)").addClass("current");

  $(".tab ul.tabs li a").click(function (g) {
    var tab = $(this).closest(".tab"),
      index = $(this).closest("li").index();

    tab.find("ul.tabs > li").removeClass("current");
    $(this).closest("li").addClass("current");

    tab
      .find(".tab_content")
      .find("div.tabs_item")
      .not("div.tabs_item:eq(" + index + ")")
      .slideUp();
    tab
      .find(".tab_content")
      .find("div.tabs_item:eq(" + index + ")")
      .slideDown();

    g.preventDefault();
  });
  // end tab
  // Blog Page Load More //
  $(".masonry-grid").slice(0, 2).show();
  $("body").on("click touchstart", ".load-more-data", function (e) {
    e.preventDefault();
    $(".masonry-grid:hidden").slice(0, 2).slideDown();
    if ($(".masonry-grid:hidden").length == 0) {
      $(".load-more-data").css("visibility", "hidden");
    }
    $("html,body").animate(
      {
        scrollTop: $(this).offset().top,
      },
      1000
    );
  });

  // Blog Page Load More end //
  $(".open-model").on("click", function (e) {
    e.preventDefault();
    $(".modal").toggleClass("is-visible");
  });

  $(".open-model-load-design").on("click", function (e) {
    e.preventDefault();
    $(".modal-load-design").toggleClass("is-visible");
  });

  $(".close-phone-search-popup").on("click", function (e) {
    e.preventDefault();
    $(".modal").removeClass("is-visible");
  });

  $(".close-phone-search-popup.close-load-design-popup").on("click", function (e) {
    e.preventDefault();
    $(".modal-load-design").removeClass("is-visible");
  });

  $("body").click(function () {
    $(".searchresult.searchresult-show").hide();
  });

  $(".key-up-show-text").on("click", function (e) {
    e.preventDefault();
    jQuery(".js-example-basic-single").val("").trigger("change");
    $(".search-after-display").hide();
    $(".textred.open-model").show();
  });

  // $('p').each(function() {
  //     const $this = $(this);
  //     if($this.html().replace(/\s|&nbsp;/g, '').length === 0)
  //         $this.remove();
  // });

  //buy now img change on click color piker
  $("body").on("click", "ul.color-piker li div.lengend-action-buttons label span.clasptype", function () {
    var getimgpath = $(this).attr("data-src");
    var splitimgpath = getimgpath.split(",");
    $(".buynow-case-top").attr("src", splitimgpath[0]).fadeIn();
    $(".buynow-case-bottom").attr("src", splitimgpath[1]);
    jQuery(".current-color").text($(this).attr("data-actualname"));
  });

  $("body").on("click", "ul.color-piker li div.lengend-action-buttons label span.clasptype_braiding_one", function () {
    var getimgpath = $(this).attr("data-src");
    $(".buynow-wireposition1").attr("src", getimgpath).fadeIn();
  });

  $("body").on("click", "ul.color-piker li div.lengend-action-buttons label span.clasptype_braiding_two", function () {
    var getimgpath = $(this).attr("data-src");
    $(".buynow-wireposition2").attr("src", getimgpath).fadeIn();
  });

  $("body").on("click", "ul.color-piker li div.lengend-action-buttons label span.clasptype_braiding_three", function () {
    var getimgpath = $(this).attr("data-src");
    $(".buynow-wireposition3").attr("src", getimgpath).fadeIn();
  });

  $("body").on("click", "ul.color-piker li div.lengend-action-buttons label span.clasptype_braiding_four", function () {
    var getimgpath = $(this).attr("data-src");
    $(".buynow-wireposition4").attr("src", getimgpath).fadeIn();
  });
  //end buy now img change on click color piker
  $(".get-involved .tnp.tnp-subscription input.tnp-email").attr("placeholder", "Email");

  /*$('input#fname').keyup(function(e){
        alert(String.fromCharCode(e.keyCode));
    });*/

  $("body").on("keyup input", "input#fname", function (e) {
    e.stopImmediatePropagation();
    var pressvalue = $(this).val();
    var pressvaluelowercase = pressvalue.toLowerCase();
    var getsplitvalue = pressvaluelowercase.split("");
    var presslength = pressvalue.length;
    if (presslength != 0) {
      if (e.keyCode == 8 || e.keyCode == 67 || e.keyCode == -92) {
        if (presslength == 0) {
          $("ul.type-latter-show > li").hide();
        } else {
          $("ul.type-latter-show > li.latter-img" + (presslength + 1)).hide();
        }
      } else {
        if (presslength >= 11) {
          $(".error-msg-alert-fname").text("Max 10 character").show();
        } else {
          $(".error-msg-alert-fname").text("Max 10 character").hide();
          if (presslength >= 1) {
            $("ul.type-latter-show li.latter-img" + presslength).show();
            $("ul.type-latter-show li.latter-img" + presslength + " > img").attr("src", getsrcimg + getsplitvalue[presslength - 1] + ".png");
          }
          /*if(presslength == 2){
                        $("ul.type-latter-show li.latter-img2").show();
                        $("ul.type-latter-show li.latter-img2 > img").attr("src", getsrcimg+getsplitvalue[1]+".png");
                        
                    }
                    if(presslength == 3){
                        $("ul.type-latter-show li.latter-img3").show();
                        $("ul.type-latter-show li.latter-img3 > img").attr("src", getsrcimg+getsplitvalue[2]+".png");
                        
                    }
                    if(presslength == 4){
                        keyflag = 0;
                        $("ul.type-latter-show li.latter-img4").show();
                        $("ul.type-latter-show li.latter-img4 > img").attr("src", getsrcimg+getsplitvalue[3]+".png");
                    }
                    if(presslength == 5){
                        keyflag = 0;
                        $("ul.type-latter-show li.latter-img5").show();
                        $("ul.type-latter-show li.latter-img5 > img").attr("src", getsrcimg+getsplitvalue[4]+".png");
                    }
                    if(presslength == 6){
                        $("ul.type-latter-show li.latter-img6").show();
                        $("ul.type-latter-show li.latter-img6 > img").attr("src", getsrcimg+getsplitvalue[5]+".png");
                    }
                    if(presslength == 7){
                        $("ul.type-latter-show li.latter-img7").show();
                        $("ul.type-latter-show li.latter-img7 > img").attr("src",getsrcimg+getsplitvalue[6]+".png");
                    }
                    if(presslength == 8){
                        $("ul.type-latter-show li.latter-img8").show();
                        $("ul.type-latter-show li.latter-img8 > img").attr("src", getsrcimg+getsplitvalue[7]+".png");
                    }
                    if(presslength == 9){
                        $("ul.type-latter-show li.latter-img9").show();
                        $("ul.type-latter-show li.latter-img9 > img").attr("src", getsrcimg+getsplitvalue[8]+".png");
                    }
                    if(presslength == 10){
                        $("ul.type-latter-show li.latter-img10").show();
                        $("ul.type-latter-show li.latter-img10 > img").attr("src", getsrcimg+getsplitvalue[9]+".png");
                    }*/
        }
      }
    } else {
      if (presslength == 0) {
        $("ul.type-latter-show > li").hide();
      }
    }
  });

  AOS.init({
    duration: 1000,
  });

  // charms

  $(".charms-panel-toggler-btn").on("click", function () {
    if ($(this).hasClass("active")) {
      $(this).removeClass("active");
      $(".charms-panel").removeClass("opened");
      $(".template-charms").css("padding-bottom", $(".charms-panel").outerHeight() + 30);
    } else {
      $(this).addClass("active");
      $(".charms-panel").addClass("opened");
      $(".template-charms").css("padding-bottom", $(".charms-panel").outerHeight() + 30);
    }
  });

  $(".charms-panel-list .charms-item-remove").on("click", function () {
    var item = $(this).parent(".item");
    var counter = $("#itemsCounter");
    item.find("img").remove();
    item.removeClass("active");
    var counterVal = parseInt(counter.text());
    counterVal = counterVal -= 1;
    counter.text(counterVal);
  });

  $(window).on("resize", function () {
    if ($(window).width() > 1023) {
      $(".charms-panel-toggler-btn").removeClass("active");
      $(".charms-panel").removeClass("opened");
      $(".template-charms").css("padding-bottom", $(".charms-panel").outerHeight() + 30);
    }
  });
})(jQuery);

if (document.getElementById("fullpage")) {
  if (window.screen.width < 768) {
    var animated = document.querySelectorAll(".fade-up");
    gsap.utils.toArray(animated).forEach(function (elem) {
      ScrollTrigger.create({
        trigger: elem,
        start: "top 70%",
        toggleActions: "restart pause resume reverse",
        onEnter: function () {
          gsap.to(elem, {
            duration: 2,
            x: 0,
            y: 0,
            autoAlpha: 1,
            ease: "expo",
            overwrite: "auto",
          });
        },
      });
    });
  }

  var myFullpage = new fullpage("#fullpage", {
    scrollOverflow: true,
    menu: "",
    responsiveWidth: 768,
    verticalCentered: true,
    onScrollOverflow: function (section, slide, position, direction) {
      var params = {
        section: section,
        slide: slide,
        position: position,
        direction: direction,
      };
    },
    afterLoad: function (origin, destination, direction, trigger) {
      if (window.screen.width >= 768) {
        var animated = destination.item.querySelectorAll(".fade-up");
        if (destination.index !== 5) {
          gsap.utils.toArray(animated).forEach(function (elem) {
            gsap.to(elem, {
              duration: 1,
              x: 0,
              y: 0,
              autoAlpha: 1,
              ease: "expo",
              overwrite: "auto",
              delay: elem.dataset.delay,
            });
          });
        } else {
          animated.forEach((el) => {
            var rect = el.getBoundingClientRect();
            console.log(rect.top);
            if (rect.top > 0 && rect.top < window.screen.height / 2) {
              gsap.to(el, {
                duration: 1.5,
                x: 0,
                y: 0,
                autoAlpha: 1,
                ease: "expo",
                overwrite: "auto",
              });
            }
          });
          destination.item.addEventListener("scroll", function () {
            animated.forEach((el) => {
              var rect = el.getBoundingClientRect();
              console.log(rect.top);
              if (rect.top > 0 && rect.top < window.screen.height / 2) {
                gsap.to(el, {
                  duration: 1.5,
                  x: 0,
                  y: 0,
                  autoAlpha: 1,
                  ease: "expo",
                  overwrite: "auto",
                });
              }
            });
          });
        }
      }
    },
    onLeave: function (origin, destination, direction, trigger) {
      var bg = document.querySelector(".fullpage-bg-img");
      if (direction === "down") {
        if (destination.index === 3) {
          gsap.to(bg, {
            duration: 1.2,
            y: 0,
            ease: "expo",
            overwrite: "auto",
          });
        }
        if (destination.index === 4) {
          gsap.to(bg, {
            duration: 3,
            y: "-50%",
            ease: "expo",
            overwrite: "auto",
          });
        }
      } else {
        if (destination.index === 3) {
          gsap.to(bg, {
            duration: 1.2,
            y: 0,
            ease: "expo",
            overwrite: "auto",
          });
        }
        if (destination.index === 2) {
          gsap.to(bg, {
            duration: 3,
            y: "50%",
            ease: "expo",
            overwrite: "auto",
          });
        }
      }
    },
  });
}
