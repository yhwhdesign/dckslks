const prompt = document.querySelector('.prompt');
const installButton = prompt.querySelector('.prompt__install');
const closeButton = prompt.querySelector('.prompt__close');
let installEvent;

// checks if the localStorage item has been set
function getVisited() {
    return localStorage.getItem('install-prompt');
}

// sets the localStorage item
function setVisited() {
    localStorage.setItem('install-prompt', true);
}

// this event will only fire if the user does not have the pwa installed already
window.addEventListener('beforeinstallprompt', (event) => {
    event.preventDefault();

    // if no localStorage is set, first time visitor then..
    if (!getVisited()) {
        // show us the banner
        prompt.style.display = 'block';

        // store the event for later
        installEvent = event;
    }
});

installButton.addEventListener('click', () => {
    // hide the prompt banner
    prompt.style.display = 'none';

    // trigger the prompt to show the user
    installEvent.prompt();

    // check what the user chose
    installEvent.userChoice.then((choice) => {
        // if they said no... dont show the button again
        // sets localStorage to true
        if (choice.outcome !== 'accepted') {
            setVisited();
        }

        installEvent = null;
    });
});

closeButton.addEventListener('click', () => {
    // set localStorage to true
    setVisited();

    // hide the prompt
    prompt.style.display = 'none';

    installEvent = null;
});