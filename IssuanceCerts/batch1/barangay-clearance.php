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
  //  window.print();
   // Update the 'nojs'/'js' class on the html node
document.documentElement.className = document.documentElement.className.replace(/\bnojs\b/g, 'js');

// Check that all required assets are uploaded and up-to-date
if(typeof Muse == "undefined") window.Muse = {}; window.Muse.assets = {"required":["museutils.js", "museconfig.js", "jquery.watch.js", "require.js", "barangay-clearance.css"], "outOfDate":[]};
</script>
  
  <title>Barangay Clearance</title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?crc=443350757"/>
  <link rel="stylesheet" type="text/css" href="css/master_a-master.css?crc=187441051"/>
  <link rel="stylesheet" type="text/css" href="css/barangay-clearance.css?crc=98426749" id="pagesheet"/>
   </head>
 <body>

  <div class="clearfix" id="page"><!-- column -->
   <div class="position_content" id="page_position_content">
    <div class="clearfix colelem" id="pu767"><!-- group -->
     <div class="clearfix grpelem" id="u767"><!-- column -->
      <div class="clearfix colelem" id="u769-4"><!-- content -->
       <p><span id="u769">Republic of the Philippines</span></p>
      </div>
      <div class="clearfix colelem" id="u768-4"><!-- content -->
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
      <div class="clearfix colelem" id="u772-4"><!-- content -->
       <p>City of '.$Municipality.'</p>
      </div>
      <div class="clearfix colelem" id="pu770-4"><!-- group -->
       <div class="clearfix grpelem" id="u770-4"><!-- content -->
        <p>'.$Barangay.'</p>';
            }
          }
        ?>
       </div>
       <div class="clearfix grpelem" id="u771-4"><!-- content -->
        <p>OFFICE OF THE SANGGUNIANG BARAGAY</p>
       </div>
      </div>
     </div>
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
          echo '<div class="clip_frame grpelem" id="u773"><!-- image -->
                  <img class="block" id="u773_img" src="../../images/'.$MSeal.'" alt="No Image" style="width:80px; height:auto;"/>
                 </div>
                 <div class="clip_frame grpelem" id="u775"><!-- image -->
                  <img class="block" id="u775_img" src="../../images/'.$BSeal.'" alt="No Image" style="width:80px; height:auto;/>
                 </div>';
        }
      }
     ?>
     
     <div class="grpelem" id="u777"><!-- simple frame --></div>
     <div class="grpelem" id="u778"><!-- simple frame --></div>
     <div class="clearfix grpelem" id="u779-4"><!-- content -->
      <p>Hon.</p>
     </div>
     <div class="clearfix grpelem" id="u780-4"><!-- content -->
      <?php
        include('../../dbconn.php');

        $CaptainSQL = 'SELECT bitdb_r_citizen.First_Name,
                              bitdb_r_citizen.Middle_Name,
                              bitdb_r_citizen.Last_Name,
                              bitdb_r_citizen.Name_Ext 
                      FROM    bitdb_r_config 
                      INNER JOIN bitdb_r_barangayofficial 
                      ON  bitdb_r_barangayofficial.Brgy_Official_ID = bitdb_r_config.Signatory
                      INNER JOIN bitdb_r_citizen
                      ON bitdb_r_barangayofficial.CitizenID = bitdb_r_citizen.Citizen_ID';
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
     <div class="clearfix grpelem" id="u781-4"><!-- content -->
      <p>Barangay Captain</p>
     </div>
     <?php
      include('../../dbconn.php');
      $OfficialSQL = 'SELECT bitdb_r_citizen.First_Name,
                              bitdb_r_citizen.Middle_Name,
                              bitdb_r_citizen.Last_Name,
                              bitdb_r_citizen.Name_Ext,
                              bitdb_r_barangayposition.PosName,
                              bitdb_r_barangayposition.PosDesc
                      FROM    bitdb_r_barangayofficial
                      INNER JOIN bitdb_r_barangayposition
                      ON  bitdb_r_barangayofficial.PosID = bitdb_r_barangayposition.PosID
                      INNER JOIN bitdb_r_citizen  
                      ON bitdb_r_barangayofficial.CitizenID = bitdb_r_citizen.Citizen_ID
                      WHERE bitdb_r_barangayposition.PosName != "Barangay Captain"';
      $OfficialQuery  = mysqli_query($bitMysqli,$OfficialSQL) or die (mysqli_error($bitMysqli));
      if(mysqli_num_rows($OfficialQuery) > 0)
      {
        $ctr = 782;
        while($row = mysqli_fetch_assoc($OfficialQuery))
        {
          $FullName = ''.$row['First_Name'].' '.$row['Middle_Name'].' '.$row['Last_Name'].' '.$row['Name_Ext'].' ';
          $Position = $row['PosName'];
          $PositionDesc = $row['PosDesc'];
          for($i=0;$i<3;$i++)
          {
            if($i == 0)
            echo '<div class="clearfix grpelem" id="u'.$ctr.'-4">
                  <p>Hon.</p>
                 </div>';
            else if($i == 1)
            echo '<div class="clearfix grpelem" id="u'.$ctr.'-4">
                  <p>'.$FullName.'</p>
                 </div>';
            else if($i==2)
            echo '<div class="clearfix grpelem" id="u'.$ctr.'-4">
                  <p>'.$Position.'<br>'.$PositionDesc.'</p>
                 </div>';
            $ctr++;
          }
        }
      }
     ?>
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
          echo '<div class="clip_frame grpelem" id="u1296">
                  <img class="block" id="u1296_img" src="../../images/'.$BSeal.'" alt="No Image" style="width:750px; height:auto;"/>
                </div>';
        }
      }
     ?><!-- 
     <div class="clip_frame grpelem" id="u1296">
      <img class="block" id="u1296_img" src="images/barangay%20logo.png?crc=3987647798" alt="" width="739" height="751"/>
     </div> -->
     <div class="clearfix grpelem" id="u1338-4"><!-- content -->
      <p>BARANGAY CLEARANCE</p>
     </div>
     <div class="clearfix grpelem" id="u1339-4"><!-- content -->
      <p>To whom it may concern;</p>
     </div>
     <div class="clearfix grpelem" id="u1340-23"><!-- content -->
      <p id="u1340-2"><span id="u1340">This is to certify that as per record kept in this office that MS./MRS./MR. ___________________________________, _____ years old, a bonafide resident of this Barangay, _____________________________________________________________.</span></p>
      <p id="u1340-3">&nbsp;</p>
      <p id="u1340-9"><span id="u1340-4">Whose signature, resident certificate number and right thumb mark, appears here under is personally known to me as a person of </span><span id="u1340-5">GOOD MORAL CHARACTER</span><span id="u1340-6"> and </span><span id="u1340-7">LAW ABIDING CITIZEN </span><span id="u1340-8">in the community.</span></p>
      <p id="u1340-10">&nbsp;</p>
      <p id="u1340-12"><span id="u1340-11">This certification is being issued upon request of the person mentioned above in connection with his/her legal intentions for:</span></p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p id="u1340-16"><span id="u1340-15">____________________________________</span></p>
      <p id="u1340-18"><span id="u1340-17">Purpose</span></p>
      <p id="u1340-19">&nbsp;</p>
      <p id="u1340-21"><span id="u1340-20">Issued this _______ day of ___________________, ___________ at the Office of the Barangay Captain, _______________________________________________.</span></p>
     </div>
     <div class="clearfix grpelem" id="u1341-4"><!-- content -->
      <p>Certified by:</p>
     </div>
     <div class="clearfix grpelem" id="u1342-4"><!-- content -->
      <p>Hon.</p>
     </div>
     <div class="clearfix grpelem" id="u1343-4"><!-- content -->
      <?php
        include('../../dbconn.php');

        $CaptainSQL = 'SELECT bitdb_r_citizen.First_Name,
                              bitdb_r_citizen.Middle_Name,
                              bitdb_r_citizen.Last_Name,
                              bitdb_r_citizen.Name_Ext 
                      FROM    bitdb_r_config 
                      INNER JOIN bitdb_r_barangayofficial 
                      ON  bitdb_r_barangayofficial.Brgy_Official_ID = bitdb_r_config.Signatory
                      INNER JOIN bitdb_r_citizen
                      ON bitdb_r_barangayofficial.CitizenID = bitdb_r_citizen.Citizen_ID';
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
     <div class="clearfix grpelem" id="u1344-4"><!-- content -->
      <p>Punung Barangay</p>
     </div>
     <div class="clearfix grpelem" id="u1345-4"><!-- content -->
      <?php
        include('../../dbconn.php');

        $CaptainSQL = "SELECT bitdb_r_citizen.First_Name,
                              bitdb_r_citizen.Middle_Name,
                              bitdb_r_citizen.Last_Name,
                              bitdb_r_citizen.Name_Ext,
                              DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(bitdb_r_citizen.Birthdate, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(bitdb_r_citizen.Birthdate, '00-%m-%d')) AS Age 
                      FROM    bitdb_r_citizen
                      WHERE   bitdb_r_citizen.Citizen_ID =".$_GET['CitizenID']."";
        $CaptainQuery = mysqli_query($bitMysqli,$CaptainSQL) or die (mysqli_error($bitMysqli));
        if(mysqli_num_rows($CaptainQuery) > 0)
        {
          while($row = mysqli_fetch_assoc($CaptainQuery))
          {
            $Name = ''.$row['First_Name'].' '.$row['Middle_Name'].' '.$row['Last_Name'].' '.$row['Name_Ext'].' ';
            $Age = $row['Age'];
            echo '<p>'.$Name.'</p>
                  </div>
                 <div class="clearfix grpelem" id="u1346-4"><!-- content -->
                  <p>'.$Age.'</p>
                 </div>';
          }
        }
      ?>
     
     <div class="clearfix grpelem" id="u1347-4"><!-- content -->
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
              echo ''.$Barangay.', City of '.$Municipality.', '.$Province.' ';
            }
          }
        ?>
     </div>
     <div class="clearfix grpelem" id="u1348-4"><!-- content -->
      <p><?php echo $_GET['Purpose']?></p>
     </div>
     <div class="clearfix grpelem" id="u1349-4"><!-- content -->
      <?php
        include_once('../../dbconn.php');

        if(isset($_GET['Clearance']))
        {
          $DateSQL = 'SELECT DAY(IssuanceDate) AS Day, MONTHNAME(IssuanceDate) AS Month, YEAR(IssuanceDate) AS Year FROM bitdb_r_issuance WHERE IssuanceID='.$_GET['Clearance'].' ';
          $DateQuery = mysqli_query($bitMysqli,$DateSQL) or die (mysqli_error($bitMysqli));
          if(mysqli_num_rows($DateQuery) > 0)
          {
            while($row = mysqli_fetch_assoc($DateQuery))
            {
              $Day = $row['Day'];
              $Month = $row['Month'];
              $Year = $row['Year'];
              echo '<p>'.$Day.'</p>
                     </div>
                     <div class="clearfix grpelem" id="u1350-4"><!-- content -->
                      <p>'.$Month.'</p>
                     </div>
                     <div class="clearfix grpelem" id="u1351-4"><!-- content -->
                      <p>'.$Year.'</p>
                     </div>'; 
            }
          }
        }
        else
        {
          switch (date("m")) 
          {
            case '01':
              $Month = "January";
              break;
            case '02':
              $Month = "February";
              break;
            case '03':
              $Month = "March";
              break;
            case '04':
              $Month = "April";
              break;
            case '05':
              $Month = "May";
              break;
            case '06':
              $Month = "June";
              break;
            case '07':
              $Month = "July";
              break;
            case '08':
              $Month = "August";
              break;
            case '09':
              $Month = "September";
              break;
            case '10':
              $Month = "October";
              break;
            case '11':
              $Month = "November";
              break;
            case '12':
              $Month = "December";
              break;
            default:
              $Month = "N/A";
              break;
          }
          echo '<p>'.date("d").'</p>
                     </div>
                     <div class="clearfix grpelem" id="u1350-4"><!-- content -->
                      <p>'.$Month.'</p>
                     </div>
                     <div class="clearfix grpelem" id="u1351-4"><!-- content -->
                      <p>'.date("Y").'</p>
                     </div>';
        }
        
      ?>
      <?php

      ?>
     <div class="clearfix grpelem" id="u1352-4"><!-- content -->
      <?php echo '<p>'.$BarangayName.'</p>';?>
     </div>
     <div class="grpelem" id="u1383"><!-- simple frame --></div>
     <div class="clearfix grpelem" id="u1386-4"><!-- content -->
      <p>Right thumb mark</p>
     </div>
     <div class="clearfix grpelem" id="u1389-6"><!-- content -->
      <p id="u1389-2">NOT VALID WITHOUT THE OFFICIAL BARANGAY DRY SEAL</p>
      <p id="u1389-4">Valid for 6 (six) months from the date issued</p>
     </div>
    </div>
    <div class="verticalspacer" data-offset-top="896" data-content-above-spacer="902" data-content-below-spacer="81"></div>
    <div class="colelem" id="u813"><!-- simple frame --></div>
    <div class="clearfix colelem" id="u814-8"><!-- content -->
     <p>Form generated by Barangay IT v2.</p>
     <p>Visit <span id="u814-4">www.barangayit.pupqc.net</span> to learn more!</p>
    </div>
   </div>
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
