// $(this).attr('valor', ui.item.label); //asigna valor a un atributo del input
$("#producto").autocomplete({
    source: 'search/producto',
    minLength: 4,
    select: function(event, ui) {
        event.preventDefault();
        console.log(ui.item.id);//imprimiendo id por consola
        $("#producto").val(ui.item.label);
    }
});
$("#marca").autocomplete({
    source: 'search/marca',
    minLength: 4,
    select: function(event, ui) {
        event.preventDefault();
        console.log(ui.item.id);//imprimiendo id por consola
        $("#marca").val(ui.item.label);
    }
});
$("#ruc").autocomplete({
    source: 'search/ruc',
    minLength: 6,
    select: function(event, ui) {
        event.preventDefault();
        console.log(ui.item.id);//imprimiendo id por consola
        $(this).val(ui.item.label);
    }
});
$("#nave").autocomplete({
    source: 'search/nave',
    minLength: 4,
    select: function(event, ui) {
        event.preventDefault();
        console.log(ui.item.id);//imprimiendo id por consola
        $(this).val(ui.item.label);
    }
});
$("#embarcador").autocomplete({
    source: 'search/embarcadorConsigne',
    minLength: 4,
    select: function(event, ui) {
        event.preventDefault();
        console.log(ui.item.id);//imprimiendo id por consola
        $(this).val(ui.item.label);
    }
});
$("#refrendo").autocomplete({
    source: 'search/refrendo',
    minLength: 4,
    select: function(event, ui) {
        event.preventDefault();
        console.log(ui.item.id);//imprimiendo id por consola
        $(this).val(ui.item.label);
    }
});
$("#agente_afianzado").autocomplete({
    source: 'search/agenteAfianzado',
    minLength: 4,
    select: function(event, ui) {
        event.preventDefault();
        console.log(ui.item.id);//imprimiendo id por consola
        $(this).val(ui.item.label);
    }
});
$("#almacen").autocomplete({
    source: 'search/almacen',
    minLength: 4,
    select: function(event, ui) {
        event.preventDefault();
        console.log(ui.item.id);//imprimiendo id por consola
        $(this).val(ui.item.label);
    }
});
$("#linea").autocomplete({
    source: 'search/linea',
    minLength: 4,
    select: function(event, ui) {
        event.preventDefault();
        console.log(ui.item.id);//imprimiendo id por consola
        $(this).val(ui.item.label);
    }
});
$("#subpartida").autocomplete({
    source: 'search/subpartida',
    minLength: 4,
    select: function(event, ui) {
        event.preventDefault();
        console.log(ui.item.id);//imprimiendo id por consola
        $(this).val(ui.item.label);
    }
});
