//Chatbot
document.addEventListener('DOMContentLoaded', function () {
    const sendButton = document.getElementById('send-button');
    const userInput = document.getElementById('user-input');
    const chatbotBody = document.getElementById('chatbot-body');

    if(sendButton != null){
        sendButton.addEventListener('click', function () {
            const userMessage = userInput.value.trim();
            if (userMessage !== "") {
                addUserMessage(userMessage);
                addBotResponse(userMessage);
                userInput.value = "";
            }
        });
    }

    if(userInput != null){
        userInput.addEventListener('keypress', function (event) {
            if (event.key === 'Enter') {
                sendButton.click();
            }
        });
    }

    function addUserMessage(message) {
        const messageElement = document.createElement('div');
        messageElement.classList.add('chatbot-message', 'user');
        messageElement.innerHTML = `<p class="text-light">${message}</p>`;
        chatbotBody.appendChild(messageElement);
        chatbotBody.scrollTop = chatbotBody.scrollHeight;
    }

    function addBotResponse(userMessage) {
        const botMessage = document.createElement('div');
        botMessage.classList.add('chatbot-message', 'bot');

        let response = "Lo siento, en este momento estoy en mantenimiento.";
        if (userMessage.toLowerCase() === "¿cuándo estará disponible?") {
            response = "Estaré disponible pronto. Gracias por tu paciencia.";
        }

        botMessage.innerHTML = `<p>${response}</p>`;
        chatbotBody.appendChild(botMessage);
        chatbotBody.scrollTop = chatbotBody.scrollHeight;
    }
});

// Cambiar a modo oscuro
document.addEventListener("DOMContentLoaded", function() {
        const themeToggle = document.getElementById('theme-toggle');
        const body = document.body;
        const sidebar = document.querySelector('.sidebar');

        themeToggle.addEventListener('click', function() {
            body.classList.toggle('dark-theme');
            sidebar.classList.toggle('dark-theme');

            // Guardar la preferencia de tema en localStorage
            if (body.classList.contains('dark-theme')) {
                localStorage.setItem('theme', 'dark');
            } else {
                localStorage.setItem('theme', 'light');
            }
        });

        // Cargar la preferencia de tema desde localStorage
        if (localStorage.getItem('theme') === 'dark') {
            body.classList.add('dark-theme');
            sidebar.classList.add('dark-theme');
        }
});

