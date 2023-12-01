

function formatCNPJ(input) {

    let value = input.value.replace(/\D/g, "");


    if (value.length >= 2) {
        value = value.substring(0, 2) + "." + value.substring(2);
    }
    if (value.length >= 6) {
        value = value.substring(0, 6) + "." + value.substring(6);
    }
    if (value.length >= 10) {
        value = value.substring(0, 10) + "/" + value.substring(10);
    }
    if (value.length >= 15) {
        value = value.substring(0, 15) + "-" + value.substring(15);
    }


    input.value = value;
}

function formatDinheiro(input) {

    let value = input.value.replace(/\D/g, "");
    let formattedValue = "";

    // Adiciona a máscara
    if (value.length >= 0) {

        formattedValue = "R$" + value;
    }
    input.value = formattedValue;
}

function formatTelefone(input) {
    let value = input.value.replace(/\D/g, "");
    let formattedValue = "";

    if (value.length <= 2) {
        formattedValue = "(" + value;
    } else if (value.length <= 6) {
        formattedValue = "(" + value.substring(0, 2) + ") " + value.substring(2);
    } else if (value.length <= 10) {
        formattedValue = "(" + value.substring(0, 2) + ") " + value.substring(2, 6) + "-" + value.substring(6);
    } else {
        formattedValue = "(" + value.substring(0, 2) + ") " + value.substring(2, 6) + "-" + value.substring(6, 10);
    }

    input.value = formattedValue;
}