<?php
    include 'dbconfig.php';

    $conn= new mysqli($hostname,$username,$pwd,'ordermanagement') or die("Could not connect to mysql".mysqli_error($con));
?>
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav" id="menu">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link active" href="/">
                  <li class='nav-item'>
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <!--The Begining of submenu-->
                <div class="sb-sidenav-menu-heading">Master</div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Master
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                      <div class="sb-sidenav-menu-heading">Company Master</div>
                      <a class="nav-link" href="companyprofile">Company</a>
                      <a class="nav-link" href="backup">Data Backup</a>
                      <a class="nav-link" href="users">Users</a>
                        <div class="sb-sidenav-menu-heading">Product Master</div>
                        <a class="nav-link" href="category">Category</a>
                        <a class="nav-link" href="subcategory">SubCategory</a>
                        <a class="nav-link" href="brands">Brands</a>
                        <a class="nav-link" href="unitm">Unit Master</a>
                        <a class="nav-link" href="productmaster">Product Master Entry</a>
                        <div class="sb-sidenav-menu-heading">Party</div>
                        <a class="nav-link" href="partycr.php">Sundry Creditor(Supplier)</a>
                        <a class="nav-link" href="partydr.php">Sundry Debtor(Customer)</a>
                        <div class="sb-sidenav-menu-heading">HR</div>
                        <a class="nav-link" href="#">Department</a>
                        <div class="sb-sidenav-menu-heading">Region</div>
                        <a class="nav-link" href="branch.php">Branch</a>
                        <a class="nav-link" href="zone.php">Zone/Area</a>
                    </nav>
                </div>
                <div class="sb-sidenav-menu-heading">Transaction</div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts_p" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Transaction
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts_p" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="purchase.php">Purchase</a>
                        <a class="nav-link" href="inchalan.php">Inward Challan</a>
                        <a class="nav-link" href="invoice.php">Sell/Invoice</a>
                        <a class="nav-link" href="#">OutWard Challan</a>
                        <a class="nav-link" href="#">Purchase Order</a>
                        <a class="nav-link" href="#">Sells Order</a>
                        <a class="nav-link" href="#">Purchase Return</a>
                        <a class="nav-link" href="#">Sells Return</a>
                        <a class="nav-link" href="#">Damage Entry</a>
                    </nav>
                </div>
                <div class="sb-sidenav-menu-heading">Account</div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts_v" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Vouchers
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts_v" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                      <div class="sb-sidenav-menu-heading">Voucher</div>
                        <a class="nav-link" href="#">Receipt Voucher</a>
                        <a class="nav-link" href="#">Payment Voucher</a>
                        <a class="nav-link" href="#">Contra Voucher</a>
                        <a class="nav-link" href="#">Journal Voucher</a>
                        <div class="sb-sidenav-menu-heading"></div>
                        <a class="nav-link" href="#">Ledger View</a>
                        <a class="nav-link" href="#">Tryling Ballance</a>
                        <a class="nav-link" href="#">Trading Account</a>
                        <a class="nav-link" href="#">Ballance Sheet</a>
                    </nav>
                </div>
                <div class="sb-sidenav-menu-heading">Report</div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts_r" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Report
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts_r" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="#">GST Report</a>
                        <a class="nav-link" href="#">Purchase Report</a>
                        <a class="nav-link" href="#">Sells Report</a>
                        <a class="nav-link" href="#">Party Outstanding</a>
                    </nav>
                </div>
            </div>
          </li>
        </div>
        <div class="sb-sidenav-footer">
            <?php
                $recs=$conn->query("select * from companymaster");
                if($recs->num_rows>0){
                    if($rec=$recs->fetch_assoc()) $tempCName=$rec['CompanyName'];
                }else{
                    $tempCName='';
                }
            ?>
            <div class="small text-success"><i class="fa fa-globe"></i> <?php echo $tempCName;?></div>
        </div>
    </nav>
</div>
