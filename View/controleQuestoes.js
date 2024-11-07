window.onload = main;

var questaocorretas = 0;
var indiceAtual = 0;

function main() {
  document.getElementById("reinicia").addEventListener("click", reiniciar);
  document.getElementById("comeca").addEventListener("click", function () {
    exibirQuestao();
    //document.getElementById("comeca").style.display = "none";
    //document.getElementById("reinicia").style.display = "inline";
  });
}

function reiniciar() {
  questaocorretas = 0;
  indiceAtual = 0;
  exibirQuestao(); // Recarrega a primeira questão
  document.getElementById("reinicia").style.display = "none";
  document.getElementById("comeca").style.display = "inline";
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
  ];

  var questaoAtual = questoes[indiceAtual];
  var questaoDiv = document.querySelector(".questao");

  questaoDiv.innerHTML = `
    <h3>Questão ${indiceAtual + 1}:</h3>
    <p>${questaoAtual.pergunta}</p>
    <img src="${
      questaoAtual.imagem
    }" alt="Imagem da pessoa" style="width: 75%; height: 60%;">
    <div class="alternativas">
        ${questaoAtual.alternativas
          .map(
            (alternativa) => `
            <button class="alternativa" data-resposta="${alternativa.resposta}">${alternativa.option}</button>
        `
          )
          .join("")}
    </div>
  `;

  var alternativas = document.querySelectorAll(".alternativa");

  // Verificando se as alternativas foram carregadas corretamente
  console.log(alternativas);

  for (var i = 0; i < alternativas.length; i++) {
    var btn = alternativas[i];
    btn.addEventListener("click", function () {
      var respostaCorreta = this.getAttribute("data-resposta") === "true";

      if (respostaCorreta) {
        questaocorretas++;
        alert("Resposta correta!");
      } else {
        var reiniciarQuiz = confirm(
          "Resposta incorreta! Deseja reiniciar o quiz?"
        );
        if (reiniciarQuiz) {
          reiniciar();
          return; // Retorna para evitar avançar para a próxima questão
        } else {
          return; // Caso o usuário não queira reiniciar, termina a função
        }
      }

      // Avançando para a próxima questão
      if (indiceAtual < questoes.length - 1) {
        indiceAtual++; // Incrementa o índice para a próxima questão
        exibirQuestao(); // Recarrega a próxima questão
      } else {
        // Fim do quiz
        alert(
          `Quiz concluído! Você acertou ${questaocorretas} de ${questoes.length} questões.`
        );
        alternativas.forEach((btn) => {
          btn.disabled = true; // Desabilita os botões após o fim do quiz
        });
      }
    });
  }
}
