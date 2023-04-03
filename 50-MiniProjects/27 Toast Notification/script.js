const button = document.getElementById('button');
const toasts = document.getElementById('toasts');

const messages = ['Message One', 'Message Two', 'Message Three', 'Message Four'];

const types = ['info', 'success', 'error'];

button.addEventListener('click', () => createNotification('This is invalid data'));

function createNotification(message = null, type = null) {
  const notif = document.createElement('div');
  notif.classList.add('toast');
  notif.classList.add(type ? type : getRadndomType());

  notif.innerText = message ? message : getRadndomMessage();

  toasts.appendChild(notif);

  setTimeout(() => {
    notif.remove();
  }, 3000);
}

function getRadndomMessage() {
  return messages[Math.floor(Math.random() * messages.length)];
}

function getRadndomType() {
  return types[Math.floor(Math.random() * types.length)];
}
