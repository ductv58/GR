$(document).ready(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
    $(".date-picker-start-date").datepicker({
        gotoCurrent: true,
        dateFormat: 'dd/mm/yy',
        minDate: 1,
    });

    $(".date-and-time-picker").datetimepicker({
        format: "yyyy-mm-dd HH:ii:00",
        autoclose: true,
        todayBtn: false,
        minuteStep: 30,
        pickerPosition: "bottom-right"
    });
});



function previewImage(event) {
    console.log(event)
    if (event.target.files) {
        let reader = new FileReader();
        let file = event.target.files[0];
        reader.onload = function (e) {
            $('#previewImg').attr('src', e.target.result);
        };
        reader.readAsDataURL(file);
    }
}
