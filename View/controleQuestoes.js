window.onload = main;

var questaocorretas = 0;
var indiceAtual = 0;

function main() {
  document.getElementById("reinicia").addEventListener("click", reiniciar);
  document.getElementById("comeca").addEventListener("click", function () {
    exibirQuestao();
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
      pergunta:
        "Se o computador não liga, qual deve ser uma das primeiras verificações a serem feitas?",
      alternativas: [
        {
          option: "Verificar se o computador está ligado na tomada",
          resposta: true,
        },
        { option: "Substituir a memória RAM", resposta: false },
        { option: "Atualizar os drivers do processador", resposta: false },
        { option: "Desfragmentar o disco rígido", resposta: false },
      ],
    },
    {
      pergunta:
        "Se o computador liga, mas após alguns segundos desliga, qual pode ser a causa?",
      alternativas: [
        {
          option: "Verificar se a fonte de alimentação tem potência suficiente",
          resposta: true,
        },
        { option: "Ajustar a resolução do monitor", resposta: false },
        { option: "Verificar os drivers de áudio", resposta: false },
        { option: "Trocar o cabo de rede", resposta: false },
      ],
    },
    {
      pergunta: "Se o monitor não exibe vídeo, qual é uma possível causa?",
      alternativas: [
        { option: "Cabo de vídeo com mau contato", resposta: true },
        { option: "Computador com vírus", resposta: false },
        { option: "Problema no processador", resposta: false },
        { option: "Falha no disco rígido", resposta: false },
      ],
    },
    {
      pergunta:
        "Qual ação pode corrigir um computador que se desconecta frequentemente da internet?",
      alternativas: [
        { option: "Atualizar os drivers de rede", resposta: true },
        { option: "Substituir a placa gráfica", resposta: false },
        { option: "Reinstalar o sistema operacional", resposta: false },
        { option: "Trocar o teclado", resposta: false },
      ],
    },
  ];

  var questaoAtual = questoes[indiceAtual];
  var questaoDiv = document.querySelector(".questao");

  questaoDiv.innerHTML = `
    <h3>Questão ${indiceAtual + 1}:</h3>
    <p>${questaoAtual.pergunta}</p>
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
