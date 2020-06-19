document.addEventListener('DOMContentLoaded', () => {
  const textarea = document.getElementById("notetxt");
  const display = document.getElementById("chars");

  textarea.addEventListener("input", event => {
    const target = event.currentTarget;
    const maxLength = target.getAttribute("maxlength");
    const currentLength = target.value.length;

    if (currentLength >= maxLength) {
      display.innerHTML = currentLength;
      display.className = 'has-text-danger';
      return
    }
    else {
      display.className = 'has-text-white';
    }

    display.innerHTML = currentLength;
  });
});
