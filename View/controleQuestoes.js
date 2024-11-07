window.onload = main;

var questaocorretas = 0;
var indiceAtual = 0;

function main() {
    document.getElementById("reinicia").addEventListener("click", reiniciar);
    document.getElementById("comeca").addEventListener("click", function() {
        exibirQuestao();
        document.getElementById("comeca").style.display = "none"; // Oculta o botão de começar
        document.getElementById("reinicia").style.display = "inline"; // Exibe o botão de reiniciar
    });
}

function reiniciar() {
    questaocorretas = 0;
    indiceAtual = 0;
    exibirQuestao();
}

function exibirQuestao() {
    var questoes = [
        {
            pergunta: "Quem é essa pessoa?",
            imagem: "../imgs/banner_Steve_Jobs.png",
            alternativas: [
                { option: "Elon Musk", resposta: false },
                { option: "Jeff Bezos", resposta: false },
                { option: "Bill Gates", resposta: false },
                { option: "Steve Jobs", resposta: true },
            ],
        },
        {
            pergunta: "Que peça de computador é essa?",
            imagem: "../imgs/memoria4.png",
            alternativas: [
                { option: "Memória RAM", resposta: true },
                { option: "Processador", resposta: false },
                { option: "Cooler", resposta: false },
                { option: "Mouse", resposta: false },
            ],
        },
        // Continue com as outras questões...
    ];

    var questaoAtual = questoes[indiceAtual];
    var questaoDiv = document.querySelector(".questao");

    questaoDiv.innerHTML = `
        <h3>Questão ${indiceAtual + 1}:</h3>
        <p>${questaoAtual.pergunta}</p>
        <img src="${questaoAtual.imagem}" alt="Imagem da pergunta" style="width: 75%; height: 60%;">
        <div class="alternativas">
            ${questaoAtual.alternativas.map((alternativa) => `
                <button class="alternativa" data-resposta="${alternativa.resposta}">${alternativa.option}</button>
            `).join("")}
        </div>
    `;

    var alternativas = document.querySelectorAll(".alternativa");
    alternativas.forEach((btn) => {
        btn.addEventListener("click", function () {
            var respostaCorreta = this.getAttribute("data-resposta") === "true";

            if (respostaCorreta) {
                questaocorretas++;
                alert("Resposta correta!");

                // Passa para a próxima questão
                if (indiceAtual < questoes.length - 1) {
                    indiceAtual++;
                    exibirQuestao(); // Chama exibirQuestao novamente para carregar a próxima questão
                } else {
                    // Fim do quiz
                    alert(`Quiz concluído! Você acertou ${questaocorretas} de ${questoes.length} questões.`);
                    alternativas.forEach((btn) => {
                        btn.disabled = true;
                    });
                }
            } else {
                alert("Resposta incorreta! O quiz será reiniciado.");
                reiniciar();
            }
        });
    });
}
