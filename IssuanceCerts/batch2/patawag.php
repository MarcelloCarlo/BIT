<?php 
      session_start();
      include('../../AdminConfig.php');
?>
<!DOCTYPE html>
<html class="nojs html css_verticalspacer" lang="en-US">
 <head>

  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="2017.0.2.363"/>
  
  <script type="text/javascript">
   // Update the 'nojs'/'js' class on the html node
document.documentElement.className = document.documentElement.className.replace(/\bnojs\b/g, 'js');

// Check that all required assets are uploaded and up-to-date
if(typeof Muse == "undefined") window.Muse = {}; window.Muse.assets = {"required":["museutils.js", "museconfig.js", "jquery.watch.js", "require.js", "patawag.css"], "outOfDate":[]};
</script>
  
  <title>patawag</title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?crc=443350757"/>
  <link rel="stylesheet" type="text/css" href="css/patawag.css?crc=351097035" id="pagesheet"/>
   </head>
 <body>

  <div class="clearfix" id="page"><!-- column -->
   <div class="clearfix colelem" id="pu1466"><!-- group -->
    <div class="clip_frame grpelem" id="u1466"><!-- image -->
    <?php
      include_once('../../dbconn.php');

      $ImageSQL = 'SELECT * FROM bitdb_r_config';
      $ImageQuery = mysqli_query($bitMysqli,$ImageSQL) or die (mysqli_error($bitMysqli));
      if(mysqli_num_rows($ImageQuery) > 0)
      {
        while($row = mysqli_fetch_assoc($ImageQuery))
        {
          $BSeal = $row['BarangaySeal'];
          $MSeal = $row['MunicipalSeal'];
          echo '
                 <img class="block" id="u1466_img" src="../../images/'.$BSeal.'" alt="" width="117" height="119"/>
                 ';
        }
      }
     ?>
     
    </div>
    <div class="clearfix grpelem" id="u1458"><!-- column -->
     <div class="clearfix colelem" id="u1459-4"><!-- content -->
      <p><span id="u1459">Republic of the Philippines</span></p>
     </div>
     <div class="clearfix colelem" id="u1460-4"><!-- content -->
      <?php
          include_once('../../dbconn.php');

          $configSQL = 'SELECT * FROM bitdb_r_config';
          $configQuery = mysqli_query($bitMysqli,$configSQL) or die (mysqli_error($bitMysqli));
          if(mysqli_num_rows($configQuery) > 0)
          {
            while($row = mysqli_fetch_assoc($configQuery))
            {
              $Barangay = $row['BarangayName'];
              $Municipality = $row['Municipality'];
              $Province = $row['ProvinceName'];
              echo '
      <p>'.$Province.'</p>
      </div>
      <div class="clearfix colelem" id="u1461-4"><!-- content -->
       <p>City of '.$Municipality.'</p>
      </div>
      <div class="clearfix colelem" id="pu1462-4"><!-- group -->
       <div class="clearfix grpelem" id="u1462-4"><!-- content -->
        <p>'.$Barangay.'</p>';
            }
          }
        ?>
      <!-- <p>Province Name</p>
     </div>
     <div class="clearfix colelem" id="u1461-4">
      <p>City of City name</p>
     </div>
     <div class="clearfix colelem" id="pu1462-4">
      <div class="clearfix grpelem" id="u1462-4">
       <p>Barangay Name</p> -->
      </div>
      <div class="clearfix grpelem" id="u1463-4"><!-- content -->
       <p>OFFICE OF THE SANGGUNIANG BARAGAY</p>
      </div>
     </div>
    </div>
    <div class="clip_frame grpelem" id="u1464"><!-- image -->
      <?php
      include_once('../../dbconn.php');

      $ImageSQL = 'SELECT * FROM bitdb_r_config';
      $ImageQuery = mysqli_query($bitMysqli,$ImageSQL) or die (mysqli_error($bitMysqli));
      if(mysqli_num_rows($ImageQuery) > 0)
      {
        while($row = mysqli_fetch_assoc($ImageQuery))
        {
          $BSeal = $row['BarangaySeal'];
          $MSeal = $row['MunicipalSeal'];
          echo '                 
          <img class="block" id="u1464_img" src="../../images/'.$MSeal.'" alt="" width="116" height="116"/>
                 ';
        }
      }
     ?>
     
    </div>
   </div>
   <div class="clearfix colelem" id="u1490-4"><!-- content -->
    <p>PAANYAYA</p>
   </div>
   <?php
    include_once('../../dbconn.php');

    $DetailsSQL = 'SELECT bitdb_r_summons.BlotterID,
                          bitdb_r_summons.SummonSched,
                          bitdb_r_summons.SummonPlace,
                          bitdb_r_blotter.Complainant,
                          bitdb_r_barangayzone.Zone,
                          bitdb_r_citizen.First_Name,
                          bitdb_r_citizen.Middle_Name,
                          bitdb_r_citizen.Last_Name,
                          bitdb_r_citizen.Name_Ext
                  FROM    bitdb_r_summons
                  INNER JOIN bitdb_r_blotter
                  ON  bitdb_r_summons.BlotterID = bitdb_r_blotter.BlotterID
                  INNER JOIN bitdb_r_citizen
                  ON bitdb_r_blotter.Accused = bitdb_r_citizen.Citizen_ID
                  INNER JOIN bitdb_r_barangayzone
                  ON bitdb_r_citizen.Zone = bitdb_r_barangayzone.ZoneID';
    $DetailsQuery = mysqli_query($bitMysqli,$DetailsSQL) or die (mysqli_error($bitMysqli));
    if(mysqli_num_rows($DetailsQuery) > 0)
    {
      while($row = mysqli_fetch_assoc($DetailsQuery))
      {
        $BlotterID = $row['BlotterID'];
        $Sched = $row['SummonSched'];
        $Place = $row['SummonPlace'];
        $Complainant = $row['Complainant'];
        $Zone = $row['Zone'];
        $Name = ''.$row['First_Name'].' '.$row['Middle_Name'].' '.$row['Last_Name'].' '.$row['Name_Ext'].' ';

        
      }
      echo'

        <div class="clearfix colelem" id="pu1493-4"><!-- group -->
        <div class="clearfix grpelem" id="u1493-4"><!-- content -->
         <p>Blotter Entry No:</p>
        </div>
        <div class="clearfix grpelem" id="u1496-4"><!-- content -->
         <p>'.$BlotterID.'</p>
        </div>
       </div>
       <div class="clearfix colelem" id="pu1499-4"><!-- group -->
        <div class="clearfix grpelem" id="u1499-4"><!-- content -->
         <p>G/Gng. _____________________________________</p>
        </div>
        <div class="clearfix grpelem" id="u1530-4"><!-- content -->
         <p>'.$Name.'</p>
        </div>
       </div>
       <div class="clearfix colelem" id="pu1502-4"><!-- group -->
        <div class="clearfix grpelem" id="u1502-4"><!-- content -->
         <p>Purok _____________________</p>
        </div>
        <div class="clearfix grpelem" id="u1533-4"><!-- content -->
         <p>'.$Zone.'</p>
        </div>
       </div>
       <div class="clearfix colelem" id="pu1505-6"><!-- group -->
        <div class="clearfix grpelem" id="u1505-6"><!-- content -->
         <p><span>Mapitagan po namin kayong inaanyayahan sa _______________________________________ sa&nbsp; ganap na __________________________________ upang magpaliwanag ukol sa isang sumbong at hindi niyo pagkakaunawaan ni/nina _______________________________________________.</span></p>
         <p><span>Inaasahan ang iyong pagtugon at pagbigay pansin sa paanyayang ito.Ang hindi niyo pagdalo ay magbibigay dahilan upang ang naturang sumbong ay malipat sa Barangay Court.</span></p>
        </div>
        <div class="clearfix grpelem" id="u1536-4"><!-- content -->
         <p>'.$Place.'</p>
        </div>
        <div class="clearfix grpelem" id="u1539-4"><!-- content -->
         <p>'.$Sched.'</p>
        </div>
        <div class="clearfix grpelem" id="u1542-4"><!-- content -->
         <p>'.$Complainant.'</p>
        </div>
       </div>
       <div class="clearfix colelem" id="pu1515-4"><!-- group -->
        <div class="clearfix grpelem" id="u1515-4"><!-- content -->



        ';
    }
   ?>
   
        <p>Hon.</p>
    </div>
    <div class="clearfix grpelem" id="u1516-4"><!-- content -->
     <?php
        include('../../dbconn.php');

        $CaptainSQL = 'SELECT bitdb_r_citizen.First_Name,
                              bitdb_r_citizen.Middle_Name,
                              bitdb_r_citizen.Last_Name,
                              bitdb_r_citizen.Name_Ext 
                      FROM    bitdb_r_barangayofficial 
                      INNER JOIN bitdb_r_barangayposition
                        ON bitdb_r_barangayposition.PosID = bitdb_r_barangayofficial.PosID
                      INNER JOIN bitdb_r_citizen
                        ON bitdb_r_barangayofficial.CitizenID = bitdb_r_citizen.Citizen_ID
                      WHERE bitdb_r_barangayposition.PosName="Barangay Captain" ';
        $CaptainQuery = mysqli_query($bitMysqli,$CaptainSQL) or die (mysqli_error($bitMysqli));
        if(mysqli_num_rows($CaptainQuery) > 0)
        {
          while($row = mysqli_fetch_assoc($CaptainQuery))
          {
            $Name = ''.$row['First_Name'].' '.$row['Middle_Name'].' '.$row['Last_Name'].' '.$row['Name_Ext'].' ';
            echo '<p>'.$Name.'</p>';
          }
        }
      ?>
    </div>
   </div>
   <div class="clearfix colelem" id="u1517-4"><!-- content -->
    <p>Punong Barangay</p>
   </div>
   <div class="clearfix colelem" id="u1527-6"><!-- content -->
    <p>TINANGGAP NI: __________________________________ ORAS:___________ PETSA:_________________</p>
    <p>NAGDALA NG PAANYAYA: ________________________________</p>
   </div>
   <div class="verticalspacer" data-offset-top="583" data-content-above-spacer="582" data-content-below-spacer="0"></div>
  </div>
  <!-- Other scripts -->
  <script type="text/javascript">
   window.Muse.assets.check=function(d){if(!window.Muse.assets.checked){window.Muse.assets.checked=!0;var b={},c=function(a,b){if(window.getComputedStyle){var c=window.getComputedStyle(a,null);return c&&c.getPropertyValue(b)||c&&c[b]||""}if(document.documentElement.currentStyle)return(c=a.currentStyle)&&c[b]||a.style&&a.style[b]||"";return""},a=function(a){if(a.match(/^rgb/))return a=a.replace(/\s+/g,"").match(/([\d\,]+)/gi)[0].split(","),(parseInt(a[0])<<16)+(parseInt(a[1])<<8)+parseInt(a[2]);if(a.match(/^\#/))return parseInt(a.substr(1),
16);return 0},g=function(g){for(var f=document.getElementsByTagName("link"),h=0;h<f.length;h++)if("text/css"==f[h].type){var i=(f[h].href||"").match(/\/?css\/([\w\-]+\.css)\?crc=(\d+)/);if(!i||!i[1]||!i[2])break;b[i[1]]=i[2]}f=document.createElement("div");f.className="version";f.style.cssText="display:none; width:1px; height:1px;";document.getElementsByTagName("body")[0].appendChild(f);for(h=0;h<Muse.assets.required.length;){var i=Muse.assets.required[h],l=i.match(/([\w\-\.]+)\.(\w+)$/),k=l&&l[1]?
l[1]:null,l=l&&l[2]?l[2]:null;switch(l.toLowerCase()){case "css":k=k.replace(/\W/gi,"_").replace(/^([^a-z])/gi,"_$1");f.className+=" "+k;k=a(c(f,"color"));l=a(c(f,"backgroundColor"));k!=0||l!=0?(Muse.assets.required.splice(h,1),"undefined"!=typeof b[i]&&(k!=b[i]>>>24||l!=(b[i]&16777215))&&Muse.assets.outOfDate.push(i)):h++;f.className="version";break;case "js":h++;break;default:throw Error("Unsupported file type: "+l);}}d?d().jquery!="1.8.3"&&Muse.assets.outOfDate.push("jquery-1.8.3.min.js"):Muse.assets.required.push("jquery-1.8.3.min.js");
f.parentNode.removeChild(f);if(Muse.assets.outOfDate.length||Muse.assets.required.length)f="Some files on the server may be missing or incorrect. Clear browser cache and try again. If the problem persists please contact website author.",g&&Muse.assets.outOfDate.length&&(f+="\nOut of date: "+Muse.assets.outOfDate.join(",")),g&&Muse.assets.required.length&&(f+="\nMissing: "+Muse.assets.required.join(",")),alert(f)};location&&location.search&&location.search.match&&location.search.match(/muse_debug/gi)?setTimeout(function(){g(!0)},5E3):g()}};
var muse_init=function(){require.config({baseUrl:""});require(["jquery","museutils","whatinput","jquery.watch"],function(d){var $ = d;$(document).ready(function(){try{
window.Muse.assets.check($);/* body */
Muse.Utils.transformMarkupToFixBrowserProblemsPreInit();/* body */
Muse.Utils.prepHyperlinks(true);/* body */
Muse.Utils.fullPage('#page');/* 100% height page */
Muse.Utils.showWidgetsWhenReady();/* body */
Muse.Utils.transformMarkupToFixBrowserProblems();/* body */
}catch(b){if(b&&"function"==typeof b.notify?b.notify():Muse.Assert.fail("Error calling selector function: "+b),false)throw b;}})})};

</script>
  <!-- RequireJS script -->
  <script src="scripts/require.js?crc=4234670167" type="text/javascript" async data-main="scripts/museconfig.js?crc=4152223963" onload="if (requirejs) requirejs.onError = function(requireType, requireModule) { if (requireType && requireType.toString && requireType.toString().indexOf && 0 <= requireType.toString().indexOf('#scripterror')) window.Muse.assets.check(); }" onerror="window.Muse.assets.check();"></script>
   </body>
</html>
