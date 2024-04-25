function togglePoem() {
    const poem = document.getElementById('poem');
    const button = document.getElementById('toggleButton');
    if (poem.style.maxHeight) {
        poem.style.maxHeight = null;
        button.textContent = "Развернуть";
    } else {
        poem.style.maxHeight = poem.scrollHeight + "px";
        button.textContent = "Свернуть";
    }
}

function toggleImage() {
    const image = document.getElementById('eseninImage');
    const fullscreen = document.createElement('div');
    fullscreen.classList.add('fullscreen');

    const fullscreenImage = document.createElement('img');
    fullscreenImage.classList.add('fullscreen-image');
    fullscreenImage.src = image.src;

    fullscreen.appendChild(fullscreenImage);
    document.body.appendChild(fullscreen);

    fullscreen.addEventListener('click', () => {
        fullscreen.remove();
    })
}
