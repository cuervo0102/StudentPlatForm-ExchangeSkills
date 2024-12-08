<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Chat</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.5.0/axios.min.js"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <style>
        #chat-container {
            width: 60%;
            margin: auto;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
        }
        #messages {
            height: 300px;
            overflow-y: scroll;
            border: 1px solid #ccc;
            margin-bottom: 15px;
            padding: 10px;
            background: #f9f9f9;
        }
        #messages p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div id="chat-container">
        <div id="messages"></div>
        <textarea id="message-input" placeholder="Type your message..." rows="3" style="width: 100%;"></textarea>
        <button id="send-button" style="margin-top: 10px;">Send</button>
    </div>

    <script>
        // Initialize Pusher
        const pusher = new Pusher("{{ env('PUSHER_APP_KEY') }}", {
            cluster: "{{ env('PUSHER_APP_CLUSTER') }}",
            encrypted: true,
        });

        const channel = pusher.subscribe('chat');

        // Listen for 'message.sent' event
        channel.bind('message.sent', function (data) {
            displayMessage(data.message);
        });

        // Function to display a message
        function displayMessage(message) {
            const messagesDiv = document.getElementById('messages');
            const newMessage = document.createElement('p');
            newMessage.textContent = `${message.user.name}: ${message.message}`;
            messagesDiv.appendChild(newMessage);

            // Scroll to the bottom
            messagesDiv.scrollTop = messagesDiv.scrollHeight;
        }

        // Sending a message
        document.getElementById('send-button').addEventListener('click', function () {
            const input = document.getElementById('message-input');
            const message = input.value;

            if (message.trim() === '') {
                alert('Message cannot be empty!');
                return;
            }

            // Send message via Axios
            axios.post('/messages', { message: message })
                .then(() => {
                    input.value = ''; // Clear the input
                })
                .catch(err => {
                    console.error(err);
                    alert('Failed to send the message.');
                });
        });
    </script>
</body>
</html>
