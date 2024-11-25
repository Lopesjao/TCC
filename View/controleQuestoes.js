window.onload = main;

var questaocorretas = 0;
var indiceAtual = 0;
var questoesSelecionadas = [];

function main() {
  const btnReiniciar = document.getElementById("reinicia");
  const btnComecar = document.getElementById("comeca");

  // Adiciona evento ao botão "Reiniciar"
  btnReiniciar.addEventListener("click", reiniciar);

  // Adiciona evento ao botão "Começar"
  btnComecar.addEventListener("click", function () {
    iniciarQuiz();
    btnComecar.style.display = "none"; // Esconde o botão "Começar"
    btnReiniciar.style.display = "inline"; // Exibe o botão "Reiniciar"
  });
}

function iniciarQuiz() {
  questaocorretas = 0;
  indiceAtual = 0;
  questoesSelecionadas = selecionarQuestoesAleatorias(); // Seleciona 5 questões aleatórias
  exibirQuestao();
}

function reiniciar() {
  iniciarQuiz(); // Reinicia o quiz com novas questões
}

function exibirQuestao() {
  var questaoAtual = questoesSelecionadas[indiceAtual];
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
      if (indiceAtual < questoesSelecionadas.length - 1) {
        indiceAtual++; // Incrementa o índice para a próxima questão
        exibirQuestao(); // Recarrega a próxima questão
      } else {
        // Fim do quiz
        alert(
          `Quiz concluído! Você acertou ${questaocorretas} de ${questoesSelecionadas.length} questões.`
        );
        alternativas.forEach((btn) => {
          btn.disabled = true; // Desabilita os botões após o fim do quiz
        });
      }
    });
  }
}

// Função para embaralhar o array de questões
function embaralharArray(array) {
  for (let i = array.length - 1; i > 0; i--) {
    const j = Math.floor(Math.random() * (i + 1));
    [array[i], array[j]] = [array[j], array[i]];
  }
  return array;
}

// Função para selecionar 5 questões aleatórias
function selecionarQuestoesAleatorias() {
  var questoes = [
    {
      pergunta: "Qual ação pode corrigir um mouse que não está funcionando?",
      alternativas: [
        { option: "Substituir o driver de vídeo", resposta: false },
        { option: "Verificar se o cabo está conectado corretamente", resposta: true },
        { option: "Limpar o cache do navegador", resposta: false },
        { option: "Ajustar a configuração de idioma no painel de controle", resposta: false },
      ],
    },
    {
      pergunta: "O que pode ser feito se o computador não inicializa o sistema operacional?",
      alternativas: [
        { option: "Restaurar ou reinstalar o sistema operacional", resposta: true },
        { option: "Atualizar o antivírus", resposta: false },
        { option: "Verificar os cabos do monitor", resposta: false },
        { option: "Limpar as memórias RAM com borracha", resposta: false },
      ],
    },
    {
      pergunta: "Se o computador não liga, qual deve ser uma das primeiras verificações a serem feitas?",
      alternativas: [
        { option: "Verificar se o computador está ligado na tomada", resposta: true },
        { option: "Substituir a memória RAM", resposta: false },
        { option: "Atualizar os drivers do processador", resposta: false },
        { option: "Desfragmentar o disco rígido", resposta: false },
      ],
    },
    {
      pergunta: "Se o computador liga, mas após alguns segundos desliga, qual pode ser a causa?",
      alternativas: [
        { option: "Verificar se a fonte de alimentação tem potência suficiente", resposta: true },
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
      pergunta: "Qual ação pode corrigir um computador que se desconecta frequentemente da internet?",
      alternativas: [
        { option: "Atualizar os drivers de rede", resposta: true },
        { option: "Substituir a placa gráfica", resposta: false },
        { option: "Reinstalar o sistema operacional", resposta: false },
        { option: "Trocar o teclado", resposta: false },
      ],
    },
  ];

  return embaralharArray(questoes).slice(0, 5); // Embaralha as questões e seleciona 5
}
