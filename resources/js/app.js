import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import axios from 'axios';
const form = document.getElementById('form');
const message = document.getElementById('message');
const list = document.getElementById('list');
const idR = document.getElementById('idR');
const idS = document.getElementById('idS');
const conv = document.getElementById('conv');
const ayoub = idR.value;
const safa = idS.value;
console.log(ayoub);
console.log(safa);


form.addEventListener('submit',function(event){
    
  event.preventDefault();
    const userInput = message.value;
    const di = idR.value;
    const dii = idS.value;
    const diii = conv.value;
    axios.post('/chat-message',{
        message : userInput,
        idR : di,
        idS : dii,
        conv : diii
    })
    const divCol = document.createElement('div');
        divCol.className = ' col-start-1 col-end-8 p-3 rounded-lg w-50';

        // Création de l'élément div contenant les éléments enfants
        const divFlexRow = document.createElement('div');
        divFlexRow.className = 'flex flex-row items-center w-50';

        // Création de l'élément cercle avec la lettre "A"
        const divCircle = document.createElement('div');
        divCircle.className = 'flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0 text-xs text-center';
        divCircle.textContent = 'Me'; // Contenu texte

        // Création de l'élément div contenant le texte
        const divTextContainer = document.createElement('div');
        divTextContainer.className = 'relative ml-3 text-sm bg-white py-2 px-4 shadow rounded-xl';

        // Création de l'élément texte
        const divText = document.createElement('div');
        divText.textContent = userInput; // Contenu texte

        // Ajout des éléments enfants dans leur parent respectif
        divTextContainer.appendChild(divText);
        divFlexRow.appendChild(divCircle);
        divFlexRow.appendChild(divTextContainer);
        divCol.appendChild(divFlexRow);

        list.appendChild(divCol);

    message.value="";
})



    window.Echo.private(`private.chat.${safa}.${ayoub}`)
    .listen('.chat-message',(e)=>{
        console.log(e);
        const message = e.message;
        // Création de l'élément div avec les classes spécifiées
        const divCol = document.createElement('div');
        divCol.className = 'col-start-6 col-end-13 p-3 rounded-lg';

        // Création de l'élément div contenant les éléments enfants
        const divFlexRow = document.createElement('div');
        divFlexRow.className = 'flex items-center justify-start flex-row-reverse';

        // Création de l'élément cercle avec la lettre "A"
        const divCircle = document.createElement('div');
        divCircle.className = 'flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0 text-xs text-center';
        divCircle.textContent = e.user.name; // Contenu texte

        // Création de l'élément div contenant le texte
        const divTextContainer = document.createElement('div');
        divTextContainer.className = 'relative mr-3 text-sm bg-indigo-100 py-2 px-4 shadow rounded-xl';

        // Création de l'élément texte
        const divText = document.createElement('div');
        divText.textContent = message; // Contenu texte

        // Ajout des éléments enfants dans leur parent respectif
        divTextContainer.appendChild(divText);
        divFlexRow.appendChild(divCircle);
        divFlexRow.appendChild(divTextContainer);
        divCol.appendChild(divFlexRow);

        list.appendChild(divCol);


    })
    window.Echo.private(`private.chat.${ayoub}.${safa}`)
    .listen('.chat-receive',(e)=>{
        console.log(e);
        const message = e.message;
        // Création de l'élément div avec les classes spécifiées
        const divCol = document.createElement('div');
        divCol.className = 'col-start-6 col-end-13 p-3 rounded-lg';

        // Création de l'élément div contenant les éléments enfants
        const divFlexRow = document.createElement('div');
        divFlexRow.className = 'flex items-center justify-start flex-row-reverse';

        // Création de l'élément cercle avec la lettre "A"
        const divCircle = document.createElement('div');
        divCircle.className = 'flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0 text-xs text-center';
        divCircle.textContent = e.user.name; // Contenu texte

        // Création de l'élément div contenant le texte
        const divTextContainer = document.createElement('div');
        divTextContainer.className = 'relative mr-3 text-sm bg-indigo-100 py-2 px-4 shadow rounded-xl';

        // Création de l'élément texte
        const divText = document.createElement('div');
        divText.textContent = message; // Contenu texte

        // Ajout des éléments enfants dans leur parent respectif
        divTextContainer.appendChild(divText);
        divFlexRow.appendChild(divCircle);
        divFlexRow.appendChild(divTextContainer);
        divCol.appendChild(divFlexRow);

        list.appendChild(divCol);


    })
