let tabela = document.getElementsByTagName("tabela");
console.log(tabela);
for (let i = 0; i < tabela.length; i++) {
    let tab = tabela[i];
    let linhas = tab.getAttribute("linha");
    let colunas = tab.getAttribute("coluna");


    let expandAttr = tab.getElementsByTagName("expand");
    let dadosTag = tab.getElementsByTagName("dados")[0];
    let dados = [];
    let matriz = [];
    for (let w = 0; w < expandAttr.length; w++) {
        matriz.push([
            Number(expandAttr[w].getAttribute("linha")),
            Number(expandAttr[w].getAttribute("coluna")),
            Number(expandAttr[w].getAttribute("tamanho")),
            expandAttr[w].getAttribute("tipo")

        ]);
    }

    let verificar_tabela = false;

    if (linhas == null || colunas == null) {
        verificar_tabela = true;
    }

    let erroDados = false;

    if (dadosTag) {
        let texto = dadosTag.textContent.trim();
        console.log("Texto :" + texto);
        let linhaDados = texto.split("\n");
        console.log("Texto sem ENTER :" + linhaDados);
        for (let linha of linhaDados) {
            let colunas = linha.split("|");
            console.log("Colunas: " + colunas)
            dados.push(colunas.map(c => c.trim()));
        }
        console.log("Vetor : " + dados);

        if (dados.length > linhas) {
            erroDados = true;
        }

        for (let d = 0; d < dados.length; d++) {
            if (dados[d].length > colunas) {
                erroDados = true;
            }

        }
    }


    let novaTabela;

    console.log(matriz)
    for (let j = 0; j < matriz.length; j++) {
        let linhaInicial = Number(matriz[j][0]);
        let colunaInicial = Number(matriz[j][1]);
        let span = Number(matriz[j][2]);
        let tipo = matriz[j][3];

        if ((tipo == "coluna" && colunaInicial + span > colunas) || (tipo == "linha" && linhaInicial + span > linhas)) {
            verificar_tabela = true;
        }
    }

    if (verificar_tabela || erroDados) {
        let aviso = document.createElement("p");
        aviso.innerText = "Há um problema com as informações fornecidas";
        tab.appendChild(aviso);
        continue;
    } else {
        novaTabela = document.createElement("table");
    }


    let bordaAttr = tab.getAttribute("borda");
    let vetBorda = bordaAttr.split(" ");
    novaTabela.style.setProperty('--cor-borda', vetBorda[2]);
    novaTabela.style.setProperty('--tipo-borda', vetBorda[1]);
    novaTabela.style.setProperty('--tamanho-borda', vetBorda[0]);

    let ocupado = [];
    for (let a = 0; a < linhas; a++) {
        ocupado[a] = [];
    }

    console.log(ocupado);

    for (let x = 0; x < linhas; x++) {
        let tr = document.createElement("tr");
        for (let y = 0; y < colunas; y++) {
            if (ocupado[x][y]) continue;
            let td = document.createElement("td");
            ocupado[x][y] = true;
            if (dados[x] && dados[x][y]) {
                td.innerText = dados[x][y];
            }
            let span = 1;
            let tipo = null
            for (let k = 0; k < matriz.length; k++) {
                if (matriz[k][0] == x && matriz[k][1] == y) {
                    span = matriz[k][2];
                    tipo = matriz[k][3];
                    break;
                }
            }
            if (span > 1) {
                if (tipo == "linha") {
                    td.setAttribute("rowspan", span);

                    for (let r = 1; r < span; r++) {
                        ocupado[x + r][y] = true;
                    }
                } if (tipo == "coluna") {
                    td.setAttribute("colspan", span);
                    y += span - 1;
                }
            }
            tr.appendChild(td);

        }
        novaTabela.appendChild(tr);

    }
    tab.appendChild(novaTabela);
    console.log(ocupado)
}