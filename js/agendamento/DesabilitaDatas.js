document.addEventListener('DOMContentLoaded', function () {
    const dataInput = document.getElementById('data');

    // Obter a data atual no formato "YYYY-MM-DD"
    const dataAtual = new Date().toISOString().split('T')[0];

    // Adicionar 2 semanas à data atual
    let dataMaxima = new Date();
    dataMaxima.setDate(dataMaxima.getDate() + 14);
    dataMaxima = dataMaxima.toISOString().split('T')[0];

    // Criar um array de datas desabilitadas que inclui todas as condições
    const datasDesabilitadas = criarDatasDesabilitadas(dataAtual, dataMaxima);

    dataInput.min = dataAtual;
    dataInput.max = dataMaxima;

    dataInput.addEventListener('input', function () {
      const dataSelecionada = dataInput.value;

      // Verificar se a data selecionada está na lista de datas desabilitadas
      if (datasDesabilitadas.includes(dataSelecionada)) {
        dataInput.setCustomValidity('Esta data está desabilitada.');
      } else {
        dataInput.setCustomValidity('');
      }
    });
  });
  function criarDatasDesabilitadas(dataAtual, dataMaxima) {
    const datasDesabilitadas = [];
    const dataAtualObj = new Date(dataAtual);
    const dataMaximaObj = new Date(dataMaxima);

    // Adicionar datas antes de dataAtual
    const umDiaEmMilissegundos = 24 * 60 * 60 * 1000;
    for (let data = new Date(dataAtualObj); data >= new Date('1970-01-01'); data.setTime(data.getTime() - umDiaEmMilissegundos)) {
      datasDesabilitadas.push(data.toISOString().split('T')[0]);
    }

    // Adicionar datas depois de dataMaxima
    for (let data = new Date(dataMaximaObj); data <= new Date('2100-12-31'); data.setTime(data.getTime() + umDiaEmMilissegundos)) {
      datasDesabilitadas.push(data.toISOString().split('T')[0]);
    }

    // Adicionar domingos no intervalo de datas

    return datasDesabilitadas;
  }