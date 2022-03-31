$(document).ready(function () {
  // adding active class to nav links as per page
  var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
  if (path == "/") {
    path == "index.html";
  }
  $("ul a").each(function () {
    if (this.href === path) {
      $("ul a").removeClass("active");
      $(this).addClass("active");
    }
  });

  // header shrinked on scroll
  $(window).on("scroll", function () {
    if ($(document).scrollTop() > 100) {
      $("header").addClass("header--shrinked");
    } else {
      $("header").removeClass("header--shrinked");
    }
  });
  // nav toggler
  var navTogglerBtn = $("#siteMainNavToggler");
  var navMain = $("#siteMainNav");
  var navMainBtnClose = $(".site-main-nav__btn--close");

  var isNavMainActive = false;
  navTogglerBtn.on("click", function (e) {
    e.stopPropagation();
    navMain.addClass("site-main-nav--active");
    $("body").addClass("no-scroll bg-overlay");
    isNavMainActive = true;
  });

  $(document).on("click", ".bg-overlay", function (e) {
    const target = $(e.target);
    if (isNavMainActive && target.attr("id") != "siteMainNav" && target.attr("role") != "button") {
      navMainBtnClose.click();
    }
  });

  navMainBtnClose.on("click", function () {
    navMain.removeClass("site-main-nav--active");
    $("body").removeClass("no-scroll bg-overlay");
  });
  // Search form for mobile and tablet screen
  var searchButtonMobile = $("#searchButtonMobile");
  var foodSearchForm = $(".food-search-form");
  searchButtonMobile.on("click", function () {
    foodSearchForm.toggleClass("food-search-form--active");
  });

  // search form for large screen
  var searchButtonLarge = $(".site-header__cta-btn--search");
  var searchFormLarge = $(".food-search-form--lg");
  var searchFormLargeCloseButton = $(".search-form-lg__btn--close");
  searchButtonLarge.on("click", function () {
    var isSearchFormLargeActive = false;
    searchFormLarge.addClass("food-search-form--active-lg");
    $("body").addClass("no-scroll bg-overlay");
    isSearchFormLargeActive = true;
    if (isSearchFormLargeActive) {
      searchFormLargeCloseButton.on("click", function () {
        searchFormLarge.removeClass("food-search-form--active-lg");
        $("body").removeClass("no-scroll bg-overlay");
      });
    }
  });


  //testimonial section swiper
  var swiperHero = new Swiper(".swiper-testimonial", {
    // Optional parameters
    direction: "horizontal",
    loop: true,
    autoplay: {
      delay: 5000,
      pauseOnMouseEnter: true,
    },
    breakpoints: {
      768: {
        slidesPerView: 1,
        spaceBetween: 15,
      },
      992: {
        slidesPerView: 2,
        spaceBetween: 15,
      },
      1200: {
        slidesPerView: 3,
        spaceBetween: 15,
      },
    },
    // If we need pagination
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      renderCustom: function (swiper, current, total) {
        var names = [];
        $(".swiper-wrapper .swiper-slide").each(function (i) {
          names.push($(this).data("name"));
        });
        var text = "<ul>";
        for (let i = 1; i <= total; i++) {
          if (current == i) {
            text += `<li class="swiper-pagination-bullet active">${names[i]}</li>`;
          } else {
            text += `<li class="swiper-pagination-bullet">${names[i]}</li>`;
          }
        }
        text += "</ul>";
        return text;
      },
    },

    // Navigation arrows
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });

  //menu secction swiper
  var swiperHero = new Swiper(".swiper-menus", {
    // Optional parameters
    direction: "horizontal",
    loop: true,
    autoplay: {
      delay: 5000,
      pauseOnMouseEnter: true,
    },
    slidesPerView: 2,
    breakpoints: {
      768: {
        slidesPerView: 3,
        spaceBetween: 15,
      },
      992: {
        slidesPerView: 4,
        spaceBetween: 15,
      },
      1200: {
        slidesPerView: 6,
        spaceBetween: 15,
      },
    },
    // If we need pagination
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      renderCustom: function (swiper, current, total) {
        var names = [];
        $(".swiper-wrapper .swiper-slide").each(function (i) {
          names.push($(this).data("name"));
        });
        var text = "<ul>";
        for (let i = 1; i <= total; i++) {
          if (current == i) {
            text += `<li class="swiper-pagination-bullet active">${names[i]}</li>`;
          } else {
            text += `<li class="swiper-pagination-bullet">${names[i]}</li>`;
          }
        }
        text += "</ul>";
        return text;
      },
    },

    // Navigation arrows
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });



  // outlet overview section shrinked
  var outletOverviewSection = $(".outlet-overview");
  $(window).scroll(function () {
    if ($(document).scrollTop() > 150) {
      outletOverviewSection.addClass("outlet-overview--shrinked");
    } else {
      outletOverviewSection.removeClass("outlet-overview--shrinked");
    }
  });

  //menu nav link clicks
  const menuNavs = $("#menuCategoriesSidebarNav .nav-link");
  var prevElementFoodMenu = null;
  const myContainer = $(".menu-content");
  menuNavs.on("click", function (e) {
    e.preventDefault();
    if (prevElementFoodMenu) {
      prevElementFoodMenu.removeClass("active");
    }
    $(this).addClass("active");
    prevElementFoodMenu = $(this);
    const href = $(this).attr("href");
    $("body, html").animate({
      scrollTop: $(href).offset().top - myContainer.offset().top + 150,
    });
  });
  
  $(document).scroll(function () {
    menuNavs.each(function () {
      var container = $(this).attr("href");
      const findHref = $(container);
      if(findHref.length <= 0){
        return;
      }
      var containerOffset = findHref.offset().top;
      var containerHeight = findHref.outerHeight();
      var containerBottom = containerOffset + containerHeight;
      var scrollPosition = $(document).scrollTop();
      if (scrollPosition < containerBottom - 250 && scrollPosition >= containerOffset - 250) {
        $(this).addClass("active");
      } else {
        $(this).removeClass("active");
      }
    });
  });
  
  // outlet food search input
  var outletSearchInput = $(".outlet__top-cta-input");
  var outletSearchInputRestBtn = $(".outlet__top-cta-input--reset");
  var currentVal = "";
  outletSearchInputRestBtn.on("click", function (e) {
    e.preventDefault();
    outletSearchInput.val("");
    currentVal = "";
    outletSearchInputRestBtn.removeClass("show");
    outletSearchInput.focus();
    outletSearchInput.trigger("TSM/Search-single-outlet", [currentVal]);
  });
  outletSearchInput.on("input", function () {
    currentVal = $(this).val();
    if (currentVal.length > 0) {
      outletSearchInputRestBtn.addClass("show");
    } else {
      outletSearchInputRestBtn.removeClass("show");
    }
    outletSearchInput.trigger("TSM/Search-single-outlet", [currentVal]);
  });
  
  // filter start
  searchFilterInit();
  function searchFilterInit() {
    const menu_container = $(".menu-content");
    const menu_item_class = ".menu-list-item";
    const menu_item_hide_class = "menu-list-item__hide";
    const menu_title_class = ".menu-list-item__title";
    const menu_section_class = ".menu-list-section";
    const menu_section_hide_class = "menu-list-section__hide";
    const veg_attribute = "data-veg";
    
    var menuItems = $(menu_item_class);
    var allRows = [];
    var searchedRows = [];
    
    menuItems.each(function (i) {
      allRows[i] = $(this).find(menu_title_class).text().toLowerCase();
    });
    var filteredRows = allRows;
    
    outletSearchInput.on("TSM/Search-single-outlet", function (e, value) {
      $(document).trigger("TSM/filter",[e.element]);
      var val = value.toLowerCase().trim();
      searchFilter(val);
      resultCheck();
    });
    
    $('input[name="filterVeg"]').on("change", function () {
      $(document).trigger("TSM/filter",[this]);
      vegFilter();
      resultCheck();
    });
    
    $(document).on("TSM/filter",function(){
       $("body, html").animate({
        scrollTop: $("#menuItems").offset().top - 200,
      });
    });

    // magic filter functions
    var vegFilter = function () {
      var checked = $('input[name="filterVeg"]').is(":checked");
      tempRows = [];
      let rows = allRows;
      if (searchedRows.length > 0 && outletSearchInput.val() != "") {
        rows = searchedRows;
      }
      rows.forEach((text, i) => {
        var currentRow = $(menuItems[i]);
        if (currentRow.attr(veg_attribute) && checked) {
          currentRow.removeClass(menu_item_hide_class);
          tempRows[i] = allRows[i];
        } else if (checked) {
          currentRow.addClass(menu_item_hide_class);
        } else {
          currentRow.removeClass(menu_item_hide_class);
          tempRows[i] = allRows[i];
        }
        parentCatHideShow(currentRow);
      });
      filteredRows = tempRows;
    };
    
    var searchFilter = function (val) {
      tempRows = [];
      var checked = $('input[name="filterVeg"]').is(":checked");
      var rows = allRows;
      if (checked) {
        rows = filteredRows;
      }
      rows.forEach((text, i) => {
        var currentRow = $(menuItems[i]);
        if (val == "") {
          currentRow.removeClass(menu_item_hide_class);
          tempRows[i] = allRows[i];
        } else if (text.indexOf(val) >= 0) {
          currentRow.removeClass(menu_item_hide_class);
          tempRows[i] = allRows[i];
        } else {
          currentRow.addClass(menu_item_hide_class);
        }
        parentCatHideShow(currentRow);
      });
      searchedRows = tempRows;
    };
    
    const parentCatHideShow = function (currentRow) {
      var parentOfCurrentRow = currentRow.parent();

      var totalChildElements = parentOfCurrentRow.find(menu_item_class).length;
      var childHideElementCount = parentOfCurrentRow.find("." + menu_item_hide_class).length;
      
      var id = parentOfCurrentRow.attr('id');
      if (childHideElementCount == totalChildElements) {
        parentOfCurrentRow.addClass(menu_section_hide_class);
        $('a[href="#'+id+'"]').hide();
      } else {
        parentOfCurrentRow.removeClass(menu_section_hide_class);
        $('a[href="#'+id+'"]').show();
      }
    };
    
    const resultCheck = function () {
     
      var hidden_items_count = menu_container.find("." + menu_section_hide_class).length;
      var menu_sections = menu_container.find(menu_section_class).length;
      const search_result_text_container = menu_container.find(".search-result__error-text");
      if (hidden_items_count == menu_sections) {
        $(search_result_text_container).addClass("search-result__error-text--active");
      } else {
        $(search_result_text_container).removeClass("search-result__error-text--active");
      }
    };
  }

  // filter end


  // Add address on checkout page
  var addAddresForm = $("#addAddressForm");
  var addAddressButton = $("#addAddressButton");
  var addAddressFormButtonClose = $("#addAddressFormButtonClose");
  isAddressFormActive = false;
  addAddressButton.on("click", function (e) {
    e.stopPropagation();
    isAddressFormActive = true;
    addAddresForm.addClass("add-address-form--active");
    $("body").addClass("no-scroll bg-overlay");
  });
  $(document).on("click", ".bg-overlay", function (e) {
    const target = $(e.target);
    console.log(target);
    if (isAddressFormActive && target.attr("id") != "addAddressForm" && target.attr("sidebar-hide") != "false") {
      addAddressFormButtonClose.click();
    }
  });
  addAddressFormButtonClose.on("click", function () {
    addAddresForm.removeClass("add-address-form--active");
    $("body").removeClass("no-scroll bg-overlay");
  });

  var menuCategoriesSidebarNavLink = $("#menuCategoriesSidebarNav nav a");
  menuCategoriesSidebarNavLink.on("click", function () {
    $("#menuCateogoriesModal").modal("hide");
  });
});
