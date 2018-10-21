<?php 
      session_start(); 
      include('../../Level0_Config.php');
?>
<!DOCTYPE html>
<html class="nojs html css_verticalspacer" lang="en-US">
 <head>

  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="2017.0.2.363"/>
  
  <script type="text/javascript">
    //window.print();
   // Update the 'nojs'/'js' class on the html node
document.documentElement.className = document.documentElement.className.replace(/\bnojs\b/g, 'js');

// Check that all required assets are uploaded and up-to-date
if(typeof Muse == "undefined") window.Muse = {}; window.Muse.assets = {"required":["museutils.js", "museconfig.js", "jquery.watch.js", "require.js", "index.css"], "outOfDate":[]};
</script>
  
  <title>Indigency</title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?crc=443350757"/>
  <link rel="stylesheet" type="text/css" href="css/index.css?crc=375913753" id="pagesheet"/>
   </head>
 <body>

  <div class="clearfix" id="page"><!-- column -->
   <div class="position_content" id="page_position_content">
    <div class="clearfix colelem" id="pu360"><!-- group -->
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
          echo '<div class="clip_frame grpelem" id="u360">
                  <img class="block" id="u360_img" src="../../images/'.$BSeal.'" alt="No Image" style="width:750px; height:auto;"/>
                </div>';
        }
      }
     ?>
     <!-- <div class="clip_frame grpelem" id="u360">
      <img class="block" id="u360_img" src="images/barangay%20logo.png?crc=3987647798" alt="" width="739" height="751"/>
     </div> -->
     <div class="clearfix grpelem" id="u232"><!-- column -->
      <div class="clearfix colelem" id="u122-4"><!-- content -->
       <p><span id="u122">Republic of the Philippines</span></p>
      </div>
      <div class="clearfix colelem" id="u126-4"><!-- content -->
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
      <div class="clearfix colelem" id="u130-4"><!-- content -->
       <p>City of '.$Municipality.'</p>
      </div>
      <div class="clearfix colelem" id="pu134-4"><!-- group -->
       <div class="clearfix grpelem" id="u134-4"><!-- content -->
        <p>'.$Barangay.'</p>';
            }
          }
        ?>
       </div>
       <div class="clearfix grpelem" id="u138-4"><!-- content -->
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
          echo '<div class="clip_frame grpelem" id="u142"><!-- image -->
                  <img class="block" id="u142_img" src="../../images/'.$MSeal.'" alt="No Image" style="width:80px; height:auto;"/>
                 </div>
                 <div class="clip_frame grpelem" id="u154"><!-- image -->
                  <img class="block" id="u154_img" src="../../images/'.$BSeal.'" alt="No Image" style="width:80px; height:auto;/>
                 </div>';
        }
      }
     ?>
     
     <div class="grpelem" id="u226"><!-- simple frame --></div>
     <div class="grpelem" id="u268"><!-- simple frame --></div>
     <div class="clearfix grpelem" id="u271-4"><!-- content -->
      <p>Hon.</p>
     </div>
     <div class="clearfix grpelem" id="u274-4"><!-- content -->
      <?php
        include('../../dbconn.php');

        $CaptainSQL = 'SELECT bitdb_r_citizen.First_Name,
                              bitdb_r_citizen.Middle_Name,
                              bitdb_r_citizen.Last_Name,
                              bitdb_r_citizen.Name_Ext 
                      FROM    bitdb_r_barangayofficial
                      INNER JOIN bitdb_r_barangayposition
                      ON bitdb_r_barangayofficial.PosID = bitdb_r_barangayposition.PosID
                      INNER JOIN bitdb_r_citizen
                      ON bitdb_r_barangayofficial.CitizenID = bitdb_r_citizen.Citizen_ID
                      WHERE bitdb_r_barangayposition.PosName LIKE "%captain%"
                      AND bitdb_r_barangayofficial.Official_Status = 1';
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
     <div class="clearfix grpelem" id="u277-4"><!-- content -->
      <p>Barangay Captain</p>
     </div>
     <div class="clearfix grpelem" id="u283-4"><!-- content -->
      <p>Hon.</p>
     </div>
     <div class="clearfix grpelem" id="u284-4"><!-- content -->
      <p>Official 2 name</p>
     </div>
     <div class="clearfix grpelem" id="u285-4"><!-- content -->
      <p>Positiong here Position here&nbsp; position here position here position dessc here din ewan hahahahuhu</p>
     </div>
     <div class="clearfix grpelem" id="u294-4"><!-- content -->
      <p>Hon.</p>
     </div>
     <div class="clearfix grpelem" id="u295-4"><!-- content -->
      <p>Official 3 name</p>
     </div>
     <div class="clearfix grpelem" id="u296-4"><!-- content -->
      <p>Positiong here Position here&nbsp; position here position here position dessc here din ewan hahahahuhu</p>
     </div>
     <div class="clearfix grpelem" id="u303-4"><!-- content -->
      <p>Hon.</p>
     </div>
     <div class="clearfix grpelem" id="u304-4"><!-- content -->
      <p>Official 4 name</p>
     </div>
     <div class="clearfix grpelem" id="u305-4"><!-- content -->
      <p>Positiong here Position here&nbsp; position here position here position dessc here din ewan hahahahuhu</p>
     </div>
     <div class="clearfix grpelem" id="u312-4"><!-- content -->
      <p>Hon.</p>
     </div>
     <div class="clearfix grpelem" id="u313-4"><!-- content -->
      <p>Official 5 name</p>
     </div>
     <div class="clearfix grpelem" id="u314-4"><!-- content -->
      <p>Positiong here Position here&nbsp; position here position here position dessc here din ewan hahahahuhu</p>
     </div>
     <div class="clearfix grpelem" id="u321-4"><!-- content -->
      <p>Hon.</p>
     </div>
     <div class="clearfix grpelem" id="u322-4"><!-- content -->
      <p>Official 6 name</p>
     </div>
     <div class="clearfix grpelem" id="u323-4"><!-- content -->
      <p>Positiong here Position here&nbsp; position here position here position dessc here din ewan hahahahuhu</p>
     </div>
     <div class="clearfix grpelem" id="u330-4"><!-- content -->
      <p>Hon.</p>
     </div>
     <div class="clearfix grpelem" id="u331-4"><!-- content -->
      <p>Official 7 name</p>
     </div>
     <div class="clearfix grpelem" id="u332-4"><!-- content -->
      <p>Positiong here Position here&nbsp; position here position here position dessc here din ewan hahahahuhu</p>
     </div>
     <div class="clearfix grpelem" id="u339-4"><!-- content -->
      <p>Hon.</p>
     </div>
     <div class="clearfix grpelem" id="u340-4"><!-- content -->
      <p>Official 8 name</p>
     </div>
     <div class="clearfix grpelem" id="u341-4"><!-- content -->
      <p>Positiong here Position here&nbsp; position here position here position dessc here din ewan hahahahuhu</p>
     </div>
     <div class="clearfix grpelem" id="u351-4"><!-- content -->
      <p>Hon.</p>
     </div>
     <div class="clearfix grpelem" id="u352-4"><!-- content -->
      <p>Official 9 name</p>
     </div>
     <div class="clearfix grpelem" id="u353-4"><!-- content -->
      <p>Positiong here Position here&nbsp; position here position here position dessc here din ewan hahahahuhu</p>
     </div>
     <div class="clearfix grpelem" id="u372-4"><!-- content -->
      <p>CERTIFICATE OF INDIGENCY</p>
     </div>
     <div class="clearfix grpelem" id="u385-4"><!-- content -->
      <p>To whom it may concern;</p>
     </div>
     <div class="clearfix grpelem" id="u388-21"><!-- content -->
      <p id="u388-2"><span id="u388">This is to certify that as per record kept in this office that MS./MRS./MR. ___________________________________, _____ years old, has been resident of this Barangay, _____________________________________________________________.</span></p>
      <p id="u388-3">&nbsp;</p>
      <p id="u388-7"><span id="u388-4">This is to further certify that the above mentioned name is one of the listed </span><span id="u388-5">INDIGENT </span><span id="u388-6">of our Barangay.</span></p>
      <p id="u388-8">&nbsp;</p>
      <p id="u388-10"><span id="u388-9">This certification is being issued upon request of the person mentioned above in connection with his/her application for:</span></p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p id="u388-14"><span id="u388-13">____________________________________</span></p>
      <p id="u388-16"><span id="u388-15">Purpose</span></p>
      <p id="u388-17">&nbsp;</p>
      <p id="u388-19"><span id="u388-18">Issued this _______ day of ___________________, ___________ at the Office of the Barangay Chairman, _______________________________________________.</span></p>
     </div>
     <div class="clearfix grpelem" id="u487-4"><!-- content -->
      <p>Certified by:</p>
     </div>
     <div class="clearfix grpelem" id="u490-4"><!-- content -->
      <p>Hon.</p>
     </div>
     <div class="clearfix grpelem" id="u491-4"><!-- content -->
      <?php
        include('../../dbconn.php');

        $CaptainSQL = 'SELECT bitdb_r_citizen.First_Name,
                              bitdb_r_citizen.Middle_Name,
                              bitdb_r_citizen.Last_Name,
                              bitdb_r_citizen.Name_Ext 
                      FROM    bitdb_r_barangayofficial
                      INNER JOIN bitdb_r_barangayposition
                      ON bitdb_r_barangayofficial.PosID = bitdb_r_barangayposition.PosID
                      INNER JOIN bitdb_r_citizen
                      ON bitdb_r_barangayofficial.CitizenID = bitdb_r_citizen.Citizen_ID
                      WHERE bitdb_r_barangayposition.PosName LIKE "%captain%"
                      AND bitdb_r_barangayofficial.Official_Status = 1';
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
     <div class="clearfix grpelem" id="u492-4"><!-- content -->
      <p>Punung Barangay</p>
     </div>
     <div class="clearfix grpelem" id="u505-4"><!-- content -->
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
                 <div class="clearfix grpelem" id="u516-4"><!-- content -->
                  <p>'.$Age.'</p>
                 </div>';
          }
        }
      ?>
     </div>
     <div class="clearfix grpelem" id="u519-4"><!-- content -->
      <p><?php echo ''.$Barangay.', '.$Municipality.', '.$Province.' '?></p>
     </div>
     <div class="clearfix grpelem" id="u522-4"><!-- content -->
      <p><?php echo $_GET['Purpose']; ?></p>
     </div>
     <?php
      $CertSQL = "SELECT DAY(IssuanceDate) AS DAY,
                          MONTHNAME(IssuanceDate) AS MONTH,
                          YEAR(IssuanceDate) AS YEAR
                      FROM    bitdb_r_issuance
                      WHERE   IssuanceID =".$_GET['Clearance']."";
        $CertQuery = mysqli_query($bitMysqli,$CertSQL) or die (mysqli_error($bitMysqli));
        if(mysqli_num_rows($CertQuery) > 0)
        {
          while($row3 = mysqli_fetch_assoc($CertQuery))
          {
            $Day = $row3['DAY'];
            $Month = $row3['MONTH'];
            $Year = $row3['YEAR'];
          }
        }
     ?>
     <div class="clearfix grpelem" id="u528-4"><!-- content -->
      <p><?php echo $Day ?></p>
     </div>
     <div class="clearfix grpelem" id="u531-4"><!-- content -->
      <p><?php echo $Month ?></p>
     </div>
     <div class="clearfix grpelem" id="u534-4"><!-- content -->
      <p><?php echo $Year ?></p>
     </div>
     <div class="clearfix grpelem" id="u1305-4"><!-- content -->
      <p><?php echo ''.$Barangay.', '.$Municipality.', '.$Province.' '?></p>
     </div>
    </div>
    <div class="colelem" id="u499"><!-- simple frame --></div>
    <div class="clearfix colelem" id="u502-8"><!-- content -->
     <p>Form generated by Barangay IT v2.</p>
     <p>Visit <span id="u502-4">www.barangayit.pupqc.net</span> to learn more!</p>
    </div>
    <div class="verticalspacer" data-offset-top="926" data-content-above-spacer="925" data-content-below-spacer="0"></div>
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
