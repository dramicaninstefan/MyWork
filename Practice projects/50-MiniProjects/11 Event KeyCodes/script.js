const insert = document.getElementById('insert');

window.addEventListener('keydown', (event) => {
  insert.innerHTML = ` 
  <div class="key">
    ${event.key === ' ' ? 'Space' : event.key}
    <small>event.a</small>
  </div>
  <div class="key">
    ${event.code}
    <small>event.code</small>
  </div>`;
});
