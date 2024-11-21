
<!-- begin #content -->
<div id="content" class="content" style="margin-top:10px">
<h1 class="page-header"><strong>Student Full Information</strong></h1>
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
	if (!empty($records['list']) && count($records['list']) > 0) {
		
	foreach ($records['list'] as $value) {							
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

	
		<div class="result-price pull-right" style="font-size:20px;margin-top:10px">
			 <!-- Display student image -->
     <div class="image">
    <a href="javascript:;">
        <?php if (!empty($value['image'])): ?>
            <img src="data:image/jpeg;base64,<?php echo base64_encode($value['image']); ?>" alt="User Image">
        <?php else: ?>
            <img src="assets/img/user.png" alt="Default Image">
        <?php endif; ?>
    </a>
		<br>
		<strong> <?php echo $value['vMatricno'];?> </strong>
</div>


		</div>
					<div class="result-info view_result" >
					
					 <p style="font-size:26px;font-weight:bold">Personal Information</p>
					<div class="col-md-12" style="width:100%">
					<table id="rrr_tb" class="table" style="font-size:18px">
                        <tbody>
                        <tr>
                            <th class="<?php echo $tbg; ?>"> Graduate Name:</th>
                            <td class="<?php echo $tbg; ?>"> <?php echo $value['vname'];?> </td>
                        </tr>
                        
                        <tr>
                            <th class="<?php echo $tbg; ?>">Date of Birth:</th>
                            <td  class="<?php echo $tbg; ?>"> <?php echo $value['dob']; ?> ||  <b> Gender: </b>
                            <?php 
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
                            <th class="<?php echo $tbg; ?>">State of Origin:</th>
                            <td  class="<?php echo $tbg; ?>"> <?php echo $value['cstateid']; ?> ||  <b> Local Govt: </b> <?php echo $value['clgaid']; ?>  </td>
                        </tr>
                        <!-- <tr>
                            <th class="<?php echo $tbg; ?>">Class of Degree:</th>
                            <td  class="<?php echo $tbg; ?>"> <?php echo $value['classofdegree']; ?> 
                        </tr> -->
                        <tr>
                            <th class="<?php echo $tbg; ?>">Phone Number:</th>
                            <td  class="<?php echo $tbg; ?>"><?php echo $value['phoneno']; ?>  ||  <b> Email: </b> <?php echo $value['email']; ?> </td> </td>
                        </tr>
                        
                      
                        </tbody>
                    </table>
                    </div>												
              
				</li>

				<br>
		<li id ="1" class="<?php echo $page; ?> page" style="" height:auto">

	
		<div class="result-price pull-right" style="font-size:20px;margin-top:15px">
	
			<br>
			<strong> Admission Year:</strong> 
			<br>
			<?php echo $value['adm_year'];?> 	
			<br>
			<strong> Graduation Year:</strong> 
			<br>
			<?php echo $value['vyear'];?> 	
			<br>
	
		</div>
					<div class="result-info view_result" >
					
					 <p style="font-size:26px;font-weight:bold">Academic Information</p>
					<div class="col-md-12" style="width:100%">
					<table id="rrr_tb" class="table" style="font-size:18px">
                        <tbody>
                        <tr>
                            <th class="<?php echo $bg; ?>"> Faculty:</th>
                            <td class="<?php echo $bg; ?>"> <?php echo $value['faculty'];?> </td>
                        </tr>
                        
												<tr>
                            <th class="<?php echo $bg; ?>">Program:</th>
                            <td  class="<?php echo $bg; ?>"> <?php echo $value['program']; ?> </td>
                        </tr>
                          
                        <tr>
                            <th class="<?php echo $bg; ?>">Category:</th>
                            <td  class="<?php echo $bg; ?>"><?php echo $value['category']; ?> </td>
                        </tr>
                        
                          
                        <tr>
                            <th class="<?php echo $bg; ?>">Study Center:</th>
                            <td  class="<?php echo $bg; ?>"><?php echo $value['studycentre']; ?> </td>
                        </tr>
                        
                      
                        </tbody>
                    </table>
                    </div>												
                      
				</div>
				</li>



					<


		
		<li id ="1" class="<?php echo $page; ?> page" style="" height:auto">

	
					<div class="result-info view_result" >
					
					 <p style="font-size:26px;font-weight:bold">Employment Information</p>
					<div class="col-md-12" style="width:100%">
					<table id="rrr_tb" class="table" style="font-size:18px">
                        <tbody>
                        <tr>
                            <th class="<?php echo $bg; ?>"> Employment Status:</th>
                            <td class="<?php echo $bg; ?>"> <?php echo $value['employment_status'] == 1 ? "Employed" : "Unemployed";?> </td>
                        </tr>
                        
												<tr>
                            <th class="<?php echo $bg; ?>">Organization:</th>
                            <td  class="<?php echo $bg; ?>"> <?php echo $value['organization_name']; ?> </td>
                        </tr>
                         <tr>
                            <th class="<?php echo $bg; ?>">Office Address:</th>
                            <td  class="<?php echo $bg; ?>"> <?php echo $value['organization_address']; ?> 
                        </tr> 
                        <tr>
                            <th class="<?php echo $bg; ?>">Office Phone No:</th>
                            <td  class="<?php echo $bg; ?>"> <?php echo $value['organization_phone']; ?> ||  <b> Office Email: </b> <?php echo $value['organization_email']; ?> </td> </td>
                        </tr>
                        
                      
                        </tbody>
                    </table>
                    </div>												
              
                      
				</div>
				</li>
		</div>	


				<?php
				if($bg=="background-color: #f5f5f569!important;"){
					$bg="";

					$tbg="";
				}else{
				$tbg="bg-tgrey";
					$bg="background-color: #f5f5f569!important;";
				}
				$k=1;
			
			}
		
		//}
	}
	$bg="";
	$tbg="bg-tgrey";
	$bg="background-color: #f5f5f569!important;";
		
	?>
	</ul>
	
	
</div>
</div>
	<!-- end col-12 -->
</div>
<!-- end row -->
	
</div>


		<!-- end #content -->



		



