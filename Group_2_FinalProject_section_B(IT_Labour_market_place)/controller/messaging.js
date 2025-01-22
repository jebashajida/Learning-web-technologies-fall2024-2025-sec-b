function fetchMessages() {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "getMessages.php", true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            const messages = JSON.parse(xhr.responseText);
            const messagesContainer = document.getElementById("chat-messages");
            messagesContainer.innerHTML = ""; 

            messages.forEach((msg) => {
                const messageDiv = document.createElement("div");
                messageDiv.className = `message ${msg.type}`; 
                messageDiv.textContent = msg.text;
                messagesContainer.appendChild(messageDiv);
            });
            messagesContainer.scrollTop = messagesContainer.scrollHeight;
        }
    };
    xhr.send();
}

function sendMessage() {
    const messageInput = document.getElementById("message-input");
    const messageText = messageInput.value.trim();

    if (messageText === "") {
        alert("Please type a message.");
        return;
    }

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "sendMessage.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.onload = function () {
        if (xhr.status === 200) {
            messageInput.value = ""; 
            fetchMessages(); 
        }
    };

    const messageData = { text: messageText, type: "sent" };
    xhr.send(JSON.stringify(messageData));
}

fetchMessages();
setInterval(fetchMessages, 3000);