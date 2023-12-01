

$(document).ready(function () {
    var bairroSelect2 = $('#bairroSelect').select2({
        language: {
            noResults: function () {
                return "Nenhuma opção encontrada"; // Modifique conforme necessário
            }
        }
    });

    var estadoSelect2 = $('#estadoSelect').select2({
        language: {
            noResults: function () {
                return "Nenhuma opção encontrada"; // Modifique conforme necessário
            }
        }


    });
    var cidadeSelect2 = $('#cidadeSelect').select2({
        language: {
            noResults: function () {
                return "Nenhuma opção encontrada"; // Modifique conforme necessário
            }
        }


    });
    estadoSelect2.on('change', function () {
        atualizarCidades();
    });

    // Ao mudar a cidade, atualize os bairros
    cidadeSelect2.on('change', function () {
        atualizarBairros();
    });
    function atualizarCidades() {
        var estadoSelecionado = estadoSelect2.val();
        var cidadeSelect = $('#cidadeSelect');
        // Limpar todas as opções do select
        cidadeSelect.empty().trigger('change');

        if (estadoSelecionado === 'São Paulo') {
            // Adicionar opções de raça para cachorro
            var cidadesSP = ['São Paulo', 'Campinas', 'Guarulhos', 'Sorocaba', 'Santos', 'Ribeirão Preto', 'Osasco', 'Jundiaí', 'São José dos Campos', 'Barueri', 'Diadema', 'Mauá', 'Carapicuíba', 'Piracicaba', 'Bauru', 'Itaquaquecetuba', 'São Vicente', 'Franca', 'São Bernardo do Campo', 'Santo André', 'Taubaté', 'Jacareí', 'Limeira', 'Embu das Artes', 'Suzano', 'Taboão da Serra', 'Sumaré', 'Hortolândia', 'Indaiatuba', 'Nova Odessa', 'Americana', 'Santa Bárbara d\'Oeste', 'Jaguariúna', 'Valinhos', 'Itu', 'Salto', 'Pirassununga', 'Mogi Guaçu', 'Mogi Mirim', 'Araraquara', 'Jaú', 'Brotas', 'São Carlos', 'Batatais', 'Ribeirão Pires', 'Rio Claro', 'Votorantim', 'Assis', 'Presidente Prudente', 'Marília', 'Ourinhos', 'Tupã', 'Bragança Paulista', 'Atibaia', 'Itatiba', 'Jundiaí', 'Vinhedo', 'Itu', 'Louveira', 'Araçatuba', 'Andradina', 'Birigui', 'Penápolis', 'São José do Rio Preto', 'Catanduva', 'Votuporanga', 'Franco da Rocha', 'Caieiras', 'Cajamar', 'Campo Limpo Paulista', 'Itupeva', 'Louveira', 'Jarinu', 'Valinhos', 'Vinhedo', 'Indaiatuba', 'Elias Fausto', 'Monte Mor', 'Nova Odessa', 'Sumaré', 'Paulínia', 'Cosmópolis', 'Artur Nogueira', 'Holambra', 'Jaguariúna', 'Pedreira', 'Amparo', 'Serra Negra', 'Águas de Lindoia', 'Socorro', 'Lindóia', 'Jaboticabal', 'Bebedouro', 'Catanduva', 'Matão', 'Barretos', 'Jales', 'Santa Fé do Sul', 'Fernandópolis', 'Mirassol']

            for (var i = 0; i < cidadesSP.length; i++) {
                cidadeSelect.append(new Option(cidadesSP[i], cidadesSP[i]));
            }
        } else if (estadoSelecionado === 'Rio de Janeiro') {
            var cidadesRJ = ['Rio de Janeiro', 'Belford Roxo', 'Niterói', 'São Gonçalo', 'Duque de Caxias', 'Nova Iguaçu', 'São João de Meriti', 'Campos dos Goytacazes', 'Petrópolis', 'Volta Redonda', 'Macaé', 'Itaboraí', 'Angra dos Reis', 'Magé', 'Teresópolis', 'Nova Friburgo', 'Queimados', 'Resende', 'Maricá', 'Barra Mansa', 'Cabo Frio', 'Nilópolis', 'Araruama', 'Mesquita', 'Barra do Piraí', 'Três Rios', 'Guapimirim', 'Rio das Ostras', 'Seropédica', 'Valença', 'Itaguaí', 'Japeri', 'Saquarema', 'São Pedro da Aldeia', 'Tanguá', 'Paracambi', 'Santo Antônio de Pádua', 'Rio Bonito', 'Itaperuna', 'Sapucaia', 'Paraíba do Sul', 'Cachoeiras de Macacu', 'Piraí', 'Miracema'];
            for (var i = 0; i < cidadesRJ.length; i++) {
                cidadeSelect.append(new Option(cidadesRJ[i], cidadesRJ[i]));
            }
        }
        cidadeSelect.trigger('change');
    }
    function atualizarBairros() {
        var bairroSelect = $('#bairroSelect');
        var EstadoSelecionado = estadoSelect2.val();
        var cidadeSelecionada = $('#cidadeSelect').val();
        // Limpar todas as opções do select
        bairroSelect.empty().trigger('change');

        if (EstadoSelecionado === 'São Paulo') {
            if (cidadeSelecionada === 'Sorocaba') {
                // Adicionar opções de raça para cachorro
                var bairrosSO = ['Além Ponte', 'Alexandrina', 'Altos do Ipanema', 'Barcelona', 'Boa Vista', 'Caguassu', 'Campolim', 'Central Parque', 'Éden', 'Jardim Europa', 'Jardim Maria do Carmo', 'Jardim Novo Horizonte', 'Jardim Prestes de Barros', 'Júlio de Mesquita Filho', 'Mangal', 'Nova Sorocaba', 'Parque São Bento', 'Parque Três Meninos', 'Vila Amato', 'Vila Barão', 'Vila Carvalho', 'Vila Fiori', 'Vila Helena', 'Vila Jardini', 'Vila Olimpia', 'Vila Santana', 'Vila Trujillo', 'Wanel Ville', 'Vila Progresso', 'Jardim Simus', 'Jardim Santa Rosália', 'Vila Lucy', 'Vila São Caetano', 'Vila Hortência', 'Jardim Pagliato', 'Vila Colorau', 'Vila Leopoldina', 'Jardim Iguatemi', 'Jardim Abaeté', 'Vila Haro', 'Jardim Vera Cruz', 'Vila São João', 'Jardim Saira', 'Vila São Guilherme', 'Jardim Rodrigo', 'Vila Assis', 'Jardim Camila', 'Jardim América', 'Vila Olimpia', 'Jardim Santo Amaro', 'Vila Planalto', 'Vila Santana', 'Jardim Santa Marta', 'Jardim Simus', 'Vila São Paulo', 'Vila Haro', 'Jardim Vera Cruz', 'Vila São João', 'Vila Lucy', 'Jardim Saira', 'Vila São Caetano', 'Jardim São Guilherme', 'Jardim Rodrigo', 'Vila Assis', 'Jardim Camila', 'Vila Fiori', 'Jardim América', 'Vila Olimpia', 'Jardim Santo Amaro'];
                for (var i = 0; i < bairrosSO.length; i++) {
                    bairroSelect.append(new Option(bairrosSO[i], bairrosSO[i]));
                }
            }
            else if (cidadeSelecionada === 'Votorantim') {
                var bairrosVO = ['Avenida Principal'];
                for (var i = 0; i < bairrosVO.length; i++) {
                    bairroSelect.append(new Option(bairrosVO[i], bairrosVO[i]));
                }
            }
        } else if (EstadoSelecionado === 'Rio de Janeiro') {
            if (cidadeSelecionada === 'Rio de Janeiro') {
                // Adicionar opções de raça para cachorro
                var bairrosRJ = ['Copacabana', 'Rocinha'];
                for (var i = 0; i < bairrosRJ.length; i++) {
                    bairroSelect.append(new Option(bairrosRJ[i], bairrosRJ[i]));
                }
            }
            bairroSelect.trigger('change');
        }

    }
});
