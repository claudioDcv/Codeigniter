$('.btn-tab').on('click',function(){
  var goTab = $(this).data('go-tab');
  $('.nav-tabs #'+goTab).tab('show')
});
