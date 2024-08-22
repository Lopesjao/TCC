
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=HOME?>src/View/Css/estilo.css">
</head>
<body>
    <header>
        
    </header>

    <div class="container mt-5">
        <h1 class="text-center">Gerar relatórios em PDF</h1>
        <br>

        <div class="form-group text-center">
            <form method="POST" action="<?=HOME?>Resposta">
                <label for="comboboxPDF" class="d-block"><b>Ordenar o PDF por:</b></label>
                <div class="d-flex justify-content-center align-items-center">
                    <select id="comboboxPDF" name="options" class="form-control w-auto text-center mr-2">
                        <option id="ordemPDF" value="IdDado DESC" checked>Capturas recentes</option>
                        <option id="ordemPDF" value="IdDado ASC">Capturas antigas</option>
                        <option id="ordemPDF" value="TempDoAr DESC">Maior temperatura</option>
                        <option id="ordemPDF" value="TempDoAr ASC">Menor temperatura</option>
                        <option id="ordemPDF" value="UmidDoAr DESC">Maior umidade do ar</option>
                        <option id="ordemPDF" value="UmidDoAr ASC">Menor umidade do ar</option>
                        <option id="ordemPDF" value="PorUmidSolo DESC">Maior umidade do solo</option>
                        <option id="ordemPDF" value="PorUmidSolo ASC">Menor umidade do solo</option>
                    </select>
                </div>
                <button id="btnGerarPDF" name="btnGerarPDF" class="btn btn-secondary">Gerar PDF</button>
            </form>
        </div>

        <br>

        <form method="POST" action="<?=HOME?>Resposta">
            <div class="form-group text-center">
                <label for="pesquisar"><b>Gerar o PDF entre as datas:</b></label>
                <div class="form-row justify-content-center">
                    <div class="col-md-3">
                        <label for="diaInicio">No dia</label>
                        <input type="date" id="diaInicioPDF" name="diaInicio" class="form-control text-center" required>
                    </div>
                    <div class="col-md-3">
                        <label for="diaFinal">até o dia</label>
                        <input type="date" id="diaFinalPDF" name="diaFinal" class="form-control text-center" required>
                    </div>
                    <div class="col-md-3">
                        <label for="horaInicio">às</label>
                        <input type="time" id="horaInicioPDF" name="horaInicio" class="form-control text-center" required>
                    </div>
                    <div class="col-md-3">
                        <label for="horaFinal">até às</label>
                        <input type="time" id="horaFinalPDF" name="horaFinal" class="form-control text-center" required>
                    </div>
                </div>
            </div>

            <div class="form-group text-center">
                <button id="btnGerarPDFDia" name="btnGerarPDFDia" class="btn btn-primary mt-2">Gerar PDF por data</button>
            </div>
        </form>

        <div id="pasteHere" class="mt-4"></div>
    </div>

    <script src="<?=HOME?>src/View/Js/jquery-3.7.1.min.js"></script>
    <script src="<?=HOME?>src/View/Js/toast.js"></script>
    <script src="<?=HOME?>src/View/Js/comandosAjax.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>