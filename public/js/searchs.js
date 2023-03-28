$("#producto").autocomplete({
    source: 'search/producto',
    minLength: 2,
    select: function(event, ui) {
        event.preventDefault();
        console.log(ui.item.id);//imprimiendo id por consola
        $("#producto").val(ui.item.label);
    }
});
$("#marca").autocomplete({
    source: 'search/marca',
    minLength: 2,
    select: function(event, ui) {
        event.preventDefault();
        console.log(ui.item.id);//imprimiendo id por consola
        $("#marca").val(ui.item.label);
    }
});
$("#ruc").autocomplete({
    source: 'search/ruc',
    minLength: 2,
    select: function(event, ui) {
        event.preventDefault();
        console.log(ui.item.id);//imprimiendo id por consola
        $(this).val(ui.item.label);
    }
});
$("#nave").autocomplete({
    source: 'search/nave',
    minLength: 2,
    select: function(event, ui) {
        event.preventDefault();
        console.log(ui.item.id);//imprimiendo id por consola
        $(this).val(ui.item.label);
    }
});
$("#embarcador").autocomplete({
    source: 'search/embarcadorConsigne',
    minLength: 2,
    select: function(event, ui) {
        event.preventDefault();
        console.log(ui.item.id);//imprimiendo id por consola
        $(this).val(ui.item.label);
    }
});
$("#refrendo").autocomplete({
    source: 'search/refrendo',
    minLength: 2,
    select: function(event, ui) {
        event.preventDefault();
        console.log(ui.item.id);//imprimiendo id por consola
        $(this).val(ui.item.label);
    }
});
$("#agente_afianzado").autocomplete({
    source: 'search/agenteAfianzado',
    minLength: 2,
    select: function(event, ui) {
        event.preventDefault();
        console.log(ui.item.id);//imprimiendo id por consola
        $(this).val(ui.item.label);
    }
});
$("#almacen").autocomplete({
    source: 'search/almacen',
    minLength: 2,
    select: function(event, ui) {
        event.preventDefault();
        console.log(ui.item.id);//imprimiendo id por consola
        $(this).val(ui.item.label);
    }
});
$("#linea").autocomplete({
    source: 'search/linea',
    minLength: 2,
    select: function(event, ui) {
        event.preventDefault();
        console.log(ui.item.id);//imprimiendo id por consola
        $(this).val(ui.item.label);
    }
});
$("#subpartida").autocomplete({
    source: 'search/subpartida',
    minLength: 2,
    select: function(event, ui) {
        event.preventDefault();
        console.log(ui.item.id);//imprimiendo id por consola
        $(this).val(ui.item.label);
    }
});
