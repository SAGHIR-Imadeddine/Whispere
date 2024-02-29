import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


// import axios from 'axios';

// const form = document.getElementById('form');
// const message = document.getElementById('message');
// const friendId = document.getElementById('friend_id');


// const list = document.getElementById('messages');


// function createMessageElement(messageContent, isSent = true) {
//     const messageClass = isSent ? "right" : "left";
//     const avatarColorClass = isSent ? "bg-indigo-500" : "bg-green-500";
//     const messageElement = document.createElement('div');
//     messageElement.className = `col-start-6 col-end-13 p-3 rounded-lg ${messageClass}`;
//     const innerDivElement = document.createElement('div');
//     innerDivElement.className = `flex items-center justify-start flex-row-${isSent ? 'reverse' : 'start'}`;
//     const avatarDivElement = document.createElement('div');
//     avatarDivElement.className = `flex items-center justify-center h-10 w-10 rounded-full ${avatarColorClass} flex-shrink-0`;
//     avatarDivElement.textContent = 'A'; 
//     const contentDivElement = document.createElement('div');
//     contentDivElement.className = "relative mr-3 text-sm bg-indigo-100 py-2 px-4 shadow rounded-xl";
//     contentDivElement.innerHTML = `<div>${messageContent}</div>`;
//     innerDivElement.appendChild(avatarDivElement);
//     innerDivElement.appendChild(contentDivElement);
//     messageElement.appendChild(innerDivElement);
//     return messageElement;
// }


// form.addEventListener('submit', function (event) {
//     event.preventDefault();
//     const userInput = message.value;
//     const friendId = document.getElementById('friend_id').value;
//     const imageInput = document.getElementById('image');
//     const imageFile = imageInput.files[0];

//     // Create FormData to handle file upload
//     const formData = new FormData();
//     formData.append('content', userInput);
//     formData.append('friend_id', friendId);
//     formData.append('image', imageFile);

//     axios.post('/broadcast', formData, {
//         headers: {
//             'Content-Type': 'multipart/form-data'
//         }
//     })
//     .then(response => {
//         console.log('Successfully processed form submission on the server:', response.data);
//         const newMessageElement = createMessageElement(response.data);
//         list.appendChild(newMessageElement);
//         message.value = "";
//         imageInput.value = ""; 
//         window.scrollTo(0, document.body.scrollHeight);
//     })
//     .catch(error => {
//         console.log("Error posting message:", error);
//     });
// });


// window.Echo.private(`private-chat.${friendId}`)
//     .listen('.chat-message',(e)=>{
//         console.log(e);
//         const message = e.message;
//         // Création de l'élément div avec les classes spécifiées
//         const divCol = document.createElement('div');
//         divCol.className = 'col-start-1 col-end-8 w-50 p-3 rounded-lg';

//         // Création de l'élément div contenant les éléments enfants
//         const divFlexRow = document.createElement('div');
//         divFlexRow.className = 'flex flex-row w-50 items-start';

//         // Création de l'élément cercle avec la lettre "A"
//         const divCircle = document.createElement('div');
//         divCircle.className = 'flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0';
//         divCircle.textContent = e.user.name; // Contenu texte

//         // Création de l'élément div contenant le texte
//         const divTextContainer = document.createElement('div');
//         divTextContainer.className = 'relative ml-3 text-sm bg-white py-2 px-4 shadow rounded-xl';

//         // Création de l'élément texte
//         const divText = document.createElement('div');
//         divText.textContent = message; // Contenu texte

//         // Ajout des éléments enfants dans leur parent respectif
//         divTextContainer.appendChild(divText);
//         divFlexRow.appendChild(divCircle);
//         divFlexRow.appendChild(divTextContainer);
//         divCol.appendChild(divFlexRow);

//         list.appendChild(divCol);


//     })

