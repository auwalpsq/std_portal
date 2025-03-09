<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb hidden-print pull-right">
				<li><a href="javascript:;">Home</a></li>
				<li class="active">Study Leave Report</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header hidden-print">Staff on Leave <small>number of staff on leave</small></h1>
			<!-- end page-header -->
			
			<!-- begin invoice -->
			<div class="invoice">
                <div class="invoice-company">
                    <span class="pull-right hidden-print">
                    <a href="javascript:;" class="btn btn-sm btn-success m-b-10"><i class="fa fa-download m-r-5"></i> Export as PDF</a>
                    <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-success m-b-10"><i class="fa fa-print m-r-5"></i> Print</a>
                    </span>
                    Academic Staff on Leave Till Date
                </div>
                <!-- <div class="invoice-header">
                    <div class="invoice-from">
                        <small>from</small>
                        <address class="m-t-5 m-b-5">
                            <strong>Twitter, Inc.</strong><br />
                            Street Address<br />
                            City, Zip Code<br />
                            Phone: (123) 456-7890<br />
                            Fax: (123) 456-7890
                        </address>
                    </div>
                    <div class="invoice-to">
                        <small>to</small>
                        <address class="m-t-5 m-b-5">
                            <strong>Company Name</strong><br />
                            Street Address<br />
                            City, Zip Code<br />
                            Phone: (123) 456-7890<br />
                            Fax: (123) 456-7890
                        </address>
                    </div>
                    <div class="invoice-date">
                        <small>Invoice / July period</small>
                        <div class="date m-t-5">August 3,2012</div>
                        <div class="invoice-detail">
                            #0000123DSS<br />
                            Services Product
                        </div>
                    </div>
                </div> -->
                <div class="invoice-content">
                    <div class="table-responsive">
                        <table class="table table-invoice">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th style="width:10%">NAMES</th>
                                    <th>FACULTY<br>DIRECTORATE</th>
                                    <th>DEGREE</th>
                                    <th>EFFECTIVE DATE</th>
                                    <th>EXPECTED DATE OF COMPLETION</th>
                                    <th>SPONSOR</th>
                                    <th>REMARKS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $table_name = "vw_staff_on_leave";
                                    $data = array('id'=>'all', 'limit'=>'');
                                    $staffs_on_leave = $gateway->genericFind($table_name, $data);
                                    if($staffs_on_leave['message'] ==='success'){
                                        $sn = 1;
                                        foreach($staffs_on_leave['result'] as $staff_on_leave){ ?>
                                            <tr>
                                                <td><?php echo $sn++; ?></td>
                                                <td><?php echo "$staff_on_leave[first_name] $staff_on_leave[surname] $staff_on_leave[other_names]"; ?></td>
                                                <td><?php echo $staff_on_leave['department']; ?></td>
                                                <td><?php echo "$staff_on_leave[programme] in $staff_on_leave[course] at the $staff_on_leave[institution]"; ?></td>
                                                <td><?php echo $staff_on_leave['start_date']; ?></td>
                                                <td><?php echo $staff_on_leave['end_date']; ?></td>
                                                <td><?php echo $staff_on_leave['sponsor']; ?></td>
                                                <td><?php echo $staff_on_leave['remarks']; ?><br><strong><?php echo $staff_on_leave['status'] ?></strong></td>
                                            </tr>
                                <?php    }
                                    }else{
                                        echo "Failed to fetch data from the database.";
                                        exit();
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- <div class="invoice-price">
                        <div class="invoice-price-left">
                            <div class="invoice-price-row">
                                <div class="sub-price">
                                    <small>SUBTOTAL</small>
                                    $4,500.00
                                </div>
                                <div class="sub-price">
                                    <i class="fa fa-plus"></i>
                                </div>
                                <div class="sub-price">
                                    <small>PAYPAL FEE (5.4%)</small>
                                    $108.00
                                </div>
                            </div>
                        </div>
                        <div class="invoice-price-right">
                            <small>TOTAL</small> $4508.00
                        </div>
                    </div>
                </div> -->
                <!-- <div class="invoice-note">
                    * Make all cheques payable to [Your Company Name]<br />
                    * Payment is due within 30 days<br />
                    * If you have any questions concerning this invoice, contact  [Name, Phone Number, Email]
                </div>
                <div class="invoice-footer text-muted">
                    <p class="text-center m-b-5">
                        THANK YOU FOR YOUR BUSINESS
                    </p>
                    <p class="text-center">
                        <span class="m-r-10"><i class="fa fa-globe"></i> matiasgallipoli.com</span>
                        <span class="m-r-10"><i class="fa fa-phone"></i> T:016-18192302</span>
                        <span class="m-r-10"><i class="fa fa-envelope"></i> rtiemps@gmail.com</span>
                    </p>
                </div> -->
            </div>
			<!-- end invoice -->
		</div>