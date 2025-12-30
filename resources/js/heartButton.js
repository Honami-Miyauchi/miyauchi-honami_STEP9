// heartButton.js
console.log('heartButton.js loaded!');

document.addEventListener('DOMContentLoaded', () => {
    const heartBtn = document.getElementById('heartBtn');

    if (!heartBtn) return;

    let liked = false;

    heartBtn.addEventListener('click', () => {
        liked = !liked;

        if (liked) {
            heartBtn.style.backgroundColor = 'red';
            heartBtn.style.color = 'white';
            heartBtn.textContent = '♥';
        } else {
            heartBtn.style.backgroundColor = 'white';
            heartBtn.style.color = 'black';
            heartBtn.textContent = '♡';
        }
    });
});
