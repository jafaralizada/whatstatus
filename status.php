<?php include "connect.php"; ?>
     <?php include "header.php"; ?>
     <?php include "sidebar.php";?>
  
     <?php
if (!empty($_GET)) {
if ($_GET['durum'] == "sene_eklendi") {
    echo "<script type= 'text/javascript'>alert('Sene Başarıyla eklendi.');</script>";
}}else {
    echo "Sene Eklenemedi";
}

?>




  <!--main content start-->
   <section id="main-content">
       
          <section class="wrapper site-min-height">


						

          	<h3><i class="fa fa-angle-right"></i> birsey Ekle</h3>
                                                              <!-- BASLANGIC -->

                                                              <h5 class="centered">  
                                                <?php 


                                                $askusers=$db->prepare("SELECT users_namesurname,users_id FROM users WHERE users_name=:users_name");
                                                $askusers->execute(array(
                                                'users_name' => $_SESSION['users_name']
                                                ));


                                                foreach ($askusers as $row)
                                                {
                                               /* echo "Hoş Geldin:  ".$row['users_namesurname'] ;
                                                echo " -- ID:  ".$row['users_id'] ;*/
                                                $kullanici_id= $row['users_id'] ;


                                                }
                                                ?></h5>
                                                            <!-- BITIS -->

                                                            <! -- 1st ROW OF PANELS -->
					<div class="row">



          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="row">
                <div class="col-md-12">
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Durum Listesi
                        </div>
                        <div class="panel-body">
                          
                                                <?php     
                                                        $veriler = $db->query("SELECT * FROM income WHERE $kullanici_id = income_user_id  ORDER BY income_user_id  DESC")->fetchAll();
                                                        foreach ($veriler as $row)
                                                        { 
                                                ?>

                                            						<!-- TWITTER PANEL -->
						<div class="col-lg-4 col-md-4 col-sm-4 mb">
							<div class="twitter-panel pn">
							<!--	<i class="fa fa-twitter fa-4x"></i>-->
								<p><?php echo $row['income_description']."<br />\n"; ?></p>
								<p class="user">@Alvrz_is</p>
							</div>
						</div><!-- /col-md-4 -->
                                       
                                                <?php }?>

                            </div>
                        </div>
                    </div>



                 
                                                
                     <!-- End  Kitchen Sink -->
                </div>
                
                    <!--  end  Context Classes  -->
                </div>
            </div>
                <!-- /. ROW  -->

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

      <!--main content end-->
      <?php include "footer.php";?>
