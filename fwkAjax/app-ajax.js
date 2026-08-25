document.addEventListener('DOMContentLoaded', () => {
    const elementos = document.querySelectorAll('[app-url]');
    elementos.forEach((elem) => {
        const url = elem.getAttribute('app-url');
        const targetId = elem.getAttribute('app-target');
        const evento = elem.getAttribute('app-event') || 'click';

        elem.addEventListener(evento, async (e) => {
            if (elem.tagName === 'A' || elem.tagName === 'FORM')
                e.preventDefault();
            let urlFinal = url;
            if(elem.name && elem.value !== undefined)
                urlFinal= url + "?" + elem.name + "=" + encodeURIComponent(elem.value); 
            try {
                const resposta = await fetch(urlFinal);
                const conteudoHtml = await resposta.text();
                const elementoAlvo = document.querySelector(targetId);
                if (elementoAlvo) {
                    elementoAlvo.innerHTML = conteudoHtml;
                } else {
                    console.error('O elemento ' + targetId + ' não existe');
                }

            } catch (erro) {
                console.error('Falha ao buscar dados');
            }
        });

    });
})