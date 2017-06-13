    <!-- Page Name -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/datatable/css/dataTables.bootstrap.min.css">
    <div class="col-lg-12">
        <i style="font-size: 18px;">BOOKED LIST</i>
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
                    <tr >
                       <th  style="text-align: center;width: 40px;">No.</th>
                       <th style="text-align: center;width:  150px;">BOOKED NUMBER</th>
                       <th style="text-align: center;width:  300px;">NAME </th>
                       <th style="text-align: center;width:  80px;">ROOM</th>
                       <th style="text-align: center;width:  150px;">BOOKED DATE</th>
                       <th style="text-align: center;width:  200px;">CHECK DATE</th>
                       <th style="text-align: center;width:  100px;"> CREATE BY</th>
                       <th style="text-align: center;width:  150px;">#</th>
                   </tr>
               </thead>
               <tbody>
                   <tr>
                       <td>1</td>
                       <td>BK170613201001</td>
                       <td>นายไชยวัฒน์  หอมแสง</td>
                       <td>201</td>
                       <td>13/06/2017 13:00</td>
                       <td>15/06/2017 12:00</td>
                       <td>Administrator</td>
                       <td>
                         <button class="btn btn-primary col-sm-5 pull-left btn-xs">แก้ไข</button>
                         <button class="btn btn-warning col-sm-5 pull-right btn-xs">ยกเลิก</button>
                     </td>
                 </tr>
                 <tr>
                   <td>2</td>
                   <td>BK170613205001</td>
                   <td>นายอาสา  มาครับ</td>
                   <td>205</td>
                   <td>13/06/2017 13:00</td>
                   <td>15/06/2017 12:00</td>
                   <td>Administrator</td>
                   <td >
                    <button class="btn btn-primary col-sm-5 pull-left btn-xs">แก้ไข</button>
                    <button class="btn btn-warning col-sm-5 pull-right btn-xs">ยกเลิก</button>
                </td>
            </tr>
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



