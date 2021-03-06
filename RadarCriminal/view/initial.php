<?php
	$SERVER_ADRESS = $_SERVER['DOCUMENT_ROOT']."/Tecprog2014-2/radarcriminal";

	include_once $SERVER_ADRESS."/view/CrimeView.php";
	include_once $SERVER_ADRESS."/view/TempoView.php";
	include_once $SERVER_ADRESS."/view/NaturezaView.php";
   
	$crimeVW = new CrimeView(); /**Instance of CrimeView*/
	$categoryVW = new CategoriaView(); /**Instance of CategoriaView*/
	$timeVW = new TempoView(); /**Instance of TempoView*/
	$natureVW = new NaturezaView(); /**Instance of NaturezaView*/
?>
<!-- start: Content -->
<div id="content" class="span10">
   <div class="row-fluid">
      <div class="span3 smallstat box mobileHalf" onTablet="span6" onDesktop="span3">
         <div class="boxchart-overlay radarGrey">
            <div class="boxchart">5,6,7,2,0,4,2,4,8,2,3,3,2</div>
         </div>
         <span class="title">Ocorrências</span> <span class="value">
         	<?php echo number_format($crimeVW->_sumAllCrimes(),0,',','.') ?>
         </span>
      </div>
      <div class="span3 smallstat box mobileHalf" onTablet="span6" onDesktop="span3">
         <div class="boxchart-overlay red">
            <div class="boxchart">1,2,6,4,0,8,2,4,5,3,1,7,5</div>
         </div>
         <span class="title">Homicídios</span> <span class="value"> 
         	<?php echo number_format($crimeVW->_sumAllHomicides(),0,',','.') ?>
         </span>
      </div>
      <div class="span3 smallstat box mobileHalf noMargin" onTablet="span6" onDesktop="span3">
         <i class="icon-search radarLightYellow"></i> <span class="title">Roubo</span> <span class="value">
         	<?php echo  number_format($categoryVW->_sumAllTheft(),0,',','.') ?>
         </span>
      </div>
      <div class="span3 smallstat mobileHalf box" onTablet="span6"
         onDesktop="span3">
         <i class="icon-certificate radarYellow"></i> <span class="title">Furto</span>
         <span class="value">
         	<?php echo number_format($categoryVW->_sumAllStealing(),0,',','.') ?>
         </span>
      </div>
   </div>
   <div class="row-fluid">
      <div class="box span12" ondesktop="span12" ontablet="span12">
         <div class="box-header">
            <h2><i class="icon-bar-chart"></i>Total de Ocorrencias por Ano</h2>
         </div>
         <div class="box-content">
            <div class="main-chart">
               <!--Impressão de gráfico em barras-->
               <?php echo $crimeVW->getCrimesData() ?>
            </div>
         </div>
      </div>
      <div class="row-fluid">
         <div class="box span12">
            <div class="box-header">
               <h2><i class="icon-list-alt"></i><span class="break"></span>Total de Crimes por Categoria</h2>
               <div class="box-icon">
                  <a href="#" class="btn-setting"><i class="icon-wrench"></i></a>
                  <a href="#" class="btn-close"><i class="icon-remove"></i></a>
               </div>
            </div>
            <div class="box-content">
               <div id="piechart" style="height:450px"></div>
            </div>
         </div>
      </div>
      <!--/row-->
   </div>
   <div class="row-fluid">
      <div class="box span12">
         <div class="box-header">
            <h2><a href="#" class="btn-minimize"><i class="icon-tasks"></i>Total de Crimes por Tipo</a></h2>
            <div class="box-icon">
               <a href="#" class="btn-close"><i class="icon-remove"></i></a>
            </div>
         </div>
         <div class="box-content" style="display:none;">
            <?php echo utf8_encode($natureVW->getAllAlphabeticallyOrderedNatures()); ?>
         </div>
      </div>
   </div>
</div>
<!-- end: Content -->

</div>
<!--/fluid-row-->
