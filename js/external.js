(function () {
    function smoothScrollTo(clickedOnElement, elementToScrollTo) {
        const clickEl = document.querySelector(clickedOnElement);

        if (clickEl) {
            clickEl.addEventListener('click', (e) => {
                e.preventDefault();
                smoothScroll(elementToScrollTo, 1000);
            });
        }
    }

    // Fix for iOS
    window.onresize = function() {
        document.body.height = document.documentElement.clientHeight;
        document.querySelector('.header').style.height = document.documentElement.clientHeight + 'px';
        document.querySelectorAll('.header__unblurred-image').forEach((item) => { item.style.height = document.documentElement.clientHeight + 'px' });
    }

    window.onresize(); // called to initially set the height.

    function calculateNavOpacity(isFromLoad = false) {
        const scrollPosition = window.scrollY;
    
        // Next get the client height
        const clientHeight = document.documentElement.clientHeight;
    
        // Get the % of the first section scrolled past.
        const percent = scrollPosition / clientHeight;
    
        const scrollTop = (window.pageYOffset !== undefined) ? window.pageYOffset : (document.documentElement || document.body.parentNode || document.body).scrollTop;
    
        // Here we check to see if the page was reloaded when the function was called. If it was, don't animate.
        if (isFromLoad) {
            document.querySelector('.nav__top-bar').classList.add('noTransition');
            document.querySelector('.nav').classList.add('noTransition');
            document.querySelector('.desktopMenu__grey').classList.add('noTransition');
        }

        if (document.querySelector('.nav')) {
            document.querySelector('.nav').classList.toggle('has-scrolled', scrollTop > 0);
        }

        // // Cause reflow. Necessary in order to prevent transitions
        
        if (document.querySelector('.nav__top-bar') !== null) {
            document.querySelector('.nav__top-bar').offsetHeight;
        }

        if (document.querySelector('.nav') !== null) {
            document.querySelector('.nav').offsetHeight;
        }

        if (document.querySelector('.desktopMenu__grey') !== null) {
            document.querySelector('.desktopMenu__grey').offsetHeight;
        }

        // // Turn transitions back on.
        if (document.querySelector('.nav__top-bar') !== null) {
            document.querySelector('.nav__top-bar').classList.remove('noTransition');
        }

        if (document.querySelector('.nav') !== null) {
            document.querySelector('.nav').classList.remove('noTransition');
        }

        if (document.querySelector('.desktopMenu__grey') !== null) {
            document.querySelector('.desktopMenu__grey').classList.remove('noTransition');
        }


        function progressiveAnimation(parentSelector) {
            const parents = document.querySelectorAll(parentSelector);

            parents.forEach((parent) => {
                const firstChild = parent.children[0];
                if (isInViewport(firstChild)) {
                    firstChild.classList.add('slideIn');
        
                    for(let i = 1; i < parent.childElementCount; i++) {
                        parent.children[i].style.animationDelay = i / 2 + 's';
                        parent.children[i].classList.add('slideIn');
                    }
                }
            });
        }

        progressiveAnimation('.textAndImage__textContainer');
        progressiveAnimation('.header__text-box');
        progressiveAnimation('.textStrip__container');
        progressiveAnimation('.imageSection__textSection');
    }

    if (document.querySelector('.submit')) {
        document.querySelector('.submit').addEventListener('click', (e) => {
            e.preventDefault();

            const nameInput = document.querySelector('.formFieldName');
            const emailInput = document.querySelector('.formFieldEmail');
            const contactNoInput = document.querySelector('.formFieldContactNo');
            const contractTypeInput = document.querySelector('.formFieldContractType');

            const name = nameInput.value.trim();
            const email = emailInput.value.trim();
            const contactNumber = document.querySelector('.formFieldContactNo').value.trim();
            const contractType = document.querySelector('.formFieldContractType').value.trim();
            const more = document.querySelector('.formFieldMore').value.trim();

            const submitButton = document.querySelector('.submit');

            let errors = false;

            const checkIfPresentAndShowErrorIfNot = (input) => {
                if (input.value.trim() === '') {
                    input.nextElementSibling.style.display = 'block';
                    errors = true;
                    return false;
                } else {
                    input.nextElementSibling.style.display = 'none';
                    return true;
                }
            };

            checkIfPresentAndShowErrorIfNot(nameInput);

            if (!checkIfPresentAndShowErrorIfNot(emailInput)) {
                errors = true;
                emailInput.nextElementSibling.innerHTML = '* Please enter your email address';
            } else {
                if (!validateEmail(email)) {
                    errors = true;
                    emailInput.nextElementSibling.innerHTML = '* Please enter a valid email address';
                    emailInput.nextElementSibling.style.display = 'block';
                } else {
                    emailInput.nextElementSibling.style.display = 'none';
                }
            }

            checkIfPresentAndShowErrorIfNot(contactNoInput);
            checkIfPresentAndShowErrorIfNot(contractTypeInput);

            if (!errors) {
                submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
                setTimeout(() => {
                    const request = new XMLHttpRequest();
                    const url = './sendEmail.php';
                    
                    request.open('POST', url, true);
                    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    
                    request.onreadystatechange = function () {
                        if (request.readyState === 4 && request.status === 200) {
                            submitButton.innerHTML = '<span>Thank You!</span>';
                            submitButton.classList.add('dark-green');
                        } else {
                            submitButton.innerHTML = 'Submit';
                            submitButton.classList.remove('dark-green');
                        }
                    };
        
                    const data = 'name=' + name + '&email=' + email + '&contactNo=' + contactNumber + '&contractType=' + contractType + '&more=' + more;
        
                    request.send(data);
                }, 10);

                setTimeout(() => {
                    submitButton.innerHTML = 'Submit';
                    document.querySelector('#contact-form').reset();
                    submitButton.classList.remove('dark-green');
                }, 5000);
            }
        }); // end submit handler
    } // end if submit

    smoothScrollTo('.contact .btn--enquire', '.contact .contact__contactForm');
    smoothScrollTo('.header__arrow', '.textAndImage');
    smoothScrollTo('.home-box', '.home');

    // const oldTransition = 
    const navTopBar = document.querySelector('.nav__top-bar');
    const oldTransition = navTopBar.style.transition;
    navTopBar.style.transition = 'none';
    navTopBar.style.transition = oldTransition;

    calculateNavOpacity(true);
    if (document.querySelector('.hamburger') !== null) {
        document.querySelector('.hamburger').addEventListener('click', function(evt) {
            this.classList.toggle('isActive');
            document.querySelector('.desktopMenu').classList.toggle('active');
            document.querySelector('.nav').classList.toggle('active');
            document.querySelector('.desktopMenu__grey').classList.toggle('active');
        });
    }

    // Get hold of everything that is intended to scroll up.
    const animatables = document.querySelectorAll('.animIn');

    animatables.forEach((item) => {
        if (isInViewport(item)) {
            item.classList.add('slideIn');
        }
    });

    document.addEventListener('scroll', () => {
        calculateNavOpacity();
        
        // Get hold of everything that is intended to scroll up.
        const animatables = document.querySelectorAll('.animIn');

        animatables.forEach((item) => {
            if (isInViewport(item)) {
                item.classList.add('slideIn');
            }
        });
    });

    if (getCookie('cookieBar') != 'true') {
    // if (true) {
        document.querySelector('.cookiesBar').style.display = 'flex'; 
        document.querySelector('.desktopMenu').classList.add('shiftDownForCookieBar');

        document.querySelector('.close').addEventListener('click', (evt) => {
            evt.preventDefault();
            document.querySelector('.desktopMenu').classList.remove('shiftDownForCookieBar');
            document.querySelector('.cookiesBar').classList.add('closed');
            document.cookie = "cookieBar=true; expires=" + new Date(new Date().setFullYear(new Date().getFullYear() + 1)) + ";";
        });
    } 

    const menuTransitionLinks = document.querySelectorAll('.menuTransition:not(.scroller)');
    
    menuTransitionLinks.forEach((item) => {
        
        item.addEventListener('click', (e) => {
            e.preventDefault();
            const transition = new Transition('rgb(7, 197, 115)', null, 3, item.href, false, item.hash, ['js/external.js']);
            transition.fire();
        });
    });

    if (document.querySelector('.header__logo-box:not(.home-box)')) {
        document.querySelector('.header__logo-box:not(.home-box)').addEventListener('click', (e) => {
            e.preventDefault();
                const transition = new Transition('rgb(7, 197, 115)', null, 3, 'index', false, null, ['js/external.js']);
                transition.fire();
        });
    }
})();