
<!-- begin #content -->
<div id="content" class="content" style="margin-top:10px">
<h1 class="page-header"><?php echo $_SESSION['title'];?> <br><br> NOUN Graduates <small><?php echo count($records['list']);?> results found</small></h1>
<div class="row">
	<!-- begin col-12 -->
<div class="col-md-12">
	<div class="result-container">

			

<ul class="result-list bg-info">
	<?php
	$rwCnt=0;
	$cnt=1;
	$pn = 1;
	$ppage =50;
	$perc =0;
	$k=0;
	$page = "page".$pn;
   
	$bg="";
	$tbg="bg-tgrey";
	$bg="background-color: #f5f5f569!important;";

	//var_dump($records);
	//exit;
	$rcnt=0;
	if(!empty($records) && count($records)>0){
		$rcnt =count($records);
		for($i=0;$i<=$rcnt-1;$i++){
		foreach($records as $element){
			//var_dump($req_results[$i]);
			foreach ($element as $key => $value) {							
				$desc="";
				$badge ="";
				$vtypeid="";
				//$gclass =class_of_degree($value['cgpa']);
				$action ="";
				$option="";
				
		if ($bg=="bg-info"){
			$bg="";
		}else{	

		}
		$action =  " <a class =\"btn\" href=  href =\"#\"></a>";
		?>

		<li id ="<?php echo $k; ?>" class="<?php echo $page; ?> page" style="<?php echo $bg; ?>; height:auto">

	
		<div class="result-price pull-right" style="font-size:20px;margin-top:15px">
			<strong> Matric No</strong>
			<br> 
			<?php echo $value['vMatricno'];?> 
			<br>
			<strong> Graduation Year</strong> 
			<br>
			<?php echo $value['vyear'];?> 	
			<br>
			<div class="d-grid gap-2 d-md-block">

  
<!-- Button element -->    
	
<!--<a class="btn btn-success modifyBtn" data-matricno="<?php echo $value['vMatricno']; ?>" data-action="modify" type="button">Modify</a>
		<a class="btn btn-primary modifyBtn" data-matricno="<?php echo $value['vMatricno']; ?>" data-action="view" type="button">View</a>

		<scrip>
				$(document).on("click", ".modifyBtn", function() {
						var id = $(this).data('matricno');
						var action = $(this).data('action');
						var postData = {id: id};

						if(action === "modify") {
								postData.field = 'vMatricno';
								postData.tablename = 'graduate_info';
						} else if(action === "view") {
								postData.field = 'vMatricno';
								postData.tablename = 'graduate_info';
						}

						$.post("ajax/ajax_set_id.php", postData, function(data, testStatus) {
								if (data == "1") {
										if(action === "modify") {
												location.href = "modify.php";
										} else if(action === "view") {
												location.href = "student_info";
										}
								}
						});
				});
		</script> -->

 






 <!-- <a class="btn btn-success modifyBtn" data-matricno="<?php echo $value['vMatricno']; ?>" type="button">Verify</a>/\ -->
 <a class="btn btn-success btn-lg viewBtn input-lg" data-matricno="<?php echo $value['vMatricno']; ?>" type="button">View</a>


<script>
	  $(document).on("click",".modifyBtn",function() {
            var id=$(this).data('matricno');
            $.post("ajax/ajax_set_id.php",{id:id},
            function(data,testStatus){
            if (data=="1"){
            location.href="verify";
            }
        })
	    })
	  $(document).on("click",".viewBtn",function() {
            var id=$(this).data('matricno');
            $.post("ajax/ajax_set_id.php",{id:id},
            function(data,testStatus){
            if (data=="1"){
            location.href="stud_info";
            }
        })
	    })
	  
	

</script>


</div>
		
		</div>
					<div class="result-info view_result" >
					
					<p style="font-size:26px;font-weight:bold">    <p>
					<div class="col-md-12" style="width:100%">
					<table id="rrr_tb" class="table" style="font-size:18px">
                        <tbody>
                        <tr>
                            <th class="<?php echo $tbg; ?>"> Graduate Name:</th>
                            <td class="<?php echo $tbg; ?>"> <?php echo $value['vname'];?> </td>
                        </tr>
                        
                        <tr>
                            <th class="<?php echo $tbg; ?>">Date of Birth:</th>
                            <td  class="<?php echo $tbg; ?>"> <?php echo $value['dob']; ?> ||  <b> Gender: </b> <?php 
															$gender = $value['cgender']; 
															if($gender == 'M'){
																echo "Male";
															}else if($gender == 'F'){
																echo "Female";
															}else{
																echo "Unknown";
															}
															?> </td>
                        </tr>
												<tr>
                            <th class="<?php echo $tbg; ?>">Program:</th>
                            <td  class="<?php echo $tbg; ?>"> <?php echo $value['program']; ?> ||  <b> Category: </b> <?php echo $value['category']; ?> </td>
                        </tr>
                        <!-- <tr>
                            <th class="<?php echo $tbg; ?>">Class of Degree:</th>
                            <td  class="<?php echo $tbg; ?>"> <?php echo $value['classofdegree']; ?> 
                        </tr> -->
                        <tr>
                            <th class="<?php echo $tbg; ?>">Study Center:</th>
                            <td  class="<?php echo $tbg; ?>"><?php echo $value['studycentre']; ?> </td>
                        </tr>
                        
                      
                        </tbody>
                    </table>
                    </div>												
                             <p>
							 Contact Details: &nbsp;<i class="fa fa-phone"></i> <strong>:</strong> <?php echo $value['phoneno']; ?>  &nbsp; <i class="fa fa-envelope"></i>  <strong>:</strong> <?php echo $value['email']; ?>
							 </p>
                        </p>
                    </p>
				</div>
				</li>
				<?php
				if($bg=="background-color: #f5f5f569!important;"){
					$bg="";

					$tbg="";
				}else{
				$tbg="bg-tgrey";
					$bg="background-color: #f5f5f569!important;";
				}
				$k+=1;
			$rwCnt+=1;
			if($cnt==$ppage){
			$cnt=0;
			if($rwCnt<$rcnt){
				$pn+=1;
				$page = "page".$pn;
			}
			}
			$cnt+=1;
			}
		 }
		}
	}
	$bg="";
	$tbg="bg-tgrey";
	$bg="background-color: #f5f5f569!important;";
		
	?>
	</ul>
	<br>
	<div class="clearfix">
	<div class="x_title">
		<div id="page-selection" class="pull-right" style="margin-top:0px"></div>
		<div class="">
			<?php
				if ($ppage>=$rwCnt){
				echo "
				<p>Showing 1 to $rcnt of $rcnt entries</p>";
			}else{
				echo "
				<p>Showing 1 to $ppage of $rcnt entries</p>";
			}
				?>
		</div>
	</div>
	</div>
</div>
</div>
	<!-- end col-12 -->
</div>
<!-- end row -->
	
</div>


		<!-- end #content -->
