// Извлечение имени пользователя из URL
var urlParams = new URLSearchParams(window.location.search);
var username = urlParams.get('username');

// Замена содержимого элемента с id "username_placeholder"
document.getElementById("username_placeholder").innerText = username;