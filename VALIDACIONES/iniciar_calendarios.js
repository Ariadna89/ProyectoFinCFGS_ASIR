window.onload = function() {

  // Creo un calendario para el campo que espera una fecha con formato YYYY-MM-DD.
  new JsDatePick({
    useMode:2,
    target:"FECHA",
    dateFormat:"%Y-%m-%d",
    limitToToday:false,
    weekStartDay:1,
    cellColorScheme:"ocean_blue"
  });

  new JsDatePick({
    useMode:2,
    target:"FECHA2",
    dateFormat:"%Y-%m-%d",
    limitToToday:false,
    weekStartDay:1,
    cellColorScheme:"ocean_blue"
  });

}

