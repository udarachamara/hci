function notification(type = '' , icon = '' , title = '' , message = '' , url = '' ){
    $.notify({
        // options
        icon: icon,
        title: title,
        message: message,
        url: url,
        target: '_blank'
      },{
        // settings
        element: 'body',
        position: null,
        type: type,
        allow_dismiss: true,
        newest_on_top: false,
        showProgressbar: false,
        placement: {
          from: "bottom",
          align: "right"
        },
        offset: 20,
        spacing: 10,
        z_index: 3000,
        delay: 3000,
        timer: 1000,
        url_target: '_blank',
        mouse_over: null,
        animate: {
          enter: 'animated fadeInRight',
          exit: 'animated fadeOutRight'
        },
        onShow: null,
        onShown: null,
        onClose: null,
        onClosed: null,
        icon_type: 'class',
        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
          '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
          '<span data-notify="icon"></span> ' +
          '<span data-notify="title">{1}</span> ' +
          '<span data-notify="message" style="font-size:12px;">{2}</span>' +
          '<div class="progress" data-notify="progressbar">' +
            '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
          '</div>' +
          '<a href="{3}" target="{4}" data-notify="url"></a>' +
        '</div>' 
      });
  }

  function showSuccessMsg(msg = ''){
    var type = "success";
    var icon = "fa fa-check-circle";
    var title = "";
    var url = "";
    notification(type , icon , title , msg , url );
  }

  function showErrorMsg(msg = ''){
    var type = "danger";
    var icon = "fa fa-exclamation-circle";
    var title = "";
    var url = "";
    notification(type , icon , title , msg , url );
  }

  function showWarningMsg(msg){
    var type = "warning";
    var icon = "fa fa-exclamation-triangle";
    var title = "";
    var url = "";
    notification(type , icon , title , msg , url );
  }

  function showSaveSuccess(){
    var type = "success";
    var icon = "fa fa-check-circle";
    var title = "";
    var msg = "Save Success..!";
    var url = "";
    notification(type , icon , title , msg , url );
  }

  function showSaveError(){
    var type = "danger";
    var icon = "fa fa-exclamation-circle";
    var title = "";
    var msg = "Failed to Save..!";
    var url = "";
    notification(type , icon , title , msg , url );
  }

  function showUpdateSuccess(){
    var type = "success";
    var icon = "fa fa-check-circle";
    var title = "";
    var msg = "Update Success..!";
    var url = "";
    notification(type , icon , title , msg , url );
  }

  function showUpdateError(){
    var type = "danger";
    var icon = "fa fa-exclamation-circle";
    var title = "";
    var msg = "Failed to Update..!";
    var url = "";
    notification(type , icon , title , msg , url );
  }

  function showDeleteSuccess(){
    var type = "success";
    var icon = "fa fa-check-circle";
    var title = "";
    var msg = "Delete Success..!";
    var url = "";
    notification(type , icon , title , msg , url );
  }

  function showDeleteError(){
    var type = "danger";
    var icon = "fa fa-exclamation-circle";
    var title = "";
    var msg = "Failed to Delete..!";
    var url = "";
    notification(type , icon , title , msg , url );
  }