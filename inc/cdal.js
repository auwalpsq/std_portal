
$(document).on("click",".v_rrr",function(){
      var id = $(this).data('id');
      var track = $(this).data('track');
      var payref=$(this).data('payref');
      var dataString = 'id='+ id+"&track="+track;
    //   alert(dataString); 
      swal({
        title:'APPROVE PAYMENT!',
        text: 'Are you sure you have verified this payment with Ref:'+payref+"?",
        type:'warning',
        customClass:'swal-size-sm',
        showCancelButton: true,
        confirmButtonClass: "btn-primary",
        cancelButtonClass: "btn-danger",
        confirmButtonText: "Yes, approve it!",
        cancelButtonText: "No, cancel pls!",
        closeOnConfirm: false,
        closeOnCancel: false,
        titleClass:"text-red"
      },
      function(isConfirm){
        if (isConfirm){
          $.post("../ajax/ajax_verify_pay.php",{id1: id,track1:track},
          function(data, textStatus){
            if(data == 1){
              swal({
                position:'top-end',
                type: 'success',
                title: 'Payment successfully verified!',
                showConfirmButton: true,
              }, function(isConfirm){
                 location.reload();
              });
             }else if (data == 2){
               swal("Oops!","An error occured. Payment was not verified.","error");
           }else{
               swal("Error!",data,"error");
             }
           });
      }else{
        swal({
          title:'Cancelled!',
          text:'Action cancelled by you.',
           type:"success",
          showConfirmButton: false,
          timer: 2500
        });
      }
    });
  

})


    $("#b_remita").click(function(){
      if ($('#t_uname').val()===''){
        //swal("Oops!","");
        swal({title:"Oops!",
             text:"No login paratmeter specified. Enter your login email!",
             type:"error",
             customClass:"swal-size-sm",
             showCancelButton: false,
             closeOnConfirm:true,
           },function(){
             location.reload();
         })
      }
      //$("#t_uname").val(<?php echo json_encode($_SESSION['email']);?>);
      var email = $("#t_uname").val();
      $.post("ajax/ajax_get_parameter.php",{email1:email},
        function(data,textStatus){
          var dr = data.split("!");
          // alert(dr);
          $("#payerEmail").val(dr[0]);
          $("#payerName").val(dr[1]);
          $("#payerPhone").val(dr[2]);
        });
    })

    $("#s_faculty").change(function(){
      var id=$(this).val();
      var dataString = 'id='+ id;
     $.ajax({
       type: "POST",
       url: "ajax/ajax_fill_program.php",
       data: dataString,
       cache: false,
         success: function(html){
          $("#s_prog").html(html);
         }
       });
    })

    $("#s_zone").change(function(){
      var id=$(this).val();
      var dataString = 'id='+ id;
     $.ajax({
       type: "POST",
       url: "ajax/ajax_fill_center.php",
       data: dataString,
       cache: false,
         success: function(html){
          $("#s_stcenter").html(html);
         }
       });
    })

    $("#s_state").change(function(){
      var id=$(this).val();
      var dataString = 'id='+ id;
     $.ajax({
       type: "POST",
       url: "ajax/ajax_fill_lga.php",
       data: dataString,
       cache: false,
         success: function(html){
          $("#s_lg").html(html);
         }
       });
    })

    $("#b_submit_remita").click(function(){
      // alert ("Submitting RRR!");
      var payer_Name=$("#payerName").val();
      var payer_Email=$("#payerEmail").val();
      var payer_Phone=$("#payerPhone").val();
      var pay_code =$("#t_regno").val();
      var qty =$("#t_qty").val();
      var rate =$("#t_rate").val();
      //var rrr =
      $.post("ajax/ajax_create_payment.php",{pay_code1:pay_code,payer_Name1:payer_Name,payer_Email1:payer_Email,payer_Phone1:payer_Phone,qty1:qty,rate1:rate},
        function(data,textStatus){
          // alert(data);
          if(data == "0"){
            swal({title:"Oops!",
                 text:"Something went wrong. Transaction not successful!",
                 type:"error",
                 customClass:"swal-size-sm",
                 showCancelButton: false,
                 closeOnConfirm:true,
               },function(){
                 location.reload();
             })
          }else if(data=="1"){
            swal({title:"Successful!",
                 text:"Remita Retrieval Reference generated successfully!",
                 type:"success",
                 customClass:"swal-size-sm",
                 showCancelButton: false,
                 closeOnConfirm:true,
               },function(){
                 //location.reload();
                  window.location.href = 'application';
             })
          }else{
            // alert(data);
            swal({title:"Oops!",
                 text:"Something went wrong. Transaction not successful!",
                 type:"error",
                 customClass:"swal-wide",
                 showCancelButton: false,
                 closeOnConfirm:true,
               },function(){
                 location.reload();
             })
          }
        })
    })

    $("#b_verify_remita").click(function(){
      // $('#loader').show();
      var id= $("#v_Id").val();

        $.post("ajax/ajax_review_pay.php",{id1: id},
        function(data,textStatus){
          // alert(data);
          if(data == 1){
            swal({title:"Successful!",
                 text:"Payment Verification Successfull!",
                 type:"success",
                 customClass:"swal-size-sm",
                 showCancelButton: false,
                 closeOnConfirm:true,
               },function(){
                 location.reload();
                // location.href="javascript:history.back(-1)";
             })
          }else{
            swal({title:"Warning!",
                 text:"Payment Verification Not Successfull!",
                 type:"error",
                 customClass:"swal-size-sm",
                 showCancelButton: false,
                 closeOnConfirm:true,
               },function(){
               location.reload();
             })
          }
        })
      })


    $("#b_save_entries").click(function(){
      //alert("Save the record when your click here.");
      var s_state = $("#s_state").val();
      var s_lg = $("#s_lg").val();
      var s_mst  = $("#s_mst").val();
      var s_est = $("#s_est").val();
      var t_aphone = $("#t_aphone").val();
      var t_aemail = $("#t_aemail").val();
      var t_nok = $("#t_kname").val();
      var s_gender = $("#s_gender").val();
      var s_dis = $("#s_dis").val();
      var d_dob = $("#d_dob").val();
      var s_est = $("#s_est").val();
      var t_kname = $("#t_kname").val();
      var s_ktyp = $("#s_ktyp").val();
      var t_kphone = $("#t_kphone").val();
      var t_kemail = $("#t_kemail").val();
      var t_addr = $("#t_addr").val();
      var t_kaddr = $("#t_kaddr").val();
      $.post("ajax/ajax_update_application.php",{s_state1:s_state, s_lg1:s_lg,s_mst1:s_mst,s_est1:s_est,t_aphone1:t_aphone,t_aemail1:t_aemail,t_nok1:t_nok,s_gender1:s_gender,s_dis1:s_dis,d_dob1:d_dob,s_est1:s_est,t_kname1:t_kname,t_kname1:t_kname,s_ktyp1:s_ktyp,t_kphone1:t_kphone,t_kemail1:t_kemail,t_addr1:t_addr,t_kaddr1:t_kaddr},
    function(data,textStatus){

    if(data == 1){
      $("#b_save_qual").prop('disabled', false);
      $(this).prop('disabled', true);
      swal({title:"Successful!",
           text:"Remita Retrieval Reference generated successfully!",
           type:"success",
           customClass:"swal-size-sm",
           showCancelButton: false,
           closeOnConfirm:true,
         },function(){
          //window.location.href = './';
       })
    }else{
      //alert(data);
      swal({title:"Oops!",
           text:"Something went wrong. Transaction not successful!",
           type:"error",
           customClass:"swal-size-sm",
           showCancelButton: false,
           closeOnConfirm:true,
         },function(){
           exit;
       })
      }
     })

    })

    $("#b_submit_ticket").click(function(){

      var ticket_id = $("#ticket_id").val();
      var ticket_cnt = $("#ticket_cnt").val();
      var rtype = $("#s_type").val();
      var ticket_rate  = $("#ticket_rate").val();

    // alert(ticket_cnt+' Rate'+ ticket_rate);
    $.post("ajax/ajax_create_ticket.php",{ticket_id1:ticket_id, ticket_cnt1:ticket_cnt,ticket_rate1:ticket_rate,rtype1:rtype},
    function(data,textStatus){
    if(data == 1){
       swal({title:"Successful!",
            text:"Ticket generated successfully!",
            type:"success",
            customClass:"swal-size-sm",
            showCancelButton: false,
            closeOnConfirm:true,
          },function(){
            location.href="resources/token.php";
        })
    }else{
      alert(data);
      swal("WARNING","Something went wrong. Request not successful!","warning");

      }
     })

    })

    $("#rv_app_btn").click(function(){
            // var track_id=$(this).data('track');
    		$.post("ajax/ajax_review_api.php",
    		function(data,textStatus){
    			 // alert(data);
    			if(data == 1){
    				swal({title:"Successful!",
    						 text:"Application has been successfully reviewed!",
    						 type:"success",
    						 customClass:"swal-size-sm",
    						 showCancelButton: false,
    						 closeOnConfirm:true,
    					 },function(){
    						 // location.reload();
    						location.href="javascript:history.back(-1)";
    				 })
    			}else{
    				swal({title:"Warning!",
    						 text:"Something went wrong. Application not reviewed!",
    						 type:"error",
    						 customClass:"swal-size-sm",
    						 showCancelButton: false,
    						 closeOnConfirm:true,
    					 },function(){
    					 location.reload();
    				 })
    			}
    		})
    	})

    function IDGenerator() {
            var d = new Date();
            this.length = 6;
            this.timestamp = +new Date;
            var _getRandomInt = function( min, max ) {
             return Math.floor( Math.random() * ( max - min + 1 ) ) + min;
             //return '_' + Math.random().toString(36).substr(2, 9);
            }
            this.generate = function() {
              var ts = this.timestamp.toString();
              var parts = ts.split( "" ).reverse();
              var id = "";

              for( var i = 0; i < this.length; ++i) {
               var index = _getRandomInt( 0, parts.length - 1 );
               id += parts[index];
              }
              //return '18' + Math.random().toString(36).substr(2, 9);
              return 'T'+d.getFullYear().toString().substr(-2) +id;
            }
          }

          function IDTracker() {
                  var d = new Date();
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
                    return 'F'+d.getFullYear().toString().substr(-2) +id;
                  }
                }

          // var table = $("#csvexample").DataTable({
  				// 	columns: [{
  				// 		"title" : "Exam No",
  				// 		"data": "examno"
  				// 		},{
  				// 		"title" : "Subject",
  				// 		"data": "subject"
  				// 		},{
  				// 		"title" : "Grade",
  				// 		"data": "grade"
  				// 		}]
          //
  				// });
          //
          // var tbl = $("#csvscript").DataTable({
  				// 	columns: [{
  				// 		"title" : "Exam No",
  				// 		"data": "examno"
          //     },{
          //     "title" : "Type",
          //     "data": "Examtype"
  				// 		},{
  				// 		"title" : "Year",
  				// 		"data": "year"
          //     },{
          //     "title" : "Name",
          //     "data": "full_name"
  				// 		}]
          //
  				// });


          $("#fileinput").on("change", function(evt) {
            var myid = $(this).data('id');
            var file = this.files[0];
            var name = file.name;
            var size = file.size;
            var type = file.type;
            var mycsv = myid +"_sbj.csv";

            // swal("WARNING","Wrong file selected!","warning");
            if (mycsv!=name) {
              swal({title:"Oops!",
                   text:"Wrong subject sheet selected. Please select: "+ mycsv,
                   type:"error",
                   customClass:"swal-size-sm",
                   showCancelButton: false,
                   closeOnConfirm:true,
                 },function(){
                   location.reload();
               })
            }
            var ext =  name.split('.').pop();//name.substring(name.lastIndexOf(".")+1,name.length());
            if(ext!="csv"){
              swal({title:"Oops!",
                   text:"Invalid file format selected. Please select: "+ mycsv,
                   type:"error",
                   customClass:"swal-size-sm",
                   showCancelButton: false,
                   closeOnConfirm:true,
                 },function(){
                   location.reload();
               })
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
            // var sccode = $("#center_code").val();
            // var centr_t = $("#center_name").val();
            var myid = $(this).data('id');//"22366651";
            //var col_id = "22366651";
            var file = this.files[0];
            var name = file.name;
            var size = file.size;
            var type = file.type;
            var mycsv = myid +".csv";

            if (mycsv!=name) {
              swal({title:"Oops!",
                   text:"Wrong subject sheet selected. Please select: "+ mycsv,
                   type:"error",
                   customClass:"swal-size-sm",
                   showCancelButton: false,
                   closeOnConfirm:true,
                 },function(){
                   location.reload();
               })
            }
            var ext =  name.split('.').pop();//name.substring(name.lastIndexOf(".")+1,name.length());
            if(ext!="csv"){
              swal({title:"Oops!",
                   text:"Invalid file format selected. Please select: "+ mycsv,
                   type:"error",
                   customClass:"swal-size-sm",
                   showCancelButton: false,
                   closeOnConfirm:true,
                 },function(){
                   location.reload();
               })
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

          $("#btn_usr").click(function(){
            var acct_name=$("#acct_name").val();
            var usr_name=$("#acct_email").val();
            var usr_mob=$("#acct_phone").val();
            var usr_cat=$("#usr_role").val();

            var usr_pwd = Math.random().toString(36).slice(-8);

          // alert (usr_name);
            $.post("ajax/ajax_add_usr.php",{usr_name1: usr_name, acct_name1: acct_name, usr_mob1: usr_mob,usr_cat1:usr_cat,usr_pwd1:usr_pwd},
              function(data, textStatus){
                //alert(data);
                if(data == 1){
                  // $("#b_save_qual").prop('disabled', false);
                  // $(this).prop('disabled', true);
                  swal({title:"Successful!",
                       text:"User account successfully created \n Password has been sent to the phone no provided!",
                       type:"success",
                       customClass:"swal-size-sm",
                       showCancelButton: false,
                       closeOnConfirm:true,
                     },function(){
                       location.reload();
                      // window.location.href = './';
                   })
                }else{
                  // alert(data);
                  swal({title:"Oops!",
                       text:"Something went wrong. Account creation not successful!",
                       type:"error",
                       customClass:"swal-size-sm",
                       showCancelButton: false,
                       closeOnConfirm:true,
                     },function(){
                       location.reload();
                       exit;
                   })
                  }
               });
          })

          $("#btn_courier").click(function(){
            var id=$("#courier_id").val();
            var courier_name=$("#courier_name").val();
            var contact_name=$("#contact_name").val();
            var acct_phone=$("#acct_phone").val();
            var acct_email=$("#acct_email").val();

            var usr_pwd = Math.random().toString(36).slice(-8);

          // alert (usr_name);
            $.post("ajax/ajax_add_courier.php",{id1:id, courier_name1: courier_name, contact_name1: contact_name, acct_phone1: acct_phone,acct_email1:acct_email,usr_pwd1:usr_pwd},
              function(data, textStatus){
                //alert(data);
                if(data == 1){
                  // $("#b_save_qual").prop('disabled', false);
                  // $(this).prop('disabled', true);
                  swal({title:"Successful!",
                       text:"User account successfully created \n Password has been sent to the phone no provided!",
                       type:"success",
                       customClass:"swal-size-sm",
                       showCancelButton: false,
                       closeOnConfirm:true,
                     },function(){
                       location.reload();
                      // window.location.href = './';
                   })
                }else{
                  // alert(data);
                  swal({title:"Oops!",
                       text:"Something went wrong. Account creation not successful!",
                       type:"error",
                       customClass:"swal-size-sm",
                       showCancelButton: false,
                       closeOnConfirm:true,
                     },function(){
                       location.reload();
                       exit;
                   })
                  }
               });
          })

         
          $(document).on("click",".open_pdf",function(){

            var doc=$(this).data('id')+'.pdf';
            var dpth='print/'+doc;

            var parent = $('embed#docid').parent();
            var newElement = "<embed src="+dpth+" id='docid' frameborder='0' width='100%' height='700px'>";
            // alert(newElement);
            $('embed#docid').remove();
            parent.append(newElement);
          })

          $(document).on("click",".btn_gen_pdf", function(){
            var id = $(this).data("id");
            var tid = $(this).data("tid");
            var trac = $(this).data("track");
            // alert(id);
            $.post("ajax/ajax_set_sess.php",{myval:id,tid1:tid,trac1:trac},
            function(data, textStatus){
               if(data == "1"){
                  swal({title:"Successful!",
                      text:"Transcript successfully generated!",
                      type:"success",
                      customClass:"swal-size-sm",
                      showCancelButton: false,
                      closeOnConfirm:true,
                     },function(isConfirm){
                      if (isConfirm){
                         location.href="rst_profile";
                      }
                     });
                }else{
                  // alert(data);
                  swal({title:"Successful!",
                      text:"Transcript successfully generated!",
                      type:"success",
                      customClass:"swal-size-sm",
                      showCancelButton: false,
                      closeOnConfirm:true,
                     },function(isConfirm){
                      if (isConfirm){
                        //  location.reload();
                      }
                     });
                }
              })         
           
          })




        $("#app_btn").click(function(e){

          if ($('#matric_no').val()==''){
            swal("Invalid Entry!", "Matric no not specified. Please exam no", "info");
            $('#matric_no').focus();
            exit;
          }
          if ($('#f_recipient').val()==''){
            swal("Oops!", "Recipient not specified. Please enter Office of recipient", "info");
            $('#f_recipient').focus();
            exit;
          //return false;
          }

          if ($('#f_inst').val()==''){
            swal("Oops!", "Institution not specified. Please enter recipient's Institution.", "info");
            $('#f_inst').focus();
            exit;
          //return false;
          }
          if ($('#f_address').val()==''){
            swal("Oops!", "Recipient address not specified. Please enter recipient's address.", "info");
            $('#f_address').focus();
            exit;
          //return false;
          }
          //
          if ($('#f_email').val()==''){
            swal("Oops!", "Recipient email not specified. Please enter recipient's email.", "info");
            $('#f_email').focus();
            exit;
          //return false;
          }
       
          var generator = new IDTracker();
          var track_id = generator.generate();
          var ticket_id=$("#ticket_id").val();
          var matric_no =$("#matric_no").val();
          var app_name =$("#app_name").val();
          var f_recipient = $("#f_recipient").val();
          var f_inst = $("#f_inst").val();
          var f_email = $("#f_email").val();
          var f_address= $("#f_address").val();
          var f_reference=$("#f_reference").val();
          var f_url=$("#f_url").val();
          var f_usr=$("#f_usr").val();
          var f_pwd=$("#f_pwd").val();
          var faculty=$("#faculty").val();
          var program=$("#program").val();
          var dob=$("#dob").val();
          var gender=$("#gender").val();
          var eduCtg=$("#eduCtg").val();
         
          $("#matric_hd").val(matric_no);
          $("#ticket_hd").val(ticket_id);

              // Result Verification
              $.post("ajax/ajax_add_application.php",{ticket_id1:ticket_id,matric_no1:matric_no,fapp_name1:app_name,faculty1:faculty,program1:program,eduCtg1:eduCtg,dob1:dob,gender1:gender,f_inst1:f_inst,f_email1:f_email,f_reference1:f_reference,f_url1:f_url,f_usr1:f_usr,f_pwd1:f_pwd,f_address1:f_address,f_recipient1:f_recipient,track_id1:track_id},
              function(data, textStatus){
                 if(data == "0"){
                   location.href ="./";
                 }else if(data == "1"){
                      swal({title:"Successful!",
                        text:"Application successfully submitted. You can now upload your necessary documents.",
                        type:"success",
                        customClass:"swal-size-sm",
                        showCancelButton: false,
                        closeOnConfirm:true,
                      },function(){
                        // location.href ="my_tickets";
                        $("#modal_upload_cert").modal({"backdrop": "static"});
                        $("#modal_upload_cert").modal({"keyboard": "false"});
                        $("#modal_upload_cert").modal("show");
                         var dataString = 'id='+ ticket_id;
                       $.ajax({
                        type: "POST",
                        url: "../ajax/ajax_load_doc_cat.php",
                        data: dataString,
                        cache: false,
                          success: function(html){
                           $("#doc_title").html(html);
                          }
                      });
                      });
                      
                  
                 }else if (data == 2){
                   swal("Info","RRR has been used by YOU!","info");
                 }else{
                    swal({
                         position: 'top-end',
                         title: 'Ooops!!',
                         text: data,//"User account name not specified. Please specify account name!",
                         type: 'info',
                         customClass:'swal-size-sm',
                         confirmButtonClass: "btn-success",
                         showConfirmButton: true,
                         closeOnConfirm: false,
                        //  titleClass:"text-green"
                       })
                 }
               });
           
          })

          $("#doc_title").change(function(){
              $("#btn-div").show();
          } )

          $(document).on("click",".vw_doc",function(){
            $("#my_rta").html('ATTACHED TRANSCRIPT');
            var doc=$(this).data('id')+'.pdf';
            var dpth='reports/'+doc;
            var parent = $('embed#docid').parent();
            var newElement = "<embed src="+dpth+" id='docid' frameborder='0' width='100%' height='700px'>";
            $('embed#docid').remove();
            parent.append(newElement);
          })
          
           $(document).on("click",".vw_attach_doc",function(){
            $("#my_rta").html('ATTACHED TRANSCRIPT');
            var doc=$(this).data('id')+'.pdf';
            var dpth='application_cert/'+doc;
            var parent = $('embed#docid').parent();
            var newElement = "<embed src="+dpth+" id='docid' frameborder='0' width='100%' height='700px'>";
            $('embed#docid').remove();
            parent.append(newElement);
          })

          $("#btn_chnpwd").click(function()
          {
            var c_pwd = $("#c_pwd").val();
            var n_pwd = $("#n_pwd").val();
            var cn_pwd = $("#cn_pwd").val();
            // alert('current pwd: '+ c_pwd + ' New Pwd: '+ n_pwd + ' and the confirm pwd is: '+cn_pwd);
            if (n_pwd!==cn_pwd){
              swal({
                position:'top-end',
                type: 'warning',
                customClass:'swal-size-sm',
                title: 'Your new paswword does not match!',
                showConfirmButton: true,
              }, function(isConfirm){
                 location.reload();
                 exit;
              });
            }else{
              swal({
                title:'CHANGE MY PASSWORD!',
                text: 'This action is not reversible. Are you sure you want to continue?',
                type:'warning',
                customClass:'swal-size-sm',
                showCancelButton: true,
                confirmButtonClass: "btn-primary",
                cancelButtonClass: "btn-danger",
                confirmButtonText: "Yes, Change it!",
                cancelButtonText: "No, cancel pls!",
                closeOnConfirm: false,
                closeOnCancel: false,
                titleClass:"text-red"
              },
              function(isConfirm){
                if (isConfirm){
                  $.post("ajax/ajax_chng_pwd.php",{c_pwd1: c_pwd,n_pwd1:n_pwd,cn_pwd1:cn_pwd},
                  function(data, textStatus){
                    if(data == 1){
                      swal({
                        position:'top-end',
                        type: 'success',
                        title: 'User password successfully changed!',
                        showConfirmButton: true,
                      }, function(isConfirm){
                         location.href="../";
                      });
                     }else if (data == 2){
                       swal("Oops!","Invalid current password specified!.","error");
                     }else if(data==0){
                       swal("Oops!","Something went wrong. Password not changed.","error");
                   }else{
                       swal("Error!",data,"error");
                     }
                   });
              }else{
                swal({
                  title:'Cancelled!',
                  text:'Action cancelled by you.',
                   type:"success",
                  showConfirmButton: false,
                  timer: 2500
                });
              }
             });
            }

          });

          /*
DELETE User Account
*/
$(document).on("click", ".del_usr", function ()
 {
   var id = $(this).data('id');
  swal({
    title:'DELETE USER!',
    text: 'This action is not reversible. Are you sure you want to continue?',
    type:'warning',
    customClass:'swal-size-sm',
    showCancelButton: true,
    confirmButtonClass: "btn-primary",
    cancelButtonClass: "btn-danger",
    confirmButtonText: "Yes, delete it!",
    cancelButtonText: "No, cancel pls!",
    closeOnConfirm: false,
    closeOnCancel: false,
    titleClass:"text-red"
  },
  function(isConfirm){
    if (isConfirm){
      $.post("ajax/ajax_delete_usr.php",{id1: id},
      function(data, textStatus){
        if(data == 1){
          swal({
            position:'top-end',
            type: 'success',
            title: 'User successfully deleted!',
            showConfirmButton: true,
          }, function(isConfirm){
             location.reload();
          });
         }else if (data == 2){
           swal("Oops!","An error occured. Category not deleted.","error");
         }else if(data==0){
           swal("Oops!","Category has items and cannot be deleted.","error");
       }else{
           swal("Error!",data,"error");
         }
       });
  }else{
    swal({
      title:'Cancelled!',
      text:'Action cancelled by you.',
       type:"success",
      showConfirmButton: false,
      timer: 2500
    });
  }
});
});

//



/*
DELETE Attached Document
*/
$(document).on("click", ".del_doc", function ()
 {
   var id = $(this).data('id');
  swal({
    title:'DELETE ATTACHMENT!',
    text: 'This action is not reversible. Are you sure you want to continue?',
    type:'warning',
    customClass:'swal-size-sm',
    showCancelButton: true,
    confirmButtonClass: "btn-primary",
    cancelButtonClass: "btn-danger",
    confirmButtonText: "Yes, delete it!",
    cancelButtonText: "No, cancel pls!",
    closeOnConfirm: false,
    closeOnCancel: false,
    titleClass:"text-red"
  },
  function(isConfirm){
    if (isConfirm){
      $.post("ajax/ajax_delete_doc.php",{id1: id},
      function(data, textStatus){
        if(data == "1"){
          swal({
            position:'top-end',
            type: 'success',
            title: 'Document successfully deleted!',
            showConfirmButton: true,
          }, function(isConfirm){
             location.reload();
          });
       }else{
           swal("Error!","And error Occured. Document not deleted!","error");
         }
       });
  }else{
    swal({
      title:'Cancelled!',
      text:'Action cancelled by you.',
       type:"success",
      showConfirmButton: false,
      timer: 2500
    });
  }
});
});

/*
REFUND PAYMENT 
*/
$(document).on("click", ".refund", function ()
 {
   var id = $(this).data('id');
  swal({
    title:'REFUND PAYMENT!',
    text: 'This action is not reversible. Are you sure you want to continue?',
    type:'warning',
    customClass:'swal-size-sm',
    showCancelButton: true,
    confirmButtonClass: "btn-primary",
    cancelButtonClass: "btn-danger",
    confirmButtonText: "Yes, delete it!",
    cancelButtonText: "No, cancel pls!",
    closeOnConfirm: false,
    closeOnCancel: false,
    titleClass:"text-red"
  },
  function(isConfirm){
    if (isConfirm){
      $.post("ajax/ajax_refund_payment.php",{id1: id},
      function(data, textStatus){
        if(data == 1){
          swal({
            position:'top-end',
            type: 'success',
            title: 'Payment  successfully refunded!',
            showConfirmButton: true,
          }, function(isConfirm){
             location.reload();
          });        
       }else{
           swal("Error!","An error occured.","error");
         }
       });
  }else{
    swal({
      title:'Cancelled!',
      text:'Action cancelled by you.',
       type:"success",
      showConfirmButton: false,
      timer: 2500
    });
  }
});
});


/*
Reset User Account Password
*/
$(document).on("click", ".usr_reset", function ()
 {
   var usr_pwd = Math.random().toString(36).slice(-8);
   var id = $(this).data('id');
  swal({
    title:'RESET USER PASSWORD!',
    text: 'This action is not reversible. Are you sure you want to continue?',
    type:'warning',
    customClass:'swal-size-sm',
    showCancelButton: true,
    confirmButtonClass: "btn-primary",
    cancelButtonClass: "btn-danger",
    confirmButtonText: "Yes, Reset!",
    cancelButtonText: "No, cancel pls!",
    closeOnConfirm: false,
    closeOnCancel: false,
    titleClass:"text-red"
  },
  function(isConfirm){
    if (isConfirm){
      $.post("ajax/ajax_reset_usr.php",{id1: id,usr_pwd1:usr_pwd},
      function(data, textStatus){
        if(data == 1){
          swal({
            position:'top-end',
            type: 'success',
            customClass:'swal-size-sm',
            title: 'User password successfully reset!',
            showConfirmButton: true,
          }, function(isConfirm){
             location.reload();
          });
         }else if (data == 2){
           swal("Oops!","An error occured. User password not reset.","error");
         }else if(data==0){
           swal("Oops!","User account does not exist.","error");
         }else{
           swal("Error!",data,"error");
         }
       });
  }else{
    swal({
      title:'Cancelled!',
      text:'Action cancelled by you.',
       type:"success",
      showConfirmButton: false,
      timer: 2500
    });
  }
});
});

 function validateReg(){
   
        if ($("#name").val()==""){
            swal({
                 position: 'top-end',
                 title: 'No Entry!',
                 text:"User account name not specified. Please specify account name!",
                 type: 'info',
                 customClass:'swal-size-sm',
                 confirmButtonClass: "btn-success",
                 showConfirmButton: true,
                 closeOnConfirm: false,
                //  titleClass:"text-green"
               })
               return false;
          }
          
        
          
          if ($("#t_phone").val()==""){
            swal({
                 position: 'top-end',
                 title: 'No Entry!',
                 text:"Phone number not specified. Please specify phone number!",
                 type: 'info',
                 customClass:'swal-size-sm',
                 confirmButtonClass: "btn-success",
                 showConfirmButton: true,
                 closeOnConfirm: false,
                //  titleClass:"text-green"
               })
               return false;
          }
          
            if ($("#t_email").val()==""){
            swal({
                 position: 'top-end',
                 title: 'No Entry!',
                 text:"User account email not specified. Please specify account email!",
                 type: 'success',
                 customClass:'swal-size-sm',
                 confirmButtonClass: "btn-success",
                 showConfirmButton: true,
                 closeOnConfirm: false,
                //  titleClass:"text-green"
               })
               return false;
          }
          
          if ($("#t_email").val()!==$("#t_cemail").val()){
            swal({
                 position: 'top-end',
                 title: 'Email Mismatched!',
                 text:"Account email mismatch. Please re-enter confirmation email!",
                 type: 'success',
                 customClass:'swal-size-sm',
                 confirmButtonClass: "btn-success",
                 showConfirmButton: true,
                 closeOnConfirm: false,
                // titleClass:"text-green"
               })
               return false;
          }
          
          if ($("#t_pswd").val()!==$("#t_cpswd").val()){
            swal({
                 position: 'top-end',
                 title: 'Password Mismatched!',
                 text:"Account password mismatch. Please re-enter confirmation password!",
                 type: 'success',
                 customClass:'swal-size-sm',
                 confirmButtonClass: "btn-success",
                 showConfirmButton: true,
                 closeOnConfirm: false,
                //  titleClass:"text-green"
               })
               return false;
          }
          var str="@noun.edu.ng";
          var app_email=$("#t_email").val();
          if(app_email.indexOf(str) != -1){
              swal({
                 position: 'top-end',
                 title: 'Not Allowed!',
                 text:"Official email not allowed. Please use personal email!",
                 type: 'success',
                 customClass:'swal-size-sm',
                 confirmButtonClass: "btn-success",
                 showConfirmButton: true,
                 closeOnConfirm: false,                
               })
               return false;
          }
          
          if (!phonenumber(t_phone)){
              return false;
          }
          return true;
        // return false;
    }

		
$("#btn_signup").click(function(){
    if (validateReg()){
    var acct_name =$("#name").val();
    var t_phone=$("#t_phone").val();
    var t_email=$("#t_email").val();
    var t_cemail=$("#t_cemail").val();
    var t_pswd = $("#t_pswd").val();
    
     var str= acct_name;
    //  var fstr=fstr.split(" ")
    // if(!count(fstr)>1){
        
    // }
    
     $.post("ajax/ajax_process_register.php",{acct_name: acct_name,t_phone1:t_phone,t_email1:t_email,t_pswd1:t_pswd},
       function(data, textStatus){
         if(data==1){
             swal({
                  title:"Successful",
                  text:"User Account successfully registered. You can now login to continue!",
                  type:"success",
                  customClass:"swal-size-sm",
                  showCancelButton: false,
                  closeOnConfirm: true,
                  showLoaderOnConfirm: false,
                },function(){
                   location.href="./";
                })
         }else{
            //  alert(data);
              swal({
                  title:"Ooops!",
                  text: "Something went wrong! User Account registeration not successfull!",
                  type:"info",
                  customClass:"swal-size-sm",
                  showCancelButton: false,
                  closeOnConfirm: true,
                  showLoaderOnConfirm: false,
                },function(){
                //   location.reload();
                })
            
         }
     })
    }
   
     
})

$(document).on("click",".uploaded_doc",function(){
  var tid=$(this).data('tid');
  var id=$(this).data('id');
  var dataString = 'id='+ id;
 
  $("#h_title").html($(this).data('title')+'\'s Documents');
  $.ajax({
    type: "POST",
    url: "ajax/ajax_application_doc.php",
    data: dataString,
    cache: false,
      success: function(html){
       $("#accordion").html(html);
      }
  });
})

$(document).on("click",".btn_more_doc",function(){
   var tid=$(this).data('tid');
   var id=$(this).data('id');
   $("#matric_hd").val(id);
   $("#ticket_hd").val(tid);
    // alert(tid);
	  $.post("ajax/ajax_tid_sess.php",{id: tid},
        function(data, textStatus){
          if(data == "1"){
            location.href="upload_cert";
          }
        })
})


// $("#approved_btn").click(function(){
  $(document).on("click",".approved_btn",function(){
     var id=$(this).data('id');
     var tid=$(this).data('tid');
     var track =$(this).data('track');
	 
    var dataString = 'id='+ id +'&tid='+tid+'&track='+track;
	  alert(dataString);
    $.ajax({
      type: "POST",
      url: "ajax/ajax_approve_transcript.php",
    data: dataString,
      cache: false,
      success: function(html){
        if(html==1){
           swal({title:"Successfull!",
           text:"Generated Transcript successfully approved!",
           type:"success",
           customClass:"swal-size-sm",
           showCancelButton: false,
           closeOnConfirm:true,
         },function(isConfirm){
           if (isConfirm){
             location.href ="req_ticket";
           }
         });
        }
        else{
           swal({
                  title:"Ooops!",
                  text:"Something went wrong! Transcript not approved!" + html,
                  type:"info",
                  customClass:"swal-size-sm",
                  showCancelButton: false,
                  closeOnConfirm: true,
                  showLoaderOnConfirm: false,
                },function(){
                  location.reload();
            })
        }
      }
    });
})


$("#btn_rpt_docs").click(function(){
    $.ajax({
      type: "POST",
      url: "ajax/ajax_upload_cert.php",
      data: $('#cert_frm').serializeArray(),
      cache: false,
      success: function(html){
        if(html==1){
           swal({title:"Successfull!",
           text:"Generated report successfully uploaded!",
           type:"success",
           customClass:"swal-size-sm",
           showCancelButton: false,
           closeOnConfirm:true,
         },function(isConfirm){
           if (isConfirm){
             location.reload();
           }
         });
        }
        else{
            // alert(html);
        }
      }
    });
})

function phonenumber(inputtxt)
{
//  var phoneno = /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
//   var phoneno = /^\?([0-9]{11})\)$/;
  var phoneno = /^\d{11}$/;
  if(inputtxt.value.match(phoneno))
        {
            return true;
        }
      else
        {
            // alert("Invalid phone number specified!");
            return false;
        }
}

$(document).on("click",".rf_track",function(){
    var trac=$(this).data('id');
    // alert(trac);
     $.post("ajax/ajax_track_sess.php",{id: trac},
        function(data, textStatus){
          if(data == "1"){
            location.href="track";
          }
        })
    })
 


    $(document).on("click", ".transcript_btn",function(){
      var id = $(this).data('id');
      var tid = $(this).data('tid');
      var trac = $(this).data('track');
      //alert("Generating Report");
      $.post("letter.php",{id1: id,tid1:tid,trac1:trac},
      function(data, textStatus){      
               $.post("transcript.php",{id1: id,tid1:tid,trac1:trac},
           function(data, textStatus){               
                 $.post("merge_pdf",{id1: id,tid1:tid,trac1:trac},
                   function(data, textStatus){
                     if(data=="1"){         
                       swal({title:"Successfull!",
                         text:"Transcript successfully generated!",
                         type:"success",
                         customClass:"swal-size-sm",
                         showCancelButton: false,
                         closeOnConfirm:true,
                       },function(isConfirm){
                         if (isConfirm){
                           location.reload();                                
                         }
                       });
                     }
                   })
           })
      })
   })

   $(document).on("click", ".tcopy_btn",function(){
    var id = $(this).data('id');
    var tid = $(this).data('tid');
    var trac = $(this).data('track');
    //alert("Generating Report");
    
    $.post("student_copy.php",{id1: id,tid1:tid,trac1:trac},
         function(data, textStatus){               
              
                   if(data){         
                     swal({title:"Successfull!",
                       text:"Transcript successfully generated!",
                       type:"success",
                       customClass:"swal-size-sm",
                       showCancelButton: false,
                       closeOnConfirm:true,
                     },function(isConfirm){
                       if (isConfirm){
                         location.reload();                                
                       }
                     });
                   }
            })
        })

   $(document).on("click", ".letter_btn",function(){
      var id = $(this).data('id');
      var tid = $(this).data('tid');
      var trac = $(this).data('track');
      var tag = $(this).data('tag');      
   $.post("intro_letter.php",{id1: id,tid1:tid,trac1:trac},    
      function(data, textStatus){
        //alert(data);
         if(data=="1"){       
                 swal({title:"Successfull!",
                   text:"Introduction letter successfully generated!",
                   type:"success",
                   customClass:"swal-size-sm",
                   showCancelButton: false,
                   closeOnConfirm:true,
                 },function(isConfirm){
                   if (isConfirm){
                     location.reload();                                
                   }
                 });
               }
      })
   })

   $(document).on("click", ".reference_btn",function(){
      var id = $(this).data('id');
      var tid = $(this).data('tid');
      var trac = $(this).data('track');       
   $.post("regerence.php",{id1: id,tid1:tid,trac1:trac},   
      function(data, textStatus){
          if(data=="1"){          
                 swal({title:"Successfull!",
                   text:"Reference letter successfully generated!",
                   type:"success",
                   customClass:"swal-size-sm",
                   showCancelButton: false,
                   closeOnConfirm:true,
                 },function(isConfirm){
                   if (isConfirm){
                     location.reload();                                
                   }
                 });
               }
      })
   })

  $(document).on("click", ".progress_btn",function(){
      var id = $(this).data('id');
      var tid = $(this).data('tid');
      var trac = $(this).data('track');       
   $.post("progress.php",{id1: id,tid1:tid,trac1:trac},   
      function(data, textStatus){
          if(data=="1"){         
                 swal({title:"Successfull!",
                   text:"Progress report successfully generated!",
                   type:"success",
                   customClass:"swal-size-sm",
                   showCancelButton: false,
                   closeOnConfirm:true,
                 },function(isConfirm){
                   if (isConfirm){
                     location.reload();                                
                   }
                 });
               }
      })
   })

    $(document).on("click", ".proficiency_btn",function(){
      var id = $(this).data('id');
      var tid = $(this).data('tid');
      var trac = $(this).data('track');       
   $.post("proficiency.php",{id1: id,tid1:tid,trac1:trac},   
      function(data, textStatus){
       // alert(data);
         if(data=="1"){         
                 swal({title:"Successfull!",
                   text:"Proficiency letter successfully generated!",
                   type:"success",
                   customClass:"swal-size-sm",
                   showCancelButton: false,
                   closeOnConfirm:true,
                 },function(isConfirm){
                   if (isConfirm){
                     location.reload();                                
                   }
                 });
               }
      })
   })

   $(document).on("click", ".recommend_btn",function(){
      var id = $(this).data('id');
      var tid = $(this).data('tid');
      var trac = $(this).data('track');    
      //alert(id);
   $.post("recommendation.php",{id1: id,tid1:tid,trac1:trac},   
      function(data, textStatus){
         if(data=="1"){         
                 swal({title:"Successfull!",
                   text:"Recommendation letter successfully generated!",
                   type:"success",
                   customClass:"swal-size-sm",
                   showCancelButton: false,
                   closeOnConfirm:true,
                 },function(isConfirm){
                   if (isConfirm){
                     //location.href=data;
                     location.reload(); 
                   }
                 });
               }
      })
   })


   $(document).on("click", ".edit_ticket",function(){
    var id = $(this).data('id');
    var tid = $(this).data('tid');
    var trac = $(this).data('track');
    // alert(id);
    $.post("ajax/ajax_set_sess.php",{id1: id,tid1:tid,trac1:trac},
    function(data, textStatus){
      if(data == "1"){         
        location.href="app_review";
      }
    })
 })

 $(document).on("click", ".menu",function(){
  var id = $(this).data('id');
      var title= $(this).data('title');
  //alert(id);
       $.post("ajax/ajax_role.php",{id1: id,title1: title},
     function(data, textStatus){
        // location.reload(); 
        location.href="request";
     })
})

$(function(){
  $("a.hidelink").each(function (index, element){
      var href = $(this).attr("href");
      $(this).attr("hiddenhref", href);
      $(this).removeAttr("href");
  });
  $("a.hidelink").click(function(){
      url = $(this).attr("hiddenhref");
      window.open(url, '_self');
  })
});

$(document).on("click", ".refund_ticket",function(){
  var id = $(this).data('id');
  var tid = $(this).data('tid');
  var trac = $(this).data('track');
  // alert(id);
  $.post("ajax/ajax_set_sess.php",{id1: id,tid1:tid,trac1:trac},
  function(data, textStatus){
    if(data == "1"){         
      location.href="refund_application";
    }
  })
})