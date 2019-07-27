

(function () {
    document.addEventListener('DOMContentLoaded', () => {

    // Fix for iOS
    window.onresize = function() {
        document.body.height = document.documentElement.clientHeight;
        document.querySelector('.header').style.height = document.documentElement.clientHeight + 'px';
        document.querySelectorAll('.header__unblurred-image').forEach((item) => { item.style.height = document.documentElement.clientHeight + 'px' });
    }
    window.onresize(); // called to initially set the height.

    // This seems to work...
        history.replaceState({ direction: 0, dependencies: ['js/external.js']}, 'title', location.href);

        const newScript = document.createElement('script');
        newScript.src = './js/external.js';
        document.body.appendChild(newScript);

    });
})();