<?php
session_start();
/*$hostname_oCn = "localhost";
$username_oCn = 'root';
$password_oCn = 'pass09876';
$databasename='enliteweb';*/
include 'dbconfig.php';
$conn = new mysqli($hostname, $username, $pwd, $databasename);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        $error=1;
    }
    $result=$conn->query("select * from users where MobileNO='".$_SESSION['userid']."'");
    if($result->num_rows>0){

    }else{
        header("Location: /login");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <title>Enlite Web</title>
      <link href="css/styles.css" rel="stylesheet" />
      <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
      <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    </head>
    <body class="sb-nav-fixed">
        <div id="content">
        <?php include "nav.php"?>
        <div id="layoutSidenav">
            <?php include "menu.php"?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                    <div class="row">
                    	<div class="col"><br></div>
                    </div>                                                
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area mr-1"></i>Unit Master                              
                            </div>
                            <div class="card-body">
                            <div class="row">
                            <div class="col text-left">
                                <button class="btn btn-primary btn-sm btn-outline" v-on:click='newunit'>Add New Unit</button>
                            </div>
                            <br>
                            <hr>
                            <div class="container-fluid">
                            <table id="partycrtb" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Group Name</th>
                                        <th>Parent ID</th>
                                        <th>Parent Unit</th>
                                        <th>Conversion Value</th>
                                        <th>Unit</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for='(unit,index) in UnitList'>
                                        <td>{{unit.GroupName}}</td>
                                        <td>{{unit.MasterID}}</td>
                                        <td>{{unit.ParentName}}</td>
                                        <td>{{unit.ConversionV}}</td>
                                        <td>{{unit.UnitName}}</td>

                                        <td class="text-center"><button class='btn btn-primary btn-sm' @click='deleteid(unit.UnitID)'><i class="fas fa-trash fa-fw"></i></button></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                      <th>Group Name</th>
                                      <th>Parent ID</th>
                                      <th>Parent Unit</th>
                                      <th>Conversion Value</th>
                                      <th>Unit</th>
                                      <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                            </div>
                        </div>
                            </canvas></div>
                            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; EnliteWeb 2020</div>
                            <div>
                                <a href="privacy">Privacy Policy</a>
                                &middot;
                                <a href="terms">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>        -->
        <!--<script src="../assets/demo/chart-bar-demo.js"></script>-->
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <!--<script src="../assets/demo/datatables-demo.js"></script>-->        
        <script src="../js/main.js"></script>
        <script>
        

            var app=new Vue({
                el:'#content',
                data:{
                    UnitList:""
                },
                mixins: [mainMixin],
                mounted:function(){
                    axios.post('unitlist')
                            .then(function(response){
                                app.UnitList=response.data;

                            })
                            .catch(function(error){ alert(error);})
                },
                methods:{
                    newunit:async function(){
						app.auth=await app.chkauth("Master Data","Add New Unite");
						if(app.auth){
							window.location.assign('newunit');
						}
                    },
                    deleteid:async function(xid){						
						app.auth=await app.chkauth("Master Data","Delete");
						if(app.auth){
							var ans=confirm("Do you want to Delete?");
							if(ans){
							axios.post('deleteunit',{cid:xid})
							.then(function(response){
								var result=response.data;
									alert(result);     
									app.requery();                                                  
								})
							.catch(function(error){ alert(error);})
							}
						}else{
							alert("Access Denied");
						}
						
					},
                    requery:function(){
                        axios.post('unitlist')
                            .then(function(response){
                                app.UnitList=response.data;

                            })
                            .catch(function(error){ alert(error);})
                    }
                }
            });            
        </script>
        <script>
            /*$(function(){
            $("#menu").load("amenu.html");
          });*/
        </script>
    </body>
</html>
