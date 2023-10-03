//----Menu-----

/*function create_menu(){
  $('#form-create-menu').on('submit',(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    var $btn = $('#btn-tambah-menu').button('loading')

    $.ajax({
      type:'POST',
      url: '<?php echo base_url() ?>Admin/Menu/create',
      data:formData,
      cache:false,
      contentType: false,
      processData: false,
      success:function(data){
        var data = jQuery.parseJSON(data);
        if (data.status == 'success') {
          $('#form-create-menu').trigger("reset");
          $('#modalAdd-menu').modal('hide');

        } else {
          alert(data);
        }
        $btn.button('reset');
      },
      error: function(XMLHttpRequest){
        alert(XMLHttpRequest.responseText);
        $btn.button('reset');
        $('#modalAdd-menu').modal('hide')
      }
    });
  }));

}*/

// LOAD TABLE MENU

$('#sidebar-aset').click(function(event) {
	$('#main-content').html();
	$('#preloader').css('display','block');
	$.get(base_url+"Admin/Aset", function(data) {
		$('#preloader').css('display','none');
		$('#main-content').html(data);
    setCookie("sidebar", "aset", 0.5);
		dataTable();
	});
});

$('#sidebar-user').click(function(event) {
	$('#main-content').html('');
	$('#preloader').css('display','block');
	$.get(base_url+"Admin/Admin", function(data) {
		$('#preloader').css('display','none');
		$('#main-content').html(data);
    setCookie("sidebar", "user", 0.5);
		dataTable();
	});
});

$('#sidebar-pencarian').click(function(event) {
  $('#main-content').html('');
  $('#preloader').css('display','block');
  setCookie("sidebar", "pencarian", 0.5);
  $.get(base_url+"Sispendok/Pendok", function(data) {
    $('#preloader').css('display','none');
    $('#main-content').html(data);
    
    
  });
});

