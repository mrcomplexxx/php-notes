document.addEventListener('DOMContentLoaded', () => {
  const timeViews = document.getElementsByName("timeago");

  if (timeViews.length > 0) {
    timeViews.forEach(el => {
      time = new Date(el.innerHTML);
      el.innerHTML = humanized_time_span(time);
    });
  }
});
