window.onload = main;

$(document).ready(main);

var questaocorretas = 0;
var indiceAtual = 0;

function main() {
  alert("oi");

  $("#creditos").click(function () {
    creditos();
  });

  $("#segredo").click(function () {
    mostravideo();
  });

  
  $("#som").click(function () {
    som();
  });

  $("#instrucao").click(function () {
    comojogar();
  });

  $("#reinicia").click(function () {
    reiniciar();
  });
}
function mostravideo(){
  //document.getElementById("video").style.visibility="visible";
  document.getElementById("video").style.display="block";
}

function som(){
    var somligado = true;
    var audio = document.getElementById("Audio");
    //var audio2 = document.getElementById("Audioerrou");
   // var audio3 = document.getElementById("Audioacertou");
 //if(somligado===true){
   // audio.pause();
    //somligado=false;
  //}audio.play();
    
}

function reiniciar() {
  // var audio2 = document.getElementById('Audio2');
  // audio2.play();
  location.reload();
}

function creditos() {
  const modal = document.querySelectorAll("#modal1");
  const abrir = M.Modal.init(modal);
}

function comojogar() {
  const modal2 = document.querySelectorAll("#modal2");
  const abrir2 = M.Modal.init(modal2);
  /* funcao que mostra como jogar, pode ser popup tbm 
  dizeddo que para jogar tem q apertar o botao iniciar e escolher
  umas das 4 possiveis respostas que ira aparecer 
  
  */
}

document.addEventListener("DOMContentLoaded", function () {
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
      pergunta: "Quem peça de computador é essa ?",
      imagem: "../imgs/memoria4.png",
      alternativas: [
        { option: "Mémoria RAM", resposta: true },
        { option: "Processador ", resposta: false },
        { option: "Cooler", resposta: false },
        { option: "Mouse", resposta: false },
      ],
    },
    {
      pergunta: "Quem é essa pessoa ?",
      imagem: "../imgs/turing.jpg",
      alternativas: [
        { option: "Elon Musk", resposta: false },
        { option: "Alan Turing", resposta: true },
        { option: "Bill Gates", resposta: false },
        { option: "Steve Jobs", resposta: false },
      ],
    },

    {
      pergunta: "Qual o primeiro computador da história ?",
      imagem: "../imgs/eniac.jpg",
      alternativas: [
        { option: "Macintosh", resposta: false },
        { option: "ENIAC ", resposta: true },
        { option: "Apple 2", resposta: false },
        { option: "Windowns xp", resposta: false },
      ],
    },
    {
      pergunta: "Quem criou o facebook ?",
      imagem: "../imgs/facebook.jpg",
      alternativas: [
        { option: "Elon musk", resposta: false },
        { option: "Jorge ", resposta: false },
        { option: "Mark Zuckberg", resposta: true },
        { option: "Bill Gates", resposta: false },
      ],
    },
  
  ];

  function exibirQuestao() {
    //som
    var audio = document.getElementById("Audio");
    var audio2 = document.getElementById("Audioerrou");
    var audio3 = document.getElementById("Audioacertou");
  
    audio.play();


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
                  <button  class="alternativa" data-resposta="${alternativa.resposta}">${alternativa.option}</button>
              `
                )
                .join("")}
          </div>
      `;

    var alternativas = document.querySelectorAll(".alternativa");
    alternativas.forEach((btn) => {
      btn.addEventListener("click", function () {
        var respostaCorreta = this.getAttribute("data-resposta") === "true";

        if (respostaCorreta) {
          questaocorretas++;
          alert("Resposta correta!")
          //confirm("Resposta correta!");
         //setTimeout(audio3.play(),2000);
          // alternativas.disabled = true;

        } else {
          confirm("Resposta incorreta! Quiz reiniciado.");
          // errou();
         if(confirm){
            reiniciar();
         }
         // audio2.play();
         // audio2.currentTime = 5;
          
         
        }

        if (indiceAtual < questoes.length - 1 && confirm) {
          indiceAtual++;
          exibirQuestao();
        } else {
          alert(
            `Quiz concluído! Você acertou ${questaocorretas} de ${questoes.length} questões.`
          );
          alternativas.forEach((btn) => {
            btn.disabled = true;
          });          
        }
      });
    });
  }

  document.getElementById("comeca").addEventListener("click", function () {
    exibirQuestao();
    escondebotoes();
    //this.style.display = 'none';
  });
});

function escondebotoes() {
  document.getElementById("reinicia").style.visibility = "visible";
  document.getElementById("texto").style.display = "none";
  document.getElementById("comeca").style.display = "none";
  document.getElementById("creditos").style.display = "none";
  document.getElementById("instrucao").style.display = "none";
}
function errou() {
  var audio2 = document.getElementById("Audio2");
  var audio = document.getElementById("Audio");
  audio.stop();
  audio2.play();
}
function acertou() {
  var audio3 = document.getElementById("Audio3");
  audio.stop();
  audio3.play();
}

   /* var respostaCorreta = this.getAttribute('data-resposta') === 'true';

    if (respostaCorreta) {
        alert("Resposta correta!");
    } else {
        alert("Resposta incorreta. Tente novamente.");
    }

    indiceAtual++;
    if (indiceAtual < questoes.length) {
        exibirQuestao();
    } else {
        alert("Quiz concluído!");
    }
}


proxima questao{
           var respostaCorreta = this.getAttribute('data-resposta') === 'true';

              if (respostaCorreta) {
                  alert("Resposta correta!");
              } else {
                  alert("Resposta incorreta. Tente novamente.");
              }

              indiceAtual++;
              if (indiceAtual < questoes.length) {
                  exibirQuestao();
              } else {
                  alert("Quiz concluído!");
              }
}


const questions = [
  {
      question: "Quem criou a apple?",
      options: ["Bill Gates", "Steve Jobs", "Alex Marin", "Elon Musk"],
      correctAnswer: "Steve Jobs"
  },
  {
      question: "Quem da aula de banco de dados?",
      options: ["Alex Marin", "Gustavo Risseti", "Eliana Zen", "Jorge rei delas"],
      correctAnswer: "Alex Marin"
  }
];

*/