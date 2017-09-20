function loaddata(target){
  //console.log(target);
  var id = target.attr('data-modal');
  console.log(id);
  $('#'+id).children('.md-content').children('.folio').load('events/'+id+'.html')
};

function setbutton(target){
  //console.log(target);
    var id = $($(target)).attr('id');
    //console.log(id);
    var eid = id.slice(1);
    //console.log(id);
    $.post("users/checkregistration.php",{event:eid},function(data){
      if(JSON.parse(data)[0].loggedin=='true'){
        if(JSON.parse(data)[0].registered=='true'){
          $("#"+id).prop('value', 'Unparticipate');
          $("#"+id).attr('onclick', 'performsingleunreg('+eid+',\''+id+'\')');
        }
      }
    });
}
//setbutton($('.singlereg'));
//setbutton($('.groupreg'));
//Single Registration :
function performsinglereg(eid,id){
  $.post("users/participate.php",{event : eid},function(data){
    console.log(data);
    if(JSON.parse(data)[0].loggedin=='true'){
      if(JSON.parse(data)[0].registered=='true'){
        $('#'+id).siblings('.msg').html("Registeration Successful");
        $('#'+id).siblings('.msg').addClass("alert alert-success alert-dismissible");
        $("#"+id).prop('value', 'Unparticipate');
        $("#"+id).attr('onclick', 'performsingleunreg('+eid+',\''+id+'\')');
      }else{
        $('#'+id).siblings('.msg').html("There was some problem Registering. Please try again later");
        $('#'+id).siblings('.msg').addClass("alert alert-warning alert-dismissible");
      }
    }else{
      //console.log('Not Logged In ' +id);
      $('#'+id).siblings('.msg').html("Please Login to take part in the events.");
      $('#'+id).siblings('.msg').addClass("alert alert-warning alert-dismissible");
    }
  });
};
function performsingleunreg(eid,id){
  $.post("users/unparticipate.php",{event:eid},function(data){
    console.log(data);
    if(JSON.parse(data)[0].loggedin=='true'){
      if(JSON.parse(data)[0].status=='true'){
        $('#'+id).siblings('.msg').html("You have been successfully Unregistered");
        $('#'+id).siblings('.msg').addClass("alert alert-success alert-dismissible");
        $("#"+id).prop('value', 'Participate');
        $("#"+id).attr('onclick', 'performsinglereg('+eid+',\''+id+'\')');
      }else{
        $('#'+id).siblings('.msg').html("There was some problem Unregistering. Please try again later");
        $('#'+id).siblings('.msg').addClass("alert alert-warning alert-dismissible");
      }
    }else{
      $('#'+id).siblings('.msg').html("Please Login to take part in the events.");
      $('#'+id).siblings('.msg').addClass("alert alert-warning alert-dismissible");
    }
  });
};

//Group Registration
function insertfields(n,id){
  $("#" + id).empty();
  for(var i=0;i<n;i++)
   {
   $("#" + id).append( '<br><input onchange = "checkxtasyid(this.value,this)" type="text" name="id'+(i+1)+'" placeholder="Enter  XtasyId  '+(i+1)+'" ><b></b>'  );
  }
   $("#" + id).append('<br><br><input name="group_name" type="text" placeholder="Enter Your Group Name">');
};
function checkxtasyid(id,target){
  //console.log(id+" "+target);
  var ele = $(target);
  var xtasyid = /XT\d{4}/;
  if(xtasyid.test(id)){
    $.post("users/getusername.php",{xtasy_id:id},function(data){
      if(JSON.parse(data)[0].loggedin=='true'){
        if(JSON.parse(data)[0].status=='true'){
          ele.next().html(" "+JSON.parse(data)[0].name);
        }else{
          ele.next().html(" Invalid xtasy id");
        }
      }
    });
  }else{
    //console.log("No user found");
    //console.log(ele);
    ele.next().html(" Invalid xtasy id");
  }
}
function performgroupreg(eid,id){
  var totalmem = $('#'+id).siblings('select').value;
  var info = $('#'+id).siblings('form').serialize();
  console.log(info);
  $.post("users/participate.php",info,function(data){
    console.log(data);
    if(JSON.parse(data)[0].loggedin=='true'){
      if(JSON.parse(data)[0].registered=='true'){
        $('#'+id).siblings('.msg').html("Registeration Successful");
        $('#'+id).siblings('.msg').addClass("alert alert-success alert-dismissible");
        $("#"+id).prop('value', 'Unparticipate');
        $("#"+id).attr('onclick', 'performgroupunreg('+eid+',\''+id+'\')');
      }else{
        $('#'+id).siblings('.msg').html("There was some problem Registering. Please try again later");
        $('#'+id).siblings('.msg').addClass("alert alert-warning alert-dismissible");
      }
    }else{
      //console.log('Not Logged In ' +id);
      $('#'+id).siblings('.msg').html("Please Login to take part in the events.");
      $('#'+id).siblings('.msg').addClass("alert alert-warning alert-dismissible");
    }
  });
};
function performgroupunreg(eid,id){
  $.post("users/unparticipate.php",{event:eid},function(data){
    console.log(data);
    if(JSON.parse(data)[0].loggedin=='true'){
      if(JSON.parse(data)[0].status=='true'){
        $('#'+id).siblings('.msg').html("Successfully Unregistered");
        $('#'+id).siblings('.msg').addClass("alert alert-success alert-dismissible");
        $("#"+id).prop('value', 'Participate');
        $("#"+id).attr('onclick', 'performgroupreg('+eid+',\''+id+'\')');
      }else{
        $('#'+id).siblings('.msg').html("There was some problem Unrsegistering. Please try again later");
        $('#'+id).siblings('.msg').addClass("alert alert-warning alert-dismissible");
      }
    }else{
      //console.log('Not Logged In ' +id);
      $('#'+id).siblings('.msg').html("Please Login to take part in the events.");
      $('#'+id).siblings('.msg').addClass("alert alert-warning alert-dismissible");
    }
  });
}
