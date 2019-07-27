

// Placed here so it'll only fire once. Is there a better solution? = perhaps?
window.addEventListener('popstate', (e) => {

    const transition = new Transition('rgb(7, 197, 115)', null, 3, e.target.location.href, true, null, e.state.dependencies);
    transition.fire()

});

class Transition {
    
    // Args - Color of slider, duration of slide, logo for middle time, starting position and url to slide to.
    constructor(sliderColor, duration, startingPosition, url, fromBack = false, anchor = null, dependencies = []) {
        this.slider = document.createElement('div');
        this.slider.classList.add('slider');
        this.slider.style.height = '100vh';
        this.slider.style.width = '100%';
        this.slider.style.position = 'fixed';
        this.slider.style.backgroundColor = sliderColor;
        this.slider.style.transition = 'all .2s linear';
        this.url = url;
        this.sliderState = 0;                   // 0 is nothing happened, 1, is first transition before middle slide
        this.name = name;
        this.startingPosition = startingPosition; // 0 is left to right.
        this.fromBack = fromBack;
        this.anchor = anchor;
        this.dependencies = dependencies;
        this.slider.style.zIndex = '999999999999999';
        
        // Sending to start position.
        this.sendToStartPosition();
    }

    sendToEndPosition() {
        window.setTimeout(() => {

            switch(this.startingPosition) {
                case 0: {
                    this.slider.style.left = '100%';        // Left to right
                    break;
                }

                case 1: {
                    this.slider.style.left = '-100%';       // Right to left
                    break;

                }

                case 2: {
                    this.slider.style.top = '-100vh';
                    this.slider.style.left = '0';
                    break;
                }

                case 3:
                    this.slider.style.top = '100vh';
                    this.slider.style.left = '0';
                    break;
            }
        }, 100);
        
    }

    sendToStartPosition() {
        switch(this.startingPosition) {
            case 0: {
                this.slider.style.left = '-100%';
                this.slider.style.top = '0';                // Left to right
                break;
            }

            case 1: {
                this.slider.style.left = '100%';            // Right to left
                this.slider.style.top = '0';
                break;
            }

            case 2: {                                       // Bottom to top
                this.slider.style.top = '100vh';
                this.slider.style.left = '0';
                break;
            }

            case 3: {
                this.slider.style.top = '-100vh';
                this.slider.style.left = '0';
            }
        

        
        }
    }

    sendToMidPoint() {
        switch(this.startingPosition) {
            case 0: {
                this.slider.style.left = '0';
                this.slider.style.top = '0';                // Left to right
                break;
            }

            case 1: {
                this.slider.style.left = '0';            // Right to left
                this.slider.style.top = '0';
                break;
            }

            case 2: {
                this.slider.style.top = '0';
                this.slider.style.left = '0';
                break;
            }

            case 3: {
                this.slider.style.top = '0';
                this.slider.style.left = '0';
                break;
            }

            
        }
    }

    // Maybe duration should be part of the fire method.
    fire() {

        // Inject the slider in its initial position onto the page
        document.body.appendChild(this.slider);
        
        
        // Based on the starting position, add and fire transition of position all the way past the screen.
        
        // This is required because the animations don't fire in pure JS otherwise.
        window.setTimeout( () => {     
            this.sendToMidPoint();
        }, 100 );
        
        const loadingDiv = document.createElement('div');
        this.slider.addEventListener('transitionend', () => {
            if (this.sliderState === 0) {
                this.sliderState = 1;

                const elements = document.querySelectorAll('body *');
                elements.forEach((e) => {
                    if (!e.classList.contains('slider')) {
                        e.remove();
                    }
                });
                
                loadingDiv.classList.add('loadingDiv');
                // loadingDiv.style.position = 'fixed'
                loadingDiv.style.backgroundColor = 'white';
                loadingDiv.style.position = 'fixed';
                loadingDiv.style.top = '0';
                loadingDiv.style.left = '0';
                loadingDiv.style.height = '100%';
                loadingDiv.style.width = '100%';
                loadingDiv.style.zIndex = '100';
                

                const logo = document.createElement('img');
                logo.style.display = 'block';
                logo.style.height = '100px';
                logo.style.width = '100px';
                logo.style.position = 'relative';
                logo.style.top = '50%';
                logo.style.left = '50%';
                logo.style.transform = 'translate(-50%, -50%)';
                logo.src = './img/Woodram Tree Logo.svg';

                loadingDiv.appendChild(logo);


                // Add the loading div
                document.body.appendChild(loadingDiv);
                this.sendToEndPosition();

                

            } else if (this.sliderState === 1) {
                // console.log('animation stage 1')
                this.slider.style.transitionDelay = '1s';
                const xhr = new XMLHttpRequest();
                xhr.open('GET', this.url);
                xhr.onload = () => {
                    if (xhr.status === 200) {
                        let parsedDocument = new DOMParser().parseFromString(xhr.responseText, 'text/html');
                        document.body.insertAdjacentHTML('beforeend', parsedDocument.body.innerHTML);
                        this.sendToMidPoint();
                    } 
                };
                xhr.send();

                if (!this.fromBack) {
                    history.pushState({ direction: this.startingPosition, dependencies: this.dependencies}, 'title', this.url);
                }
                this.sliderState = 2;
            
            } else if (this.sliderState === 2) {
                this.slider.style.transitionDelay = '0s';
                loadingDiv.remove();
                this.sendToStartPosition();
                this.sliderState = 3;
            } else if (this.sliderState === 3) {
            //     this.sendToStartPosition();
                
                this.sliderState = -1;
                this.slider.remove();

            //     // If there are dependencies, inject them.
                if (this.dependencies) {
                    this.dependencies.forEach((script) => {
                        const newScript = document.createElement('script');
                        newScript.src = script;
                        document.body.appendChild(newScript);
                    });
                }
                
                //history.replaceState({ direction: this.startingPosition, dependencies: ['js/external.js']}, 'title', this.url);
            }
        });
    }
}