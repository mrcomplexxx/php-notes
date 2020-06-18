document.addEventListener('DOMContentLoaded', () => {
  (document.querySelectorAll('.notification .delete') || []).forEach((del) => {
    const notification = del.parentNode;

    del.addEventListener('click', () => {
      notification.parentNode.removeChild(notification);
    });
  });
});
