    <!-- Page Name -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/datatable/css/dataTables.bootstrap.min.css"> 
    <div class="col-lg-12">
        <i style="font-size: 18px;">USER LIST</i>
        <a href="<?php echo base_url()?>user/create"  class="btn btn-success"  style="float: right;margin-top: -10px;">CREATE USER</a>
    </div> 
    <hr style="margin-top: 30px;">

     
    <!-- Page Content -->
    <div class="col-lg-12">  
        <!-- Page Features -->
        <div class="row text-center">  
            <div class="col-lg-12" align="right">
                <div class="sh-right">
                	<form name="formSearch" id="formSearch" method="POST" action="<?php echo base_url()?>user/search/">
	                    <button  type="submit" class="btn btn-primary " style="float: right;">Search</button>
	                    <input type="text" class="form-control"  id="keyword" style="width: 250px;margin-right: 10px;" placeholder="keyword" name="keyword" value="<?php echo $keyword; ?>">  
                    </form>
                </div> 
            </div> 
        </div>
        <div class="row text-center" style="margin-top: 10px;">
            <div class="col-lg-12" align="left">
                <table id="fairlist" class="table table-striped table-bordered" cellspacing="0" width="100%" >
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th width="200">User Group</th> 
                            <th width="150">UserName</th>
                            <th width="150">Email</th>
                            <th>First Name - Last Name</th>
                            <th>Country Name</th>
                            <th width="80">#</th>
                        </tr>
                    </thead> 
                    <tbody>
                    <?php if(count($getlist)>0){  ?>
                    <?php $n=1; foreach ($getlist as $rs) { ?>
                    		<tr>
	                            <td><?php echo $n; ?></td>
	                            <td><?php echo $rs['usergroupName']; ?></td>
                                <td><?php echo $rs['username']; ?></td>
	                            <td><?php echo $rs['useremail']; ?></td>
	                            <td><?php echo $rs['fullname']; ?></td> 
                                <td><?php echo $rs['countryName']; ?></td> 
	                            <td align="center">
		                            <a href="<?php echo base_url(); ?>user/edit/<?php echo md5($rs['userID']); ?>" class="btn btn-danger btn-sm" style="width: 60px;">EDIT</a>  
	                            </td> 
	                        </tr>  
                    <?php $n++; }  ?> 
                    <?php }else{ ?>
                    		<tr>
                    			<td colspan="7">No DATA !</td>
                    		</tr>

                    <?php } ?>
                    </tbody>
                </table>
            </div>


        </div>
        <!-- /.row -->
<script type="text/javascript"  src="<?php echo base_url()?>assets/datatable/js/jquery-1.12.4.js" ></script> 
<!-- <script type="text/javascript"  src="<?php echo base_url()?>assets/datatable/js/dataTables.bootstrap.min.js" ></script> 
<script type="text/javascript"  src="<?php echo base_url()?>assets/datatable/js/jquery.dataTables.min.js" ></script>  -->
<!--  END Fair List -->
<script type="text/javascript">
	$(document).ready(function() {
	    // $('#fairlist').DataTable();
	} );
</script>



