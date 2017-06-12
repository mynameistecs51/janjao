<!-- Page Name -->
    <div class="col-lg-2">
        <i style="font-size: 15px;"><span class="glyphicon glyphicon-dashboard"></span> <?php echo $topPageName; ?> </i> 
    </div>
    <div class="col-lg-10 search-top" align="right">
        <div class="sh-right">
            <form name="formSearch" id="formSearch" class="form-inline" method="POST" action="<?php echo base_url()?>event/search/">
                <button  type="submit" class="btn btn-primary" style="float: right;">Search</button>
                CheckIn Date : 
                <input type="text" class="form-control"  id="keyword" style="width: 138px;margin-right: 10px;" placeholder="keyword" name="keyword" value="<?php echo $this->packfunction->dtcheckin() ?>">
                CheckOut Date :
                <input type="text" class="form-control"  id="keyword" style="width: 138px;margin-right: 10px;" placeholder="keyword" name="keyword" value="<?php echo $this->packfunction->dtcheckout() ?>">  
                Room Type :
                <select class="form-control" style="width: 120px;margin-right: 10px;">
                    <option value="STANDARD" selected>STANDARD</option>
                    <option value="VIP">VIP</option>
                </select>
                Status :
                <select class="form-control" style="width: 120px;margin-right: 10px;">
                    <option value="ALL" selected>ALL</option>
                    <option value="EMPTY">EMPTY</option>
                    <option value="BOOKED">BOOKED</option>
                    <option value="CHECKIN">CHECKIN</option>
                    <option value="CHECKIN">CHECKOUT</option>
                    <option value="CLEANING">CLEANING</option>
                </select>
            </form>
        </div> 
    </div>
    <hr class="bd-header">  
    <!-- Page Content -->  
    <div class="col-lg-12" style="font-size: 16px;margin-bottom: 15px;">
     <i class="btn btn-warning btn-sm">&nbsp;&nbsp;</i> จอง, 
     <i class="btn btn-danger btn-sm">&nbsp;&nbsp;</i> เข้าพัก, 
     <i class="btn btn-success btn-sm">&nbsp;&nbsp;</i> กำลังทำความสะอาด, 
     <i class="btn btn-default btn-sm">&nbsp;&nbsp;</i> ว่าง
    </div>
    <div class="col-lg-4">
    ddddddd
    </div>
    
 

