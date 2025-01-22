<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real-Time Messaging</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
        }
        .chat-container {
            width: 400px;
            border: 1px solid #ccc;
            border-radius: 8px;
            overflow: hidden;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .chat-header {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 10px;
            font-size: 18px;
        }
        .chat-messages {
            height: 300px;
            overflow-y: auto;
            padding: 10px;
            background-color: #f9f9f9;
        }
        .chat-messages .message {
            margin-bottom: 10px;
            padding: 8px;
            border-radius: 5px;
        }
        .chat-messages .sent {
            background-color: #e0ffe0;
            text-align: right;
        }
        .chat-messages .received {
            background-color: #ffe0e0;
            text-align: left;
        }
        .chat-input {
            display: flex;
            padding: 10px;
            border-top: 1px solid #ccc;
        }
        .chat-input input[type="text"] {
            flex-grow: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 10px;
        }
        .chat-input button {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="chat-container">
        <div class="chat-header">Chat</div>
        <div id="chat-messages" class="chat-messages"></div>
        <div class="chat-input">
            <input type="text" id="message-input" placeholder="Type a message..." />
            <button onclick="sendMessage()">Send</button>
        </div>
    </div>
    <script src="../controller/messaging.js"></script>
</body>
</html>