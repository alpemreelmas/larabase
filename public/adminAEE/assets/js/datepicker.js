$(function() {
  'use strict';

/*  if($('#datePickerExample').length) {
    var date = new Date();
    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    $('#datePickerExample').datepicker({
      format: "dd/mm/yyyy",
      todayHighlight: true,
      autoclose: true
    });
    $('#datePickerExample').datepicker('setDate', today);
  }*/

  if($(".datePickerAEE").length){
      $(".datePickerAEE").each((i,el)=>{
          el = $(el)
          var date = new Date();
          var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
          el.datepicker({
              //format: "dd/mm/yyyy",
              todayHighlight: true,
              autoclose: true
          });
          el.datepicker('setDate', today);
      })
  }
});
