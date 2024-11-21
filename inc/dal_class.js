$(document).ready(function() {

  $("#app_btn").click(function(e){

  if ($('#ex_type').val()==''){
    swal("Invalid Selection!", "Exam type not specified. Please select exam type", "info");
    $('#ex_type').focus();
    exit;
  //return false;
  }
  if ($('#ex_no').val()==''){
    swal("Invalid Entry!", "Exam no not specified. Please exam no", "info");
    $('#ex_no').focus();
    exit;
  }
  if ($('#ex_yr').val()==''){
    swal("Invalid Selection!", "Exam year not specified. Please select exam year", "info");
    $('#ex_yr').focus();
    exit;
  //return false;
  }

  if ($('#s_type').val()==''){
    swal("Invalid Selection!", "Payment type not specified. Please select exam type", "info");
    $('#s_type').focus();
    exit;
  //return false;
  }
  // var generator = new IDGenerator();
  // var ticket_id = generator.generate();
  var ticket_id=$("#ticket_id").val();
  var matric_no =$("#matric_no").val();
  // var ex_type = $("#ex_type").val();
  // var ex_yr = $("#ex_yr").val();
  // var s_type =$("#s_type").val();
  var f_inst = $("#f_inst").val();
  var f_recipient =$("#f_recipient").val();
  var f_email = $("#f_email").val();
  var f_address= $("#f_address").val();
  var f_phone=$("#f_phone").val();
  var f_courier = "NNN";//$("#f_courier").val();//'EMS';


      // Result Verification
      $.post("ajax_lib/ajax_add_verification.php",{ticket_id1:ticket_id,matric_no1:matric_no,f_inst1:f_inst,f_recipient1:f_recipient,f_email1:f_email,f_phone1:f_phone,f_address1:f_address,f_courier1:f_courier},
      function(data, textStatus){
         if(data == 0){
           location.href ="./";
         }else if(data == 1){
           swal({title:"Successful!",
                text:"Application successfully submitted!",
                type:"success",
                customClass:"swal-size-sm",
                showCancelButton: false,
                closeOnConfirm:true,
              },function(){
                location.href ="my_tickets";
            })
         }else if (data == 2){
           swal("Info","RRR has been used by YOU!","info");
           //alert("RRR has been used by YOU!");
           // swal("Unsuccessful","An error occured. Sub-head not created!","info");
         }else{
           alert(data);
           //alert("Purchase order with No: "+ id +" is already exist.");
         }
       });
    // }
    // }
  })


})
// $("#v_submit").click(function(e){
//   var s_name =$("#lname").val();
//   var f_name =$("#fname").val();
//   var o_name = $("#oname").val();
//   var gender = $("#gender").val();
//   var d_dob =$("#d_dob").val();
//
//   var ex_no =$("#hex_no").val();
//   var rrr_no =$("#hrrr_no").val();
//   var ex_type = $("#hex_type").val();
//   var ex_yr = $("#hex_yr").val();
//   //var d_dob =$("#d_dob").val();
// $.post("../ajax_lib/ajax_add_validation.php",{ex_no1:ex_no,rrr_no1:rrr_no,ex_type1:ex_type,ex_yr1:ex_yr,s_name1:s_name,f_name1:f_name,o_name1:o_name,gender1:gender,d_dob1:d_dob},
//   function(data, textStatus){
//     if(data == 1){
//       swal("Success","Application successfully submitted!","success");
//       //alert("Application successfully submitted!");
//       location.href ="../application";
//     }else{
//       //alert(data);
//       swal("WARNING","An error occured. Application not submitted!","warning");
//       location.href ="../application";
//     }
//   })
// })


$("#v_submit").click(function(e){
  var v_title =$("#v_title").val();
  var f_complaint =$("#f_complaint").val();
  var f_email = $("#f_email").val();
  var f_address= $("#f_address").val();
  var f_phone=$("#f_phone").val();

  var ex_no =$("#hex_no").val();
  var rrr_no =$("#hrrr_no").val();
  var ex_type = $("#hex_type").val();
  var ex_yr = $("#hex_yr").val();
  //var d_dob =$("#d_dob").val();
$.post("../ajax_lib/ajax_add_non_validation.php",{ex_no1:ex_no,rrr_no1:rrr_no,ex_type1:ex_type,ex_yr1:ex_yr,v_title1:v_title,f_complaint1:f_complaint,f_email1:f_email},
  function(data, textStatus){
    if(data == 1){
      swal({title: "Successfull...", text: "Application successfully submitted!", type:
        "success"}).then(function(){
        location.href ="../application";
      });
    }else{
      //alert(data);
      swal("WARNING","An error occured. Application not submitted!","warning");
      location.href ="../application";
    }
  })
})


$("#a_submit").click(function(e){
  var f_email =$("#email").val();
  var f_phone =$("#f_phone").val();
  var f_address = $("#f_address").val();
  var f_courier = $("#courier").val();
  //var d_dob =$("#d_dob").val();

  var ex_no =$("#hex_no").val();
  var rrr_no =$("#hrrr_no").val();
  var ex_type = $("#hex_type").val();
  var ex_yr = $("#hex_yr").val();
  //var d_dob =$("#d_dob").val();
$.post("../ajax_lib/ajax_add_verification.php",{ex_no1:ex_no,rrr_no1:rrr_no,ex_type1:ex_type,ex_yr1:ex_yr,f_email1:f_email,f_phone1:f_phone,f_address1:f_address,f_courier1:f_courier},
  function(data, textStatus){
    if(data == 1){
      swal({title: "Successfull...", text: "Application successfully submitted!", type:
        "success"}).then(function(){
        location.href ="../";
      }
);
    }else{
      alert(data);
    }

})

})

$("#lnk_rrr").click(function(e){
  var sel=document.getElementById('s_type');
  var opt = sel.options[sel.selectedIndex];
  var title=(opt.text);
  $("#my_rta").html("<b>"+title.toUpperCase()+"</b>");
  //alert(title);
})

$("#btn_convey").click(function(e){
  var ex_no =$("#hex_no").val();
  var rrr_no =$("#hrrr_no").val();
  var remark = $("#h_remark").val();
  $.post("../ajax_lib/ajax_convey_approval.php",{ex_no1:ex_no,rrr_no1:rrr_no,remark1:remark},
    function(data, textStatus){
      if(data == 1){
        swal({title: "Successfull...", text: "Application successfully approved!", type:
          "success"}).then(function(){
          //location.href ="../application";
          reload();
        }
  );
      }else{
        alert(data);
      }

  })
})
function IDGenerator() {
        this.length = 8;
        this.timestamp = +new Date;
        var _getRandomInt = function( min, max ) {
         return Math.floor( Math.random() * ( max - min + 1 ) ) + min;
         //return '_' + Math.random().toString(36).substr(2, 9);
        }
        this.generate = function() {
          var ts = this.timestamp.toString();
          var parts = ts.split( "" ).reverse();
          var id = "";

          for( var i = 0; i < this.length; ++i ) {
           var index = _getRandomInt( 0, parts.length - 1 );
           id += parts[index];
          }
          //return '18' + Math.random().toString(36).substr(2, 9);
          return '18' +id;
        }
      }

      $("#fileinput").on("change", function(evt) {
        var myccode = $("#course_code").val();
        var col_id = $("#h_collation").val();
        var file = this.files[0];
        var name = file.name;
        var size = file.size;
        var type = file.type;
        var mycsv = col_id +".csv";
          //
        //alert (myccode);
        var ext =  name.split('.').pop();//name.substring(name.lastIndexOf(".")+1,name.length());
        if(ext!="csv"){
          alert('Invalid file format. Please make sure your file is in the right format.');
          location.reload();
          exit;
        }
        //
        //#h_collation
        if (myccode!=name.substring(0,6)) {
          //alert('Wrong score sheet selected. Please select "+ myccode + " score sheet.");
          alert('Wrong score sheet selected. Please select score sheet. for '+ myccode );
          location.reload();
          exit;
        }

        if (mycsv!=name) {
          //alert('Wrong score sheet selected. Please select "+ myccode + " score sheet.");
          alert('Invalid file naming format. Please name score sheet as '+ col_id );
          location.reload();
          exit;
        }

          var f = evt.target.files[0];
          if (f) {
              var r = new FileReader();
              r.onload = function(e) {
                  table.rows.add($.csv.toObjects(e.target.result)).draw();
              }
              r.readAsText(f);
          } else {
              alert("Failed to load file");
              location.reload();
        exit;
          }
      });

      $("#filescript").on("change", function(evt) {
        var sccode = $("#center_code").val();
        var centr_t = $("#center_name").val();
        var file = this.files[0];
        var name = file.name;
        var size = file.size;
        var type = file.type;
        if (sccode!=name.substring(0,3)) {
          //alert('Wrong score sheet selected. Please select "+ myccode + " score sheet.");
          alert('Wrong script inventory sheet selected. Please select inventory sheet for '+ centr_t );
          location.reload();
          exit;
        }
          var f = evt.target.files[0];
          if (f) {
              var r = new FileReader();
              r.onload = function(e) {
                  tbl.rows.add($.csv.toObjects(e.target.result)).draw();
              }
              r.readAsText(f);
          } else {
              alert("Failed to load file");
          }
      });
