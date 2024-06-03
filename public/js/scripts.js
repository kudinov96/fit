(function($) {


    (() => {
    'use strict'
    const forms = document.querySelectorAll('.needs-validation:not(.settings-form)');
    const forms_settings = document.querySelectorAll('.settings-form');
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (form.checkValidity()) {
                //$('.modal').modal('hide');
                //$('#thanksModal').modal('show');
            //const toastBootstrap = bootstrap.Toast.getOrCreateInstance(document.getElementById('liveToast'));
            //toastBootstrap.show();
        } else {
            event.preventDefault();
            event.stopPropagation();
        }

        form.classList.add('was-validated');

      }, false)
    });

    Array.from(forms_settings).forEach(form => {
        form.addEventListener('submit', event => {
          if (form.checkValidity()) {
            // send ajax
          } else {
            event.preventDefault();
            event.stopPropagation();
            form.classList.add('was-validated');
          }

        }, false)
      });


})()



const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

$(document).ready(function() {

/* Логика открытия success modal */
const urlParams = new URLSearchParams(window.location.search);
const changes = urlParams.get('changes');
const modal = urlParams.get('modal');
if(changes == 'saved') {
    $('#thanksModal').modal('show');
} else if(changes == 'deleted') {
    $('#thanks_deleteModal').modal('show');
}
if(modal) {
    $('#'+modal).modal('show');
}

$('[data-user_id]').on('click', function(){
    $('#deleteModal input[name="user_id"]').attr('value', $(this).data('user_id'));
});

$('[data-text]').on('click', function(){
    $('.desc-block').hide();
    $('#descriptionModal .modal-body').html($('#desc-block_'+$(this).data('text')).html());
});

let quiz = $('.quiz-slider').slick({
    dots: false,
    arrows: true,
    infinite: false,
    speed: 300,
    slidesToShow: 1,
    slidesToScroll: 1,
    fade: true,
    autoplay: false,
    autoplaySpeed: 3000,
    prevArrow: '.quiz-prev',
    nextArrow: '',
    adaptiveHeight: true,
    draggable: false,
    touchMove: false
}).on('beforeChange', function(event, slick, currentSlide, nextSlide) {
    if(nextSlide == 3 && !$('.step-4 .form-control').val().length) {
        $('.quiz-next a').addClass('quiz-disabled');
    } else if(nextSlide == 4 && !$('.step-5 .form-control').val().length) {
        $('.quiz-next a').addClass('quiz-disabled');
    } else {
        $('.quiz-next a').removeClass('quiz-disabled');
    }

    if(nextSlide == 5) {
        $('.quiz-next a.btn').hide();
        $('.quiz-next button.btn').show();
    }

    if(nextSlide == 6) {
        $('.quiz-count').text('Спасибо за участие!');
        $('.quiz-prev, .quiz-next').hide();
        // тут код $.ajax отправки формы
    } else {
        $('.quiz-goback').hide();
        $('.quiz-count span').text(nextSlide + 1);
    }

    if(nextSlide == 0) {
        $('.quiz-goback').show();
    } else {
        $('.quiz-goback').hide();
    }

});

$('.quiz-next a').on('click', function() {
    if(!$(this).hasClass('quiz-disabled')) {
        quiz.slick('slickNext');
    }
});

$('body').on('input', '.quiz-required', function() {
    quiz_validate($(this).data('step'));
});


function quiz_validate(step) {
    $('.step-'+step+' .quiz-required').each(function(){
        if($(this).val().length) {
            $(this).removeClass('error');
        } else {
            $(this).addClass('error');
        }
    });
    if($('.step-'+step+' .quiz-required').hasClass('error')) {
        $('.quiz-next a').addClass('quiz-disabled');
    } else {
        $('.quiz-next a').removeClass('quiz-disabled');
    }
}

$('.quiz-start').on('click', function(){
    $('.quiz-intro').hide();
    $('.quiz-wrapper').show(100);
    $('.step-1 .form-control').each(function(){
        $(this).val('');
    });
    quiz.slick('reinit');
    $('.quiz-next a').addClass('quiz-disabled');
});

$('.quiz-goback').on('click', function(){
    $('.quiz-wrapper').hide();
    $('.quiz-intro').show(100);
});

$('.step-6 input').on('change', function() {
    if($('#experience-4').is(':checked')) {
        $('.other-message').show(100).css('visibility', 'visible');
    } else {
        $('.other-message').hide();
    }
});

let week_slider = $('.week-slider').slick({
    dots: false,
    arrows: false,
    infinite: false,
    speed: 300,
    slidesToShow: 1,
    slidesToScroll: 1,
    fade: true,
    autoplay: false,
    autoplaySpeed: 3000,
    prevArrow: '',
    nextArrow: '',
    adaptiveHeight: true,
    draggable: false,
    touchMove: false
});

let week_slider_six = $('.week-slider_six').slick({
    dots: false,
    arrows: false,
    infinite: false,
    speed: 300,
    slidesToShow: 1,
    slidesToScroll: 1,
    fade: true,
    autoplay: false,
    autoplaySpeed: 3000,
    prevArrow: '',
    nextArrow: '',
    adaptiveHeight: true,
    draggable: false,
    touchMove: false
});

const weekModal = document.getElementById('weekModal');
const weekModal_six = document.getElementById('weekModal_six');
const weekForm = document.getElementById('weekForm');
const weekForm_six = document.getElementById('weekForm_six');
weekModal.addEventListener('shown.bs.modal', event => {
    week_slider.slick('setPosition');
})
weekModal_six.addEventListener('shown.bs.modal', event => {
    week_slider_six.slick('setPosition');
})

$('.week-nav_next_1').on('click', function(){
    if (weekForm.checkValidity()) {
        week_slider.slick('slickNext');
    } else {
        weekForm.classList.add('was-validated');
    }
});

$('.week-nav_prev').on('click', function(){
    week_slider.slick('slickPrev');
});

$('.week-nav_next_six').on('click', function(){
    if (weekForm_six.checkValidity()) {
        week_slider_six.slick('slickNext');
    } else {
        weekForm_six.classList.add('was-validated');
    }
});

$('.week-nav_prev_six').on('click', function(){
    week_slider_six.slick('slickPrev');
});

/* отключаем кнопку */
/*$('.check-sagatavot .btn-disabled').removeAttr('data-bs-toggle');*/

/* оставляем открытым текущий accodion после перезагрузки страницы */
/*let selectedCollapse = sessionStorage.getItem('selectedCollapse');
  if(selectedCollapse != null) {
    $('.accordion .collapse').removeClass('show');
    $(selectedCollapse).addClass('show');
}*/
$('.accordion .accordion-button').on('click', function(){
    let target = $(this).data('bs-target');
    sessionStorage.setItem('selectedCollapse', target);
});

/*$('.check-sagatavot .btn').on('click', function(){
    let check_num = $(this).data('week');
    if(check_num == 6) {
        $('.thanks_type_1').hide();
        $('.thanks_type_2').show();
        $('#thanksModal .modal-dialog').css('max-width', '740px');
    } else {
        $('.thanks_type_1').show();
        $('.thanks_type_2').hide();
        $('#thanksModal .modal-dialog').css('max-width', '500px');
    }
});*/

    /* оставляем открытым текущий accodion после перезагрузки страницы */
    let selectedCollapse = sessionStorage.getItem('selectedCollapse');
    if(selectedCollapse != null) {
        $('.accordion .collapse').removeClass('show');
        $(selectedCollapse).addClass('show');
    }
    $('.accordion .accordion-button').on('click', function(){
        let target = $(this).data('bs-target');
        sessionStorage.setItem('selectedCollapse', target);
    });

});

    $(".update-stream-modal").on('click', function(){
        let id = $(this).data("id");
        $('#editModal input[name="stream_id"]').val(id);
        $('#editModal .modal-title span').text(id);
    });

    $(".store-check-in-modal-btn").on('click', function(){
        let week = $(this).data("week");
        let day = $(this).data("day");
        $('#storeCheckInModal input[name="week"]').val(week);
        $('#storeCheckInModal input[name="day"]').val(day);
    });

    $(".update-check-in-modal-btn").on('click', function(){
        let id = $(this).data("id");
        let week = $(this).data("week");
        let day = $(this).data("day");
        let training = $(this).data("training");
        let water = $(this).data("water");
        let sleep = $(this).data("sleep");
        let alcohol = $(this).data("alcohol");
        let nutrition = $(this).data("nutrition");

        $('#editCheckInModal input[name="check_in_id"]').val(id);
        $('#editCheckInModal input[name="week"]').val(week);
        $('#editCheckInModal input[name="day"]').val(day);
        $('#editCheckInModal select[name="training"]').val(training).change();
        $('#editCheckInModal input[name="water"]').val(water);
        $('#editCheckInModal input[name="sleep"]').val(sleep);
        $('#editCheckInModal select[name="alcohol"]').val(alcohol).change();
        $('#editCheckInModal select[name="nutrition"]').val(nutrition).change();
    });

    $(".check-sagatavot .btn").on('click', function(){
        let week = $(this).data("week");

        $('#weekForm input[name="type"]').val("week_" + week);
    });

    $(".remove-user").on('click', function(){
        let userId = $(this).data("user-id");

        $('#delete-user-form input[name="user_id"]').val(userId);
    });

    $(".stat-pics-btn").on('click', function(){
        let type = $(this).data("type");
        let number = $(this).data("number");

        $('#editPhoto input[name="type"]').val(type);
        $('#editPhoto input[name="number"]').val(number);
    });

})(jQuery);

document.querySelectorAll('.numeric-input').forEach(function(element) {
    element.addEventListener('keypress', function(e) {
        if (!/^\d$/.test(e.key)) {
            e.preventDefault();
        }
    });
});

// Float input validation
// Requirements:
// - User can enter only numbers and a dot
// - User can enter only 1 dot
// - User can enter max 4 digit before the dot
// - User can enter max 1 digit after the dot
// - All special characters should be transformed into a dot (if there is no dot in the input field)
// - User can't enter a dot or a special character as a first character in the input field
// - If user enters a dot but doesn't enter any number after the dot, the dot should be removed on focus change

const floatInputs = document.querySelectorAll(".float-input");

floatInputs.forEach((input) => {
  input.addEventListener("beforeinput", (e) => {
    const regex = /[^0-9]/;
    const value = e.target.value;

    // Handle delete key properly
    if (
      e.inputType === "deleteContentBackward" ||
      e.inputType === "deleteContentForward"
    ) {
      return;
    }

    if (regex.test(e.data)) {
      e.preventDefault();

      // Prevent user from entering a dot or a special character as a first character in the input field
      if (value.length === 0) {
        e.target.value = "";
        return;
      }

      // Transform all special characters into a dot if there is no dot in the input field
      if (!value.includes(".")) {
        e.target.value = value + ".";
        return;
      }
    }
  });

  input.addEventListener("input", (e) => {
    const value = e.target.value;
    const length = value.length;
    const dotIndex = value.indexOf(".");

    // Max 4 characters before the dot
    if (dotIndex === -1 && length > 3) {
      e.target.value = value.substring(0, 4);
    }

    // Max 1 character after the dot
    if (dotIndex !== -1 && value.length > dotIndex + 2) {
      e.target.value = value.substring(0, dotIndex + 2);
    }
  });

  // Remove the dot on focus change if user entered a dot but doesn't enter any number after the dot
  input.addEventListener("blur", (e) => {
    const value = e.target.value;
    const dotIndex = value.indexOf(".");

    if (dotIndex !== -1) {
      let beforeDot = value.substring(0, dotIndex);
      let afterDot = value.substring(dotIndex + 1).replace(/\./g, "");
      if (afterDot.length === 0) {
        e.target.value = beforeDot;
        return;
      }
    }
  });
});