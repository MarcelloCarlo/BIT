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
   // window.print();
   // Update the 'nojs'/'js' class on the html node
document.documentElement.className = document.documentElement.className.replace(/\bnojs\b/g, 'js');

// Check that all required assets are uploaded and up-to-date
if(typeof Muse == "undefined") window.Muse = {}; window.Muse.assets = {"required":["museutils.js", "museconfig.js", "jquery.watch.js", "require.js", "business-permit.css"], "outOfDate":[]};
</script>
  
  <title>Business Permit</title>
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="css/site_global.css?crc=443350757"/>
  <link rel="stylesheet" type="text/css" href="css/master_a-master.css?crc=187441051"/>
  <link rel="stylesheet" type="text/css" href="css/business-permit.css?crc=4086476143" id="pagesheet"/>
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
                      FROM    bitdb_r_barangayofficial 
                      INNER JOIN bitdb_r_barangayposition
                        ON bitdb_r_barangayposition.PosID = bitdb_r_barangayofficial.PosID
                      INNER JOIN bitdb_r_citizen
                        ON bitdb_r_barangayofficial.CitizenID = bitdb_r_citizen.Citizen_ID
                      WHERE bitdb_r_barangayposition.PosName LIKE "%Captain%" 
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
                      WHERE bitdb_r_barangayposition.PosName NOT LIKE "%Captain%"
                      AND bitdb_r_barangayofficial.Official_Status = 1';
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
     ?>
     <div class="clearfix grpelem" id="u1404-4"><!-- content -->
      <p>BARANGAY CLEARANCE FOR BUSINESS PERMIT</p>
     </div>
     <div class="clearfix grpelem" id="u1405-4"><!-- content -->
      <p>To whom it may concern;</p>
     </div>
     <div class="clearfix grpelem" id="u1406-19"><!-- content -->
      <p id="u1406-2"><span id="u1406">This is to certify that MS./MRS./MR. ___________________________________, has a business established in this Barangay known as</span></p>
      <p>&nbsp;</p>
      <p id="u1406-5"><span id="u1406-4">____________________________________</span></p>
      <p id="u1406-6">&nbsp;</p>
      <p id="u1406-7">&nbsp;</p>
      <p id="u1406-9">Located at _____________________________________________________</p>
      <p id="u1406-10">&nbsp;</p>
      <p id="u1406-14">This certification is issued upon request of the above named person for all legal intents and purposes in connection with his/her application for <span id="u1406-12">Business Permit</span>.</p>
      <p id="u1406-15">&nbsp;</p>
      <p id="u1406-17"><span id="u1406-16">Issued this _______ day of ___________________, ___________ at the Office of the Barangay Captain, _______________________________________________.</span></p>
     </div>
     <div class="clearfix grpelem" id="u1413-4"><!-- content -->
      <p>Certified by:</p>
     </div>
     <div class="clearfix grpelem" id="u1414-4"><!-- content -->
      <p>Hon.</p>
     </div>
     <div class="clearfix grpelem" id="u1415-4"><!-- content -->
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
     <div class="clearfix grpelem" id="u1416-4"><!-- content -->
      <p>Punung Barangay</p>
     </div>
     <?php
      include('../../dbconn.php');

        $BusinessSQL = 'SELECT bitdb_r_business.Business_Name,
                                bitdb_r_business.BusinessLoc,
                                bitdb_r_barangayzone.Zone,
                                bitdb_r_business.Manager,
                                bitdb_r_business.Mgr_Address 
                        FROM    bitdb_r_business 
                        INNER JOIN bitdb_r_barangayzone
                          ON  bitdb_r_business.BusinessLoc = bitdb_r_barangayzone.ZoneID
                        WHERE bitdb_r_business.BusinessID='.$_GET['BusinessID'].' ';
          $BusinessQuery = mysqli_query($bitMysqli,$BusinessSQL) or die (mysqli_error($bitMysqli));
          if(mysqli_num_rows($BusinessQuery) > 0)
          {
            while($row = mysqli_fetch_assoc($BusinessQuery))
            {
              $Name = $row['Business_Name'];
              $Loc = $row['BusinessLoc'];
              $Location = $row['Zone'];
              $Manager = $row['Manager'];
              $Mgr_Address = $row['Mgr_Address'];
              echo '<div class="clearfix grpelem" id="u1425-4"><!-- content -->
                    <p>'.$Manager.'</p>
                   </div>
                   <div class="clearfix grpelem" id="u1428-4"><!-- content -->
                    <p>'.$Name.'</p>
                   </div>
                   <div class="clearfix grpelem" id="u1431-4"><!-- content -->
                    <p>'.$Location.'</p>
                   </div>';
            }
          }
     ?>
     <!-- <div class="clearfix grpelem" id="u1425-4">
      <p>Manager's name</p>
     </div>
     <div class="clearfix grpelem" id="u1428-4">
      <p>Business Name</p>
     </div>
     <div class="clearfix grpelem" id="u1431-4">
      <p>Business Location</p>
     </div> -->
     <div class="clearfix grpelem" id="u1434-4">
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
                     <div class="clearfix grpelem" id="u1437-4"><!-- content -->
                      <p>'.$Month.'</p>
                     </div>
                     <div class="clearfix grpelem" id="u1440-4"><!-- content -->
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
                     <div class="clearfix grpelem" id="u1437-4"><!-- content -->
                      <p>'.$Month.'</p>
                     </div>
                     <div class="clearfix grpelem" id="u1440-4"><!-- content -->
                      <p>'.date("Y").'</p>
                     </div>';
        }
        
      ?><!-- 
      <p>DAY#</p>
     </div>
     <div class="clearfix grpelem" id="u1437-4">
      <p>Month Name</p>
     </div>
     <div class="clearfix grpelem" id="u1440-4">
      <p>Year</p>
     </div> -->
     <div class="clearfix grpelem" id="u1443-4"><!-- content -->
      <?php echo '<p>'.$BarangayName.'</p>';?>
     </div>
    </div>
    <div class="verticalspacer" data-offset-top="721" data-content-above-spacer="902" data-content-below-spacer="81"></div>
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
