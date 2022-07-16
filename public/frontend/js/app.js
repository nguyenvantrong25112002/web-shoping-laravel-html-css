function start() {
    config();
    backTop();
}
start()


function config() {
    // $('.select').data('selectric')
    $('.select').selectric('open');
    AOS.init();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    toastr.options = {
        positionClass: "toast-bottom-right",
        timeOut: 5e3,
        closeButton: !0,
        debug: !1,
        newestOnTop: !0,
        progressBar: !0,
        preventDuplicates: !0,
        onclick: null,
        showDuration: "300",
        hideDuration: "1000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
        tapToDismiss: !1
    }


}

function backTop() {

    $(window).scroll(function() {
        if ($(this).scrollTop() > 200) {
            $('#backtop').css({
                'transform': 'translateX(3px)',
                '-webkit-transform': 'translateX(3px)',
                '-moz-transform': 'translateX(3px)',
                '-ms-transform': 'translateX(3px)',
                'o-transform': 'translateX(3px)',
            });
        } else {
            $('#backtop').css({
                'transform': 'translateX(60px)',
                '-webkit-transform': 'translateX(60px)',
                '-moz-transform': 'translateX(60px)',
                '-ms-transform': 'translateX(60px)',
                'o-transform': 'translateX(60px)',
            });
        }
    });
    $('#backtop').click(function() {
        $('html , body').animate({
            scrollTop: 0,
        }, 500);
    });
}

const toggler = (() => {

    const dataAttr = "data-toggler";

    // Get height of an element object
    // Assumes it is hidden by max-height: 0 in the CSS
    const getHeight = (obj) => {
        obj.setAttribute("style", "max-height: auto");
        const height = obj.scrollHeight + "px";
        obj.removeAttribute("style");
        return height;
    };

    // Toggles the show/hide state of button and block using ARIA attributes
    const toggleState = (togglerBtn, isHidden) => {

        const toggledAttr = togglerBtn.getAttribute(dataAttr);
        if (!toggledAttr) {
            return;
        }

        const toggled = document.querySelector(toggledAttr);
        if (!toggled) {
            return;
        }

        if (isHidden) { // Show
            toggled.setAttribute("style", "max-height: " + getHeight(toggled));
        } else { // Hide
            toggled.removeAttribute("style");
        }

        togglerBtn.setAttribute("aria-expanded", isHidden);
        toggled.setAttribute("aria-hidden", !isHidden);
    };

    const isOpen = (togglerBtn) => {
        return togglerBtn.getAttribute("aria-expanded") === "true";
    };

    const togglerClicked = (e) => {
        const togglerBtn = e.target;
        toggleState(togglerBtn, !isOpen(togglerBtn));
    };

    const initialise = (() => {

        const togglerButtons = document.querySelectorAll("[" + dataAttr + "]");

        // Run through each toggle button which has a data-toggler3 set
        for (const togglerBtn of togglerButtons) {

            // Set ARIA states
            toggleState(togglerBtn, isOpen(togglerBtn));

            // Toggle ARIA state on a button click
            togglerBtn.addEventListener("click", togglerClicked);
        }
    })();

})();